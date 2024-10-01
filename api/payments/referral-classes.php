<?php

class ReferralClass extends Dbh {
    public function addCredit($email) {

        // first we need to make sure ref was not aleady paid for this user
        $getRefPaid = $this->connect()->prepare('SELECT users_refPaid FROM users WHERE users_email = ?;');
        if(!$getRefPaid->execute(array($email))) {
            $getRefPaid = null;
            echo("Could not get ref paid status");
            return;
        } 
        $dbrefpaid = $getRefPaid->fetchAll(PDO::FETCH_ASSOC);
        $users_refPaid = $dbrefpaid[0]["users_refPaid"];
        
        if($users_refPaid == 1) {
            echo("ref for this user was already paid");
            http_response_code(200);
            return;
        }

        // then we need to get the email of the person who referred the user
        $getRefEmail = $this->connect()->prepare('SELECT users_referral FROM users WHERE users_email = ?;');
        if(!$getRefEmail->execute(array($email))) {
            $getRefEmail = null;
            echo("Trouble retreiving ref email");
            return;
        } 
        $dbref = $getRefEmail->fetchAll(PDO::FETCH_ASSOC);
        $users_referral = $dbref[0]["users_referral"];

        // finally credit their balance with $5 extra
        $getRefBalance = $this->connect()->prepare('SELECT users_refBalance FROM users WHERE users_email = ?;');
        $incrementRefBalance = $this->connect()->prepare('UPDATE users SET users_refBalance = ? WHERE users_email = ?;');
        if($users_referral != null) {
            if(!$getRefBalance->execute(array($users_referral))) {
                $getRefBalance = null;
                http_response_code(200);
            } 
            $dbrefbalance = $getRefBalance->fetchAll(PDO::FETCH_ASSOC);
            $users_refBalance = $dbrefbalance[0]["users_refBalance"];
            $users_refBalance += 5;

            if(!$incrementRefBalance->execute(array($users_refBalance, $users_referral))) {
                $incrementRefBalance = null;
                http_response_code(200);
            } 
        } else {
            http_response_code(200);
            return;
        }

        // finally we need post that the user has been credit for that ref
        $postRefPaid = $this->connect()->prepare('UPDATE users SET users_refPaid = ? WHERE users_email = ?;');
        if(!$postRefPaid->execute(array(1, $email))) {
            $postRefPaid = null;
            return;
        }

        http_response_code(200);

        


        /*

        // ---------------------------------------------------------------------------

        // now we need to get the SUBID from the users_referral
        $getSubId = $this->connect()->prepare('SELECT users_subscriptionId FROM users WHERE users_email = ?;');
        if(!$getSubId->execute(array($users_referral))) {
            $getSubId = null;
            echo("Trouble retreiving subscription ID");
            exit();
        } 
        $dbsubid = $getSubId->fetchAll(PDO::FETCH_ASSOC);
        $users_subscriptionId = $dbsubid[0]["users_subscriptionId"];
        echo($users_subscriptionId);

        // ----------------------------------------------------------------------------
        // next we have to actually credit the referrer with 1 week for free
       
        $secondsInWeek = 604800;

        \Stripe\Stripe::setApiKey('sk_test_51KMKykIUyyqkBxkCpt6AvOJ9r2RR2e8dF36qmDoceVMfWPCQoqrhFYdLs3za0rk3oGTZBmby6pPs6Gw3a8WlIzhQ00YIks8ncw');
        try {
            $subscription = \Stripe\Subscription::retrieve($users_subscriptionId);
            $pause_timestamp = $subscription->pause_collection;
            $renewal_timestamp = $subscription->current_period_end;

            if($pause_timestamp == null) {
                // if pause timestamp is null, we will iniatiate the first pause for a week in the future
                // creating resume at timestamp which is for a week in the future
                $resumes_at = $renewal_timestamp + $secondsInWeek;
                try {
                    \Stripe\Subscription::update(
                        $users_subscriptionId,
                        [
                            "pause_collection" => [
                              "behavior" => "keep_as_draft",
                              "resumes_at" => $resumes_at
                            ],
                        ]
                    );
                    echo("Subscription paused for first time " . $resumes_at);
                } catch (Exception $e) {
                    echo("error");
                    echo("There was a problem, please try again or contact hello@trialdemon.com" . $e);
                }
            } else {
                // if pause timestamp is not null, then we know that the user already has a referral. We will prolong the pause by another week
                //  creating resume at timestamp which is for a week past the current pause_timestamp
                $pause_timestamp = $subscription->pause_collection["resumes_at"]; // getting timestap from stripe subscription object
                $resumes_at = $pause_timestamp + $secondsInWeek;
                try {
                    \Stripe\Subscription::update(
                        $users_subscriptionId,
                        [
                            "pause_collection" => [
                              "behavior" => "keep_as_draft",
                              "resumes_at" => $resumes_at
                            ],
                        ]
                    );
                    echo("Subscription paused even longer until " . $resumes_at);
                } catch (Exception $e) {
                    echo("error");
                    echo("There was a problem, please try again or contact hello@trialdemon.com" . $e);
                }
            }
        } catch (Exception $e) {
        }

        // --------------------------------------------------------------------
        // finally we need post that the 
        $postRefPaid = $this->connect()->prepare('UPDATE users SET users_refPaid = ? WHERE users_email = ?;');
        if(!$postRefPaid->execute(array(1, $email))) {
            $postRefPaid = null;
            exit();
        }

        http_response_code(200);
        */
       

    }

    public function genRefCode($email) {
        $rawHash = md5($email);
        $arrHash = str_split($rawHash, 1);
        $finalHash = "";
        for($i = 0; $i < 13; $i++) {
            $rand = rand(0, 30);
            $finalHash .= $arrHash[$rand];
        }

        
        $postRefCode = $this->connect()->prepare('UPDATE users SET users_refCode = ? WHERE users_email = ?;');
        if(!$postRefCode->execute(array($finalHash, $email))) {
            $postRefCode = null;
            http_response_code(400);
            echo("Could not post referral code to database.");
            exit();
        }
    }

    public function getRefCode($email) {

        $getRefCode = $this->connect()->prepare('SELECT users_refCode FROM users WHERE users_email = ?;');
        if(!$getRefCode->execute(array($email))) {
            $getRefCode = null;
            http_response_code(400);
            echo("Trouble getting your referral code");
            exit();
        } 
        $dbrefcode = $getRefCode->fetchAll(PDO::FETCH_ASSOC);
        $users_refCode = $dbrefcode[0]["users_refCode"];

        if($users_refCode == null) {
            $users_refCode = 0;
        }


        $refCode = array (
            'users_refCode' => $users_refCode,
        );

        header("Content-type: application/json");
        echo json_encode($refCode);
        http_response_code(200);
        exit();

    }

    public function getNumRefs($email) {
        
        $getNumRefs = $this->connect()->prepare('SELECT users_numRefs FROM users WHERE users_email = ?;');
        if(!$getNumRefs->execute(array($email))) {
            $getNumRefs = null;
            http_response_code(400);
            echo("Trouble getting number of referrals");
            exit();
        } 
        $dbnumrefs = $getNumRefs->fetchAll(PDO::FETCH_ASSOC);
        $users_numRefs = $dbnumrefs[0]["users_numRefs"];
        $refInfo = array (
            'numRefs' => $users_numRefs,
        );

        header("Content-type: application/json");
        echo json_encode($refInfo);
        http_response_code(200);
        exit();

    }

    public function dashboard($email) {
        $getRefCode = $this->connect()->prepare('SELECT users_refCode FROM users WHERE users_email = ?;');
        if(!$getRefCode->execute(array($email))) {
            $getRefCode = null;
            http_response_code(400);
            echo("Trouble getting your referral code");
            exit();
        } 
        $dbrefcode = $getRefCode->fetchAll(PDO::FETCH_ASSOC);
        $users_refCode = $dbrefcode[0]["users_refCode"];

        if($users_refCode == null) {
            $users_refCode = 0;
        }


        $getRefBalance = $this->connect()->prepare('SELECT users_refBalance FROM users WHERE users_email = ?;');
        if(!$getRefBalance->execute(array($email))) {
            $getRefBalance = null;
            http_response_code(400);
            echo("Trouble getting your referral balance");
            exit();
        } 
        $dbrefbalance = $getRefBalance->fetchAll(PDO::FETCH_ASSOC);
        $users_refBalance = $dbrefbalance[0]["users_refBalance"];

        $dashboard = array (
            'users_refCode' => $users_refCode,
            'users_refBalance' => $users_refBalance
        );

        header("Content-type: application/json");
        echo json_encode($dashboard);
        http_response_code(200);
        exit();

    }

}



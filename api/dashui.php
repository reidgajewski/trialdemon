<?php
include "./dbh.classes.php";
session_start();
$email = $_SESSION["email"];

class wtf extends dbh {

    function header($email) {
        $getNumber = $this->connect()->prepare('SELECT users_cardNumber FROM users WHERE users_email = ? ;');
        if(!$getNumber->execute(array($email))) {
          $getNumber = null;
          $users_cardNumber = "";
        } else {
            $dbcardnumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
            $users_cardNumber = $dbcardnumber[0]["users_cardNumber"];
            if($users_cardNumber === null) {
            } else {
                $arr = str_split($users_cardNumber, 4);
                $users_cardNumber = ($arr[0] . "-" . $arr[1] . "-" . $arr[2] . "-" . $arr[3]);
            }
        }




        $getCvc = $this->connect()->prepare('SELECT users_cardCvc FROM users WHERE users_email = ? ;');
        if(!$getCvc->execute(array($email))) {
            $getCvc = null;
            $users_cardCvc = "";
        } else {
            $dbcardcvc = $getCvc->fetchAll(PDO::FETCH_ASSOC);
            $users_cardCvc = $dbcardcvc[0]["users_cardCvc"];
        }


        

        $getExpMonth = $this->connect()->prepare('SELECT users_cardExpMonth FROM users WHERE users_email = ? ;');
        $getExpYear = $this->connect()->prepare('SELECT users_cardExpYear FROM users WHERE users_email = ? ;');
        if(!$getExpMonth->execute(array($email)) || !$getExpYear->execute(array($email))) {
            $getExpMonth = null;
            $getExpYear = null;
            $exp = "";
        } else {
            $dbcardexpmonth = $getExpMonth->fetchAll(PDO::FETCH_ASSOC);
            $users_cardExpMonth = $dbcardexpmonth[0]["users_cardExpMonth"];
    
            $dbcardexpyear = $getExpYear->fetchAll(PDO::FETCH_ASSOC);
            $users_cardExpYear = $dbcardexpyear[0]["users_cardExpYear"];

            if($users_cardExpYear === null || $users_cardExpMonth === null) {
                $exp = "";
            } else {
                $exp = $users_cardExpMonth . " " . $users_cardExpYear;
            }
        }



        $getVerified = $this->connect()->prepare('SELECT users_verified FROM users WHERE users_email = ? ;');
        if(!$getVerified->execute(array($email))) {
            $getVerified = null;
            $users_verified = "";
        } else {
            $dbverified = $getVerified->fetchAll(PDO::FETCH_ASSOC);
            $users_verified = $dbverified[0]["users_verified"];
            if($users_verified === null) {
                $users_verified === "";
            }
        }



        $getHasCard = $this->connect()->prepare('SELECT users_hasCard FROM users WHERE users_email = ? ;');
        if(!$getHasCard->execute(array($email))) {
          $getHasCard = null;
          $users_hasCard = "";
        } else {
            $dbhascard = $getHasCard->fetchAll(PDO::FETCH_ASSOC);
            $users_hasCard = $dbhascard[0]["users_hasCard"];
        }


        $getPaymentFailed = $this->connect()->prepare('SELECT paymentFailed FROM users WHERE users_email = ? ;');
        if(!$getPaymentFailed->execute(array($email))) {
          $getPaymentFailed = null;
          $paymentFailed = "";
        } else {
            $dbpaymentfailed = $getPaymentFailed->fetchAll(PDO::FETCH_ASSOC);
            $paymentFailed = $dbpaymentfailed[0]["paymentFailed"];
        }



        $getCardHolderId = $this->connect()->prepare('SELECT users_cardHolderId FROM users WHERE users_email = ? ;');
        if(!$getCardHolderId->execute(array($email))) {
          $getCardHolderId = null;
          $users_cardHolderId = null;
        } else {
            $dbcardholderid = $getCardHolderId->fetchAll(PDO::FETCH_ASSOC);
            $users_cardHolderId = $dbcardholderid[0]["users_cardHolderId"];
        }





        $getFirstName = $this->connect()->prepare('SELECT users_firstName FROM users WHERE users_email = ? ;');
        if(!$getFirstName->execute(array($email))) {
          $getName = null;
          $users_firstName = "";
        } else {
            $dbname = $getFirstName->fetchAll(PDO::FETCH_ASSOC);
            $users_firstName = $dbname[0]["users_firstName"];
        }



        $getTempEmail = $this->connect()->prepare('SELECT users_tempEmail FROM users WHERE users_email = ? ;');
        if(!$getTempEmail->execute(array($email))) {
            $getTempEmail = null;
            $users_tempEmail = "";
        } else {
            $dbtempemail = $getTempEmail->fetchAll(PDO::FETCH_ASSOC);
            $users_tempEmail = $dbtempemail[0]["users_tempEmail"];
        }



        $getAddress = $this->connect()->prepare('SELECT users_address FROM users WHERE users_email = ? ;');
        if(!$getAddress->execute(array($email))) {
            $getAddress = null;
            $users_address = "";
        } else {
            $dbaddress = $getAddress->fetchAll(PDO::FETCH_ASSOC);
            $users_address = $dbaddress[0]["users_address"];
        }



        $getCity = $this->connect()->prepare('SELECT users_city FROM users WHERE users_email = ? ;');
        if(!$getCity->execute(array($email))) {
            $getCity = null;
            $users_city = "";
        } else {
            $dbcity = $getCity->fetchAll(PDO::FETCH_ASSOC);
            $users_city = $dbcity[0]["users_city"];
        }



        $getState = $this->connect()->prepare('SELECT users_state FROM users WHERE users_email = ? ;');
        if(!$getState->execute(array($email))) {
            $getState = null;
            $users_state = "";
        } else {
            $dbstate = $getState->fetchAll(PDO::FETCH_ASSOC);
            $users_state = $dbstate[0]["users_state"];
        }


        $getZip = $this->connect()->prepare('SELECT users_zip FROM users WHERE users_email = ? ;');
        if(!$getZip->execute(array($email))) {
            $getZip = null;
            $users_zip = "";
        } else {
            $dbzip = $getZip->fetchAll(PDO::FETCH_ASSOC);
            $users_zip = $dbzip[0]["users_zip"];
        }



        // subscription status
        $getSubscriptionStatus = $this->connect()->prepare('SELECT users_SubscriptionStatus FROM users WHERE users_email = ?;');

        if(!$getSubscriptionStatus->execute(array($email))) {
            $getSubscriptionStatus = null;
            http_response_code(400);
            echo("Could not get subscription status");
            exit();
        }

        $db_subscriptionStatus = $getSubscriptionStatus->fetchAll(PDO::FETCH_ASSOC);
        $users_SubscriptionStatus = $db_subscriptionStatus[0]["users_SubscriptionStatus"];



        //welcome text
        if($users_hasCard === "1" && $users_verified === "1" && $users_SubscriptionStatus === "1") {
            $welcomeHeader = "Welcome 👋";
            $welcomeText = "Use the card & contact information to create free trials";
        } else {
            $welcomeHeader = "Welcome 👋";
            $welcomeText = "Click the button below to get started!";
        }

    

        

        // time left 
        $getCardTime = $this->connect()->prepare('SELECT users_cardtime FROM users WHERE users_email = ?;');
    
        if(!$getCardTime->execute(array($email))) {
            $getCardTime = null;
            http_response_code(400);
            echo("Could not get card time");
            exit();
        }
    
        $dbcardtime = $getCardTime->fetchAll(PDO::FETCH_ASSOC);
        $users_cardTime = $dbcardtime[0]["users_cardtime"];
    
        // getting result of current time - cardtime
        $time = time();
        $time_value = (int) $time;
        $cardtime_value = (int) $users_cardTime;
        $result = $time_value - $cardtime_value;
    
        $timeLeft = round(((172800 - $result) / 60 / 60), 1) . " hours remain";

        if(round(((172800 - $result) / 60 / 60), 1) <= 0) {
            $timeLeft = "You can generate a new card";
        }

        $timeLeftNum = 172800 - $result;

        if($timeLeftNum <= 0) {
            $canGenerate = 1;
        } else {
            $canGenerate = 0;
        }


        //button
        if($users_verified === "0") {
            $buttonText = "Verify phone";
            $headerButtonHref = "./phone";
        } else if($users_verified === "1" && $users_SubscriptionStatus === "0") {
            $buttonText = "Setup Account";
            $headerButtonHref = "./activate1";
        } else if($users_verified === "1" && $users_SubscriptionStatus === "1" && $users_hasCard === "0") {
            $buttonText = "Setup TrialDemon";
            $headerButtonHref = "./cardholder";
        } else if($users_hasCard === "1" && $users_SubscriptionStatus === "0") {
            $buttonText = "Update payment method";
            $headerButtonHref = "./pricing";
        } else {
            $buttonText = null;
            $headerButtonHref = null;
        }

        if($users_verified === "1" && $users_hasCard === "0" && $users_cardHolderId != null && $users_SubscriptionStatus === "1") {
            $buttonText = "Activate card";
            $headerButtonHref = "./activate";
        }


        // get time and date 


        $wtfInfo = array (
            'welcomeHeader' => $welcomeHeader,
            'users_firstName' => $users_firstName,
            'welcomeText' => $welcomeText,
            'buttonText' => $buttonText,
            'headerButtonHref' => $headerButtonHref,
            'hasCard' => $users_hasCard,
            'users_verified' => $users_verified,
            'users_cardNumber' => $users_cardNumber,
            'users_cardCvc' => $users_cardCvc,
            'users_cardExp' => $exp,
            'tempEmail' => $users_tempEmail,
            'address' => $users_address,
            'city' => $users_city,
            'state' => $users_state,
            'zip' => $users_zip,
            'timeLeft' => $timeLeft,
            'canGenerate' => $canGenerate,
            'users_SubscriptionStatus' => $users_SubscriptionStatus,
            'paymentFailed' => $paymentFailed
        );

        header("Content-type: application/json");
        echo json_encode($wtfInfo);


    }

}

$penis = new wtf;
$penis->header($email);

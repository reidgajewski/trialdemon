<?php

class NewEmailClass extends Dbh {

    public function checkTime($email){
        $getEmailTime = $this->connect()->prepare('SELECT users_emailTime FROM users WHERE users_email = ?;');

        // grabbing emailTime
        if(!$getEmailTime->execute(array($email))) {
            $getEmailTime = null;
            http_response_code(400);
            echo("Could not get card time");
            exit();
        }
        $dbemailtime = $getEmailTime->fetchAll(PDO::FETCH_ASSOC);
        $users_emailTime = $dbemailtime[0]["users_emailTime"];

        // result = time - emailTime
        $time = time();
        $time_value = (int) $time;
        $result = $time_value - $users_emailTime;

        // return true or false if can create new email
        $twelveHours = 43200;
        $timeLeftSeconds = $twelveHours - $result;
        $timeLeft = ceil($timeLeftSeconds/60/60);
        $returnValues = array("boolean"=>null,"message"=>null,"timeLeft"=>null);
        if($result > $twelveHours) {
            $returnValues["boolean"] = true;
            $returnValues["message"] = "You can create a new email";
            $returnValues["timeLeft"] = $timeLeft;
        } else {
            $returnValues["boolean"] = false;
            $returnValues["message"] = "You can create a new email in " . $timeLeft . " hours";
            $returnValues["timeLeft"] = $timeLeft;
        }
        return $returnValues;
    }
    
    public function deleteInbox($oldInbox) {

        // configure mailslurp client
        $apiKey = "cde8a29c1bf6da3e529e8681c3d50b55130a3a6e54e62fd0a5b1a1c56c00e2be";
        $config = MailSlurp\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', $apiKey);
    
        // delete an inbox
        try {
        $inboxController = new MailSlurp\Apis\InboxControllerApi(null, $config);
        $waitForController = new MailSlurp\Apis\WaitForControllerApi(null, $config);
        $inboxController->deleteInbox($oldInbox);
        } catch(Exception $e) {
            http_response_code(400);
            echo("Error deleting email");
            exit();
        }
    }

    public function newEmailFunction($email) {
        $postInboxId = $this->connect()->prepare('UPDATE users SET users_inboxId = ? WHERE users_email = ?;');
        $postTempEmail = $this->connect()->prepare('UPDATE users SET users_tempEmail = ? WHERE users_email = ?;');
        $postEmailTime = $this->connect()->prepare('UPDATE users SET users_emailTime = ? WHERE users_email = ?;');
        $getVerified = $this->connect()->prepare('SELECT users_verified FROM users WHERE users_email = ?;');

        // grabbing subscription status
        $getSubscriptionStatus = $this->connect()->prepare('SELECT users_SubscriptionStatus FROM users WHERE users_email = ?;');
        if(!$getSubscriptionStatus->execute(array($email))) {
            $getSubscriptionStatus = null;
            http_response_code(400);
            echo("Could not get subscription status");
            exit();
        }

        $dbsubscriptionstatus = $getSubscriptionStatus->fetchAll(PDO::FETCH_ASSOC);
        $users_SubscriptionStatus = $dbsubscriptionstatus[0]["users_SubscriptionStatus"];

        if($users_SubscriptionStatus === "0") {
            http_response_code(400);
            echo("You are not subscribed");
            exit();
        }

        if(!$getVerified->execute(array($email))) {
            $getVerified = null;
            http_response_code(400);
            echo("Could not get verification status");
            exit();
        }

        $dbverified = $getVerified->fetchAll(PDO::FETCH_ASSOC);
        $users_verified = $dbverified[0]["users_verified"];

        
        $rateLimit = $this->checkTime($email);

        if($rateLimit["boolean"] === true) {
        } else {
            http_response_code(400);
            echo($rateLimit["message"]);
            exit();
        }
        


        if($users_verified === "1" && $users_SubscriptionStatus === "1") {

            // configure mailslurp client
            $apiKey = "cde8a29c1bf6da3e529e8681c3d50b55130a3a6e54e62fd0a5b1a1c56c00e2be";
            $config = MailSlurp\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', $apiKey);

            // getting current inbox
            $getInboxId = $this->connect()->prepare('SELECT users_inboxId FROM users WHERE users_email = ?;');
            if(!$getInboxId->execute(array($email))) {
                $getInboxId = null;
                http_response_code(400);
                echo("Could not get current Inbox");
                exit();
            }
            $dbinboxid = $getInboxId->fetchAll(PDO::FETCH_ASSOC);
            $users_inboxId = $dbinboxid[0]["users_inboxId"];

            // if current users_inboxId is not null then go ahead and delete
            if($users_inboxId != null) {
                //$this->deleteInbox($users_inboxId);
            }
            
            // create an inbox
            try {
            $inboxController = new MailSlurp\Apis\InboxControllerApi(null, $config);
            $waitForController = new MailSlurp\Apis\WaitForControllerApi(null, $config);
            $inbox = $inboxController->createInbox();
            $inboxId = $inbox["id"];
            $users_tempEmail = $inboxId . "@mailslurp.com";
            } catch(Exception $e) {
                http_response_code(400);
                echo("Error creating email");
                exit();
            }

            
            if(!$postInboxId->execute(array($inboxId, $email))) {
                $postInboxId = null;
                http_response_code(400);
                echo("Error posting inbox ID");
                exit();
            }

            if(!$postTempEmail->execute(array($users_tempEmail, $email))) {
                $postTempEmail = null;
                http_response_code(400);
                echo("Error posting new email");
                exit();
            }

            $time = time();
            $time_value = (int) $time;
            if(!$postEmailTime->execute(array($time_value, $email))) {
                $postEmailTime = null;
                http_response_code(400);
                echo("Error posting time");
                exit();
            }

            http_response_code(200);
            echo("success");
        } else {
            http_response_code(400);
            echo("Please verify your phone");
        }
    }

    public function checkEmail($email) {
        $getInboxId = $this->connect()->prepare('SELECT users_inboxid FROM users WHERE users_email = ?;');
        $apiKey = "cde8a29c1bf6da3e529e8681c3d50b55130a3a6e54e62fd0a5b1a1c56c00e2be";
        $config = MailSlurp\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', $apiKey);

        if(!$getInboxId->execute(array($email))) {
            $getInboxId = null;
            http_response_code(400);
            echo("Could not get inbox id");
            exit();
        }

        $dbinboxid = $getInboxId->fetchAll(PDO::FETCH_ASSOC);
        $users_inboxid = $dbinboxid[0]["users_inboxid"];

        $inboxController = new MailSlurp\Apis\InboxControllerApi(null, $config);
        $waitForController = new MailSlurp\Apis\WaitForControllerApi(null, $config);

        try{
        $mailslurpEmail = $waitForController->waitForLatestEmail($users_inboxid, $timeout=20);
        } catch(Exception $e) {
            http_response_code(400);
            return("Inbox still empty, or there was an error!");
            exit();
        }

        return($mailslurpEmail->getBody());
        
    }

    public function listInboxes($page) {
        // configure mailslurp client
        $apiKey = "cde8a29c1bf6da3e529e8681c3d50b55130a3a6e54e62fd0a5b1a1c56c00e2be";
        $config = MailSlurp\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', $apiKey);

        $inboxController = new MailSlurp\Apis\InboxControllerApi(null, $config);
        
        $pageInboxes = $inboxController->getAllInboxes($page);

        $exists = $this->connect()->prepare('SELECT users_email FROM users WHERE users_inboxId = ?;');
        $lastLogin = $this->connect()->prepare('SELECT users_lastLogin FROM users WHERE users_inboxId = ?;');

        

        
        for($i = 0; $i < 20; $i++) {

            
            $currentInbox = $pageInboxes["content"][$i]["id"];
            if(!$exists->execute(array($currentInbox))) {
                echo("there was error");
            }
            $dbemail = $exists->fetchAll(PDO::FETCH_ASSOC);
            $users_email = $dbemail[0]["users_email"];

            if(!$lastLogin->execute(array($currentInbox))) {
                echo("there was error");
            }
            $dblastlogin = $lastLogin->fetchAll(PDO::FETCH_ASSOC);
            $users_lastLogin = $dblastlogin[0]["users_lastLogin"];
    
            if($users_email != null && $users_lastLogin < 1663140282) {
                $this->deleteInbox($currentInbox);
                
            } else {
                $this->deleteInbox($currentInbox);
            }
        }
        echo("done");
        
    }

}




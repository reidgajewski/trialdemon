<?php

require_once "./vendor/stripe/stripe-php/init.php";
include "./dbh.classes.php";


// class with methods to handle webhook cases
class handlers extends dbh {

    public function activate($customerId) {
        $activate = $this->connect()->prepare('UPDATE users SET users_SubscriptionStatus = ? WHERE users_customerId = ?;');
        $value = 1;
        if(!$activate->execute(array($value, $customerId))) {
            $activate = null;
            http_response_code(400);
            echo("Could not update subscription status");
            exit();
        }

        $activate2 = $this->connect()->prepare('UPDATE users SET paymentFailed = ? WHERE users_customerId = ?;');
        $value2 = 0;
        if(!$activate2->execute(array($value2, $customerId))) {
            $activate2 = null;
            http_response_code(400);
            echo("Could not update payment status");
            exit();
        }
    }

    public function cancel($customerId) {
        $deactivate = $this->connect()->prepare('UPDATE users SET users_SubscriptionStatus = ? WHERE users_customerId = ?;');
        $value = 0;
        if(!$deactivate->execute(array($value, $customerId))) {
            $deactivate = null;
            http_response_code(400);
            echo("Could not update subscription status");
            exit();
        }

        $getEmail = $this->connect()->prepare('SELECT users_email FROM users WHERE users_customerId = ?;');
        if (!$getEmail->execute(array($customerId))) {
            $getEmail = null;
            http_response_code(400);
            echo("error with getting email");
            exit();
        }

        $dbemail = $getEmail->fetchAll(PDO::FETCH_ASSOC);
        $email = $dbemail[0]["users_email"];

        // getting date and time
        $time = time();
        date_default_timezone_set("America/New_York");
        $date = date('m/d/Y h:i:s a', time());

        $postInfo = $this->connect()->prepare('INSERT INTO analytics (users_email, users_isCancelled, unix_cancelled, date_cancelled) VALUES (?, ?, ?, ?);');
        if (!$postInfo->execute(array($email, 1, $time, $date))) {
            $postInfo = null;
            http_response_code(400);
            echo("error with posting analytics");
            exit();
        }
        
        include "../api/vendor/autoload.php";

        $recipient = $email;

        $emaill = new \SendGrid\Mail\Mail(); 
        $emaill->setFrom("hello@trialdemon.com", "TrialDemon");
        $emaill->addTo($recipient);
        $emaill->setTemplateId("d-522b6fe4518b4e09bed0f6222f512e8d");

        $sendgrid = new \SendGrid('sgapikey');
        try {
            $response = $sendgrid->send($emaill);
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }

    public function deactivate($customerId) {
        $deactivate = $this->connect()->prepare('UPDATE users SET users_SubscriptionStatus = ? WHERE users_customerId = ?;');
        $value = 0;
        if(!$deactivate->execute(array($value, $customerId))) {
            $deactivate = null;
            http_response_code(400);
            echo("Could not update subscription status");
            exit();
        }

  
        $deactivate2 = $this->connect()->prepare('UPDATE users SET paymentFailed = ? WHERE users_customerId = ?;');
        $value2 = 1;
        if(!$deactivate2->execute(array($value2, $customerId))) {
            $deactivate2 = null;
            http_response_code(400);
            echo("Could not update payment status");
            exit();
        }

    }

    public function paymentNotification(){
        $api_key = 'logsnag api';
        $data = array(
            "project" => "trialdemon",
            "channel" => "payment",
            "event" => "payment",
            "description" => "email: email@gmail.com",
            "icon" => "💰",
            "notify" => true,
            "tags" => array(
                "email" => "email@gmail.com",
                "uid" => "uid"
            )
        );
        $data_json = json_encode($data);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.logsnag.com/v1/log');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer '.$api_key,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response  = curl_exec($ch);
        curl_close($ch);
    }

    public function addCredit($customerId) {
        include "../api/payments/referral-classes.php";

        $getEmail = $this->connect()->prepare('SELECT users_email FROM users WHERE users_customerId = ?;');
        if (!$getEmail->execute(array($customerId))) {
            $getEmail = null;
            http_response_code(400);
            echo("error with getting email");
            exit();
        }
        $dbemail = $getEmail->fetchAll(PDO::FETCH_ASSOC);
        $email = $dbemail[0]["users_email"];
    
        $ReferralClass = new ReferralClass();
        $ReferralClass->addCredit($email);
    }
    
}

$handle = new handlers;

// both are currently in live mode
\Stripe\Stripe::setApiKey('stripe key');
$endpoint_secret = 'ep secret';

// stripe stuff 
$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;
try {
    $event = \Stripe\Webhook::constructEvent(
        $payload, $sig_header, $endpoint_secret
    );
} catch(\UnexpectedValueException $e) {
    // Invalid payload
    http_response_code(400);
    exit();
} catch(\Stripe\Exception\SignatureVerificationException $e) {
    // Invalid signature
    http_response_code(400);
    exit();
}


// Handle events
switch ($event->type) {
    case 'customer.created':
        break;
    
    case 'charge.succeeded':
        $customerId = $event->data->object->customer;
        $handle->activate($customerId);
        $handle->addCredit($customerId);
        $handle->paymentNotification();
        
        break;
    
    case 'charge.failed':
        $customerId = $event->data->object->customer;
        $handle->deactivate($customerId);
        break;

    case 'customer.subscription.deleted':
        $customerId = $event->data->object->customer;
        $handle->cancel($customerId);

        break;

    // ... handle other event types
    default:
        echo 'Received unknown event type ' . $event->type;
}

http_response_code(200);





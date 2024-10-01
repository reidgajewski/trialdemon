<?php

class CustomersAndPayments extends Dbh
{

    public function newCustomer($email, $fullName, $api_id)
    {

        $getValidEmail = $this->connect()->prepare('SELECT users_validEmail FROM users WHERE users_email = ?;');

        if (!$getValidEmail->execute(array($email))) {
            $getValidEmail = null;
            http_response_code(400);
            echo ("Error 999, contact us");
            exit();
        }

        $dbvalidemail = $getValidEmail->fetchAll(PDO::FETCH_ASSOC);
        $users_validEmail = $dbvalidemail[0]["users_validEmail"];

        if ($users_validEmail == 0) {
            http_response_code(400);
            echo ("Payments disabled, contact us");
            exit();
        }




        $postCustomerId = $this->connect()->prepare('UPDATE users SET users_customerId = ? WHERE users_email = ?;');
        $postSubscriptionId = $this->connect()->prepare('UPDATE users SET users_subscriptionId = ? WHERE users_email = ?;');

        try {
            $stripe = new \Stripe\StripeClient('stripe api key');
            $customer = $stripe->customers->create(
                [
                    'email' => $email
                ]
            );
            $customerId = $customer["id"];
            if (!$postCustomerId->execute(array($customerId, $email))) {
                $postCustomerId = null;
                http_response_code(400);
                echo ("Could not post customer ID");
                exit();
            }
        } catch (Exception $e) {
            http_response_code(400);
            echo ("Error creating new customer");
            exit();
        }

        try {
            $subscription = $stripe->subscriptions->create([
                'customer' => $customerId,
                'items' => [[
                    'price' => $api_id,
                ]],
                'payment_behavior' => 'default_incomplete',
                'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
                'expand' => ['latest_invoice.payment_intent'],
            ]);
            $subscriptionId = $subscription["id"];
            $client_secret = $subscription->latest_invoice->payment_intent->client_secret;
            if (!$postSubscriptionId->execute(array($subscriptionId, $email))) {
                $postSubscriptionId = null;
                http_response_code(400);
                echo ("Could not post subscription ID");
                exit();
            }
        } catch (Exception $e) {
            http_response_code(400);
            echo ($e);
            exit();
        }

        echo ($client_secret);
        http_response_code(200);
    }


    public function newSubscription($email, $api_id)
    {
        // getting customer ID
        $getCustomerId = $this->connect()->prepare('SELECT users_customerId FROM users WHERE users_email = ?;');
        if (!$getCustomerId->execute(array($email))) {
            $getCustomerId = null;
            http_response_code(400);
            echo ("Could not get customer ID");
            exit();
        }

        $dbcustomerid = $getCustomerId->fetchAll(PDO::FETCH_ASSOC);
        $customerId = $dbcustomerid[0]["users_customerId"];


        // creating new subscription with customer id
        $postSubscriptionId = $this->connect()->prepare('UPDATE users SET users_subscriptionId = ? WHERE users_email = ?;');
        $stripe = new \Stripe\StripeClient('stripe api key');
        try {
            $subscription = $stripe->subscriptions->create([
                'customer' => $customerId,
                'items' => [[
                    'price' => $api_id,
                ]],
                'payment_behavior' => 'default_incomplete',
                'expand' => ['latest_invoice.payment_intent'],
            ]);
            $subscriptionId = $subscription["id"];
            $client_secret = $subscription->latest_invoice->payment_intent->client_secret;
            if (!$postSubscriptionId->execute(array($subscriptionId, $email))) {
                $postSubscriptionId = null;
                http_response_code(400);
                echo ("Could not post subscription ID");
                exit();
            }
        } catch (Exception $e) {
            http_response_code(400);
            echo ($e);
            exit();
        }

        echo ($client_secret);
        http_response_code(200);
    }


    public function isCustomer($email)
    {
        $getCustomerId = $this->connect()->prepare('SELECT users_customerId FROM users WHERE users_email = ?;');
        if (!$getCustomerId->execute(array($email))) {
            $getCustomerId = null;
            http_response_code(400);
            echo ("Could not get customer ID");
            exit();
        }

        $dbcustomerid = $getCustomerId->fetchAll(PDO::FETCH_ASSOC);
        $users_customerId = $dbcustomerid[0]["users_customerId"];

        if ($users_customerId != null) {
            return true;
        } else {
            return false;
        }
    }


    public function subscribed($email)
    {
        $getSubscriptionStatus = $this->connect()->prepare('SELECT users_SubscriptionStatus FROM users WHERE users_email = ?;');
        if (!$getSubscriptionStatus->execute(array($email))) {
            $getSubscriptionStatus = null;
            http_response_code(400);
            echo ("Could not get subscription status");
            exit();
        }

        $dbsubscriptionstatus = $getSubscriptionStatus->fetchAll(PDO::FETCH_ASSOC);
        $users_SubscriptionStatus = $dbsubscriptionstatus[0]["users_SubscriptionStatus"];

        if ($users_SubscriptionStatus === "1") {
            return true;
        } else {
            return false;
        }
    }


    public function isVerified($email)
    {
        $getVerified = $this->connect()->prepare('SELECT users_verified FROM users WHERE users_email = ?;');
        // grabbing verification status from db and creating $users_verified variable
        if (!$getVerified->execute(array($email))) {
            $getVerified = null;
            http_response_code(400);
            echo ("Could not get verification status");
            exit();
        }

        $dbverified = $getVerified->fetchAll(PDO::FETCH_ASSOC);
        $users_verified = $dbverified[0]["users_verified"];

        if ($users_verified === "0") {
            return false;
        } else if ($users_verified === "1") {
            return true;
        }
    }


    public function main($email, $fullName, $api_id)
    {
        if ($this->isVerified($email) === true) {
            $isCustomer = $this->isCustomer($email);
            if ($isCustomer === true) {
                $subscriptionStatus = $this->subscribed($email);
                if ($subscriptionStatus === true) {
                    echo ("You are already subscribed");
                    http_response_code(400);
                } else {
                    $this->newSubscription($email, $api_id);
                }
            } else if ($isCustomer === false) {
                // create new customer & subscription
                $this->newCustomer($email, $fullName, $api_id);
            }
        } else {
            echo ("Please verify your phone");
            http_response_code(400);
            exit();
        }
    }


    public function getSubscription($email)
    {


        // getting subscripiton info
        $getSubscription = $this->connect()->prepare('SELECT users_subscriptionId FROM users WHERE users_email = ?;');
        if (!$getSubscription->execute(array($email))) {
            $getSubscription = null;
            http_response_code(400);
            echo ("Could not get subscription ID");
            exit();
        }
        $dbsubscriptionid = $getSubscription->fetchAll(PDO::FETCH_ASSOC);
        $users_subscriptionId = $dbsubscriptionid[0]["users_subscriptionId"];

        if ($users_subscriptionId == null) {
            $isCustomer = false;
        } else if ($users_subscriptionId != null) {
            $isCustomer = true;
        }

        if ($isCustomer == true) {

            $subscriptionInfoArray = array(
                'isCustomer' => true,
                'header' => "Click the button below to manage your billing profile"
            );
        } else {
            $subscriptionInfoArray = array(
                'isCustomer' => false,
                'header' => "You have not subscribed to TrialDemon"
            );
        }

        $pretty = json_encode($subscriptionInfoArray, JSON_PRETTY_PRINT);
        header('Content-Type: application/json');
        echo ($pretty);
    }


    public function cancelSubscription($email)
    {
        $getSubscriptionId = $this->connect()->prepare('SELECT users_subscriptionId FROM users WHERE users_email = ?;');
        if (!$getSubscriptionId->execute(array($email))) {
            $getSubscriptionId = null;
            http_response_code(400);
            echo ("Could not get subscription ID");
            exit();
        }

        $dbsubscriptionid = $getSubscriptionId->fetchAll(PDO::FETCH_ASSOC);
        $users_subscriptionId = $dbsubscriptionid[0]["users_subscriptionId"];



        \Stripe\Stripe::setApiKey('stripe api key');

        try {
            \Stripe\Subscription::update(
                $users_subscriptionId,
                [
                    'cancel_at_period_end' => true,
                ]
            );
        } catch (Exception $e) {
            http_response_code(400);
            echo ("There was a problem, please try again or contact hello@trialdemon.com" . $e);
            exit();
        }
        http_response_code(200);
        echo ("Subscription successfully canceled");
    }


    public function portalSession($email)
    {



        $stripe = new \Stripe\StripeClient('stripe api key');

        $stripe->billingPortal->configurations->create(
            [
                'business_profile' => [
                    'headline' => 'TrialDemon billing portal',
                ],
                'features' => ['invoice_history' => ['enabled' => true]],
            ]
        );

        $getCustomerId = $this->connect()->prepare('SELECT users_customerId FROM users WHERE users_email = ?;');
        if (!$getCustomerId->execute(array($email))) {
            $getCustomerId = null;
            http_response_code(400);
            echo ("Could not get customer ID");
            exit();
        }

        $dbcustomerid = $getCustomerId->fetchAll(PDO::FETCH_ASSOC);
        $users_customerId = $dbcustomerid[0]["users_customerId"];



        \Stripe\Stripe::setApiKey('stripe api key');


        // Authenticate your user.
        $session = \Stripe\BillingPortal\Session::create([
            'customer' => $users_customerId,
            'return_url' => 'https://trialdemon.com/account',
        ]);




        // Redirect to the customer portal.
        http_response_code(200);
        echo ($session->url);
        exit();
    }


    public function pausePayments()
    {

        \Stripe\Stripe::setApiKey('stripe api key');

        try {
            \Stripe\Subscription::update(
                "sub_1MWynlIUyyqkBxkCqSuAAw9o",
                [
                    "pause_collection" => [
                        "behavior" => "keep_as_draft",
                        "resumes_at" => "1678405930"
                    ],
                ]
            );
        } catch (Exception $e) {
            http_response_code(400);
            echo ("There was a problem, please try again or contact hello@trialdemon.com" . $e);
            exit();
        }
        http_response_code(200);
        echo ("Subscription successfully updated");
    }
}

<?php


class NewCardHolder extends Dbh
{

  public function createCardHolder($email, $firstName, $lastName, $address, $city, $state, $zip)
  {

    $getPhone = $this->connect()->prepare('SELECT users_phone FROM users WHERE users_email = ?;');
    $getVerified = $this->connect()->prepare('SELECT users_verified FROM users WHERE users_email = ?;');
    $postCardHolderId = $this->connect()->prepare('UPDATE users SET users_cardHolderId = ? WHERE users_email = ?;');
    $getCardHolderId = $this->connect()->prepare('SELECT users_cardHolderId FROM users WHERE users_email = ?;');
    $postFirstName = $this->connect()->prepare('UPDATE users SET users_firstName = ? WHERE users_email = ?;');
    $postLastName = $this->connect()->prepare('UPDATE users SET users_lastName = ? WHERE users_email = ?;');
    $postCity = $this->connect()->prepare('UPDATE users SET users_city = ? WHERE users_email = ?;');
    $postState = $this->connect()->prepare('UPDATE users SET users_state = ? WHERE users_email = ?;');
    $postAddress = $this->connect()->prepare('UPDATE users SET users_address = ? WHERE users_email = ?;');
    $postZip = $this->connect()->prepare('UPDATE users SET users_zip = ? WHERE users_email = ?;');

    // grabbing subscription status
    $getSubscriptionStatus = $this->connect()->prepare('SELECT users_SubscriptionStatus FROM users WHERE users_email = ?;');
    if (!$getSubscriptionStatus->execute(array($email))) {
      $getSubscriptionStatus = null;
      http_response_code(400);
      echo ("Could not get subscription status");
      exit();
    }

    $dbsubscriptionstatus = $getSubscriptionStatus->fetchAll(PDO::FETCH_ASSOC);
    $users_SubscriptionStatus = $dbsubscriptionstatus[0]["users_SubscriptionStatus"];

    if ($users_SubscriptionStatus === "0") {
      http_response_code(400);
      echo ("You are not subscribed");
      exit();
    }


    // grabbing cardholderid from DB
    if (!$getCardHolderId->execute(array($email))) {
      $getCardHolderId = null;
      http_response_code(400);
      echo ("Could not get cardholder ID");
      exit();
    }

    $dbcardholderid = $getCardHolderId->fetchAll(PDO::FETCH_ASSOC);
    $hasCardHolderId = $dbcardholderid[0]["users_cardHolderId"];

    if ($hasCardHolderId != null) {
      $hasCardHolderId = null;
      http_response_code(400);
      echo ("Cardholder exists, please create card");
      exit();
    }

    // grabbing phone number from db and creating $users_phone variable
    if (!$getPhone->execute(array($email))) {
      $getPhone = null;
      http_response_code(400);
      echo ("Could not get phone number");
      exit();
    }

    $dbphone = $getPhone->fetchAll(PDO::FETCH_ASSOC);
    $users_phone = $dbphone[0]["users_phone"];

    // grabbing verification status from db and creating $users_verified variable
    if (!$getVerified->execute(array($email))) {
      $getVerified = null;
      http_response_code(400);
      echo ("Could not get verification status");
      exit();
    }

    $dbverified = $getVerified->fetchAll(PDO::FETCH_ASSOC);
    $users_verified = $dbverified[0]["users_verified"];

    if ($firstName === "" || $lastName === "" || $address === "" || $city === "" || $state === "" || $zip === "" || $users_phone === "") {
      http_response_code(400);
      echo ("Empty input");
      exit();
    }

    if ($users_verified === "0") {
      http_response_code(400);
      echo ("Your phone is not verified");
      exit();
    }

    $name = $firstName . " " . $lastName;

    try {
      \Stripe\Stripe::setApiKey('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');
      $cardholder = \Stripe\Issuing\Cardholder::create([
        'name' => $name,
        'email' => $email,
        'phone_number' => $users_phone,
        'status' => 'active',
        'type' => 'individual',
        'billing' => [
          'address' => [
            'line1' => $address,
            'city' => $city,
            'state' => $state,
            'postal_code' => $zip,
            'country' => 'US',
          ],
        ],
        'spending_controls' => [
          'spending_limits' => [
            ['amount' => 100, 'interval' => 'monthly'],
          ],
        ],
      ]);
      $cardHolderId = $cardholder["id"];
    } catch (Exception $e) {
      http_response_code(400);
      echo ("Error creating cardholder: $e");
      exit();
    }

    // accepting cardholder terms stripe
    $ch = curl_init();

    // getting user IP
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }

    $curlURL = 'https://api.stripe.com/v1/issuing/cardholders/' . $cardHolderId;
    $currentTime = time();

    curl_setopt($ch, CURLOPT_URL, $curlURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
      'individual[first_name]' => $firstName,
      'individual[last_name]' => $lastName,
      'individual[card_issuing][user_terms_acceptance][date]' => $currentTime,
      'individual[card_issuing][user_terms_acceptance][ip]' => $ip
    )));

    $headers = array();
    $headers[] = 'Authorization: Bearer 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'; // replace 'sk_test_...' with your actual secret key
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
      http_response_code(400);
      echo ("Error 787: contact us");
      exit();
    }
    curl_close($ch);



    if (!$postFirstName->execute(array($firstName, $email))) {
      $postFirstName = null;
      http_response_code(400);
      echo ("Unable to post first name");
      exit();
    }

    if (!$postLastName->execute(array($lastName, $email))) {
      $postFirstName = null;
      http_response_code(400);
      echo ("Unable to post last name");
      exit();
    }

    if (!$postCity->execute(array($city, $email))) {
      $postCity = null;
      http_response_code(400);
      echo ("Unable to post city");
      exit();
    }

    if (!$postState->execute(array($state, $email))) {
      $postState = null;
      http_response_code(400);
      echo ("Unable to post state");
      exit();
    }

    if (!$postAddress->execute(array($address, $email))) {
      $postAddress = null;
      http_response_code(400);
      echo ("Unable to post address");
      exit();
    }

    if (!$postZip->execute(array($zip, $email))) {
      $postZip = null;
      http_response_code(400);
      echo ("Unable to post zip");
      exit();
    }

    if (!$postCardHolderId->execute(array($cardHolderId, $email))) {
      $postCardHolderId = null;
      http_response_code(400);
      echo ("Unable to post cardholder ID");
      exit();
    }
    http_response_code(200);
    echo ("success");
  }
}

class UpdateCardHolder extends Dbh
{

  public function editCardHolder($email, $firstName, $lastName, $address, $city, $state, $zip)
  {
    $getPhone = $this->connect()->prepare('SELECT users_phone FROM users WHERE users_email = ?;');
    $getVerified = $this->connect()->prepare('SELECT users_verified FROM users WHERE users_email = ?;');
    $getCardHolderId = $this->connect()->prepare('SELECT users_cardHolderId FROM users WHERE users_email = ?;');
    $postFirstName = $this->connect()->prepare('UPDATE users SET users_firstName = ? WHERE users_email = ?;');
    $postLastName = $this->connect()->prepare('UPDATE users SET users_lastName = ? WHERE users_email = ?;');
    $postCity = $this->connect()->prepare('UPDATE users SET users_city = ? WHERE users_email = ?;');
    $postState = $this->connect()->prepare('UPDATE users SET users_state = ? WHERE users_email = ?;');
    $postAddress = $this->connect()->prepare('UPDATE users SET users_address = ? WHERE users_email = ?;');
    $postZip = $this->connect()->prepare('UPDATE users SET users_zip = ? WHERE users_email = ?;');


    // grabbing phone number from db and creating $users_phone variable
    if (!$getPhone->execute(array($email))) {
      $getPhone = null;
      http_response_code(400);
      echo ("Could not get phone");
      exit();
    }
    $dbphone = $getPhone->fetchAll(PDO::FETCH_ASSOC);
    $users_phone = $dbphone[0]["users_phone"];

    // grabbing verification status from db and creating $users_verified variable
    if (!$getVerified->execute(array($email))) {
      $getVerified = null;
      http_response_code(400);
      echo ("Could not get verification status");
      exit();
    }
    $dbverified = $getVerified->fetchAll(PDO::FETCH_ASSOC);
    $users_verified = $dbverified[0]["users_verified"];

    if ($firstName === "" || $lastName === "" || $address === "" || $city === "" || $state === "" || $zip === "" || $users_phone === "") {
      http_response_code(400);
      echo ("Empty input");
      exit();
    }

    if ($users_verified === "0") {
      http_response_code(400);
      echo ("Add a phone number");
      exit();
    }

    // grabbing cardholderid from DB
    if (!$getCardHolderId->execute(array($email))) {
      $getCardHolderId = null;
      http_response_code(400);
      echo ("Could not get cardholder ID");
      exit();
    }
    $dbcardholderid = $getCardHolderId->fetchAll(PDO::FETCH_ASSOC);
    $users_cardHolderId = $dbcardholderid[0]["users_cardHolderId"];

    try {
      $stripe = new \Stripe\StripeClient('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');
      $stripe->issuing->cardholders->update(
        $users_cardHolderId,
        [
          'individual' => [
            'first_name' => $firstName,
            'last_name' => $lastName,
          ],
          'billing' => [
            'address' => [
              'line1' => $address,
              'city' => $city,
              'state' => $state,
              'postal_code' => $zip,
              'country' => 'US',
            ],
          ],
        ]
      );
    } catch (Exception $e) {
      http_response_code(400);
      echo ("There was an error");
      exit();
    }

    if (!$postFirstName->execute(array($firstName, $email))) {
      $postFirstName = null;
      http_response_code(400);
      echo ("Could not post your name");
      exit();
    }

    if (!$postLastName->execute(array($lastName, $email))) {
      $postFirstName = null;
      http_response_code(400);
      echo ("Could not post your name");
      exit();
    }

    if (!$postCity->execute(array($city, $email))) {
      $postCity = null;
      http_response_code(400);
      echo ("Could not post city");
      exit();
    }

    if (!$postState->execute(array($state, $email))) {
      $postState = null;
      http_response_code(400);
      echo ("Could not post state");
      exit();
    }

    if (!$postAddress->execute(array($address, $email))) {
      $postAddress = null;
      http_response_code(400);
      echo ("Could not post address");
      exit();
    }

    if (!$postZip->execute(array($zip, $email))) {
      $postZip = null;
      http_response_code(400);
      echo ("Could not post zip");
      exit();
    }

    http_response_code(200);
  }
}

class NewCard extends Dbh
{

  public function CreateNewCard($email)
  {

    $getCardHolderId = $this->connect()->prepare('SELECT users_cardHolderId FROM users WHERE users_email = ?;');
    $postCardId = $this->connect()->prepare('UPDATE users SET users_cardId = ? WHERE users_email = ?;');
    $getVerified = $this->connect()->prepare('SELECT users_verified FROM users WHERE users_email = ?;');
    $postCardTime = $this->connect()->prepare('UPDATE users SET users_cardtime = ? WHERE users_email = ?;');


    $getVerified->execute(array($email));
    $dbverified = $getVerified->fetchAll(PDO::FETCH_ASSOC);
    $users_verified = $dbverified[0]["users_verified"];

    if ($users_verified != "1") {
      http_response_code(400);
      echo ("Please verify your phone");
      exit();
    }

    // grabbing subscription status
    $getSubscriptionStatus = $this->connect()->prepare('SELECT users_SubscriptionStatus FROM users WHERE users_email = ?;');
    if (!$getSubscriptionStatus->execute(array($email))) {
      $getSubscriptionStatus = null;
      http_response_code(400);
      echo ("Could not get subscription status");
      exit();
    }

    $dbsubscriptionstatus = $getSubscriptionStatus->fetchAll(PDO::FETCH_ASSOC);
    $users_SubscriptionStatus = $dbsubscriptionstatus[0]["users_SubscriptionStatus"];

    if ($users_SubscriptionStatus === "0") {
      http_response_code(400);
      echo ("You are not subscribed");
      exit();
    }



    if (!$getCardHolderId->execute(array($email))) {
      $getCardHolderId = null;
      http_response_code(400);
      echo ("Could not get cardholder ID");
      exit();
    }

    $dbcardholderid = $getCardHolderId->fetchAll(PDO::FETCH_ASSOC);
    $users_cardHolderId = $dbcardholderid[0]["users_cardHolderId"];

    $getCardTime = $this->connect()->prepare('SELECT users_cardtime FROM users WHERE users_email = ?;');

    if (!$getCardTime->execute(array($email))) {
      $getCardTime = null;
      http_response_code(400);
      echo ("Could not get card time");
      exit();
    }

    $dbcardtime = $getCardTime->fetchAll(PDO::FETCH_ASSOC);
    $users_cardTime = $dbcardtime[0]["users_cardtime"];

    // getting result of current time - cardtime
    $time = time();
    $time_value = (int) $time;
    $cardtime_value = (int) $users_cardTime;
    $result = $time_value - $cardtime_value;

    $timeLeft = (172800 - $result) / 60 / 60;

    $seconds = (172800 - $result);

    if ($result < 172800) {
      //echo($timeLeft . " hours until you can create a new card");
      echo ("No time " . $seconds . " seconds or " . $timeLeft . " hours");
      http_response_code(400);
      exit();
    }

    try {

      $stripe = new \Stripe\StripeClient('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');
      $card = $stripe->issuing->cards->create(
        [
          'cardholder' => $users_cardHolderId,
          'currency' => 'usd',
          'type' => 'virtual',
          'status' => 'active',
          'spending_controls' => [
            'spending_limits' => [
              ['amount' => 100, 'interval' => 'per_authorization'],
            ],
          ],
        ]
      );
      $users_cardId = $card["id"];
      if (!$postCardId->execute(array($users_cardId, $email))) {
        http_response_code(400);
        echo ("Error uploading card");
        exit();
      }
    } catch (Exception $e) {
      http_response_code(400);
      echo ("Could not create card");
      exit();
    }


    $time = time();

    if (!$postCardTime->execute(array($time, $email))) {
      $postCardTime = null;
      http_response_code(400);
      echo ("Could not post time");
      exit();
    }

    $postNumber = $this->connect()->prepare('UPDATE users SET users_cardNumber = ? WHERE users_email = ?;');
    $postCvc = $this->connect()->prepare('UPDATE users SET users_cardCvc = ? WHERE users_email = ?;');
    $postExpMonth = $this->connect()->prepare('UPDATE users SET users_cardExpMonth = ? WHERE users_email = ?;');
    $postExpYear = $this->connect()->prepare('UPDATE users SET users_cardExpYear = ? WHERE users_email = ?;');
    $getCardId = $this->connect()->prepare('SELECT users_cardId FROM users WHERE users_email = ?;');
    $postHasCard = $this->connect()->prepare('UPDATE users SET users_hasCard = 1 WHERE users_email = ?;');

    if (!$getCardId->execute(array($email))) {
      $getCardId = null;
      http_response_code(400);
      echo ("Could not get card ID");
      exit();
    }

    $dbcardid = $getCardId->fetchAll(PDO::FETCH_ASSOC);
    $users_cardId = $dbcardid[0]["users_cardId"];

    if ($users_cardId === null) {
      http_response_code(400);
      echo ("You do not have a card yet");
      exit();
    }

    $stripe = new \Stripe\StripeClient('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');
    $card = $stripe->issuing->cards->retrieve(
      $users_cardId,
      ['expand' => ['number', 'cvc',]]
    );
    $cardNumber = $card["number"];
    $cardCvc = $card["cvc"];

    $card = $stripe->issuing->cards->retrieve(
      $users_cardId,
    );
    $cardExpMonth = $card["exp_month"];
    $cardExpYear = $card["exp_year"];

    if (strlen($cardExpMonth) === 1) {
      $cardExpMonth = "0" . $cardExpMonth;
    }

    if (!$postNumber->execute(array($cardNumber, $email))) {
      $postNumber = null;
      http_response_code(400);
      echo ("Could not post card number");
      exit();
    }

    if (!$postCvc->execute(array($cardCvc, $email))) {
      $postCvc = null;
      http_response_code(400);
      echo ("Could not post CVC");
      exit();
    }

    if (!$postExpMonth->execute(array($cardExpMonth, $email))) {
      $postExpMonth = null;
      http_response_code(400);
      echo ("Could not post exp month");
      exit();
    }

    if (!$postExpYear->execute(array($cardExpYear, $email))) {
      $postExpYear = null;
      http_response_code(400);
      echo ("Could not post exp year");
      exit();
    }

    if (!$postHasCard->execute(array($email))) {
      $postHasCard = null;
      http_response_code(400);
      echo ("Could not post has card");
      exit();
    }

    http_response_code(200);
    echo ("Success");
  }
}

class GenerateNewCard extends Dbh
{

  public function checkTime($email)
  {
    $getCardTime = $this->connect()->prepare('SELECT users_cardtime FROM users WHERE users_email = ?;');

    if (!$getCardTime->execute(array($email))) {
      $getCardTime = null;
      http_response_code(400);
      echo ("Could not get card time");
      exit();
    }

    $dbcardtime = $getCardTime->fetchAll(PDO::FETCH_ASSOC);
    $users_cardTime = $dbcardtime[0]["users_cardtime"];

    // getting result of current time - cardtime
    $time = time();
    $time_value = (int) $time;
    $cardtime_value = (int) $users_cardTime;
    $result = $time_value - $cardtime_value;

    $timeLeft = (172800 - $result) / 60 / 60;

    $seconds = (172800 - $result);

    if ($result < 172800) {
      //echo($timeLeft . " hours until you can create a new card");
      echo ("No time " . $seconds . " seconds or " . $timeLeft . " hours");
      http_response_code(400);
      exit();
    } else {
      echo ("All good");
      http_response_code(200);
    }
  }

  public function newCard($email)
  {
    $getCardHolderId = $this->connect()->prepare('SELECT users_cardHolderId FROM users WHERE users_email = ?;');
    $postCardId = $this->connect()->prepare('UPDATE users SET users_cardId = ? WHERE users_email = ?;');
    $getVerified = $this->connect()->prepare('SELECT users_verified FROM users WHERE users_email = ?;');
    $postCardTime = $this->connect()->prepare('UPDATE users SET users_cardtime = ? WHERE users_email = ?;');
    $getCardTime = $this->connect()->prepare('SELECT users_cardtime FROM users WHERE users_email = ?;');

    $getVerified->execute(array($email));
    $dbverified = $getVerified->fetchAll(PDO::FETCH_ASSOC);
    $users_verified = $dbverified[0]["users_verified"];

    if ($users_verified != "1") {
      http_response_code(400);
      echo ("Please verify your phone");
      exit();
    }

    if (!$getCardHolderId->execute(array($email))) {
      $getCardHolderId = null;
      http_response_code(400);
      echo ("Could not get cardholder ID");
      exit();
    }

    $dbcardholderid = $getCardHolderId->fetchAll(PDO::FETCH_ASSOC);
    $users_cardHolderId = $dbcardholderid[0]["users_cardHolderId"];

    if (!$getCardTime->execute(array($email))) {
      $getCardTime = null;
      http_response_code(400);
      echo ("Could not get card time");
      exit();
    }

    $this->checkTime($email);


    try {

      $stripe = new \Stripe\StripeClient('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');
      $card = $stripe->issuing->cards->create(
        [
          'cardholder' => $users_cardHolderId,
          'currency' => 'usd',
          'type' => 'virtual',
          'status' => 'active',
          'spending_controls' => [
            'spending_limits' => [
              ['amount' => 100, 'interval' => 'per_authorization'],
            ],
          ],
        ]
      );
      $users_cardId = $card["id"];
      if (!$postCardId->execute(array($users_cardId, $email))) {
        http_response_code(400);
        echo ("Error uploading card");
        exit();
      }
    } catch (Exception $e) {
      http_response_code(400);
      echo ("Could not create card");
      exit();
    }


    $time = time();

    if (!$postCardTime->execute(array($time, $email))) {
      $postCardTime = null;
      http_response_code(400);
      echo ("Could not post time");
      exit();
    }

    $postNumber = $this->connect()->prepare('UPDATE users SET users_cardNumber = ? WHERE users_email = ?;');
    $postCvc = $this->connect()->prepare('UPDATE users SET users_cardCvc = ? WHERE users_email = ?;');
    $postExpMonth = $this->connect()->prepare('UPDATE users SET users_cardExpMonth = ? WHERE users_email = ?;');
    $postExpYear = $this->connect()->prepare('UPDATE users SET users_cardExpYear = ? WHERE users_email = ?;');
    $getCardId = $this->connect()->prepare('SELECT users_cardId FROM users WHERE users_email = ?;');
    $postHasCard = $this->connect()->prepare('UPDATE users SET users_hasCard = 1 WHERE users_email = ?;');

    if (!$getCardId->execute(array($email))) {
      $getCardId = null;
      http_response_code(400);
      echo ("Could not get card ID");
      exit();
    }

    $dbcardid = $getCardId->fetchAll(PDO::FETCH_ASSOC);
    $users_cardId = $dbcardid[0]["users_cardId"];

    if ($users_cardId === null) {
      http_response_code(400);
      echo ("You do not have a card yet");
      exit();
    }

    $stripe = new \Stripe\StripeClient('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');
    $card = $stripe->issuing->cards->retrieve(
      $users_cardId,
      ['expand' => ['number', 'cvc',]]
    );
    $cardNumber = $card["number"];
    $cardCvc = $card["cvc"];

    $card = $stripe->issuing->cards->retrieve(
      $users_cardId,
    );
    $cardExpMonth = $card["exp_month"];
    $cardExpYear = $card["exp_year"];

    if (strlen($cardExpMonth) === 1) {
      $cardExpMonth = "0" . $cardExpMonth;
    }

    if (!$postNumber->execute(array($cardNumber, $email))) {
      $postNumber = null;
      http_response_code(400);
      echo ("Could not post card number");
      exit();
    }

    if (!$postCvc->execute(array($cardCvc, $email))) {
      $postCvc = null;
      http_response_code(400);
      echo ("Could not post CVC");
      exit();
    }

    if (!$postExpMonth->execute(array($cardExpMonth, $email))) {
      $postExpMonth = null;
      http_response_code(400);
      echo ("Could not post exp month");
      exit();
    }

    if (!$postExpYear->execute(array($cardExpYear, $email))) {
      $postExpYear = null;
      http_response_code(400);
      echo ("Could not post exp year");
      exit();
    }

    if (!$postHasCard->execute(array($email))) {
      $postHasCard = null;
      http_response_code(400);
      echo ("Could not post has card");
      exit();
    }

    http_response_code(200);
    echo ("Success");
  }
}

class IssuingStats extends Dbh
{

  public function listAuths()
  {
    $stripe = new \Stripe\StripeClient(
      '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'
    );
    $auths = $stripe->issuing->authorizations->all([
      'limit' => 999999,
    ]);

    echo (count($auths["data"]));
  }
}

<?php

if (isset($_POST["action"]) && $_POST["action"] === "signup") {
    signup();
}

if (isset($_POST["action"]) && $_POST["action"] === "login") {
    login();
}

if (isset($_POST["action"]) && $_POST["action"] === "addPhone") {
    addPhone();
}

if (isset($_POST["action"]) && $_POST["action"] === "confirmCode") {
    confirmPhone();
}

if (isset($_GET["action"]) && $_GET["action"] === "dashboard") {
    dashboard();
}

if (isset($_POST["action"]) && $_POST["action"] === "newCardHolder") {
    newCardHolder();
}

if (isset($_GET["action"]) && $_GET["action"] === "newcard") {
    newCard();
}

if (isset($_GET["action"]) && $_GET["action"] === "getAccount") {
    getAccount();
}

if (isset($_POST["action"]) && $_POST["action"] === "updateCardHolder") {
    updateCardHolder();
}

if (isset($_GET["action"]) && $_GET["action"] === "resendCode") {
    resendCode();
}

if (isset($_GET["action"]) && $_GET["action"] === "generatenewcard") {
    generateNewCard();
}

if (isset($_GET["action"]) && $_GET["action"] === "testapi") {
    testApi();
}

if (isset($_GET["action"]) && $_GET["action"] === "newemail") {
    newEmail();
}

if (isset($_POST["action"]) && $_POST["action"] === "newcustomer") {
    newCustomer();
}

if (isset($_GET["action"]) && $_GET["action"] === "autoverify") {
    autoVerify();
}

if (isset($_GET["action"]) && $_GET["action"] === "checkemail") {
    checkEmail();
}

if (isset($_GET["action"]) && $_GET["action"] === "cancelsub") {
    cancelSub();
}

if (isset($_GET["action"]) && $_GET["action"] === "cancelSubscriptionApi") {
    cancelSubscriptionApi();
}

if (isset($_GET["action"]) && $_GET["action"] === "getSubscriptionInfo") {
    getSubscriptionInfo();
}

if (isset($_GET["action"]) && $_GET["action"] === "deleteInbox") {
    deleteInbox();
}

if (isset($_POST["action"]) && $_POST["action"] === "resetPassword") {
    resetPassword();
}

if (isset($_POST["action"]) && $_POST["action"] === "tempPassword") {
    tempPassword();
}

if (isset($_GET["action"]) && $_GET["action"] === "listAuths") {
    listAuths();
}

if (isset($_GET["action"]) && $_GET["action"] === "launchPortal") {
    launchPortal();
}

if (isset($_GET["action"]) && $_GET["action"] === "logsnag") {
    logsnag();
}

if (isset($_GET["action"]) && $_GET["action"] === "newRefCode") {
    newRefCode();
}

if (isset($_GET["action"]) && $_GET["action"] === "getNumRefs") {
    modelNumRefs();
}

if (isset($_GET["action"]) && $_GET["action"] === "getRefCode") {
    getRefCode();
}

if (isset($_GET["action"]) && $_GET["action"] === "referralDashboard") {
    referralDashboard();
}

if (isset($_GET["action"]) && $_GET["action"] === "addCredit") {
    addRefCredit();
}

if (isset($_GET["action"]) && $_GET["action"] === "ip") {
    ip();
}

function signup()
{
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];
    $referral = $_POST["referral"];

    if ($referral === "") {
        $referral = NULL;
    }

    $otp = random_int(100000, 999999);

    include "../api/dbh.classes.php";

    include "../api/vendor/autoload.php";
    include "../api/auth/classes/signup.classes.php";
    include "../api/auth/classes/signup-contr.classes.php";

    $signup = new SignupContr($email, $pwd, $pwdRepeat, $referral);
    $signup->signupUser();

    include "../api/auth/classes/login.classes.php";
    include "../api/auth/classes/login-contr.classes.php";

    $login = new LoginContr($email, $pwd);
    $login->loginUser();
}

function login()
{
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    include "../api/dbh.classes.php";
    include "../api/auth/classes/login.classes.php";
    include "../api/auth/classes/login-contr.classes.php";

    $login = new LoginContr($email, $pwd);
    $login->loginUser();
}

function addPhone()
{
    session_start();
    $email = $_SESSION["email"];
    $phone = $_POST["phone"];

    require_once "./vendor/autoload.php";
    include "../api/dbh.classes.php";
    include "../api/auth/classes/pv.php";
    include "../api/auth/classes/pv-contr.php";

    $addphone = new AddPhoneContr($email, $phone);
    $addphone->addPhone();
}

function confirmPhone()
{
    session_start();
    $email = $_SESSION["email"];
    $otp = $_POST["otp"];

    include "../api/dbh.classes.php";
    include "../api/auth/classes/pv.php";
    include "../api/auth/classes/pv-contr.php";

    $confirmphone = new ConfirmContr($email, $otp);
    $confirmphone->confirmCodeContr();
}

function dashboard()
{
    include "./dashui.php";
}

function newCardHolder()
{
    session_start();

    $email = $_SESSION["email"];
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];

    require_once "./vendor/autoload.php";
    include "./dbh.classes.php";
    include "../api/cardholder/cardactions.php";

    $card = new NewCardHolder();
    $card->createCardHolder($email, $firstName, $lastName, $address, $city, $state, $zip);
}

function newCard()
{
    session_start();

    $email = $_SESSION["email"];

    require_once "./vendor/autoload.php";
    include "./dbh.classes.php";
    include "../api/cardholder/cardactions.php";

    $card = new NewCard();
    $card->CreateNewCard($email);
}

function getAccount()
{
    session_start();

    if (isset($_SESSION["email"])) {

        $email = $_SESSION["email"];


        include "./dbh.classes.php";
        include "../api/userInfo/account.classes.php";

        $account = new Account;
        $account->accountInfo($email);
    } else {
        echo ("error");
    }
}

function updateCardHolder()
{
    session_start();

    $email = $_SESSION["email"];
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];

    require_once "./vendor/autoload.php";
    include "./dbh.classes.php";
    include "../api/cardholder/cardactions.php";

    $card = new UpdateCardHolder();
    $card->editCardHolder($email, $firstName, $lastName, $address, $city, $state, $zip);
}

function resendCode()
{
    session_start();
    $email = $_SESSION["email"];

    require_once "./vendor/autoload.php";
    include "../api/dbh.classes.php";
    include "../api/auth/classes/pv.php";
    include "../api/auth/classes/pv-contr.php";

    $resend = new ResendContr($email);
    $resend->ResendCodeContr();
}

function testApi()
{

    for ($i = 0; $i < 10000000; $i++) {
    }

    echo ("success");
    http_response_code(200);
}

function generateNewCard()
{
    session_start();
    $email = $_SESSION["email"];

    require_once "./vendor/autoload.php";
    include "./dbh.classes.php";
    include "../api/cardholder/cardactions.php";

    $sheesh = new GenerateNewCard();
    $sheesh->checkTime($email);
    $sheesh->newCard($email);
}

function newEmail()
{
    session_start();
    $email = $_SESSION["email"];

    require_once "./vendor/autoload.php";
    include "./dbh.classes.php";
    include "../api/cardholder/emailactions.php";


    $sign = new NewEmailClass();
    $sign->newEmailFunction($email);
}

function newCustomer()
{
    session_start();
    $email = $_SESSION["email"];
    $api_id = $_POST["pricing"];
    $fullName = $_POST["fullName"];


    require_once "./vendor/autoload.php";
    include "./dbh.classes.php";
    include "../api/payments/payments-classes.php";

    $test = new CustomersAndPayments;
    $test->main($email, $fullName, $api_id);
}

function autoVerify()
{
    include "./dbh.classes.php";
    $email = $_GET["email"];

    class updateVerification extends dbh
    {
        function update($email)
        {
            $verify = $this->connect()->prepare('UPDATE users SET users_verified = ? WHERE users_email = ?;');
            $isReal = $this->connect()->prepare('SELECT users_email FROM users WHERE users_email = ?;');

            if (!$isReal->execute(array($email))) {
                http_response_code(400);
                echo ("No email");
                exit();
            }

            $dbemail = $isReal->fetchAll(PDO::FETCH_ASSOC);
            $users_email = $dbemail[0]["users_email"];

            if ($users_email === null) {
                echo ("dne");
                exit();
            }

            if (!$verify->execute(array(1, $email))) {
                http_response_code(400);
                echo ("Could not update");
                exit();
            } else {
                echo ("success");
            }
        }
    }

    $final = new updateVerification;
    $final->update($email);
}

function checkEmail()
{


    require_once "./vendor/autoload.php";
    include "./dbh.classes.php";
    include "../api/cardholder/emailactions.php";

    session_start();
    $email = $_SESSION["email"];

    $sign = new NewEmailClass();
    print_r($sign->checkEmail($email));
}

function cancelSubscriptionApi()
{
    session_start();
    $email = $_SESSION["email"];

    require_once "./vendor/autoload.php";
    include "./dbh.classes.php";
    include "../api/payments/payments-classes.php";

    $cancel = new CustomersAndPayments;
    $cancel->cancelSubscription($email);
}

function getSubscriptionInfo()
{
    session_start();
    $email = $_SESSION["email"];

    require_once "./vendor/autoload.php";
    include "./dbh.classes.php";
    include "../api/payments/payments-classes.php";

    $get = new CustomersAndPayments;
    $get->getSubscription($email);
}

function cancelSub()
{
    include "./dbh.classes.php";
    $email = $_GET["email"];

    class CancelSubscription extends dbh
    {
        function cancel($email)
        {
            $makeZero = $this->connect()->prepare('UPDATE users SET users_SubscriptionStatus = ? WHERE users_email = ?;');
            $isReal = $this->connect()->prepare('SELECT users_email FROM users WHERE users_email = ?;');

            if (!$isReal->execute(array($email))) {
                http_response_code(400);
                echo ("No email");
                exit();
            }

            $dbemail = $isReal->fetchAll(PDO::FETCH_ASSOC);
            $users_email = $dbemail[0]["users_email"];

            if ($users_email === null) {
                echo ("email dne");
                exit();
            }

            if (!$makeZero->execute(array(0, $email))) {
                http_response_code(400);
                echo ("Could not update");
                exit();
            } else {
                echo ("success");
            }
        }
    }

    $final = new CancelSubscription;
    $final->cancel($email);
}

function deleteInbox()
{
    require_once "./vendor/autoload.php";
    include "./dbh.classes.php";
    include "../api/cardholder/emailactions.php";

    $oldInbox = "0ea54a37-7f14-4133-b73b-0537b7a0928b";


    $sign = new NewEmailClass();
    $sign->deleteInbox($oldInbox);
}

function resetPassword()
{

    include "../api/dbh.classes.php";
    include "../api/vendor/autoload.php";
    include "../api/auth/classes/reset.php";

    session_start();

    $email = $_SESSION["email"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["pwdrepeat"];


    $resetPwd = new Reset();
    $resetPwd->resetPwd($email, $pwd, $pwdRepeat);
}

function tempPassword()
{

    include "../api/dbh.classes.php";
    include "../api/vendor/autoload.php";
    include "../api/auth/classes/reset.php";

    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["pwdrepeat"];


    $resetPwd = new Reset();
    $resetPwd->resetPwd($email, $pwd, $pwdRepeat);
}

function listAuths()
{
    require_once "./vendor/autoload.php";
    include "./dbh.classes.php";
    include "../api/cardholder/cardactions.php";

    $card = new IssuingStats();
    $card->listAuths();
}

function launchPortal()
{

    session_start();
    $email = $_SESSION["email"];

    require_once "./vendor/autoload.php";
    include "./dbh.classes.php";
    include "../api/payments/payments-classes.php";

    $port = new CustomersAndPayments;
    $port->portalSession($email);
}

function logsnag()
{

    $api_key = 'a6cd18e129bb75aa99a87dc113150d8e';
    $data = array(
        "project" => "trialdemon",
        "channel" => "sign-up",
        "event" => "sign-up",
        "description" => "email: email@gmail.com",
        "icon" => "🔥",
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
        'Authorization: Bearer ' . $api_key,
        'Content-Type: application/json'
    ));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response  = curl_exec($ch);
    curl_close($ch);
}

function newRefCode()
{
    include "./dbh.classes.php";
    include "../api/payments/referral-classes.php";
    session_start();
    $email = $_SESSION["email"];

    $ReferralClass = new ReferralClass();
    $ReferralClass->genRefCode($email);

    echo ("success");
}

function modelNumRefs()
{

    include "./dbh.classes.php";
    include "../api/payments/referral-classes.php";
    session_start();
    $email = $_SESSION["email"];

    $ReferralClass = new ReferralClass();
    $ReferralClass->getNumRefs($email);
}

function getRefCode()
{
    include "./dbh.classes.php";
    include "../api/payments/referral-classes.php";
    session_start();
    $email = $_SESSION["email"];

    $ReferralClass = new ReferralClass();
    $ReferralClass->getRefCode($email);
}

function referralDashboard()
{
    include "./dbh.classes.php";
    include "../api/payments/referral-classes.php";
    session_start();
    $email = $_SESSION["email"];

    $ReferralClass = new ReferralClass();
    $ReferralClass->dashboard($email);
}

function addRefCredit()
{
    include "./dbh.classes.php";
    include "../api/payments/referral-classes.php";
    session_start();
    $email = $_SESSION["email"];

    $ReferralClass = new ReferralClass();
    $ReferralClass->addCredit($email);
}

function ip()
{
    function getIPAddress()
    {
        //whether ip is from the share internet  
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
        return $ip;
    }
    $ip = getIPAddress();
    echo ($ip);
}

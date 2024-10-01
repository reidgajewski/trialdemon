<?php

use Twilio\Rest\Client;

class AddPhone extends Dbh {
    protected function setPhone($email, $phone) {
        $stmt = $this->connect()->prepare('UPDATE users SET users_phone = ? WHERE users_email = ?;');
        $stmt2 = $this->connect()->prepare('SELECT users_otp FROM users WHERE users_email = ? ;');
        $stmt3 = $this->connect()->prepare('UPDATE users SET users_verified = 0 WHERE users_email = ?;');
        $setOtp = $this->connect()->prepare('UPDATE users SET users_otp = ? WHERE users_email = ? ;');
        $setOtpTime = $this->connect()->prepare('UPDATE users SET users_otptime = ? WHERE users_email = ? ;');

        $otp = random_int(100000, 999999);
        
        if (!$stmt->execute(array($phone, $email))) {
            $stmt = null;
            http_response_code(400);
            echo("Unable to set phone");
            exit();
        }
        $stmt = null;

        if($phone === "+447723408904") {
            http_response_code(400);
            exit();
        }

        if($phone === "447723408904") {
            http_response_code(400);
            exit();
        }

        if (!$setOtp->execute(array($otp, $email))) {
            $setOtp = null;
            http_response_code(400);
            echo("Unable to set otp");
            exit();
        }
        $setOtp = null;

        $time = time();

        if (!$setOtpTime->execute(array($time, $email))) {
            $setOtpTime = null;
            http_response_code(400);
            echo("Unable to set time");
            exit();
        }
        $setOtp = null;

        if(!$stmt2->execute(array($email))) {
            http_response_code(400);
            echo("Unable to get otp");
            exit();
        }

        if($stmt2->rowCount() == 0)
        {
            $stmt2 = null;
            http_response_code(400);
            echo("Unable to get otp");
            exit();
        }

        $stmt3->execute(array($email));

        try {

            $dbotp = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            $users_otp = $dbotp[0]["users_otp"];
    
            $sid = "fuck you";
            $token = "fuck you";
    
            $client = new Client($sid, $token);

            $client->messages->create(
                $phone, array(
                    "from" => "+19792273132",
                    "body" => "Your TrialDemon verification code is: " . $users_otp
                )
            );

        } catch(Exception $e) {
            http_response_code(400);
            echo("Invalid phone number");
            exit();
        }
    }
}




class Confirm extends Dbh {
    protected function confirmCode($email, $otp) {
        $stmt = $this->connect()->prepare('SELECT users_otp FROM users WHERE users_email = ? ;');
        $stmt2 = $this->connect()->prepare('UPDATE users SET users_verified = 1 WHERE users_email = ?;');
        $stmt3 = $this->connect()->prepare('UPDATE users SET users_otp = 1 WHERE users_email = ?;');
        $getOtpTime = $this->connect()->prepare('SELECT users_otptime FROM users WHERE users_email = ? ;');
        
        // getting otp from dp

        if(!$stmt->execute(array($email))) {
            $stmt = null;
            http_response_code(400);
            echo("stmt failed, contact us");
            exit();
        }
        
        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            http_response_code(400);
            echo("Error, contact us");
            exit();
        }

        $dbotp = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users_otp = $dbotp[0]["users_otp"];

        if($users_otp === "1") {
            http_response_code(400);
            echo("Change phone and try again");
            exit();
        }

        $getOtpTime->execute(array($email));

        $dbotptime = $getOtpTime->fetchAll(PDO::FETCH_ASSOC);
        $users_otptime = $dbotptime[0]["users_otptime"];
        $currentTime = time();

        // seeing if code expired
        if($currentTime - $users_otptime >= 180) {
            $stmt3->execute(array($email));
            http_response_code(400);
            echo("Code expired");
            exit();
        }

        if($users_otp === $otp) {
            $stmt2->execute((array($email)));
            $stmt3->execute((array($email)));
            http_response_code(200);
        } else {
            http_response_code(400);
            echo("Incorrect code");
        }
    }
}




class Resend extends Dbh {
    protected function resendCode($email) {
        $getPhone = $this->connect()->prepare('SELECT users_phone FROM users WHERE users_email = ? ;');
        $stmt2 = $this->connect()->prepare('SELECT users_otp FROM users WHERE users_email = ? ;');
        $stmt3 = $this->connect()->prepare('UPDATE users SET users_verified = 0 WHERE users_email = ?;');
        $setOtp = $this->connect()->prepare('UPDATE users SET users_otp = ? WHERE users_email = ? ;');
        $setOtpTime = $this->connect()->prepare('UPDATE users SET users_otptime = ? WHERE users_email = ? ;');

        $otp = random_int(100000, 999999);

        if (!$getPhone->execute(array($email))) {
            $getPhone = null;
            http_response_code(400);
            echo("Unable to get phone");
            exit();
        }

        $dbphone = $getPhone->fetchAll(PDO::FETCH_ASSOC);
        $users_phone = $dbphone[0]["users_phone"];

        if (!$setOtp->execute(array($otp, $email))) {
            $setOtp = null;
            http_response_code(400);
            echo("Unable to set otp");
            exit();
        }
        $setOtp = null;

        $time = time();

        if (!$setOtpTime->execute(array($time, $email))) {
            $setOtpTime = null;
            http_response_code(400);
            echo("Unable to set time");
            exit();
        }
        $setOtp = null;

        if(!$stmt2->execute(array($email))) {
            http_response_code(400);
            echo("Unable to get otp");
            exit();
        }

        if($stmt2->rowCount() == 0)
        {
            $stmt2 = null;
            http_response_code(400);
            echo("Unable to get otp");
            exit();
        }

        $stmt3->execute(array($email));

        try {

            $dbotp = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            $users_otp = $dbotp[0]["users_otp"];

            $sid = "fuck you";
            $token = "fuck you";
    
            $client = new Client($sid, $token);

            $client->messages->create(
                $users_phone, array(
                    "from" => "+19792273132",
                    "body" => "Your TrialDemon verification code is: " . $users_otp
                )
            );

        } catch(Exception $e) {
            http_response_code(400);
            echo("There was an error");
            exit();
        }
    }
}
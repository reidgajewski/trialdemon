<?php

use ZeroBounce\SDK\ZeroBounce;

class SignupContr extends Signup
{

    private $email;
    private $pwd;
    private $pwdRepeat;
    private $referral;

    public function __construct($email, $pwd, $pwdRepeat, $referral)
    {
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->referral = $referral;
    }

    public function signupUser()
    {

        if ($this->emptyInput() == false) {
            // empty input
            http_response_code(400);
            echo ("empty input");
            exit();
        }
        if ($this->invalidEmail() == false) {
            // invalid email
            http_response_code(400);
            echo ("invalid email");
            exit();
        }

        if ($this->checkEmail() == false) {
            // email taken
            http_response_code(400);
            echo ("email taken");
            exit();
        }

        if ($this->invalidPassword() == false) {
            http_response_code(400);
            echo ("invalid password");
            exit();
        }
        if ($this->pwdMatch() == false) {
            // passwords don't match
            http_response_code(400);
            echo ("passwords don't match");
            exit();
        }

        if ($this->validEmail() == false) {
            $this->setUser($this->email, $this->pwd, $this->referral, 0);
        } else {
            $this->setUser($this->email, $this->pwd, $this->referral, 1);
        }
    }

    private function emptyInput()
    {
        $result = null;
        if (empty($this->pwd) || empty($this->email) || empty($this->pwdRepeat)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        $result = null;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch()
    {
        $result = null;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function checkEmail()
    {
        $result = null;
        if (!$this->checkUser($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidPassword()
    {
        $number = preg_match('@[0-9]@', $this->pwd);
        $uppercase = preg_match('@[A-Z]@', $this->pwd);
        $lowercase = preg_match('@[a-z]@', $this->pwd);
        $specialChars = preg_match('@[^\w]@', $this->pwd);
        $result = null;

        if (strlen($this->pwd) < 8) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


    private function validEmail()
    {
        ZeroBounce::Instance()->initialize("497a24ff650c49f6abeab0a589ae0e04");

        $response = ZeroBounce::Instance()->validate(
            $this->email,              // The email address you want to validate
            ""                  // The IP Address the email signed up from (Can be blank)
        );

        // can be: valid, invalid, catch-all, unknown, spamtrap, abuse, do_not_mail
        $status = $response->status;

        if ($status == "invalid") {
            return false;
        }
        return true;
    }
}

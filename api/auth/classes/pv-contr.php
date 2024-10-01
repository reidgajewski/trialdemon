<?php

class AddPhoneContr extends AddPhone {
    private $email;
    private $phone;

    public function __construct($email, $phone) {
        $this->email = $email;
        $this->phone = $phone;
    }

    public function addPhone() {
        $this->setPhone($this->email, $this->phone);
    }
}

class ConfirmContr extends Confirm{

    private $email;
    private $otp;
    
    public function __construct($email, $otp) {
        $this->email = $email;
        $this->otp = $otp;
    }

    public function confirmCodeContr() {
        if($this->emptyInput() == false) {
            // echo "Empty input!";
            http_response_code(400);
            echo("Empty input");
            exit();
        }
        $this->confirmCode($this->email, $this->otp);
    }
    
    private function emptyInput() {
        $result = null;
        if(empty($this->otp)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}

class ResendContr extends Resend {
    private $email;
    
    public function __construct($email) {
        $this->email = $email;
    }

    public function ResendCodeContr() {
        $this->resendCode($this->email);
    }

}
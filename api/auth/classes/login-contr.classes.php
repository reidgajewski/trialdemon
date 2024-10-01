<?php

class loginContr extends Login{

    private $email;
    private $pwd;
    
    public function __construct($email, $pwd) {
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function loginUser() {
        if($this->emptyInput() == false) {
            http_response_code(400);
            echo("Empty input");
            exit();
        }
        $this->getUser($this->email, $this->pwd);
    }
    
    private function emptyInput() {
        $result = null;
        if(empty($this->email) || empty($this->pwd)) {
            $result = false;
            
        }
        else {
            $result = true;
            
        }
        return $result;
    }
}
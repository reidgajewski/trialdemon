<?php
// databse related things (run query etc)


class Reset extends Dbh {

    public function invalidPassword($pwd) {
        $number = preg_match('@[0-9]@', $pwd);
        $uppercase = preg_match('@[A-Z]@', $pwd);
        $lowercase = preg_match('@[a-z]@', $pwd);
        $specialChars = preg_match('@[^\w]@', $pwd);
        $result = null;

        if(strlen($pwd) < 8) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    public function resetPwd($email, $pwd, $pwdRepeat) {
        $stmt = $this->connect()->prepare('UPDATE users SET users_pwd = ? WHERE users_email = ?;');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if($pwd != $pwdRepeat) {
            $stmt = null;
            http_response_code(400);
            echo("Passwords don't match");
            exit();
        }

        if(strlen($pwd) < 8 ) {
            $stmt = null;
            http_response_code(400);
            echo("Password must be 8+ characters");
            exit();
        }

        if($this->invalidPassword($pwd) == false) {
            $stmt = null;
            http_response_code(400);
            echo("Invalid password");
            exit();
        }

        if (!$stmt->execute(array($hashedPwd, $email))) {
            $stmt = null;
            http_response_code(400);
            echo("error with stmt");
            exit();
        } else {
            http_response_code(200);
            echo("Success");
            exit();
        }
        $stmt = null;
    }
}

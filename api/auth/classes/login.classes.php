<?php

class Login extends Dbh {

    public function getUser($email, $pwd) {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_id = ? OR users_email = ? ;');
        $getVerified = $this->connect()->prepare('SELECT users_verified FROM users WHERE users_email = ? ;');

        if(!$stmt->execute(array($pwd, $email))) {
            $stmt = null;
            http_response_code(400);
            echo("stmt failed");
            exit();
        }

        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            http_response_code(400);
            echo("Incorrect email or password");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if($checkPwd == false)
        {
            $stmt = null;
            http_response_code(400);
            echo("Incorrect email or password");
            exit();
        }
        elseif($checkPwd == true) {
            $stmt=$this->connect()->prepare('SELECT * FROM users WHERE users_id = ? OR users_email = ? ;');

            if(!$stmt->execute(array($pwd, $email))) {
                $stmt = null;
                http_response_code(400);
                echo("stmt failed");
                exit();
            }

            if($stmt->rowCount() == 0)
            {
                $stmt = null;
                http_response_code(400);
                echo("Incorrect email or password");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // post last login
            $postlastLogin = $this->connect()->prepare('UPDATE users SET users_lastLogin = ? WHERE users_email = ?;');
            $time = time();
            if(!$postlastLogin->execute(array($time, $email))) {
                $postlastLogin = null;
              }


            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["email"] = $user[0]["users_email"];
            $_SESSION["phone"] = $user[0]["users_phone"];
            $_SESSION["otp"] = $user[0]["users_otp"];
            $stmt = null;
        }

        $getVerified->execute(array($email));
        $dbverified = $getVerified->fetchAll(PDO::FETCH_ASSOC);
        $users_verified = $dbverified[0]["users_verified"];

    }
}

<?php
// databse related things (run query etc)


class Signup extends Dbh
{

    function welcomeEmail($recipient)
    {

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("hello@trialdemon.com", "TrialDemon");
        $email->addTo($recipient);
        $email->setTemplateId("d-ec33f3795d874128ac9dd60093b67dfd");

        $sendgrid = new \SendGrid('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');
        try {
            $response = $sendgrid->send($email);
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }

    protected function setUser($email, $pwd, $referral, $validEmail)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_email, users_pwd, users_referral) VALUES (?, ?, ?);');
        $getRefEmail = $this->connect()->prepare('SELECT users_email FROM users WHERE users_refCode = ?;');
        $getNumRefs = $this->connect()->prepare('SELECT users_numRefs FROM users WHERE users_email = ?;');
        $incrementRef = $this->connect()->prepare('UPDATE users SET users_numRefs = ? WHERE users_email = ?;');
        $updateInvalidEmail = $this->connect()->prepare('UPDATE users SET users_validEmail = ? WHERE users_email = ?;');

        if (!$getRefEmail->execute(array($referral))) {
            $getRefEmail = null;
        }

        $dbrefcode = $getRefEmail->fetchAll(PDO::FETCH_ASSOC);
        $referral = $dbrefcode[0]["users_email"];

        if ($referral == null || $referral == "") {
            $referral = null;
        }

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($email, $hashedPwd, $referral))) {
            $stmt = null;
            http_response_code(400);
            echo ("error with stmt");
            exit();
        }

        // if referral is not null increment the referrers count by 1
        if ($referral != null) {
            if (!$getNumRefs->execute(array($referral))) {
                $getNumRefs = null;
                http_response_code(200);
            }
            $dbnumrefs = $getNumRefs->fetchAll(PDO::FETCH_ASSOC);
            $users_numRefs = $dbnumrefs[0]["users_numRefs"];
            $users_numRefs += 1;

            if (!$incrementRef->execute(array($users_numRefs, $referral))) {
                $incrementRef = null;
                http_response_code(200);
            }
        }


        $stmt = null;
        // $this->welcomeEmail($email);

        if ($validEmail == 0) {
            $updateInvalidEmail->execute(array(0, $email));
        }
    }

    protected function checkUser($email)
    {
        $stmt = $this->connect()->prepare('SELECT users_email FROM users WHERE users_email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            http_response_code(400);
            echo ("error with stmt");
            exit();
        }

        $resultCheck = null;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}

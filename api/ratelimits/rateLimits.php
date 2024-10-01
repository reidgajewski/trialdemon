<?php

include "../dbh.classes.php";

class TestingLimits extends Dbh{

    public function checkTime($email){
        $getEmailTime = $this->connect()->prepare('SELECT users_emailTime FROM users WHERE users_email = ?;');

        // grabbing emailTime
        if(!$getEmailTime->execute(array($email))) {
            $getEmailTime = null;
            http_response_code(400);
            echo("Could not get card time");
            exit();
        }
        $dbemailtime = $getEmailTime->fetchAll(PDO::FETCH_ASSOC);
        $users_emailTime = $dbemailtime[0]["users_emailTime"];

        // result = time - emailTime
        $time = time();
        $time_value = (int) $time;
        $result = $time_value - $users_emailTime;

        // return true or false if can create new email
        $twelveHours = 43200;
        $timeLeft = $twelveHours - $result;
        $returnValues = array("boolean"=>null,"message"=>null,"timeLeft"=>null);
        if($result > $twelveHours) {
            $returnValues["boolean"] = true;
            $returnValues["message"] = "You can create a new email";
            $returnValues["timeLeft"] = $timeLeft;
        } else {
            $returnValues["boolean"] = false;
            $returnValues["message"] = "You cannot create a new email";
            $returnValues["timeLeft"] = $timeLeft;
        }

        echo($returnValues["message"]);
        
    }

    public function main($email) {
        $this->checkTime($email);
        echo(" ye");
    }
}

$testing = new TestingLimits();
$testing->main("reid@gmail.com");

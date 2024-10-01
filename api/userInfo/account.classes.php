<?php

class Account extends dbh {

    function accountInfo($email) {


        $getPhone = $this->connect()->prepare('SELECT users_phone FROM users WHERE users_email = ? ;');
        if(!$getPhone->execute(array($email))) {
            $getPhone = null;
            $users_phone = null;
        } else {
            $dbphone = $getPhone->fetchAll(PDO::FETCH_ASSOC);
            $users_phone = $dbphone[0]["users_phone"];
        }



        $getFirstName = $this->connect()->prepare('SELECT users_firstName FROM users WHERE users_email = ? ;');
        if(!$getFirstName->execute(array($email))) {
          $getName = null;
          $users_firstName = "";
        } else {
            $dbname = $getFirstName->fetchAll(PDO::FETCH_ASSOC);
            $users_firstName = $dbname[0]["users_firstName"];
        }



        $getLastName = $this->connect()->prepare('SELECT users_lastName FROM users WHERE users_email = ? ;');
        if(!$getLastName->execute(array($email))) {
          $getLastName = null;
          $users_lastName = "";
        } else {
            $dblastname = $getLastName->fetchAll(PDO::FETCH_ASSOC);
            $users_lastName = $dblastname[0]["users_lastName"];
        }



        $getAddress = $this->connect()->prepare('SELECT users_address FROM users WHERE users_email = ? ;');
        if(!$getAddress->execute(array($email))) {
            $getAddress = null;
            $users_address = "";
        } else {
            $dbaddress = $getAddress->fetchAll(PDO::FETCH_ASSOC);
            $users_address = $dbaddress[0]["users_address"];
        }



        $getCity = $this->connect()->prepare('SELECT users_city FROM users WHERE users_email = ? ;');
        if(!$getCity->execute(array($email))) {
            $getCity = null;
            $users_city = "";
        } else {
            $dbcity = $getCity->fetchAll(PDO::FETCH_ASSOC);
            $users_city = $dbcity[0]["users_city"];
        }



        $getState = $this->connect()->prepare('SELECT users_state FROM users WHERE users_email = ? ;');
        if(!$getState->execute(array($email))) {
            $getState = null;
            $users_state = "";
        } else {
            $dbstate = $getState->fetchAll(PDO::FETCH_ASSOC);
            $users_state = $dbstate[0]["users_state"];
        }


        $getZip = $this->connect()->prepare('SELECT users_zip FROM users WHERE users_email = ? ;');
        if(!$getZip->execute(array($email))) {
            $getZip = null;
            $users_zip = "";
        } else {
            $dbzip = $getZip->fetchAll(PDO::FETCH_ASSOC);
            $users_zip = $dbzip[0]["users_zip"];
        }




     

        $wtfInfo = array (
            'users_email' => $email,
            'users_phone' => $users_phone,

            'users_firstName' => $users_firstName,
            'users_lastName' => $users_lastName,
            'address' => $users_address,
            'city' => $users_city,
            'state' => $users_state,
            'zip' => $users_zip
        );

        header("Content-type: application/json");
        echo json_encode($wtfInfo);


    }

}


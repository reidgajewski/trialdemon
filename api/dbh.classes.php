<?php

class Dbh {

    protected function connect() {
        try {
            $username = "root";
            $password = "Nikki200119!25Dollars";
            $dbh = new PDO('mysql:host=localhost;dbname=trialdemon', $username, $password);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

}

/*

class Dbh {

    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=trialdemon', $username, $password);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

}
*/

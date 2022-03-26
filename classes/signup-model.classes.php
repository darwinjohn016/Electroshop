<?php

class SignUpModel extends Database{

    protected function insertUser($users_fname,$users_lname,$users_email,$users_cpnumber,$users_address,$users_city,$users_country,$users_region,$users_username,$users_password){

        $stmt = $this->connect()->prepare("INSERT INTO users (users_fname,users_lname,users_email,users_cpnumber,users_address,users_city,users_country,users_region,users_username,users_password,users_regtime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $hashed_password = password_hash($users_password, PASSWORD_DEFAULT);

        $registration_time = date('Y-m-d H:i:s');

        if(!$stmt->execute([$users_fname,$users_lname,$users_email,$users_cpnumber,$users_address,$users_city,$users_country,$users_region,$users_username,$hashed_password,$registration_time])){
            $stmt = null;
            header("Location:./signup.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }

    protected function checkUserName($users_username){

        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_username = ?");

        if(!$stmt->execute([$users_username])){
            $stmt = null;
            header("Location:./signup.php?error=stmtfailed");
            exit();
        }

        $result = '';
        

        if(!empty($stmt->fetchAll())){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;

    }

    protected function checkUserEmail($users_email){

        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_email = ?");

        if(!$stmt->execute([$users_email])){
            $stmt = null;
            header("Location:./signup.php?error=stmtfailed");
            exit();
        }

        $stmt->execute(array($users_email));
        
        $result = '';
        
        if(!empty($stmt->fetchAll())){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

}
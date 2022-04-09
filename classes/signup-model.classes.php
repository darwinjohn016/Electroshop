<?php

class SignUpModel extends Database{

    protected function insertUser($users_fname,$users_lname,$users_email,$users_cpnumber,$users_address,$users_city,$users_country,$users_region,$users_username,$users_password){

        $stmt = $this->connect()->prepare("INSERT INTO users (users_fname,users_lname,users_email,users_cpnumber,users_address,users_city,users_country,users_region,users_username,users_password,users_picture,users_regtime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $hashed_password = password_hash($users_password, PASSWORD_DEFAULT);

        date_default_timezone_set("Asia/Singapore");
        $registration_time = date('Y-m-d H:i:s');

        $image_dir = 'user-images';
        $image_file = $image_dir . '/guest.jpg';


        if(!$stmt->execute([$users_fname,$users_lname,$users_email,$users_cpnumber,$users_address,$users_city,$users_country,$users_region,$users_username,$hashed_password,$image_file,$registration_time])){
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
        
        $result = '';
        
        if(!empty($stmt->fetchAll())){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

    protected function checkUserCpNumber($users_cpnumber){

        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_cpnumber = ?");

        if(!$stmt->execute([$users_cpnumber])){
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


}
<?php

class ProfileModel extends Database{

    protected function getUser($users_id,$users_username){

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE id = ? OR users_email = ?');

        if(!$stmt->execute([$users_id,$users_username])){
            $stmt = null;
            header("Location:./profile.php?error=stmtfailed");
            exit();
        }

        $row = $stmt->fetchAll();

        return $row;

    }

    protected function updateUser($users_fname,$users_lname,
    $users_username,$users_email,$users_cpnumber,$users_address,$users_city,$users_country,$users_region,$users_picture){

        $stmt = $this->connect()->prepare("UPDATE users SET users_fname = ?, users_lname = ?, users_username = ?, users_email = ?, users_cpnumber = ?, users_address = ?, users_city = ?, users_country = ?, users_region = ?, users_updatetime = ?, users_picture = ? WHERE id = ?");

        date_default_timezone_set("Asia/Singapore");
        $update_time = date('Y-m-d H:i:s');


        if(!$stmt->execute([$users_fname,$users_lname,
        $users_username,$users_email,$users_cpnumber,$users_address,$users_city,$users_country,$users_region,$update_time,$users_picture,$_SESSION['id']])){
            $stmt = null;
            header("Location:./profile.php?error=stmtfailed");
            exit();
        }

        $result = "";

        if($stmt->rowCount()>0){
        
            $result = true; 
        }
        else{
            $result = false;
        }
        return $result;

    }
    
    protected function checkUserName($users_username){

        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_username = ?");

        if(!$stmt->execute([$users_username])){
            $stmt = null;
            header("Location:./signup.php?error=stmtfailed");
            exit();
        }

        $result = '';

        if(!empty($row = $stmt->fetchAll())){

            if($_SESSION['id'] === $row[0]['id']){
                $result = true; 
            }

            else{
                $result = false;
            }
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
        
        if(!empty($row = $stmt->fetchAll())){
            if($_SESSION['id'] === $row[0]['id']){
                $result = true; 
            }

            else{
                $result = false;
            }
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
        
        if(!empty($row = $stmt->fetchAll())){
            if($_SESSION['id'] === $row[0]['id']){
                $result = true; 
            }

            else{
                $result = false;
            }
        }
        else {
            $result = true;
        }

        return $result;
    }


    protected function updateUserPassword($users_password,$users_npassword,$users_id){
        
        $stmt = $this->connect()->prepare('SELECT users_password FROM users WHERE id = ?');

        if(!$stmt->execute([$users_id])){
            $stmt = null;
            header('Location:./profile.php?error=stmtfailed');
            exit();
        }

        $result = '';

        if(!empty($fetch = $stmt->fetchAll())){
            
            if(password_verify($users_password,$fetch[0]['users_password'])){

                $hashed_npassword = password_hash($users_npassword, PASSWORD_DEFAULT);

                $stmt = $this->connect()->prepare('UPDATE users SET users_password = ? WHERE id = ?');

                if(!$stmt->execute([$hashed_npassword,$users_id])){
                    $stmt = null;
                    header('Location:./profile.php?error=stmtfailed');
                    exit();
                }

                $result = true;
            }
            else{
                $result = false;
            }
        }
        else{
            $result = false;
        }

        return $result;
    }
}
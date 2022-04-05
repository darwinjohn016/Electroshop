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
}
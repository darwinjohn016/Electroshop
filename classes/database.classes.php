<?php

class Database{

    protected function connect(){

        try{
            $username = 'root';
            $password = '';
            $dbh = new PDO('mysql:host=localhost;dbname=electroshop',$username,$password);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbh;     
        }

        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

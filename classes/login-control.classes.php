<?php

class LoginControl extends LoginModel{

    private $users_username;
    private $users_email;
    private $users_password;

    public function __construct($users_username,$users_email,$users_password){
        $this->users_username = $users_username;
        $this->users_email = $users_email;
        $this->users_password = $users_password;
    }


    // If No Error Occurs Check Records in Database

    public function loginUser(){

        $result = true;

        if($this->emptyUsername() == false && $this->emptyEmail() == false){
            $result = false;
        }

        if($this->validUsername() == false && !$this->emptyUsername() == false){
            $result = false;
        }     

        if($this->validEmail() == false && !$this->emptyEmail() == false){
            $result = false;
        }  

        if($this->emptyPassword() == false){
            $result = false;
        } 

        if($result == true){
            $this->getUser($this->users_username,$this->users_email,$this->users_password);
        }
        
        else {
            echo '<script>
            alert("Error Login Failed!");
            </script>';
        }

    }

    // Username

    public function errorUsername(){
        if(($this->emptyUsername() == false && $this->emptyEmail() == false)){
            echo 'Username or Email is Required';
        } 
        else if($this->validUsername() == false && !$this->emptyUsername() == false ){
            echo 'Numbers or Alphabets Only';
        }    
    }

    private function emptyUsername(){
        
        $result = '';
        if(empty($this->users_username)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }    

    private function validUsername(){
        
        $result = '';
        if(preg_match('/^[a-zA-z0-9]/',$this->users_username)){
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }    

    // Email Address

    public function errorEmail(){
        if($this->validEmail() == false && !$this->emptyEmail() == false){
            echo 'Invalid Email';
        }    
    }

    private function emptyEmail(){
        
        $result = '';
        if(empty($this->users_email)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

    private function validEmail(){

        $result = '';
        if(!filter_var($this->users_email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

    // Password 

    public function errorPassword(){

        if($this->emptyPassword() == false){
            echo 'Password is Required';
        } 
    }

    private function emptyPassword(){
        
        $result = '';
        if(empty($this->users_password)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }    


    

}
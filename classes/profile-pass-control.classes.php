<?php

class ProfilePassControl extends ProfileModel{

    private $users_password;
    private $users_cpassword;
    private $users_npassword;
    private $users_cnpassword;


    public function __construct($users_password,$users_cpassword,$users_npassword,$users_cnpassword){
        
        $this->users_password = $users_password;
        $this->users_cpassword = $users_cpassword;
        $this->users_npassword = $users_npassword;
        $this->users_cnpassword = $users_cnpassword;
    }

    public function updatePassword(){
        $result = true;

        if($this->emptyPassword() == false){
            $result = false;
        }

        if($this->matchPassword() == false){
            $result = false;
        }

        if($this->emptyNewPassword() == false){
            $result = false;
        }

        if($this->matchNewPassword() == false){
            $result = false;
        }

        if($result === true){
            if($this->updateUserPass() === true){
                echo '<script>
                alert("Password Successfully Updated!");
                </script>';
            }
            else{
                echo '<script>
                alert("Password Update Failed!");
                </script>';
            }
        }

    }

    private function updateUserPass(){
        return $this->updateUserPassword($this->users_password,$this->users_npassword,$_SESSION['id']);
    }

    // Password 
    
    public function errorPassword(){

        if($this->emptyPassword() == false){
            echo 'Password is Required';
        } 
        else if($this->matchPassword() == false){
            echo 'Password Do Not Match';
        } 
    }

    public function errorNewPassword(){

        if($this->emptyNewPassword() == false){
            echo 'Password is Required';
        } 
        else if($this->matchNewPassword() == false){
            echo 'Password Do Not Match';
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
    
    private function emptyNewPassword(){
        
        $result = '';
        if(empty($this->users_npassword)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }    



    private function matchPassword(){
        
        $result = '';
        if($this->users_password === $this->users_cpassword){
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    private function matchNewPassword(){
        
        $result = '';
        if($this->users_npassword === $this->users_cnpassword){
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

}
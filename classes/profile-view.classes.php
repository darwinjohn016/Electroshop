<?php

class ProfileView extends ProfileModel{

    private $users_id;
    private $users_username;
    
    public function __construct($users_id,$users_username){
        $this->users_id = $users_id;
        $this->users_username = $users_username;
        
    }

    public function viewProfile(){

        if($this->checkSessionAvailability() === false){
            echo '<script>
                alert("No User Found");
                window.location.href = "./index.php";
            </script>';
        }

        else{
            return $this->getProfile();
        }
    }

    private function getProfile(){
        return $this->getUser($this->users_id,$this->users_username);
    }

    
    private function checkSessionAvailability(){

        $result = '';
        if(empty($this->users_id) && empty($this->users_username)){
            $result = false;
        }

        else{
            $result = true;
        }

        return $result;
    }



}
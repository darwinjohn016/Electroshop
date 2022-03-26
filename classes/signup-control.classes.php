<?php

class SignUpControl extends SignUpModel{

    private $users_fname;
    private $users_lname;
    private $users_email;
    private $users_cpnumber;
    private $users_address;
    private $users_city;
    private $users_country;
    private $users_region;
    private $users_username;
    private $users_password;
    private $users_cpassword;


    public function __construct($users_fname,$users_lname,$users_email,$users_cpnumber,$users_address,$users_city,$users_country,$users_region,$users_username,$users_password,$users_cpassword){
        
        $this->users_fname = $users_fname;
        $this->users_lname = $users_lname;
        $this->users_email = $users_email;
        $this->users_cpnumber = $users_cpnumber;
        $this->users_address = $users_address;
        $this->users_city = $users_city;
        $this->users_country = $users_country;
        $this->users_region = $users_region;
        $this->users_username = $users_username;
        $this->users_password = $users_password;
        $this->users_cpassword = $users_cpassword;
    }

    // Insert Into Database

    public function signUpUser(){

        $result = true;

        // var_dump($this->checkUserNameExist() == false || $this->checkUserEmailExist() == false || $this->emptyFirstName() == true || $this->emptyLastName() == true || $this->emptyEmail() == true || $this->validEmail() == true || $this->emptyCpNumber() == true || $this->emptyAddress() == true || $this->emptyCity() == true || $this->emptyCountry() == true || $this->emptyRegion() == true || $this->emptyUsername() == true || $this->validUsername() == true || $this->emptyPassword() == true || $this->matchPassword() == true);

        // if($this->checkUserNameExist() == false || $this->checkUserEmailExist() == false || $this->emptyFirstName() == false || $this->emptyLastName() == false || $this->emptyEmail() == false || $this->validEmail() == false || $this->emptyCpNumber() == false || $this->emptyAddress() == false || $this->emptyCity() == false || $this->emptyCountry() == false || $this->emptyRegion() == false || $this->emptyUsername() == false || $this->validUsername() == false || $this->emptyPassword() == false || $this->matchPassword() == false){
        //     $result = false;
        // }

        if($this->checkUserNameExist() == false){
            echo '1';
            $result = false;
        }

        if($this->checkUserEmailExist() == false){
            echo '2';
            $result = false;
        }

        if($this->emptyFirstName() == false){
            echo '3';
            $result = false;
        }

        if($this->emptyLastName() == false){
            echo '4';
            $result = false;
        }

        if($this->emptyEmail() == false){
            echo '5';
            $result = false;
        }

        if($this->validEmail() == false){
            echo '6';
            $result = false;
        }

        if($this->emptyCpNumber() == false){
            echo '7';
            $result = false;
        }

        if($this->emptyAddress() == false){
            echo '8';
            $result = false;
        }

        if($this->emptyCity() == false){
            echo '9';
            $result = false;
        }

        if($this->emptyCountry() == false){
            echo '10';
            $result = false;
        }

        if($this->emptyCountry() == false){
            echo '11';
            $result = false;
        }

        if($this->emptyRegion() == false){
            echo '12';
            $result = false;
        }

        if($this->emptyUsername() == false){
            echo '13';
            $result = false;
        }

        if($this->validUsername() == false){
            echo '14';
            $result = false;
        }

        if($this->emptyPassword() == false){
            echo '15';
            $result = false;
        }

        if($this->matchPassword() == false){
            echo '16';
            $result = false;

        }

        if($result == true){
            // echo '<script>
            // if(confirm("Do you want to submit your info now?") == false) {
            //     window.location.href="";
            // }
            // else{
                $this->userData();
                header("Location:./signup.php");
                exit();            
            // }
            // </script>';

        }
        

        return $result;
    }

    private function userData(){
        $this->insertUser($this->users_fname,$this->users_lname,$this->users_email,$this->users_cpnumber,$this->users_address,$this->users_city,$this->users_country,$this->users_region,$this->users_username,$this->users_password);
    }

    // Check if Username Exists

    public function errorUserNameExist(){

        $result = $this->checkUserNameExist();

        if($result == false){
            echo 'Username Already Taken';
        }
        
    }

    private function checkUserNameExist(){
        $result = "";
        if(!$this->checkUserName($this->users_username)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    // Check if Email Exists

    public function errorUserEmailExist(){

        $result = $this->checkUserEmailExist();
        if($result == false){
            echo 'Email Already Taken';
        }
    }

    private function checkUserEmailExist(){
        $result= "";

        if(!$this->checkUserEmail($this->users_email)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    // First Name

    public function errorFirstName(){
        if($this->emptyFirstName() == false){
            echo 'First Name is Required';
        }       
    }

    private function emptyFirstName(){
        
        $result = '';
        if(empty($this->users_fname)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

    // Last Name

    public function errorLastName(){
        if($this->emptyLastName() == false){
            echo 'Last Name is Required';
        }        
    }

    private function emptyLastName(){
        
        $result = '';
        if(empty($this->users_lname)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

    // Email Address

    public function errorEmail(){
        if($this->emptyEmail() == false){
            echo 'Email is Required';
        }
        else if($this->validEmail() == false){
            echo 'Email is Invalid';
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

    // Cellphone Number

    public function errorCpNumber(){
        if($this->emptyCpNumber() == false){
            echo 'Number is Required';
        }        
    }

    private function emptyCpNumber(){
        
        $result = '';
        if(empty($this->users_cpnumber)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

    // Address

    public function errorAddress(){
        if($this->emptyAddress() == false){
            echo 'Address is Required';
        }        
    }

    private function emptyAddress(){
        
        $result = '';
        if(empty($this->users_address)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

    // City
    
    public function errorCity(){
        if($this->emptyCity() == false){
            echo 'City is Required';
        }        
    }

    private function emptyCity(){
        
        $result = '';
        if(empty($this->users_city)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

    // Country 

    public function errorCountry(){
        if($this->emptyCountry() == false){
            echo 'Country is Required';
        }        
    }

    private function emptyCountry(){
        
        $result = '';
        if(empty($this->users_country)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

    // Region

    public function errorRegion(){
        if($this->emptyRegion() == false){
            echo 'Region is Required';
        }        
    }

    private function emptyRegion(){
        
        $result = '';
        if(empty($this->users_region)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }   
    
    // Username

    public function errorUsername(){
        if($this->emptyUsername() == false){
            echo 'Username is Required';
        } 
        else if($this->validUsername() == false){
            echo 'Username is Invalid';
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
        if(!preg_match('/^[a-zA-z0-9]/',$this->users_username)){
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
        else if($this->matchPassword() == false){
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


    private function matchPassword(){
        
        $result = '';
        if(!$this->users_password == $this->users_cpassword || empty($this->users_cpassword)){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

}
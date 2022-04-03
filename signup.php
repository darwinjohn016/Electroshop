<?php
    session_name('user');
    session_start();

    $users_fname = '';
    $users_lname = '';
    $users_email = '';
    $users_cpnumber = '';
    $users_address = '';
    $users_city = '';
    $users_country = '';
    $users_region = '';
    $users_username = '';
    $users_password = '';
    $users_cpassword = '';


    // Submit the data using post and click of the submit button

    if(isset($_POST['submit'])){

        $users_fname = $_POST['users_fname'];  
        $users_lname = $_POST['users_lname'];  
        $users_email = $_POST['users_email'];  
        $users_cpnumber = $_POST['users_cpnumber'];  
        $users_address = $_POST['users_address'];  
        $users_city = $_POST['users_city'];  
        $users_country = $_POST['users_country'];  
        $users_region = $_POST['users_region'];  
        $users_username = $_POST['users_username'];  
        $users_password = $_POST['users_password'];
        $users_cpassword = $_POST['users_cpassword'];
        
        require_once "./classes/database.classes.php";
        require_once "./classes/signup-model.classes.php";
        require_once "./classes/signup-control.classes.php";

        // Instantiate the controller class

        $signUpControl = new SignUpControl($users_fname,$users_lname,$users_email,$users_cpnumber,$users_address,$users_city,$users_country,$users_region,$users_username,$users_password,$users_cpassword);

        // If Info Inserted To Database Clear the Form Fields
        
        $signUpControl -> signUpUser();

    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Electroshop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    
    <div class="signup-container">

        <div class="signup-header">
            <h2 class="signup-title"><a href="index.php" class="hero-redirect-btn"><span>E</span>lectro<span>S</span>hop</a>- Signup</h2>

            <div class="signup-timeline-bx">
                <div class="circle-bx">
                    <p>Details</p>
                    <div><p>1</p></div>
                </div>
                <div class="circle-bx">
                    <p>Address</p>
                    <div><p>2</p></div>
                </div>
                <div class="circle-bx">
                    <p>Submit</p>
                    <div><p>3</p></div>
                </div>
            </div>
        </div>

        <form action="signup.php" method="post" class="signup-form">

            <div class="signup-form-wrapper">

                <div class="signup-form-bx">
                
                    <h3 class="signup-form-title">Personal Details</h3>

                    <div class="signup-form-input-bx">
                        <label for="">First Name</label>
                            <?php 
                            if(isset($_POST['submit'])){
                            ?>
                                <div class="signup-form-input-error">
                                    <?php echo $signUpControl->errorFirstName()?>
                                </div>
                            <?php
                            }
                            ?>
                        <input type="text" name="users_fname" value="<?php echo htmlspecialchars($users_fname) ?>" id="">
                    </div>

                    <div class="signup-form-input-bx">
                        <label for="">Last Name</label>
                            <?php 
                            if(isset($_POST['submit'])){
                            ?>
                                <div class="signup-form-input-error">
                                    <?php echo $signUpControl->errorLastName()?>
                                </div>
                            <?php
                            }
                            ?>
                        <input type="text" name="users_lname" value="<?php echo htmlspecialchars($users_lname) ?>" id="">
                    </div>  

                    <div class="signup-form-input-bx">
                        <label for="">Email</label>
                            <?php 
                            if(isset($_POST['submit'])){
                            ?>
                                <div class="signup-form-input-error">
                                    <?php echo $signUpControl->errorEmail()?>
                                    <?php echo $signUpControl->errorUserEmailExist()?>
                                </div>
                            <?php
                            }
                            ?>
                        <input type="text" name="users_email" value="<?php echo htmlspecialchars($users_email)?>"  id="">
                    </div>  

                    <div class="signup-form-input-bx">
                        <label for="">Cellphone No.</label>
                            <?php 
                            if(isset($_POST['submit'])){
                            ?>
                                <div class="signup-form-input-error">
                                    <?php echo $signUpControl->errorCpNumber()?>
                                </div>
                            <?php
                            }
                            ?>
                        <input type="number" name="users_cpnumber" value="<?php echo htmlspecialchars($users_cpnumber)?>" id="">
                    </div>  

                </div>

                <div class="signup-form-bx">
                
                    <h3 class="signup-form-title">Your Address</h3>

                    <div class="signup-form-input-bx">
                        <label for="">Address</label>
                            <?php 
                            if(isset($_POST['submit'])){
                            ?>
                                <div class="signup-form-input-error">
                                    <?php echo $signUpControl->errorAddress()?>
                                </div>
                            <?php
                            }
                            ?>
                        <input type="text" name="users_address" value="<?php echo htmlspecialchars($users_address)?>" id="">
                    </div>

                    <div class="signup-form-input-bx">
                        <label for="">City</label>
                            <?php 
                            if(isset($_POST['submit'])){
                            ?>
                                <div class="signup-form-input-error">
                                    <?php echo $signUpControl->errorCity()?>
                                </div>
                            <?php
                            }
                            ?>
                        <input type="text" name="users_city" value="<?php echo htmlspecialchars($users_city)?>" id="">
                    </div>

                    <div class="signup-form-input-bx">
                        <label for="">Country</label>
                            <?php 
                            if(isset($_POST['submit'])){
                            ?>
                                <div class="signup-form-input-error">
                                    <?php echo $signUpControl->errorCountry()?>
                                </div>
                            <?php
                            }
                            ?>
                        <input type="text" name="users_country" value="<?php echo htmlspecialchars($users_country)?>" id="">
                    </div>  

                    <div class="signup-form-input-bx">
                        <label for="">Region</label>
                            <?php 
                            if(isset($_POST['submit'])){
                            ?>
                                <div class="signup-form-input-error">
                                    <?php echo $signUpControl->errorRegion()?>
                                </div>
                            <?php
                            }
                            ?>
                        <input type="text" name="users_region" value="<?php echo htmlspecialchars($users_region)?>" id="">
                    </div>  

                </div> 

                
                <div class="signup-form-bx">
                    

                    <h3 class="signup-form-title">Login Info</h3>
                    <div class="signup-form-input-bx">
                        <label for="">Username</label>
                            <?php 
                            if(isset($_POST['submit'])){
                            ?>
                                <div class="signup-form-input-error">
                                    <?php echo $signUpControl->errorUsername()?>
                                    <?php echo $signUpControl->errorUserNameExist()?>
                                </div>
                            <?php
                            }
                            ?>
                        <input type="text" name="users_username" value="<?php echo htmlspecialchars($users_username)?>" id="">
                    </div>

                    <div class="signup-form-input-bx">
                        <label for="">Password</label>
                            <?php 
                            if(isset($_POST['submit'])){
                            ?>
                                <div class="signup-form-input-error">
                                    <?php echo $signUpControl->errorPassword()?>
                                </div>
                            <?php
                            }
                            ?>
                        <input type="password" name="users_password" id="">
                        <button type="button" class="signup-reveal-password-btn"><i class="fa fa-eye"></i></button>
                        <button type="button" class="signup-not-reveal-password-btn toggle-reveal-password-btn"><i class="fa fa-eye-slash"></i></button>
                    </div>  

                    <div class="signup-form-input-bx">
                        <label for="">Confirm Password</label>
                        <input type="password" name="users_cpassword" id="">
                        <button type="button" class="signup-reveal-password-btn"><i class="fa fa-eye"></i></button>
                        <button type="button" class="signup-not-reveal-password-btn toggle-reveal-password-btn"><i class="fa fa-eye-slash"></i></button>
                    </div>  

                </div> 

  
                
            </div>                 

             <div class="signup-redirect-btn-bx">
                 <a href="login.php">Already Have An Account?</a>
             </div>   

      
            <div class="signup-form-btn-bx">
                
                <button class="prev-btn " type="button">Prev</button>
                <button type="button" class="next-btn active-btn">Next</button>

                <button type="submit" name="submit" class="submit-btn">Submit</button>

            </div>

        </form>


    </div>



    <script src="js/signup.js"></script>
</body>
</html>
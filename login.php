<?php
    session_name('user');
    session_start();

    $users_username = "";
    $users_email = "";

// Submit the data using post and click of the submit button

if(isset($_POST['submit'])){

 
    $users_username = filter_input(INPUT_POST,'users_username',FILTER_SANITIZE_SPECIAL_CHARS); 
    
    $users_email = filter_input(INPUT_POST,'users_email',FILTER_SANITIZE_SPECIAL_CHARS);

    $users_password = filter_input(INPUT_POST,'users_password',FILTER_SANITIZE_SPECIAL_CHARS);
    
    require_once "./classes/database.classes.php";
    require_once "./classes/login-model.classes.php";
    require_once "./classes/login-control.classes.php";

    // Instantiate the controller class

    $loginControl = new LoginControl($users_username,$users_email,$users_password);

    $loginControl -> loginUser();
    
    
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Electroshop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">

</head>
<body>

    <div class="login-container">

        <div class="login-bx">

            <div class="login-header">
                <h2 class="login-title"><a href="index.php" class="hero-redirect-btn"><span>E</span>lectro<span>S</span>hop</a>- Login</h2>
            </div>
            
            <form action="<?php echo filter_input(INPUT_SERVER,'PHP_SELF',FILTER_SANITIZE_SPECIAL_CHARS);?>" method="post" class="login-form">

                <div class="login-form-input-bx">
                    <label for="">Username</label>
                        <?php 
                        if(isset($_POST['submit'])){
                        ?>
                            <div class="login-form-input-error">
                                <?php echo $loginControl->errorUsername()?>
                            </div>
                        <?php
                        }
                        ?>
                    <input type="text" placeholder="Username" name="users_username" value="<?php echo $users_username ?>"  id="">
                </div>

                
                <div class="login-form-input-bx">
                    <label for="">Email</label>
                        <?php 
                        if(isset($_POST['submit'])){
                        ?>
                            <div class="login-form-input-error">
                                <?php echo $loginControl->errorEmail()?>
                            </div>
                        <?php
                        }
                        ?>                   
                    <input type="text" placeholder="Email" name="users_email" value="<?php echo $users_email ?>"  id="">
                </div>

                
                <div class="login-form-input-bx">
                    <label for="">Password</label>
                        <?php 
                        if(isset($_POST['submit'])){
                        ?>
                            <div class="login-form-input-error">
                                <?php echo $loginControl->errorPassword()?>
                            </div>
                        <?php
                        }
                        ?>
                        <input type="password" placeholder="Password" name="users_password" id="">
                        <button type="button" class="login-reveal-password-btn"><i class="fa fa-eye"></i></button>
                        <button type="button" class="login-not-reveal-password-btn toggle-reveal-password-btn"><i class="fa fa-eye-slash"></i></button>

                </div>
                
                <div class="login-form-redirect-btn-bx">
                    <a href="signup.php">Don't Have Any Account?</a>
                    <a href="">Forgot Password?</a>
                </div>

                <div class="login-form-btn-bx">
                    <button type="submit" name="submit">Sign-in</button>
                </div>

            </form>

        </div>

        <div class="login-img-bx">
            <img src="./images/niclas-illg-PlGxLYGhIDg-unsplash.jpg" alt="">
        </div>

    </div>
    
    <script type="module" src="js/login.js"></script>
</body>
</html>
<?php
    session_name('user');
    session_start();

    $users_id = $_SESSION['id'];
    $users_username = $_SESSION['user']; 

    require_once "./classes/database.classes.php";
    require_once "./classes/profile-model.classes.php";
    require_once "./classes/profile-view.classes.php";
    require_once "./classes/profile-control.classes.php";
    require_once "./classes/profile-pass-control.classes.php";

    $profileView = new ProfileView($users_id, $users_username);
    
    $userData = $profileView->viewProfile();

    $img_upload_error = "";

    if(isset($_POST['update'])){

        $users_fname = filter_input(INPUT_POST,'users_fname',FILTER_SANITIZE_SPECIAL_CHARS);

        $users_lname = filter_input(INPUT_POST,'users_lname',FILTER_SANITIZE_SPECIAL_CHARS);

        $users_username = filter_input(INPUT_POST,'users_username',FILTER_SANITIZE_SPECIAL_CHARS);

        $users_email = filter_input(INPUT_POST,'users_email',FILTER_SANITIZE_SPECIAL_CHARS);

        $users_cpnumber = filter_input(INPUT_POST,'users_cpnumber');

        $users_address = filter_input(INPUT_POST,'users_address',FILTER_SANITIZE_SPECIAL_CHARS);

        $users_city = filter_input(INPUT_POST,'users_city',FILTER_SANITIZE_SPECIAL_CHARS);

        $users_country = filter_input(INPUT_POST,'users_country',FILTER_SANITIZE_SPECIAL_CHARS);

        $users_region = filter_input(INPUT_POST,'users_region',FILTER_SANITIZE_SPECIAL_CHARS);

        if(!empty($_FILES['submit_img']['name'])){
            $img_dir =  'user-images/';
            $img_path = $img_dir.$_FILES['submit_img']['name'];
            $img_name = $_FILES['submit_img']['name'];
            $img_size = $_FILES['submit_img']['size'];
            $img_tmp = $_FILES['submit_img']['tmp_name'];
            $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

            $extensions = ['png','jpeg','jpg'];
            

            
            if(in_array($img_ext, $extensions)){
                if($img_size <= 100000000){
                    move_uploaded_file($img_tmp,$img_path);
                    rename($img_path,$img_dir.$users_id.'.'.$img_ext);

                    $_SESSION['img'] = $img_dir.$users_id.'.'.$img_ext;
                }
                else{
                    $img_upload_error = 'Too Big';
                }
            }
            else{
                $img_upload_error = 'Not An Image File';
            }

        }


        $profileControl = new ProfileControl($users_fname,$users_lname,$users_username,$users_email,$users_cpnumber,$users_address,$users_city,$users_country,$users_region,$_SESSION['img']); 


        if($img_upload_error !== ""){

        }
        else{
            $profileControl->updateUserInfo();
        }
    }

    if(isset($_POST['update_pass'])){
        $users_password = filter_input(INPUT_POST,'users_password',FILTER_SANITIZE_SPECIAL_CHARS);

        $users_cpassword = filter_input(INPUT_POST,'users_cpassword',FILTER_SANITIZE_SPECIAL_CHARS);

        $users_npassword = filter_input(INPUT_POST,'users_npassword',FILTER_SANITIZE_SPECIAL_CHARS);

        $users_cnpassword = filter_input(INPUT_POST,'users_cnpassword',FILTER_SANITIZE_SPECIAL_CHARS);


        $profilePassControl = new ProfilePassControl($users_password,$users_cpassword,$users_npassword,$users_cnpassword); 

        $profilePassControl->updatePassword();
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Electroshop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/profile.css">

</head> 
<body>
    
    <div class="overlay"></div>

    <form class="profile-container" enctype="multipart/form-data" method="post" action="<?php filter_input(INPUT_SERVER,'PHP_SELF',FILTER_SANITIZE_SPECIAL_CHARS)?> ">

        <div class="profile-info-bx">

            <div class="profile-img-bx">
                <img src="<?php echo $userData[0]['users_picture'];?>"alt="" class="profile-img">
            </div>

            <div class="profile-contact-bx">
                <p class="profile-username"><?php echo $userData[0]['users_fname'].' '.$userData[0]['users_lname'];?></p>
                <p class="profile-email"><?php echo $userData[0]['users_email']?></p>

                <?php
                if(isset($_POST['update'])){
                    echo '<p class="profile-img-error">'.$img_upload_error.'</p>';
                }
                ?>

                <label class="submit-img-bx">Change Picture 
                    <input type="file" accept="image/*" name="submit_img" id="submit_img" class="submit-img-btn">
                </label>
            </div>


        </div>

        <div class="profile-form-bx">

            <h3 class="profile-title">Your Profile</h3>


            <div class="profile-form-input-bx">
                <label for="">First Name</label>
                    <?php 
                    if(isset($_POST['update'])){
                    ?>
                        <div class="profile-form-input-error">
                            <?php echo $profileControl->errorFirstName()?>
                        </div>
                    <?php
                    }
                    ?>

                <input type="text" value="<?php echo $userData[0]['users_fname']?>" name="users_fname">

            </div>

            <div class="profile-form-input-bx">
                <label for="">Last Name</label>
                <?php 
                    if(isset($_POST['update'])){
                    ?>
                        <div class="profile-form-input-error">
                            <?php echo $profileControl->errorLastName()?>
                        </div>
                    <?php
                    }
                    ?>                
                <input type="text" value="<?php echo $userData[0]['users_lname']?>" name="users_lname">
            </div>

            <div class="profile-form-input-bx">
                <label for="">Username</label>
                <?php 
                    if(isset($_POST['update'])){
                    ?>
                        <div class="profile-form-input-error">
                            <?php echo $profileControl->errorUsername()?>
                            <?php echo $profileControl->errorUserNameExist()?>
                        </div>
                    <?php
                    }
                    ?>   
                <input type="text" value="<?php echo $userData[0]['users_username']?>" name="users_username">
            </div>

            <div class="profile-form-input-bx">
                <label for="">Email</label>
                <?php 
                    if(isset($_POST['update'])){
                    ?>
                        <div class="profile-form-input-error">
                            <?php echo $profileControl->errorEmail()?>
                            <?php echo $profileControl->errorUserEmailExist()?>
                        </div>
                    <?php
                    }
                    ?> 
                <input type="text" value="<?php echo $userData[0]['users_email']?>" name="users_email">
            </div>

            <div class="profile-form-input-bx">
                <label for="">Cellphone Number</label>
                <?php 
                    if(isset($_POST['update'])){
                    ?>
                        <div class="profile-form-input-error">
                            <?php echo $profileControl->errorCpNumber()?>
                            <?php echo $profileControl->errorUserCpNumberExist()?>
                        </div>
                    <?php
                    }
                    ?> 
                <input type="number" value="<?php echo $userData[0]['users_cpnumber']?>" name="users_cpnumber">
            </div>

            <div class="profile-form-input-bx">
                <label for="">Address</label>
                <?php 
                    if(isset($_POST['update'])){
                    ?>
                        <div class="profile-form-input-error">
                            <?php echo $profileControl->errorAddress()?>
                        </div>
                    <?php
                    }
                    ?> 
                <input type="text" value="<?php echo $userData[0]['users_address']?>" name="users_address">
            </div>

            <div class="profile-form-input-bx">
                <label for="">City</label>
                <?php 
                    if(isset($_POST['update'])){
                    ?>
                        <div class="profile-form-input-error">
                            <?php echo $profileControl->errorCity()?>
                        </div>
                    <?php
                    }
                    ?> 
                <input type="text" value="<?php echo $userData[0]['users_city']?>" name="users_city">
            </div>

            <div class="profile-form-input-bx">
                <label for="">Country</label>
                <?php 
                    if(isset($_POST['update'])){
                    ?>
                        <div class="profile-form-input-error">
                            <?php echo $profileControl->errorCountry()?>
                        </div>
                    <?php
                    }
                    ?> 
                <input type="text" value="<?php echo $userData[0]['users_country']?>" name="users_country">
            </div>


            <div class="profile-form-input-bx">
                <label for="">Region</label>
                <?php 
                    if(isset($_POST['update'])){
                    ?>
                        <div class="profile-form-input-error">
                            <?php echo $profileControl->errorRegion()?>
                        </div>
                    <?php
                    }
                    ?> 
                <input type="text" value="<?php echo $userData[0]['users_region']?>" name="users_region">
            </div>
        
            <div class="profile-btn-bx">
                <button class="profile-btn" name="update">Update Profile</button>
                <button class="profile-pass-btn" type="button">Update Password</button>
            </div>


        </div>



        <div class="profile-password-container">

            <button type="button" class="profile-close-btn"><i class="fa fa-close"></i></button>

            <div class="profile-form-input-bx">
                <label for="">Old Password</label>
                <?php 
                    if(isset($_POST['update_pass'])){
                    ?>
                        <div class="profile-form-input-error">
                            <?php echo $profilePassControl->errorPassword()?>
                        </div>
                    <?php
                    }
                    ?> 
                <input type="password" name="users_password" placeholder="Old Password">
                <button type="button" class="profile-reveal-password-btn"><i class="fa fa-eye-slash"></i></button>
                <button type="button" class="profile-not-reveal-password-btn toggle-reveal-password-btn"><i class="fa fa-eye"></i></button>
            </div>  

            <div class="profile-form-input-bx">
                <label for="">Confirm Password</label>
                <input type="password" name="users_cpassword" placeholder="Confirm Password">
                <button type="button" class="profile-reveal-password-btn"><i class="fa fa-eye-slash"></i></button>
                <button type="button" class="profile-not-reveal-password-btn toggle-reveal-password-btn"><i class="fa fa-eye"></i></button>
            </div>    

            <div class="profile-form-input-bx">
                <label for="">New Password</label>
                <?php 
                    if(isset($_POST['update_pass'])){
                    ?>
                        <div class="profile-form-input-error">
                            <?php echo $profilePassControl->errorNewPassword()?>
                        </div>
                    <?php
                    }
                    ?> 
                <input type="password" name="users_npassword" placeholder="New Password">
                <button type="button" class="profile-reveal-password-btn"><i class="fa fa-eye-slash"></i></button>
                <button type="button" class="profile-not-reveal-password-btn toggle-reveal-password-btn"><i class="fa fa-eye"></i></button>
            </div>  
            
            <div class="profile-form-input-bx">
                <label for="">Confirm New Password</label>
                <input type="password" name="users_cnpassword" placeholder="Confirm New Password">
                <button type="button" class="profile-reveal-password-btn"><i class="fa fa-eye-slash"></i></button>
                <button type="button" class="profile-not-reveal-password-btn toggle-reveal-password-btn"><i class="fa fa-eye"></i></button>
            </div>   

            <div class="profile-pass-btn-bx">
                <button class="profile-btn" name="update_pass">Change Password</button>
            </div>            

        </div>   


    </form>
    
 
    

    <script type="module" src="js/profile.js"></script>


</body>
</html>
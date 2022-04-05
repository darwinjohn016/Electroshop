<?php
    session_name('user');
    session_start();

    $users_id = $_SESSION['id'];
    $users_username = $_SESSION['user']; 

    require_once "./classes/database.classes.php";
    require_once "./classes/profile-model.classes.php";
    require_once "./classes/profile-view.classes.php";

    $profileView = new ProfileView($users_id, $users_username);
    
    $userData = $profileView->viewProfile();


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Electroshop</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/profile.css">

</head> 
<body>
    
    <form class="profile-container" method="post" action="<?php filter_input(INPUT_SERVER,'PHP_SELF',FILTER_SANITIZE_SPECIAL_CHARS)?> ">

        <div class="profile-img-bx">
            <img src="<?php echo $userData[0]['users_picture'];?>"alt="" class="profile-img">
            <p class="profile-username"><?php echo $userData[0]['users_fname'].' '.$userData[0]['users_lname'];?></p>
            <p class="profile-email"><?php echo $userData[0]['users_email']?></p>
        </div>

        <div class="profile-info-bx">

            <h3 class="profile-title">Your Profile</h3>


            <div class="profile-info-input-bx">
                <label for="">First Name</label>
                <input type="text" value="<?php echo $userData[0]['users_fname']?>">
            </div>

            <div class="profile-info-input-bx">
                <label for="">Last Name</label>
                <input type="text" value="<?php echo $userData[0]['users_lname']?>">
            </div>

            <div class="profile-info-input-bx">
                <label for="">Username</label>
                <input type="text" value="<?php echo $userData[0]['users_username']?>">
            </div>

            <div class="profile-info-input-bx">
                <label for="">Email</label>
                <input type="text" value="<?php echo $userData[0]['users_email']?>">
            </div>

            <div class="profile-info-input-bx">
                <label for="">Cellphone Number</label>
                <input type="number" value="<?php echo $userData[0]['users_cpnumber']?>">
            </div>

            <div class="profile-info-input-bx">
                <label for="">Address</label>
                <input type="text" value="<?php echo $userData[0]['users_address']?>">
            </div>

            <div class="profile-info-input-bx">
                <label for="">City</label>
                <input type="text" value="<?php echo $userData[0]['users_city']?>">
            </div>

            <div class="profile-info-input-bx">
                <label for="">Country</label>
                <input type="text" value="<?php echo $userData[0]['users_country']?>">
            </div>


            <div class="profile-info-input-bx">
                <label for="">Region</label>
                <input type="text" value="<?php echo $userData[0]['users_region']?>">
            </div>

        </div>

        <div class="profile-btn-bx">
            <button class="profile-btn" name="update">Update Profile</button>
            <button type="button">Update Password</button>
        </div>


    </form>

    <script src="js/profile.js"></script>

</body>
</html>
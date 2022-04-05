<?php
    session_name('user');
    session_start();

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Electroshop</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/index.css">

</head>

<body>

    <section class="hero-section-container">

        <header class="hero-header">

            <div class="hero-header-wrapper">
                <h2 class="hero-logo"> <span>E</span>lectro<span>S</span>hop</h2>
                
                <button class="hamburger-btn"><i class="fa fa-bars"></i></button>

                <nav class="hero-nav">
                    <button class="close-btn"><i class="fa fa-close"></i></button>

                    <div class="nav-btn-bx">
                        <a href="#" class="nav-btn-style">Home</a>
                        <a href="#">Services</a>
                        <a href="#">Products</a>
                        <a href="#">Support</a>
                    </div>

                    <?php 

                    if((isset($_SESSION['user']) && !empty($_SESSION['user'])) && (isset($_SESSION['id']) && !empty($_SESSION['id']))){
                        echo '
                        
                        <div class="user-btn-bx-3 hide-user-btn-bx-3">
                            <div class="user-info-bx-2">
                                <p class="user-full-name">'.$_SESSION['fname'].' '.$_SESSION['lname'].'</p>
                                <p class="user-email">'.$_SESSION['email'].'</p>
                            </div>
                            <div class="user-anchor-bx">
                                <a href="profile.php"><i class="fa-solid fa-user"></i>Profile</a>
                            </div>
                            <div class="user-anchor-bx">
                                <a href=""><i class="fa-solid fa-cart-shopping"></i>My Cart</a>
                            </div>
                            <div class="user-anchor-bx">
                                <a href="includes/logout.inc.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
                            </div>
                        </div>  

                        <div class="user-btn-bx-2">
                            <button class="user-btn"><img src="'.$_SESSION["img"].'"></img>
                            </button>
                            <div class="user-info-bx">
                                <p class="user-full-name">'.$_SESSION['fname'].' '.$_SESSION['lname'].'</p>
                                <p class="user-email">'.$_SESSION['email'].'</p>
                            </div>

                        </div>

                     
                        ';
                    }
                    else {
                        echo '
                        <div class="user-btn-bx">
                            <a href="signup.php">Sign-up</a>
                            <a href="login.php" class="user-login-btn">Login</a>
                        </div>';
                    }

                    ?>




                </nav>
            </div>

            

        </header>

        <div class="hero-section-bx">
            

            <h1 class="hero-headline">Affordable and Robust Electronic Components For Your Next Project</h1>
            <p class="hero-subheadline">You can visit our shop or buy online with minimal delivery fee</p>

            <a href="" class="cta-btn">Shop Now</a>


        </div>


        <div class="hero-img-bx">
            <img src="./images/niclas-illg-PlGxLYGhIDg-unsplash.jpg" alt="">
        </div>

        <div class="hero-socials-bx">
                <div class="hero-socials-links">
                    <a href=""> <i class="fab fa-facebook"></i> </a>
                    <a href=""> <i class="fab fa-twitter"></i> </a>
                    <a href=""> <i class="fab fa-google"></i> </a>
                </div>
        </div>

        <div class="hero-section-bx-2">
            <h2 class="hero-headline-2">Arduino, Adafruit, Raspberry Pi and More</h2>

            <a href="" class="cta-btn-2">View More <i class="fa fa-arrow-right"></i></a>
        </div>

        <div class="hero-img-bx-2">
            <img src="./images/niclas-illg-PlGxLYGhIDg-unsplash.jpg" alt="">
        </div>



    </section>
   

    <script src="js/index.js"></script>
    
</body>

</html>
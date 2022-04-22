<?php
    session_name('user');
    session_start();

    // if(!isset($_SESSION['duration'])){
    //     $_SESSION['duration'] = time();
    // }
    // else if(time() - $_SESSION['duration'] > 1800){
    //     session_destroy();
    //     setcookie('user','', time() - 86400, '/');
    //     echo '<script>
    //     alert("Session Expired");
    //     </script>';
    // }


    
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

    <div class="overlay"></div>

    <section class="hero-section-container" id="home">

        <header class="hero-header">

            <div class="hero-header-wrapper">
                <h2 class="hero-logo"> <span>E</span>lectro<span>S</span>hop</h2>
                
                <button class="hamburger-btn"><i class="fa fa-bars"></i></button>

                <nav class="hero-nav">
                    <button class="close-btn"><i class="fa fa-close"></i></button>

                    <div class="nav-btn-bx">
                        <a href="#home" class="nav-btn-style">Home</a>
                        <a href="#services">Services</a>
                        <a href="#">Products</a>
                        <a href="#contact">Support</a>
                    </div>

                    <?php 

                    if((isset($_SESSION['user']) && !empty($_SESSION['user'])) && (isset($_SESSION['id']) && !empty($_SESSION['id']))){

                        echo '
                        
                        <div class="user-btn-bx-3">
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

            <a href="" class="cta-btn-2">View More<i class="fa fa-arrow-right"></i></a>
        </div>

        <div class="hero-img-bx-2">
            <img src="./images/niclas-illg-PlGxLYGhIDg-unsplash.jpg" alt="">
        </div>



    </section>
    
    <section class="services-section-container" id="services">

        <div class="services-title-bx">
            <h2 class="services-title">Our Services</h2>
        </div>
        
        <div class="services-bx">
            
            <div class="services-card">
                <div class="services-img-bx">
                    <img src="images/niclas-illg-PlGxLYGhIDg-unsplash.jpg" alt="">
                </div>

                <div class="services-details-bx">
                    <h3 class="services-details-title">Warranty Guaranteed on the Products</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A dolore excepturi laborum voluptas natus incidunt voluptatem tenetur explicabo, dolor adipisci.</p>
                </div>
            </div>

            <div class="services-card">
                <div class="services-img-bx">
                    <img src="images/niclas-illg-PlGxLYGhIDg-unsplash.jpg" alt="">
                </div>

                <div class="services-details-bx">
                    <h3 class="services-details-title">Warranty Guaranteed on the Products</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A dolore excepturi laborum voluptas natus incidunt voluptatem tenetur explicabo, dolor adipisci.</p>
                </div>
            </div>

            <div class="services-card"> 
                <div class="services-img-bx">
                    <img src="images/niclas-illg-PlGxLYGhIDg-unsplash.jpg" alt="">
                </div>

                <div class="services-details-bx">
                    <h3 class="services-details-title">Warranty Guaranteed on the Products</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A dolore excepturi laborum voluptas natus incidunt voluptatem tenetur explicabo, dolor adipisci.</p>
                </div>
            </div>        


        </div>


    </section>


    <section class="contact-section-container" id="contact">
        
        <div class="contact-title-bx">
            <h3>Get In Touch</h3>
            <h2 class="contact-title">Customer Support</h2>
        </div>

        <form action="" class="contact-form">

            <div class="contact-form-input-bx">
                <label for="">Name</label>
                <input type="text" placeholder="Name" name="" value=""  id="">
            </div>

            <div class="contact-form-input-bx">
                <label for="">Email</label>
                <input type="text" placeholder="Email" name="" value=""  id="">
            </div>

            <div class="contact-form-input-bx">
                <label for="">Message</label>
                <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
            </div>

            <div class="contact-form-btn-bx">
                <button type="submit" >Send Message</button>
            </div>

        </form>   
        
        <div class="contact-details">

            <div class="contact-details-bx">
                <i class="fa fa-map-marker"></i>
                <p>124 Greenwood Ave Boonville, North Carolina(NC), 27011</p>
            </div>

            <div class="contact-details-bx">
                <i class="fa fa-phone"></i>
                <p>(336) 367-6077</p>
            </div>

            <div class="contact-details-bx">
                <i class="fa fa-envelope"></i>
                <p>electroshop@gmail.com</p>
            </div>
        </div>             
        
        <div class="contact-accordion">
            
            <div class="contact-accordion-bx">

                <div class="contact-accordion-header">
                    <p class="accordion-txt">What can I do if the product is defective?</p>
                    <i class="fa fa-plus"></i>
                </div>

                <div class="contact-accordion-ext">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil id exercitationem quia veritatis delectus voluptatem.</p>
                </div>

            </div>

            <div class="contact-accordion-bx">

                <div class="contact-accordion-header">
                    <p class="accordion-txt">What can I do if the product is defective?</p>
                    <i class="fa fa-plus"></i>
                </div>

                <div class="contact-accordion-ext">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil id exercitationem quia veritatis delectus voluptatem.</p>
                </div>
                
            </div>

            <div class="contact-accordion-bx">

                <div class="contact-accordion-header">
                    <p class="accordion-txt">What can I do if the product is defective?</p>
                    <i class="fa fa-plus"></i>
                </div>

                <div class="contact-accordion-ext">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil id exercitationem quia veritatis delectus voluptatem.</p>
                </div>
                
            </div>




        </div>

    </section>

    <footer class="footer-container">

        <div class="footer-logo">
            <h2>Electroshop</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa impedit saepe hic eius tenetur cupiditate?</p>
            <div class="footer-socials-links">
                <a href=""> <i class="fab fa-facebook"></i> </a>
                <a href=""> <i class="fab fa-twitter"></i> </a>
                <a href=""> <i class="fab fa-google"></i> </a>
            </div>
        </div>    

        <div class="footer-quick-links">
            <h3>Quick Links</h3>
            <a href="">Privacy Policy</a>
            <a href="">Terms and Conditions</a>
            <a href="">Disclaimer</a>
            <a href="">Returns</a>
        </div>    

        <div class="footer-work-hours">
            <h3>Work Hours</h3>
            <p>9AM - 6PM, Monday - Friday</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste provident odit officiis corrupti sit culpa.</p>
        </div>    

        <div class="footer-copyright-bx">
            <p>Copyright &copy; 2022 All Rights Reserved</p>
        </div>


    </footer>
    

    <script type="module" src="js/index.js"></script>
    
</body>

</html>
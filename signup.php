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
            <h2 class="signup-title">Signup Form</h2>

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

        <form action="" class="signup-form">

            <div class="signup-form-wrapper">

                <div class="signup-form-bx">
                
                    <h3 class="signup-form-title">Personal Details</h3>

                    <div class="signup-form-input-bx">
                        <label for="">First Name</label>
                        <input type="text" name="" id="">
                    </div>

                    <div class="signup-form-input-bx">
                        <label for="">Last Name</label>
                        <input type="text" name="" id="">
                    </div>  

                    <div class="signup-form-input-bx">
                        <label for="">Email</label>
                        <input type="email" name="" id="">
                    </div>  

                    <div class="signup-form-input-bx">
                        <label for="">Cellphone No.</label>
                        <input type="number" name="" id="">
                    </div>  

                </div>

                <div class="signup-form-bx">
                
                    <h3 class="signup-form-title">Your Address</h3>

                    <div class="signup-form-input-bx">
                        <label for="">Address</label>
                        <input type="text" name="" id="">
                    </div>

                    <div class="signup-form-input-bx">
                        <label for="">City</label>
                        <input type="text" name="" id="">
                    </div>

                    <div class="signup-form-input-bx">
                        <label for="">Country</label>
                        <input type="text" name="" id="">
                    </div>  

                    <div class="signup-form-input-bx">
                        <label for="">Region</label>
                        <input type="text" name="" id="">
                    </div>  

                </div> 

                
                <div class="signup-form-bx">
                
                    <h3 class="signup-form-title">Login Info</h3>

                    <div class="signup-form-input-bx">
                        <label for="">Username</label>
                        <input type="text" name="" id="">
                    </div>

                    <div class="signup-form-input-bx">
                        <label for="">Password</label>
                        <input type="password" name="" id="">
                    </div>  

                    <div class="signup-form-input-bx">
                        <label for="">Confirm Password</label>
                        <input type="password" name="" id="">
                    </div>  

                </div> 

  
                
            </div>                 

             <div class="signup-redirect-btn-bx">
                 <a href="login.php">Already Have An Account?</a>
             </div>   

      
            <div class="signup-form-btn-bx">
                
                <button class="prev-btn " type="button">Prev</button>
                <button class="next-btn active-btn">Next</button>

                <button type="submit" class="submit-btn">Submit</button>

            </div>

        </form>


    </div>



    <script src="js/signup.js"></script>
</body>
</html>
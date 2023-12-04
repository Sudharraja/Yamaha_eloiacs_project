
<?php
session_start(); // Start the session

// Check if the user clicked the login button
if (isset($_POST['submit'])) {
    // Retrieve the entered username and password
    $username = $_POST['login_email'];
    $password = $_POST['login_password'];

    // Simulate checking against a database (you should use a real database)
    $storedUsername = "aishwarrya@gmail.com";
    $storedPasswordHash = password_hash("Admin@12345", PASSWORD_DEFAULT);

    // Check if the entered credentials match the stored values
    if ($username === $storedUsername && password_verify($password, $storedPasswordHash)) {
        // Authentication successful
        $_SESSION['loggedin'] = true;
        $_SESSION['success_message'] = "Login successful! Welcome, " . $username . ".";
        header("Location: yamaha_payslip.php"); // Redirect to home.php
        exit; // Terminate the script after redirection
    } else {
        // Authentication failed
        $errorMessage = "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and signup</title>
<link href ="style.css" rel= "stylesheet"/>
    <link rel="stylesheet" href="../styles/login.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <!--<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>-->
    <script src="https://kit.fontawesome.com/cac3eb7948.js" crossorigin="anonymous"></script>    <!-- google-logo -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>


    /********************login**********************/
    .image_logo img
{
    width: 20%;
    height: 8%;
    margin: 5px;
    float: left;
    display: flex;
    margin: 13px 0px 0px 50px;
}

.sg-in-tt-le
{
        margin-top: 10%;
        margin-left: 11%;
        font-size: 30px;
        text-transform: uppercase;
        text-align: left;
        font-weight: 500;
        color: #666767
}
.sg-in-tt-le-dw
{
    letter-spacing: 1.5px;
    float: left;
    margin-top: -22px;
    margin-left: 13.9%;
    font-size: 20px;
}



.eloiacs{
    font-weight: normal;
    font-size: 100%;
    font-size: 100%;
    text-transform: uppercase;
}

.login_email
{
    width: 70%;
    margin: 10px 0px;
    padding: 10px 10px;
    text-align: left;
}

.login_password
{
    width: 70%;
    margin: 10px 0px;
    padding: 10px 10px;
    text-align: left;
}

.chk-lg-lft{
    margin-top: 15px;
    width:100%;
    text-align: left;
}

.check
{
    margin-left: 15%;
}

.rem-me
{
    padding-right: 5px;
}

.frgt-lg-rt
{
    margin-left: 68%;
    margin-top: -16pt;
    font-size: 100%;
    font-family: serif;
}

.qus-lg-lft
{
    color: blue;
}

.alter-login-option
{
    font-size: 100%;
    opacity: 2;
    font-weight: normal;
    margin: 1.5% 0% 1% 0%;
}

hr.hr-lne 
{
    opacity: 0.5;
    height: 3px !important;
    color: #fb5407;
    margin-left: 40px;
    margin-right: 40px;
}

.social-acnt-login a
{
    color: #fb5407;
    border: 1px solid #13131305;
    text-align: center;
    font-size: 15px;
    margin-top: 0%;
    text-decoration: none;
}
.social-acnt-login:hover
{
background-color: rgba(117, 118, 118, 0.344);
width: 45%;
margin-left: 25%;

}



/****************************************************/
/****************************************************/


.fa-google 
{
background: conic-gradient(from -45deg, #ea4335 110deg, #4285f4 90deg 180deg, #34a853 180deg 270deg, #fbbc05 270deg) 73% 55%/150% 150% no-repeat;
-webkit-background-clip: text;
color:transparent;
background-clip: text;
-webkit-text-fill-color: transparent;
}
.fa-twitter
{
    color: #26a7de;

}
.fa-solid {
    
    font-size: 20px;
        background: -webkit-gradient(linear, left top, left bottom, from(#FBB034), to(#FFED00));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        
}

.dnt-hv-an-acnt-signup{
    font-size: 100%;
    color: #fb5407;
    letter-spacing: 2px;
    border: 0px solid #ffffff;
    width: 100%;
    cursor: pointer;
   padding-top: 1px;
}

/*************************signup***********************/


.sg-in-rgt-tt-le
{
    margin-top: 15%;
    margin-left: 12%;
    font-size: 30px;
    text-align: left;
    text-transform: uppercase;
    font-weight: 500;
    color: #666767

    
}

/*
.sg-up-c-g-s
{
    font-size: 140%;
    font-weight: 650;
    letter-spacing: normal;
    text-transform: uppercase;
    text-align: left;
    margin-left: 15px;
    margin-top: -20px;
}
*/
.wh-h3 
{
    font-style: normal;
    text-align: left;
    letter-spacing: 1.5px;
    margin-top: -22px;
    margin-left: 13.9%;
    font-size: 20px;

}

.signup_email
{
    width: 70%;
    margin: 10px 0px;
    padding: 10px 10px;
    text-align: left;
}

.signup_phone_no
{
    width: 70%;
    margin: 10px 0px;
    padding: 10px 10px;
    text-align: left;
}



/******************************************************/
/******************************************************/
input.signup_email {
    BORDER: 1PX BLACK SOLID;
}
input.signup_phone_no {
    BORDER: 1PX BLACK SOLID;
}
.hv-an-acnt-signin{
    font-size: 100%;
    color: #fb5407;
    letter-spacing: 2px;
    border: 0px solid #ffffff;
    width: 100%;
    cursor: pointer;
   padding-top: 1px;
}
.hvr
{
    border: 1px solid #ffffff;
    cursor: pointer;
    
}
.hvr:hover i
{
    color: #0794ebf3;
    animation: slide1 1s ease-out infinite;
    
}
.arrow1 {
    font-size: 19px;
    margin-left: 4px;
    margin-right: 4px;
    margin-top: 0.9px;
  }

  @keyframes slide1 {
    0%,
    100% {
      transform: translate(0, 0);
    }
  
    50% {
      transform: translate(10px, 0);
    }
  }






/******************left login*********************/

.lg-lft
{
    width: 60%;
    left:0;
    z-index: 2;
    opacity: 1;
}

.bx-shadow-lg-lft
{
    background-color: #fefefc;
    width: 115%;
    height: 100%;
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px 5px 6px 4px  inset;
}

*/
        /**********panel-active left************/
.container-first.right-panel-active .lg-lft
{
    transform: translateX(60%);
    opacity: 0;
}


/**********************right signup **************************/


.bx-shadow-sg-rgt
{
    
    background-color: #fefefc;
    width: 115%;
    height: 100%;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px 5px 6px 4px  inset;
    
}

.sg-up-rgt
{
    left:0;
    width: 60%;
    z-index: 1;
    opacity: 0;
}


.form-container.sg-up-rgt{
   
    z-index: 1;
    opacity: 1;
}

/**********panel-active left************/

.container-first.right-panel-active .lg-lft
{
 transform: translateX(60%);
 opacity: 0;
}

/******panel-active-right************/

 .container-first.right-panel-active .sg-up-rgt
 {
     transform: translateX(67%);
     opacity: 1;
     z-index: 5;
     animation: show 0.6s;
 }

 @keyframes show 
{
    0% , 59.9%
    {
        opacity: 0;
        z-index: 1;
    }
    60%, 100%
    {
        opacity: 1;
        z-index: 5;

    }
}
 

/*************common classes for signup and login **********/

.container-first
{   
    
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    height: 625px;
    max-width: 1250px;
    min-width: 1100px;
    margin: 25px 0px 25px 60px;
    background-image: url("Attributes/aerial.jpeg");
    background-size: cover;
    
    
    
}
.form-container
{
    position: absolute;
    top: 0;
    transition: all 0.7s ease-in-out;
    height: 100%;
    
    
    
}

form {
    width: 100%;
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 60px;
	height: 100%;
	text-align: center;    
}

button {
    border-radius: 30px;
    font-size: 103%;
    text-transform: uppercase;
    font-weight: 600;
    color: white;
    border: 1px solid #eb7107;
    background-color: #f84808f0;
    align-items: center;
    text-align: center;
    padding: 5px 18px;
    margin-bottom: 3px;
}


/****************** over lap **************************/
 /*-------------------common overlay------------*/


 .overlay-container
 {
     position: absolute;
     top:0;
     left:45%;
     width: 100%;
     height: 100%;
     transition: transform 0.5s ease-in-out;
     z-index: 100%;
    
  
 }

 .overlay
 {
     position: relative;
     left:15%;
     width: 260%;
     height: 100%;   
     transform: translateX(-7%);
     transition: transform 0.5s ease-in-out;
}

.overlay-panel
{
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    text-align: center;
    top: 0%;
    height: 100%;
    width: 50%;
    transform: translateX(-100%);
    transition: transform 0.2s ease-in-out;
    
}


/**************right*******************/


.lg-rt-slo-gan
{
    font-size: 115%;
    font-weight: 600;
    color: white;
}

.sg-up-lt-slo-gan-tit-le
{
    font-size: 125%;
    font-weight: 700;
    color: white;
}

.sg-up-lt-slo-gan
{
    font-size: 115%;
    font-weight: 600;
    color: white;
}

.lg-sg-up-right-slo
{
    transform: translateX(-20%);
    z-index: 2;
    left: 0;
    width: 50%;

    color: #f6f5f7fe;
    opacity: 1;
    font-size: 100%;
    text-align: left;    
}

/************* left ***************/


.lg-sg-up-left-slo{
    color: wheat;
    transform: translateX(10%);
    width: 50%;
    opacity: 1;
}

.container-first.right-panel-active .lg-sg-up-right-slo {
    transform: translateX(0%);
    opacity: 0;
}


.container-first.right-panel-active .overlay-container
{
    transform: translateX(-100%);
}


</style>

<body>

    <!--------- LOGIN -------------->

<div class="container-first" id = "container-all">
    <div class="frst-cont-lg-lft-rft">
        <div class="form-container lg-lft">
            <form action="#" method = "post">
                
                <div class="bx-shadow-lg-lft">
                    <p class="image_logo"><img src="Attributes/yamaha.jpg"/></p>
                    <br>
                    <p class="sg-in-tt-le">CONNECT</p>
                    <p class="sg-in-tt-le-dw">with our <span class="eloiacs">YAMAHA</span> application</p>
                    <input type="text" id="login_email" class="login_email" name="login_email" placeholder="Email" autocomplete="off" required></input>

                    <input type="password" id="login_password" class="login_password" name="login_password" placeholder="Password" autocomplete="off" required></input>
                    
                    <div class="chk-lg-lft">
                        <input type="checkbox" id="remember_me" class="check" required>
                        <span class="rem-me">Remember me</span>
                
                        <p class = "frgt-lg-rt">Forgot Password<span class="qus-lg-lft">?</span></p>
                    </div>
                    <?php
    // Display error message if available
    if (isset($errorMessage)) {
        echo "<p>$errorMessage</p>";
    }
    ?>
                    <button type="submit" name="submit" >Sign in</button>

                    <hr class="hr-lne">
                    <p class="alter-login-option">Continue with</p>
                    <p class="social-acnt-login"><a href="#" class="google_btn"><i class="fa fa-google fa-fw"></i> Login with Google</a></p>
                    <p class="social-acnt-login"><a href="#" class="twitter_btn"><i class="fa fa-twitter fa-fw"></i> Login with Twitter</a></p>
                    <p class="dnt-hv-an-acnt-signup"  id="signup"><span class="hvr">Don't have an account Signup<i class="fa fa-long-arrow-right arrow1" aria-hidden="true"></i></span></p>
                </div>
            </form>
        </div>
        

       <!------- SIGN UP ---------------->

        <div class="form-container sg-up-rgt">
            <form action="#">
                <div class="bx-shadow-sg-rgt">
                    <p class="image_logo"><img src="Attributes/yamaha.jpg"/></p>
                    <p class="sg-in-rgt-tt-le">sign up</p>
                    <!--<p class="sg-up-c-g-s">CONNECT GROW SUCCEED</p> -->
                    <p class="wh-h3">with our organization</p>
                    <input type="text" class="signup_email"  placeholder="Email"></input>
                    <input type="text" class="signup_phone_no"  placeholder="Mobile Number"></input>
                </br>
                    <button>Sign up</button>
                    <hr>
                    <p class="alter-login-option">Continue with</p>
                    <p class="social-acnt-login"><a href="#" class="google_btn"><i class="fa fa-google fa-fw"></i> Login with Google</a></p>
                    <p class="social-acnt-login"><a href="#" class="twitter_btn"><i class="fa fa-twitter fa-fw"></i> Login with Twitter</a></p>
                    <p class="hv-an-acnt-signin" id="signin"><span class="hvr"><i class="fa fa-long-arrow-left arrow1" aria-hidden="true"></i>  Already have an account Signin</span></p>
                </div>
            </form>
        </div>
       </div> 
    

    <!--------- OVERLAY CONTAINER ---------------->
    <!--------- LEFT ---------------->

    <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel lg-sg-up-right-slo"> 
            <!-- slogan-login-right -->        
               <p class="lg-rt-slo-gan"><i class="fa-solid fa-star-half"></i>  Unleash your digital potential with our solutions.</p>
               <p class="lg-rt-slo-gan"><i class="fa-solid fa-star-half"></i>  Potent and intuitive suite of business solutions.</p>
               <p class="lg-rt-slo-gan"><i class="fa-solid fa-star-half"></i>  Simplifies digital transformation with ease.</p>
            </div>
    <!--------- left ----------------> 
        <div class="overlay-panel lg-sg-up-left-slo">  
            <p class="sg-up-lt-slo-gan-tit-le">ELOIACS Applications can help you  </p>
            <p class="sg-up-lt-slo-gan"><i class="fa-solid fa-star-half"></i> Collaborate </p>
            <p class="sg-up-lt-slo-gan"><i class="fa-solid fa-star-half"></i> Expand your knowledge</p> 
            <p class="sg-up-lt-slo-gan"><i class="fa-solid fa-star-half"></i> Reach your full potential</p>
        </div>

    </div>
</div>
</div>
<script src= "../styles/slidesheet.js"></script>
<script>
    const btn_signup = document.getElementById('signup');
const btn_signin = document.getElementById('signin');
const container = document.getElementById('container-all');


btn_signup.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});
btn_signin.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>

<!-- JavaScript code --

        // Retrieve the form element and add a submit event listener
        const form = document.querySelector(".form-container form");
        form.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission

            // Retrieve the entered username and password
            const username = document.getElementById("login_email").value;
            const password = document.getElementById("login_password").value;

            // Check if the entered credentials match the fixed values
            if (username === "user@gmail.com" && password === "12345") {
                // Authentication successful
               

                // Redirect to payslip.php
                window.location.href = "home22.php";

                // Reset the form fields
                form.reset();
            } else {
                // Authentication failed
                alert("Invalid username or password. Please try again.");
            }
        });
    </script-->



</body>
</html>
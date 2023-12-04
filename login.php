<?php
session_start();
include "connect.php";
$error_message = "";
// Check if the user clicked the login button
if (isset($_POST['submit'])) {
    // Retrieve the entered username and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    $place = $_POST['place'];

    // Prepare and execute a query to retrieve the user's data based on the provided username and password
    $query = "SELECT id, username, password, place, status FROM user WHERE username = ? AND password = ? AND place = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $username, $password, $place);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['status'] = $row['status']; // Store user status in session
        $_SESSION['place'] = $row['place'];   // Store user place in session

        $_SESSION['success_message'] = "Welcome, " . $username . ".";
        $_SESSION['loggedin'] = true; // Mark the user as logged in

        if ($_SESSION['status'] === 'Employee') {
            header("Location: sales.php");
            exit();
        } elseif ($_SESSION['status'] === 'Admin') {
            header("Location: formsix.php"); // Redirect to admin page
            exit();
        } elseif ($_SESSION['status'] === 'Rto') {
            header("Location: rtoform.php"); // Redirect to admin page
            exit();
        }elseif ($_SESSION['status'] === 'Account') {
            header("Location: actform.php"); // Redirect to admin page
            exit();
        }

        elseif ($_SESSION['status'] === 'NewYamaha') {
            header("Location: vmform.php"); // Redirect to admin page
            exit();
        }
         
        elseif ($_SESSION['status'] === 'Daybook') {
            header("Location: daybook_form.php"); // Redirect to admin page
            exit();
        }
        elseif ($_SESSION['status'] === 'master') {
            header("Location: cmform.php"); // Redirect to admin page
            exit();
        }
        elseif ($_SESSION['status'] === 'Accounts') {
            header("Location: sales.php"); // Redirect to admin page
            exit();
        }
        elseif ($_SESSION['status'] === 'product') {
            header("Location: add_product.php"); // Redirect to admin page
            exit();
        }
        else {
            echo '<script>alert("Unknown user status. Please contact support.");</script>';
        }
    } else {
        // Invalid credentials
        $error_message = 'Invalid username and password';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="col-md-2">
      <img class="img" src="img2.png" alt="" srcset="">
      
</div>
<div class="login-container">
<form action="" method="post">

        <h1>Login</h1>
        <div class="form-group">
           
            <select name="place" id="place">
                <option value="">Select Branch</option>
                <option value="Kuzhithurai">Kuzhithurai</option>
                <option value="Pammam">Pammam</option>
                <option value="Karungal">Karungal</option>
                <option value="Puthukadai">Puthukadai</option>
                <option value="Oliver">Oliver</option>
                <option value="Triumph Motors">Triumph Motors</option>
                <option value="MM Motors">MM Motors</option>
                <option value="RTO">RTO</option>
                <option value="Admin">Admin</option>
                 <option value="">Accounts</option> 
            </select>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="👤 Enter the Username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="🔒 Enter the Password" maxlength="20" required>
            <i class="fa fa-eye" id="togglePassword" aria-hidden="true" style="cursor: pointer;"></i>
             
        </div>
        <div class="form-group">
            <label for="password"><?php echo  "$error_message" ;?> </label>
           
        </div>
        <button id="loginBtn" name="submit">LOGIN</button>
  
    </form>
    <style>
          /* Add CSS for the eye icon */
          i.fa.fa-eye {
    margin-left: -49px;
}
            .main {
                margin-left: 6px;
            display: 0px;
            justify-content: 0px;
            align-items: 0px;
            height: 0vh;
        }

        .main a {
            display: inline-block;
            
            background-color: #007bff;
            color: white;
            padding: 0px 5px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .main a:hover {
            background-color: #0056b3;
        }
      
           .img{
            width: 180px;
    margin-bottom: 450px;
    margin-right: 200px;
height: 100px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 6px -5px 4px 0px rgba(0, 0, 0, 0.25);
background-color: white;
}

           textarea {
            width: 50%;
            margin-left: 80px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: transparent;
        }

        h1{
margin-left:150px;
color: #000;
font-size: 30px;
font-style: sans-serif;;
font-weight: 700;
line-height: normal;
letter-spacing: 1.05px;
margin-top: 57px;
 }

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(228deg, #0C00A3 0%, #1F77E5 38.73%, #4DD1BF 100%);
    margin: 0;
}

.login-container {
    width: 398px;
height: max-content;
flex-shrink: 0;
border-radius: 10px;
background: #FFF;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}

.form-group {
    margin-bottom:43px;
}

label {
    display: block;
    margin-left: 30px;
    margin-top: 60px;
    font-weight: 600px;
}

input[type="text"],
input[type="password"],
select
{
    width: 84%;
    margin-left:15px;
    padding: 14px;
    border:none;
    border-radius: 4px;
    background:transparent;
    border-bottom:1px solid #ccc;
    outline:none;
}

button {
width: 268px;
font-size: 20px;
height: 40px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background: linear-gradient(98deg, #0C00A3 0%, #4DD0BF 100%);
color:white;
margin-left:63px;
border-radius:20px;
margin-top:5px;border:none;
margin-top: -19px;
margin-bottom: 24px;
}

button:hover {
    background-color: #45a049;
}

a{
    text-decoration:none;
}
    
    </style>
</div>
</body>
<script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
</html>
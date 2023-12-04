<?php
session_start(); // Start the session
include "connect.php";

// Check if the user clicked the login button
if (isset($_POST['submit'])) {
    // Retrieve the entered username, password, and place
    $username = $_POST['username'];
    $password = $_POST['password'];
    $place = $_POST['place'];

    // Prepare and execute a query to retrieve the user's data based on the provided username and place
    $query = "SELECT id, username, password, place, status FROM user WHERE username = ? AND password = ? AND place = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $username, $password, $place);
        mysqli_stmt_execute($stmt);


        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // User found, perform actions here
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['place'] = $row['place'];

            $_SESSION['success_message'] = "Welcome, " . $username . ".";
            $_SESSION['loggedin'] = true; // Mark the user as logged in
            
            echo '<script>alert("Welcome to  ' . $place . ' branch 😊"); window.location.href = "form.php";</script>';
            exit(); // It's recommended to exit after the alert and redirection
        } else {
            // Invalid credentials
            $error_message = 'Invalid username and password';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo 'Query preparation error';
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>

     
    
<body>

<div class="container">
<div class="col-md-2">
      <img class="img" src="img2.png" alt="" srcset="">
      
</div>

    <div class="login-container">
    <div class="head1">
            
<select id="dropdown">
<option value="superlogin.php">user</option>
<option value="login.php">Admin</option>
    
  
</select>
        <h1>LOG IN</h1>
    
    </div>
<form action="" method="post">
        <div class="form-group">
            <label for="username">Branch Name:</label>
            <input type="text" id="Branch" name="place" placeholder=" 🌿 Enter the Branch" required>
        </div>
        <div class="form-group">
            <label for="username">User Name:</label>
            <input type="text" id="username" name="username" placeholder=" 👤 Enter the Username" maxlength="20" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder=" 🔒 Enter the Password" maxlength="20" required>
        </div>
        <button id="loginBtn" name="submit">LOG IN</button>
    </div>
    </div>
    </form>

    <style>
       select {
        margin-left: -210px;
    /* margin-bottom: 45px; */
}
        .img{
            width: 180px;
    margin-bottom: 450px;
    margin-left: 139px;
height: 100px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 6px -5px 4px 0px rgba(0, 0, 0, 0.25);
background-color: white;

}


body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 120vh;
    margin: 0;
    background: linear-gradient(215deg, #0C00A3 0%, #4ED3BF 100%);
}

.login-container {
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 81px;
    max-width: 430px;
    width: 458px;
    margin-left: 756px;
    margin-top: -621px;
    margin-bottom: 70px;
    /* border-top-right-radius: 43px; */
    padding-top: 40px;
    /* border-bottom-right-radius: 43px; */
    
   
}

.head1 {
    color: #0C00A3;
font-family: Quicksand;
font-size: 25px;
font-style: normal;
font-weight: 700;
line-height: normal;
letter-spacing: 0.175px;
margin-left:148px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight:bold;
}

input[type="text"],
input[type="password"] {
    width: 449px;
height: 52px;
flex-shrink: 0;
border-radius: 5px;
border: 0.5px solid #0C00A3;
background: #F4F8F7;

}

button {
    width: 152px;
height: 50px;
flex-shrink: 0;
border-radius: 5px;
background: linear-gradient(98deg, #0C00A3 0%, #4DD0BF 100%);
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
margin-left: 167px;
    margin-top: 54px;
color: #FFF;
font-family: Inter;
font-size: 23px;
font-style: normal;
font-weight: 700;
line-height: normal;
letter-spacing: 0.69px;
}

button:hover {
    background-color: #45a049;
}


    </style>
   
    </dive>
</body>
</html>

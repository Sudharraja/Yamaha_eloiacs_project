<?php
session_start();
include "connect.php";

// Check if the user clicked the login button
if (isset($_POST['submit'])) {
    // Retrieve the entered username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute a query to retrieve the user's data based on the provided username and password
    $query = "SELECT id, username, password, place, status FROM user WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $place = $row['place'];
        $userStatus = $row['status'];

        $_SESSION['success_message'] = "Welcome, " . $username . ".";
        $_SESSION['loggedin'] = true; // Mark the user as logged in

        if ($userStatus === 'employee') {
            header("Location: form.php"); // Redirect to employee page
            exit();
        } elseif ($userStatus === 'admin') {
            header("Location: formsix.php"); // Redirect to admin page
            exit();
        } else {
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
    <!-- Include your CSS and JavaScript here -->
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" name="submit" value="Login">
    </form>
    
    <?php if (isset($error_message)) { echo $error_message; } ?>
</body>
</html>

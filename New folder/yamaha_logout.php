<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in, so we proceed with the logout process
    // Destroy all session data
    session_unset();
    session_destroy();
}

// Redirect to index.php after logout
header("Location: yamaha.php");
exit; // Terminate the script after redirection
?>

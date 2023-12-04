<?php
session_start(); // Resume the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to index.php
    header("Location: index.php");
    exit; // Terminate the script after redirection
}

// Check if the user's status is not 'Admin'
if ($_SESSION['status'] !== 'Admin1') {
    // Display a message and redirect after 5 seconds
    echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh; text-align: center;">';
    echo '<p style="font-size: 18px;">You need permission to access this page. You will be redirected in 5 seconds.</p>';
    echo '</div>';
    echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 5000);</script>';
    exit; // Terminate the script
}
?>

<?php
include "yamaha_conn.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Perform the deletion query
    
    $deleteQuery = "DELETE FROM yamaha_employee_data WHERE ID = '$id'";
    $result = mysqli_query($conn, $deleteQuery);
    
    if ($result) {
        // Deletion successful
        
        echo '<script>location.replace("yamaha_save.php");</script>';
        
    } else {
        // Deletion failed
        echo "Failed to delete the record.";
    }
}


?>
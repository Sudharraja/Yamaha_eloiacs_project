<?php
session_start(); // Resume the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to index.php
    header("Location: yamaha_index.php");
    exit; // Terminate the script after redirection
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
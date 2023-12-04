<?php
include "connect.php";

// Check if ID parameter is set
if (isset($_GET['id'])) {
    // Get the ID to be marked as deleted
    $id = $_GET['id'];

    // Update query to mark the record as deleted
    $updateQuery = "UPDATE product SET is_deleted = 1 WHERE ID = '$id'";

    // Execute the query
    if (mysqli_query($conn, $updateQuery)) {
        // If the query was successful, redirect back to the main page
        header("Location: main.php");
        exit();
    } else {
        // If there was an error with the query, display an error message
        echo "Error marking record as deleted: " . mysqli_error($conn);
    }
} else {
    // If the ID parameter is not set, display an error message
    echo "Invalid request. Please provide a valid ID.";
}
?>

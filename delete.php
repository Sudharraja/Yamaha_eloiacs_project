<?php
include "connect.php"; // Include your database connection

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Debugging: Output the ID to check if it's correct
    echo "ID: " . $id;

    // Prepare the DELETE query to remove the record
    $deleteQuery = "DELETE FROM daybook WHERE ID = $id";

    // Debugging: Output the SQL query
    echo "SQL Query: " . $deleteQuery;

    if (mysqli_query($conn, $deleteQuery)) {
        // Redirect to the page displaying the table
        header("Location: daybook_save.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid or missing ID parameter.";
}
?>

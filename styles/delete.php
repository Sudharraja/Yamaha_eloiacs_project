<!-- <php
include "connect.php"; // Include your database connection

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the UPDATE query
    $updateQuery = "UPDATE project SET Del_status = 2 WHERE ID = $id";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: save.php"); // Redirect after successful update
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid or missing ID parameter.";
}
?> -->



<?php
include "connect.php"; // Include your database connection

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Check if the user confirms the deletion
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        // Prepare the UPDATE query
        $updateQuery = "UPDATE project SET Del_status = 2 WHERE ID = $id";

        if (mysqli_query($conn, $updateQuery)) {
            header("Location: save.php"); // Redirect after successful update
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        // Display a confirmation message
        echo '<script>';
        echo 'if (confirm("Are you sure you want to delete this row?")) {';
        echo '   window.location.href = "delete.php?id=' . $id . '&confirm=yes";';
        echo '} else {';
        echo '   window.location.href = "save.php";'; // Redirect if the user cancels the deletion
        echo '}';
        echo '</script>';
    }
} else {
    echo "Invalid or missing ID parameter.";
}
?>

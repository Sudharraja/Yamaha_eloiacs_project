<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $newStatus = $_POST['status'];

    // Update the "expire/not" value to "expired" in the database
    $updateQuery = "UPDATE `product` SET `expire/not` = 'expired' WHERE `ID` = ?";
    
    $stmt = $conn->prepare($updateQuery);

    if ($stmt) {
        // Bind the ID parameter
        $stmt->bind_param('i', $id);

        // Execute the update query
        if ($stmt->execute()) {
            // Send a success response
            echo 'Status updated successfully.';
        } else {
            // Send an error response
            echo 'Error updating status: ' . $conn->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Send an error response
        echo 'Error updating status: ' . $conn->error;
    }
    
    // Close the database connection
    $conn->close();
} else {
    // Send an error response if the request is invalid
    echo 'Invalid request.';
}
?>

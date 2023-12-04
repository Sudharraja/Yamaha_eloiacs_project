<?php
include "connect.php";

// Get the customer name from the POST request
$customerName = $_POST['customer_name'];

// Prepare and execute a database query
$query = "SELECT CUSTOMERCODE, CUSTOMERNAME, PHONE, VEHICLENAME FROM customer_master WHERE CUSTOMERNAME = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $customerName);
$stmt->execute();
$result = $stmt->get_result();

// Check if a row is found
if ($row = $result->fetch_assoc()) {
    // Return customer details as JSON
    $customerDetails = [
        'CUSTOMERCODE' => $row['CUSTOMERCODE'],
        'CUSTOMERNAME' => $row['CUSTOMERNAME'],
        'PHONE' => $row['PHONE'],
        'VEHICLENAME' => $row['VEHICLENAME'],
    ];
    echo json_encode($customerDetails);
} else {
    // If no customer is found, return an error
    $error = ['error' => 'Customer not found'];
    echo json_encode($error);
}

$stmt->close();
$conn->close();
?>

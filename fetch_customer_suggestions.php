<?php

include "connect.php";

$suggestions = array();
$customerName = $_POST['customer_name'];

// You need to customize this SQL query based on your table structure
$sql = "SELECT CUSTOMERNAME FROM customer_master WHERE CUSTOMERNAME LIKE '%$customerName%' LIMIT 10";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return the customer name suggestions as JSON
header('Content-Type: application/json');
echo json_encode($suggestions);
?>
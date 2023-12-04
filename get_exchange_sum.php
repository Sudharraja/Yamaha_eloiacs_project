<?php
include "connect.php"; // Include your database connection file

if (isset($_GET['customerCode'])) {
    // Customer code from the request
    $customerCode = $_GET['customerCode'];

    // Prepare and execute the SQL query to retrieve the total sum of exchange values
    $sql = "SELECT SUM(HDFC + IDFC + IBC + HDFCCA + HDRCC + INV + CREDIT) AS exchange_amount FROM daybook WHERE CUSTOMERCODE = ? AND `DIRECT/EX` = 'EXCHANGE'";

    // Use a prepared statement to avoid SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $customerCode);
    $stmt->execute();
    $stmt->bind_result($exchangeAmount);
    $stmt->fetch();
    $stmt->close();

    // Create an associative array to store the data
    $exchangeData = array('exchange_amount' => $exchangeAmount);

    // Convert the array to JSON and send it as the response
    header('Content-Type: application/json');
    echo json_encode($exchangeData);
} else {
    // Invalid request
    echo json_encode(array('error' => 'Invalid request.'));
}

// Close the database connection
$conn->close();
?>

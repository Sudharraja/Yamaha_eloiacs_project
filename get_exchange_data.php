<?php
include "connect.php";

if (isset($_GET['customerCode'])) {
    // Retrieve the customer code from the request
    $customerCode = $_GET['customerCode'];

    // Prepare a SQL query to retrieve exchange data
    $sql = "SELECT EXCHANGE, EXCHANGEDATE, RECEIVED, RECEIVEDDATE FROM project WHERE CUSTOMERCODE = '$customerCode'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the exchange data
        $row = $result->fetch_assoc();

        // Create an associative array to store the data
        $exchangeData = array(
            'exchange' => $row['EXCHANGE'],
            'exchange_date' => $row['EXCHANGEDATE'],
            'received' => $row['RECEIVED'],
            'received_date' => $row['RECEIVEDDATE']
        );

        // Convert the array to JSON and send it as the response
        header('Content-Type: application/json');
        echo json_encode($exchangeData);
    } else {
        // No data found for the provided customer code
        echo json_encode(array('error' => 'No data found for the customer code.'));
    }
} else {
    // Invalid request
    echo json_encode(array('error' => 'Invalid request.'));
}

// Close the database connection
$conn->close();
?>

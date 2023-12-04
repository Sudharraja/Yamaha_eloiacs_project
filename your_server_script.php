<?php
// Include your database connection script (e.g., "connect.php")
include "connect.php";

if (isset($_POST['sumcustomerCode'])) {
    // Retrieve the customer code from the POST request
    $customerCode = $_POST['sumcustomerCode'];

    // Prepare a SQL query to retrieve the On Road Price from your database table (replace table and column names as per your database structure)
    $sql = "SELECT On Road Price FROM product WHERE CUSTOMERCODE = '$customerCode'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the On Road Price from the result
        $row = $result->fetch_assoc();
        $onRoadPrice = $row['On Road Price'];

        // Create an associative array to store the data
        $response = array(
            'success' => true,
            'onRoadPrice' => $onRoadPrice
        );

        // Convert the array to JSON and send it as the response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // No data found for the provided customer code
        $response = array('success' => false, 'error' => 'No data found for the customer code.');
        echo json_encode($response);
    }
} else {
    // Invalid request
    $response = array('success' => false, 'error' => 'Invalid request.');
    echo json_encode($response);
}

// Close the database connection
$conn->close();
?>

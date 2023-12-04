<?php
include "connect.php";

if (isset($_GET['giftcustomercode'])) {
    // Retrieve the customer code from the request
    $giftcustomercode = $_GET['giftcustomercode']; // Note that it should be $_GET, not $_POST

    // Prepare a SQL query to retrieve gift data
    $sql = "SELECT BASICFITTINGS, PETROL, MECHANICCOMMISSION, VEHICLECOVER, EXTRAFITTING, ANYOTHER FROM project WHERE CUSTOMERCODE = '$giftcustomercode'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the gift data
        $row = $result->fetch_assoc();


        $giftBalance = $row['BASICFITTINGS'] + $row['PETROL'] + $row['MECHANICCOMMISSION'] + $row['VEHICLECOVER'] + $row['EXTRAFITTING'] + $row['ANYOTHER'];


        // Create an associative array to store the data
        $giftData = array(
            'basic_fit' => $row['BASICFITTINGS'],
            'petrol' => $row['PETROL'],
            'mechanic' => $row['MECHANICCOMMISSION'],
            'vehicle' => $row['VEHICLECOVER'],
            'extra_fit' => $row['EXTRAFITTING'],
            'anyother' => $row['ANYOTHER'],
            'gift_balance' => $giftBalance
        );

        // Convert the array to JSON and send it as the response
        header('Content-Type: application/json');
        echo json_encode($giftData);
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

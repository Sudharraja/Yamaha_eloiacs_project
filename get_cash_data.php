<?php
include "connect.php";

if (isset($_GET['cashcustomercode'])) {
    // Retrieve the customer code from the request
    $cashcustomercode = $_GET['cashcustomercode'];

    // Prepare a SQL query to retrieve cash offer data
    $sql = "SELECT ROADSIDEASSISTANCE, CUSTOMERSIDEINSURANCE, EXTENDEDWARRANTY, CASHDISCOUNT FROM project WHERE CUSTOMERCODE = '$cashcustomercode'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the cash offer data
        $row = $result->fetch_assoc();

        // Calculate the total balance
$totalBalance = $row['ROADSIDEASSISTANCE'] + $row['CUSTOMERSIDEINSURANCE'] + $row['EXTENDEDWARRANTY'] + $row['CASHDISCOUNT'];

        // Create an associative array to store the data
        $cashData = array(
            'road_side' => $row['ROADSIDEASSISTANCE'],
            'customer_side' => $row['CUSTOMERSIDEINSURANCE'],
            'extended_warrant' => $row['EXTENDEDWARRANTY'],
            'cash_discount' => $row['CASHDISCOUNT'],
            'total_balance' => $totalBalance
        );

        // Convert the array to JSON and send it as the response
        header('Content-Type: application/json');
        echo json_encode($cashData);
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

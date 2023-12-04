<?php
include "connect.php";

if (isset($_GET['customer_code'])) {
    $customerCode = $_GET['customer_code'];

    // Add a query to retrieve customer details based on the selected customer code
    $customerDetailsQuery = "SELECT CUSTOMERNAME, PHONE FROM `customer_master` WHERE CUSTOMERCODE = '$customerCode'";
    $customerDetailsResult = $conn->query($customerDetailsQuery);

    if ($customerDetailsResult->num_rows > 0) {
        $row = $customerDetailsResult->fetch_assoc();
        $customerDetails = array(
            'CUSTOMERNAME' => $row['CUSTOMERNAME'],
            'PHONE' => $row['PHONE']
        );
        echo json_encode($customerDetails);
    } else {
        echo json_encode(null);
    }
}

$conn->close();
?>

<?php
// Include your database connection code (replace with your database details)
include "connect.php";

// Check if the customer code is provided in the GET request
if (isset($_GET['customerCode'])) {
    // Retrieve the customer code from the GET request
    $customerCode = $_GET['customerCode'];

    // Create an SQL query to retrieve data from your database table (replace with your table name)
    $sql = "SELECT EXCESSAMOUNT AS excess, RTOCONFIRMATION AS rtoconfirm, FOLDERCLOSINGDATE AS folderclosedate, ACCOUNTCLOSINGDATE AS accountclosedate, STATUS AS status, REMARKS AS remarks FROM project WHERE CUSTOMERCODE = '$customerCode'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $data = $result->fetch_assoc();

        // Close the database connection
        $conn->close();

        // Return the data as a JSON response
        echo json_encode($data);
    } else {
        // No data found for the given customer code
        echo json_encode(array('error' => 'No data found'));
    }
} else {
    // Invalid request, no customer code provided
    echo json_encode(array('error' => 'Invalid request'));
}

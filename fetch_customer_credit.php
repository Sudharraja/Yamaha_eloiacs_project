<?php
include "connect.php"; // Include your database connection script

if (isset($_POST['customerName'])) {
    $customerName = $_POST['customerName'];

    // Prepare and execute a query to fetch the customer's credit
    $query = "SELECT CREDIT FROM daybook WHERE CUSTOMERNAME = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $customerName);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $customerCredit = $row['CREDIT'];
            echo $customerCredit; // Return the customer's credit as a response
        } else {
            echo "0.00"; // Return "0.00" as the default credit value if the customer name is not found
        }
    } else {
        echo "Error: " . mysqli_error($conn); // Handle query errors
    }
}
?>

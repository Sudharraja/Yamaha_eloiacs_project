<?php
include "connect.php";

if (isset($_GET['customerCode'])) {
    $customerCode = $_GET['customerCode'];

    $sql = "SELECT IPRECEIVABLE, IPRECEIVED, FINANCERECEIVABLE, FINANCERECEIVED FROM project WHERE CUSTOMERCODE = '$customerCode'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $financeData = [
            'ip_receivable' => $row['IPRECEIVABLE'],
            'ip_received' => $row['IPRECEIVED'],
            'finance_receivable' => $row['FINANCERECEIVABLE'],
            'finance_received' => $row['FINANCERECEIVED']
        ];

        header('Content-Type: application/json');
        echo json_encode($financeData);
    } else {
        echo json_encode(['error' => 'No finance data found.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}

$conn->close();
?>

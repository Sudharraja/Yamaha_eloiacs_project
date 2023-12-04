<?php
include "connect.php"; // Include your database connection code

if (isset($_GET['customerCode'])) {
    $customerCode = $_GET['customerCode'];
    
    $sql = "SELECT IPRECEIVABLE, IPRECEIVED, FINANCERECEIVABLE, FINANCERECEIVED, EXCHANGE, RECEIVED, STATUS, FILECLOSINGDATE, REMARKS FROM project WHERE CUSTOMERCODE = '$customerCode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $data = [
            'ip_receivable' => $row['IPRECEIVABLE'],
            'ip_received' => $row['IPRECEIVED'],
            'finance_receivable' => $row['FINANCERECEIVABLE'],
            'finance_received' => $row['FINANCERECEIVED'],
            'exchange_receivable' => $row['EXCHANGE'],
            'exchange_received' => $row['RECEIVED'],
            'status' => $row['STATUS'],
            'file_closing_date' => $row['FILECLOSINGDATE'],
            'remarks' => $row['REMARKS']
        ];

        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Data not found']);
    }

    $conn->close();
}
?>

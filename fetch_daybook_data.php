<?php
include "connect.php";

$customerCode = $_POST['customerCode'];
$customerName = $_POST['customerName'];
$paymentType = $_POST['paymentType'];

$sql = "SELECT * FROM daybook WHERE CUSTOMERCODE = '$customerCode' AND CUSTOMERNAME = '$customerName'";

if ($paymentType === "CASH" && $paymentType === "FINANCE") {
    $sql .= " AND MODE IN ('Cash', 'Finance', 'G Pay', 'DD / Check', 'Neft')";
    // $sql .= " AND MODE = 'Cash'";
}
//  elseif ($paymentType === "FINANCE") {
//     $sql .= " AND MODE = 'Finance'";
//     // $sql .= " AND MODE IN ('Finance', 'G Pay', 'DD / Check', 'Neft')";
// }






$result = $conn->query($sql);
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>

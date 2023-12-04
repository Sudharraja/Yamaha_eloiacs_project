<?php
include('connect.php');

if (isset($_POST['export']))
{
    // Construct the filter query
    $formattedDate = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT); // Format: yyyy-mm
    $query = "SELECT * FROM `daybook` WHERE DATE_FORMAT(STR_TO_DATE(DATE, '%d-%m-%Y'), '%Y-%m') = '$formattedDate'";
} else {
    // Fetch all data if no filter is applied
    $query = "SELECT * FROM `daybook`";
}

$result = $conn->query($query);

// Create a temporary file to store the CSV data
$csvFile = fopen('php://temp', 'w');

// Write the CSV header
$header = ['DATE', 'TYPES', 'CUSTOMER NAME', 'RECEIPT NUMBER', 'VEHICLE NAME', 'TYPES OF SERVICES', 'MODE OF PAYMENT', 'PAYMENT REFERENCE NUMBER',  'CREDIT AMOUNT','DEBIT AMOUNT', 'CLOSING BALANCE'];
fputcsv($csvFile, $header);

// Fetch and write the data rows to the CSV file
while ($row = $result->fetch_assoc()) {
    $data = '';
    $data = [
    
        $row['DATE'],
        $row['TYPES'],
        $row['CUSTOMERNAME'],
        $row['RECEIPT'],
        $row['VEHICLENAME'],
        $row['SERVICE'],

       
        $row['MODE'],
        $row['REFERENCE'],
        $row['CREDIT'],
        
    
        $row['DEBIT'],
        $row['CLOSINGBALANCE']
    ];
    fputcsv($csvFile, $data);
}

// Set the CSV file headers for download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="daybook.csv"');

// Seek to the beginning of the file
rewind($csvFile);

// Output the CSV file contents
fpassthru($csvFile);

// Close the file handle
fclose($csvFile);
?>

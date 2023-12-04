<?php
session_start(); // Resume the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to index.php
    header("Location: index.php");
    exit; // Terminate the script after redirection
}

if ($_SESSION['status'] !== 'Admin1') {
    // Display a message and redirect after 5 seconds
    echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh; text-align: center;">';
    echo '<p style="font-size: 18px;">You need permission to access this page. You will be redirected in 5 seconds.</p>';
    echo '</div>';
    echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 5000);</script>';
    exit; // Terminate the script
}
?>

<?php
include('yamaha_conn.php');

if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];

    // Construct the filter query
    $formattedDate = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT); // Format: yyyy-mm
    $query = "SELECT * FROM `yamaha_salary_data` WHERE DATE_FORMAT(STR_TO_DATE(sSALARY_DATE, '%d-%m-%Y'), '%Y-%m') = '$formattedDate'";
} else {
    // Fetch all data if no filter is applied
    $query = "SELECT * FROM `yamaha_salary_data`";
}

$result = $conn->query($query);

// Create a temporary file to store the CSV data
$csvFile = fopen('php://temp', 'w');

// Write the CSV header
$header = ['EMP Code', 'Employee name','EPF No', 'ESI No', 'Basic',  'Working Days','Salary',   'EPF Basic', 'EPF-12%', 'EPF-8.33%','EPF-3.67%', 'ESI-0.75%','ESI-3.25%'];
fputcsv($csvFile, $header);





// Fetch and write the data rows to the CSV file
while ($row = $result->fetch_assoc()) {
    $data = '';
    $data = [
        $row['sCODE'],
        $row['sNAME'],
        $row['sEPF_NUMBER'],
        $row['sESI_NUMBER'],
        $row['sBASIC'], 
        $row['sFINALWORKINGDAYS'],
        $row['sSALARY'],
        $row['sEPFBASIC'],
        $row['sEPF12'],
        $row['sEMP_COMP833'],
        $row['sEMP_COMP367'],
        $row['sESI075'],
        $row['sESI325'],
    
       

        
     
    ];
    fputcsv($csvFile, $data);
}
//EMP Code  Employee name   Basic   Working Days    EPF Basic   EPF 12% EPF-8.33%   EPF-3.67%%  ESI 0.75%   ESI 0.75%   

// Set the CSV file headers for download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="ESI/EPF.csv"');

// Seek to the beginning of the file
rewind($csvFile);

// Output the CSV file contents
fpassthru($csvFile);

// Close the file handle
fclose($csvFile);
?>
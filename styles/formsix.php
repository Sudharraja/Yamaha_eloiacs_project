<?php
session_start(); // Resume the session
include "connect.php";
// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to login.php
    header("Location: login.php");
    exit; // Terminate the script after redirection
}

// Include your database connection code here (e.g., include "connect.php")

// Get the username from the session
$username = $_SESSION['username'];

// Prepare and execute a query to fetch the user's place and status
$query = "SELECT `place`, `status` FROM `user` WHERE `username` = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // Get the user's place and status
    $userPlace = $row['place'];
    $userStatus = $row['status'];
} else {
    // Handle the case where user data couldn't be retrieved
    $userPlace = "Unknown";
    $userStatus = "Unknown";
}

// Rest of your HTML and PHP code for the form.php page
?>
 
<?php 
include "connect.php";

if(isset($_REQUEST['save'])){

$invoicedate = $_POST["invoice_date"];
$chassisno = $_POST["chassis_no"];
$vehiclemodel = $_POST["vehicle_model"];
$customername = $_POST["customer_name"];
$paymenttype = $_POST["payment_type"];
$branchesdealers = $_POST["branches_dealers"];
$customercode = $_POST["customer_code"];
$paymentmode = $_POST["payment_mode"];


  $sql = "INSERT INTO `project` (INVOICEDATE, CHASSISNO, VEHICLEMODEL, CUSTOMERNAME, PAYMENTTYPE, BRANCHESDEALERS, CUSTOMERCODE, PAYMENTMODE)
  VALUES ('$invoicedate', '$chassisno', '$vehiclemodel', '$customername', '$paymenttype', '$branchesdealers', '$customercode', '$paymentmode')";  

if ($conn->query($sql) === TRUE) {
  header("Location: savesix.php");
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
                                                
  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Payment Entry</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<style>
    body {
      text-align: center;
    }
    
    .container-box {
      width: 906px;
      margin-left:15%;
height: max-content;
flex-shrink: 0;
border-radius: 35px;
background: rgba(224, 225, 221, 0.60);
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
margin-bottom:20px;
    }

.form{
  margin-left:100px;
  margin-top:30px;
  padding:50px;
}

    .form-group .form-control {
      flex: 2;
      border-radius: 5px;
      border: 0.2px solid #0C00A3;
      background: #FFF;
      box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
      height: 42px;
      
      width:300px;
      margin:5px;
    }
    label{
      
      margin:5px;
    }
     

.col-4{
  width: 45.333333%;
}

    
    h3 {
      margin-left: 107px;
    }
    
    label {
      float: left;
    }
    
    a {
      color: white;
      text-decoration: none;
    }
    
    h4 {
      margin-left: 255px;
    }
    .button1{
      width: 127px;
height: 34px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color:#151CA7;
margin-right:800px;
font-weight:bold;
border:none;
border-radius:5px;
margin-top:20px;
color:white;

    }
    .button1:hover{

background-color:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
}
.button1:hover a{
  color: #0C00A3;
}

    .button2 {
      width: 126px;
height: 44px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background: linear-gradient(90deg, #1C66DC 0%, #48C1BD 100%);

color:white;
margin-top: 60px;
text-align:center;
border-radius:50px;
margin-right:10%;

    }

    .button2:hover{
  color:#0C00A3;
  background:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
  
}
 .import{
  margin-left: 30%;
    margin-top: -40px;
}
button.view {
    padding: 5px 16px;
    border-radius: 5px;
  background-color: #0300c9;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    border:none;
    top: 21px;
    right: 64.5%;
      position: absolute;
  }

</style>
</head>
<body>

<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_REQUEST['import-excel'])) {
    $file = $_FILES['excel-file']['tmp_name'];
    $extension = pathinfo($_FILES['excel-file']['name'], PATHINFO_EXTENSION);
    
    if ($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') {
        $obj = PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        $data = $obj->getActiveSheet()->toArray();

        // Remove the first row (headers) from the data
        array_shift($data);

        foreach ($data as $row) {
            $name = $row['0'];
            $dob = $row['1'];
            $email = $row['2'];
            $mobile = $row['3'];
            $pay = $row['4'];
            $branch = $row['5'];

            $insert_query = mysqli_query($conn, "INSERT INTO project (INVOICEDATE, CHASSISNO, VEHICLEMODEL, CUSTOMERNAME, PAYMENTTYPE, BRANCHESDEALERS) VALUES ('$name', '$dob', '$email', '$mobile', '$pay', '$branch')");

            if ($insert_query) {
                $msg = "File Imported Successfully!";
            } else {
                $msg = "Not Imported!";
            }
        }
    } else {
        $msg = "Invalid File!";
    }
    $conn->close();
}
?>

<button type="button" class="button1"><a href="logout.php">Logout</a></button>
<button type="text" class="view">
            <a href="savesix.php">View Details</a>
          </button>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <input type="file" name="excel-file" class="import" name="import_file" id="">
        <input type="submit" class="btn btn-success" value="Import" name="import-excel">
    </div>
    <p class="error"><?php if(!empty($msg)){echo $msg;}?></p>

</form>
  
<div class="container-box">
 <form action="" method="post" class="form" enctype="multipart/form-data">
  

  <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Invoice Date:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Chassis No:</label>

              </DIV></DIV>  </DIV> 
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="date" name="invoice_date" max="<?= date('Y-m-d') ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="chassis_no" required>

              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Vehicle Model:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Customer Name:</label>

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="vehicle_model" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

          <input class="form-control" type="text" name="customer_name" required>

              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Payment Type:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Branches/Sub Dlrs:</label>
            

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="payment_type" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

          <select class="form-control" name="branches_dealers" required>
        <option value="">Select a Branch/Sub Dlrs</option>
        
        <option>Karungal</option>
        <option>Puthukadai</option>
        <option>Pammam</option>
        <option>Kuzhithurai</option>
        <option>M M Motors</option>
        <option>Triumph Motors</option>
        <option>Oliver Motors</option>
      </select>
              </DIV></DIV></DIV>

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label for="">Customer Code</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="">Payment Mode</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <input type="text" class="form-control" name="customer_code" id="customer_code" required>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <select class="form-control" name="payment_mode" id="payment_mode">
                      <option value="">Select Payment Mode</option>
                      <option value="CASH">CASH</option>
                      <option value="FINANCE">FINANCE</option>
                    </select>
                  </div>
                </div>
              </div>


              <div class="form-group mt-4">
        <input type="Submit" value="SAVE" class="button2" name="save">
    </div>
</form>


    
</div>
</body>
</html>

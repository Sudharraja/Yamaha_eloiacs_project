

<?php 
include "connect.php";

if(isset($_REQUEST['save'])){

    $date = $_POST["date"];
    $customercode = $_POST["customer_code"];
    $customername = $_POST["customer_name"];
    $add1 = $_POST["add1"];
    $add2 = $_POST["add2"];
    $phone = $_POST["phone"];

    $vehiclecode = $_POST["vehicle_code"];
    $vehiclename = $_POST["vehicle_name"];
    $financiercode = $_POST["financier_code"];
    $financiername = $_POST["financier_name"];  
    $deleted = 0;  
    
      $sql = "INSERT INTO `customer_master` (DATE, CUSTOMERCODE, CUSTOMERNAME, ADD1, ADD2, PHONE, VEHICLECODE, VEHICLENAME, FCODE, FNAME, deleted)
      VALUES ('$date', '$customercode', '$customername', '$add1', '$add2', '$phone', '$vehiclecode', '$vehiclename', '$financiercode', '$financiername', '$deleted')";
    
if ($conn->query($sql) === TRUE) {
  header("Location: cmsave.php");
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
      background: linear-gradient(235deg, #46B8BC 40.82%, #1418A6 104.25%);
    }
    
    .container-box {
      margin-top: 25px;
      width: 1000px;
height: max-content;
    margin-left: 15%;
    
flex-shrink: 0;
background: white;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 1px -1px 4px 0px rgba(0, 0, 0, 0.25);
}

.form{
  margin-left:100px;
  margin-top:  -59px;
  padding:50px;
}

    .form-group .form-control {
      flex: 2;
      border-radius: 5px;
      border: 0.2px solid #0000009e;
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
height: 51px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color:#00cbaf;
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
    width: 155px;
    height: 44px;
    flex-shrink: 0;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background: linear-gradient(90deg, #1C66DC 0%, #48C1BD 100%);
    color: white;
    margin-top: 22px;
    text-align: center;
    border-radius: 50px;
    margin-right: 10%;
}

    .button2:hover{
  color:#0C00A3;
  background:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
  
}
 .import{
  margin-left: 30%;
    margin-top: 35px;
}
button.view {
    padding: 5px 16px;
    border-radius: 5px;
  background-color: #00c9b6;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    border:none;
    top: 112px;
    right: 72%;
    margin-bottom: 18px;
    margin-top: 11px;
    margin-left: -105rem;
  }
  .btn-success {
    color: #fff;
    background-color: #00d7d7;
    border-color: #00d7d7;
}
.button {
    width: 127px;
    height: 34px;
    flex-shrink: 0;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background-color: #00cbaf;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    margin-top: -52px;
    color: white;
    margin-left: 72%;
}


</style>
</head>
<body>



<?php
require 'vendor/autoload.php';
include "connect.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$msg = ""; // Initialize the message variable

if (isset($_POST['import-excel'])) {
    // Check if a file was uploaded
    if (isset($_FILES['excel-file'])) {
        $file = $_FILES['excel-file']['tmp_name'];
        $extension = pathinfo($_FILES['excel-file']['name'], PATHINFO_EXTENSION);

        if ($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') {
            // Load the Excel file
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
            $worksheet = $spreadsheet->getActiveSheet();
            $data = $worksheet->toArray();

            // Remove the first row (headers) from the data
            array_shift($data);

            // Database connection (update with your own credentials)
            $conn = mysqli_connect('localhost', 'root', '', 'employees');

            if (!$conn) {
                die("Database connection failed: " . mysqli_connect_error());
            }
            $deleted = 0;

            // Prepared statement to insert data into the 'customer_master' table
            $stmt = $conn->prepare("INSERT INTO customer_master (DATE, CUSTOMERCODE, CUSTOMERNAME, ADD1, ADD2, PHONE, VEHICLECODE, VEHICLENAME, deleted) VALUES (?, ?, ?, ?, ?, ?, ?, ?, $deleted)");

            // Bind parameters
            $stmt->bind_param("ssssssss", $date, $customercode, $customername, $add1, $add2, $phone, $vehiclecode, $vehiclename);

            foreach ($data as $row) {
                $date = date('Y-m-d', strtotime($row['0']));
                $customercode = $row[1];
                $customername = $row[2];
                $add1 = $row[3];
                $add2 = $row[4];
                $phone = $row[5];
                $vehiclecode = $row[6];
                $vehiclename = $row[7];
                

                if ($stmt->execute()) {
                    $msg = "File Imported Successfully!";
                } else {
                    $msg = "Error: " . $stmt->error;
                    break; // Exit the loop on the first error
                }
            }

            $stmt->close();
            $conn->close();
        } else {
            $msg = "Invalid File!";
        }
    } else {
        $msg = "No file uploaded.";
    }
    // JavaScript alert to display the message
    echo '<script>alert("' . $msg . '");</script>';
}
?>

<div class="row">
<?php
include "nav2.php";
?>



<div class="container-box">

          

  
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<!-- <input type="file" name="excel-file" class="import" name="import_file" id="fileInput">
<input type="submit" class="btn btn-success" value="Import" name="import-excel"> -->



<label for="file-input" class="btn btn-success" style="margin-left: 52rem;">
    <span class="import-icon"></span>Import
</label>
<input type="file" name="excel-file" class="import" id="file-input" style="display: none;">
 
<input type="submit" class="btn btn-primary" id="upload-button" value="Upload" name="import-excel" style="display: none;">

</div>


<button type="text" class="view">
            <a href="cmsave.php">View Details</a>
          </button>
<p class="error"><?php if(!empty($msg)){echo $msg;}?></p>

</form>
 <form action="" method="post" class="form" enctype="multipart/form-data">



 <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Date</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Customer Code</label>

              </DIV></DIV>  </DIV> 
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="date" name="date" max="<?= date('Y-m-d') ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
     
          <input class="form-control" type="text" name="customer_code" required>
              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Customer Name</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Address 1</label>

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="customer_name" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="add1" required>
              </DIV></DIV> </DIV>

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Address 2</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Phone Number</label>

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="add2" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="phone" required>
              </DIV></DIV> </DIV>

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Vehicle Code</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Vehicle Name</label>

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="vehicle_code" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="vehicle_name" required>
              </DIV></DIV> </DIV>

              
              <div class="form-group mt-4">
        <input type="Submit" value="SAVE" class="button2" name="save">
    </div>
</form>
</div>
</body>
<script>
    // JavaScript to hide file input after selecting a file
    document.getElementById('fileInput').addEventListener('change', function () {
        this.style.display = 'none';
    });
</script>
<script>
 document.addEventListener("DOMContentLoaded", function() {
        const fileInput = document.getElementById("file-input");
        const uploadButton = document.getElementById("upload-button");

        fileInput.addEventListener("change", function() {
            // Show the "Upload" button when a file is selected
            if (fileInput.files.length > 0) {
                uploadButton.style.display = "inline-block";
            } else {
                uploadButton.style.display = "none";
            }
        });
    });
</script>
</html>

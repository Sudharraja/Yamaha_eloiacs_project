<?php
include "nav2.php";
?>

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
    
      $sql = "INSERT INTO `customer_master` (DATE, CUSTOMERCODE, CUSTOMERNAME, ADD1, ADD2, PHONE, VEHICLECODE, VEHICLENAME, FCODE, FNAME)
      VALUES ('$date', '$customercode', '$customername', '$add1', '$add2', '$phone', '$vehiclecode', '$vehiclename', '$financiercode', '$financiername')";
    
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
    }
    
    .container-box {
      margin-top: 25px;
        width: 880px;
    margin-left: 15%;
    height: 678px;
flex-shrink: 0;
background: rgb(255 255 255 / 59%);
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 1px -1px 4px 0px rgba(0, 0, 0, 0.25);
}

.form{
  margin-left:100px;
  margin-top:  0px;
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
    top: 160px;
    right: 65%;
      position: absolute;
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
.nav {
    background-color: #45dfdf;
    height: 15vh;
}
.nav {
    display: flex;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
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
            $date = $row['0'];
            $customercode = $row['1'];
            $customername = $row['2'];
            $add1 = $row['3'];
            $add2 = $row['4'];
            $phone = $row['5'];
            $vehiclecode = $row['6'];
            $vehiclename = $row['7'];
            $financiercode = $row['8'];
            $financiername = $row['9'];

            $insert_query = mysqli_query($conn, "INSERT INTO customer_master (DATE, CUSTOMERCODE, CUSTOMERNAME, ADD1, ADD2, PHONE, VEHICLECODE, VEHICLENAME, FCODE, FNAME) VALUES ('$date', '$customercode', '$customername', '$add1', '$add2', '$phone', '$vehiclecode', '$vehiclename', '$financiercode', '$financiername')");

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

  
<div class="container-box">

          

  
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <input type="file" name="excel-file" class="import" name="import_file" id="">
    <input type="submit" class="btn btn-success" value="Import" name="import-excel">
</div>
<p class="error"><?php if(!empty($msg)){echo $msg;}?></p>

</form>
 <form action="" method="post" class="form" enctype="multipart/form-data">
 <button type="text" class="view">
            <a href="cmsave.php">View Details</a>
          </button>


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

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Financier Code</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Financier Name</label>

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="financier_code" id="financier_code" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="financier_name" id="financier_name" required>
              </DIV></DIV> </DIV>

              <div class="form-group mt-4">
        <input type="Submit" value="SAVE" class="button2" name="save">
    </div>
</form>
</div>
</body>
</html>

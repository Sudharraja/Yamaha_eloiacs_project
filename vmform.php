<?php 
include "connect.php";

if (isset($_REQUEST['save'])) {

  $modelcode = $_POST["model_code"];
  $modelname = $_POST["model_name"];
  $showroom = $_POST["showroom"];
  $it = $_POST["it"];
  $insurance = $_POST["insurance"];
  $accessories = $_POST["accessories"];
  $protection = $_POST["protection"];
  $others = $_POST["others"];
  $orp = $_POST["orp"];

  $sql = "INSERT INTO `project` (MODELCODE, MODELNAME, SHOWROOM, IT, INSURANCE, ACCESSORIES,   PROTECTION, OTHERS, ORP)
  VALUES ('$modelcode', '$modelname', '$showroom', '$it', '$insurance', '$accessories','$protection', '$others','$orp')";

if ($conn->query($sql) === TRUE) {
  header("Location: vmsave.php");
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
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <LINK HREF="" REL=" "css>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    body {
      text-align: center;
    }

    .container-box {
      width: 906px;
      padding-top: 19px;
      margin-left:15%;
      margin-top:4%;
height: 580px;
flex-shrink: 0;
border-radius: 35px;
background: rgba(224, 225, 221, 0.60);
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
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
      margin-left: 96px;
    }
  
.col-4{
  width: 45.333333%;
}
   
    h3 {
      margin-left: 107px;
    }
    
    label {
      float: left;
      margin-left: 99px;

    }
    
    a {
      color: white;
      text-decoration: none;
    }
    
    h4 {
      margin-left: 255px;
    }

    .button1{
      width: 75px;
height: 34px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color: #151CA7;
font-weight: bold;
border: none;
border-radius: 5px;
margin-top:20px;
color:white;

    }
    .button1:hover{
background-color:white;
  border:1px solid #151CA7;
}

.button1:hover a{
  color: #0C00A3;
}

    .button2 {
      width: 126px;
height: 44px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color: #0000a5;
color:white;
margin-top: 16px;
text-align:center;border-radius:50px;

    }

    .button2:hover{
  color:#0C00A3;
  background:white;
  font-weight:bold;

  border:1px solid #0000a5;
  
}

.view {
    padding: 5px 16px;
    border-radius: 5px;
  background-color: #0000a5;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    border:none;
    margin-left: 96px;
 
  }
  .sm {
    padding: 0.25rem 0.5rem;
    font-size: .875rem;
    border-radius: 0.2rem;
    margin-bottom: 4px;
    background-color:#3434ff;
    color:white;
    
}
th{
  color:orange;
}

.bbm {
  margin-right: 70%;
    margin-top: -16px;
    margin-bottom: 35px;
       
}

</style>
</head>
<body>
<div class="container-box">
<div class="row">
    <div class="col">
    <div class="bbm">

<button type="button" class="view"><a href="vmsave.php">View List</a></button>

<button type="button" class="button1">
            <a href="logout.php">Logout</a>
          </button>
</div>
</div>

<form action="" method="post" >
  <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Model Code:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Model Name:</label>

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="model_code" id="modelcode" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

          <input class="form-control" type="text" name="model_name" id="modelname" required>

              </DIV></DIV> </DIV>

             <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Ex.Showroom:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>LT/RT:</label>

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="showroom" id="showroom" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="it" id="it" required>
              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Insurance:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Accessories:</label>            
              </DIV></DIV>  </DIV>

              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="insurance" id="insurance" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

          <input class="form-control" type="text" name="accessories" id="accessories" required>
              </DIV></DIV> </DIV>

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Protection plus:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Others:</label>

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="protection" id="protection"  required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="others" id="others" required>
              </DIV></DIV> </DIV>

         <div class="row">
              <div class="col-4">
          <div class="form-group">
            <label>On Road Price:</label>
            </DIV></DIV> </DIV> 
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="orp" required>
  </DIV></DIV> </DIV> 

  <div class="form-group mt-4">
        <input  type="submit" value="SAVE" class="button2" name="save">
    </div>
</html>
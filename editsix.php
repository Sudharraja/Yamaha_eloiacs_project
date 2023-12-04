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
include_once 'connect.php';

// Check if the form is submitted
if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $invoicedate = $_POST["invoice_date"];
    $chassisno = $_POST["chassis_no"];
    $vehiclemodel = $_POST["vehicle_model"];
    $customername = $_POST["customer_name"];
    $paymenttype = $_POST["payment_type"];
    $branchesdealers = $_POST["branches_dealers"];

    $query="UPDATE project SET  
        INVOICEDATE = '$invoicedate',
        CHASSISNO = '$chassisno',
        VEHICLEMODEL = '$vehiclemodel',
        CUSTOMERNAME = '$customername',
        PAYMENTTYPE = '$paymenttype',
        BRANCHESDEALERS = '$branchesdealers'
    WHERE ID='$id'";

    $query_run=mysqli_query($conn,$query);

    if($query_run) {
        ?>
        <script>
            alert("Successfully Updated");
            window.location.href='savesix.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Not Updated");
            window.location.href='savesix.php?error';
        </script>
        <?php
    }
}

$result=mysqli_query($conn,"SELECT * FROM project where id='".$_GET['id']."'");
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Employee Registration Form</title>
   <link rel="stylesheet" href="payslip.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
  /* .container111{
    width: 877px;
height:max-content;
flex-shrink: 0;
margin-left:20%;
background: #FFF;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 6px -5px 4px 0px rgba(0, 0, 0, 0.25);
  } */
.container1 {
    width: 877px;
height: max-content;
margin-left:20%;
flex-shrink: 0;
background: #FFF;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 6px -5px 4px 0px rgba(0, 0, 0, 0.25);
    
}
.label1{
  float:left;
}

.form-check-label{
  float:left;
}
button.btn.btn-danger {
    font-weight: 700;
    padding: 6px 18px;
    margin-top: -12px;
}
h1{

  color:orangered;
  margin-top: 11px;
  margin-bottom:30px;
}
table {
    width: 100%;
    font-size: 120%;
    font-family: serif;
    text-align: left;
    margin: 30px auto; /* Center the table */
    border-collapse: collapse;
}

table tr {
    font-size: 80%;
}

td {
    padding: 8px; /* Add some padding to the table cells */
}

th {
    background-color: #f2f2f2; /* Add background color to the table header */
}
.scroll-container {
        width: 100%; /* Set the desired width for the container */
        height:100%;/* Set the desired height for the container */
        overflow: auto;
        flex-direction: column;
      
}
.btn2{
  margin-left:5px;
  
    font-weight: 500;
    font-size: 18px;
}

.scroll-container::-webkit-scrollbar {
    display: none; 
  }
  .edit-button-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }
  
  button.btn-success{
    font-weight: bold;
    font-size: 18px;
    padding: 6px 18px;
}
button.btn-success:hover{
    background-color: white;
    color: green;
}
input{
  margin-top: 2.8px;
}
.row{
  margin-top:9px;
}
button#edit {
  margin-top:5%;
    margin-left: 40%;
}

.form{
  margin-left:160px;

  padding:50px;
}
.hide{
  display:none;
}
.h1{
  color: #1E38AB;
font-family: Inter;
font-size: 25px;
font-style: normal;
text-align:center;
font-weight: 700;
line-height: normal;
letter-spacing: 0.75px;
margin-bottom:-40px;
margin-top:20px;
}
.btn-success{

      width: 126px;
height: 44px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background: linear-gradient(90deg, #1C66DC 0%, #48C1BD 100%);

color:white;
margin-top: 60px;
text-align:center;
border-radius:50px;
margin-right:70%;

    }

    .btn-success:hover{
  color:#0C00A3;
  background:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
}
.button1{
      width: 127px;
height: 34px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color:#151CA7;
margin-left:1020px;
font-weight:bold;
    border-radius:5px;
margin-top:20px;
margin-bottom:20px;
border:none;

color:white;
    }
    .button1:hover{

background-color:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
}
.button1:hover a{
  color: #0C00A3;

}
a{
  text-decoration:none;
  color:white;
}

</style>
<body>
<div class="container111">
  
<button class="button1"><a class="bbtn" href="savesix.php">Back</a></button>

  <div class="bg-color">

          <div class="container1">
            <div class="scroll-container">
      
          <h1 class="h1">EDIT FORM </h1>
          
<form action="" method="post" class="form">

    <div class="row">
        <div class="col-4">
          <div class="hide">

         
          <div class="form-group">
            <label>ID:</label> </DIV></DIV></DIV> </div>
 
              <div class="row">
        <div class="col-4">
        <div class="hide">
          <div class="form-group">
          <input class="form-control" type="text" name="id" value="<?php echo $row["ID"]; ?>" required>
  </DIV></DIV></DIV></div>
  





    <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Invoice Date:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Chassis No:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="date" name="invoice_date" value="<?php echo $row["INVOICEDATE"]; ?>" max="<?= date('Y-m-d') ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="chassis_no" value="<?php echo $row["CHASSISNO"]; ?>" required >
              </DIV></DIV> </DIV>



              


              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Vehicle Model:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Customer Name:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="vehicle_model" value="<?php echo $row["VEHICLEMODEL"]; ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="customer_name" value="<?php echo $row["CUSTOMERNAME"]; ?>" required>
              </DIV></DIV> </DIV>





              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Payment Type:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Branches/Sub Dealers:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="payment_type" value="<?php echo $row["PAYMENTTYPE"]; ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <select class="form-control" name="branches_dealers" required>
  <option value="">Select a Branch/Sub Dealer</option>
  <option <?php if ($row["BRANCHESDEALERS"] == "Karungal") echo "selected"; ?>>Karungal</option>
  <option <?php if ($row["BRANCHESDEALERS"] == "Puthukadai") echo "selected"; ?>>Puthukadai</option>
  <option <?php if ($row["BRANCHESDEALERS"] == "Pammam") echo "selected"; ?>>Pammam</option>
  <option <?php if ($row["BRANCHESDEALERS"] == "Kuzhithurai") echo "selected"; ?>>Kuzhithurai</option>
  <option <?php if ($row["BRANCHESDEALERS"] == "M M Motors") echo "selected"; ?>>M M Motors</option>
  <option <?php if ($row["BRANCHESDEALERS"] == "Triumph Motors") echo "selected"; ?>>Triumph Motors</option>
  <option <?php if ($row["BRANCHESDEALERS"] == "Oliver Motors") echo "selected"; ?>>Oliver Motors</option>
</select>              </DIV></DIV> </DIV>


                
                <div class="edit-button-container">
        <button class="btn btn-success" type="submit" id="edit" name="edit">UPDATE</button>
      </div>
</form>
</div>
      </div>
    </div>   
    <div>                                                                                                                                           
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


</body>
</html>
  
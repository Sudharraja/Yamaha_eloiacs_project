
<?php
include_once 'connect.php';

// Check if the form is submitted
if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $date = $_POST["date"];
    $types = $_POST["types"];
    $customername = $_POST["customer_name"];
    $receipt = $_POST["receipt"];
    $vehiclename = $_POST["vehicle_name"];
    $service = $_POST["service"];

    $mode = $_POST["mode"];
    $reference = $_POST["reference"];
    $credit = $_POST["credit"];
    $debit = $_POST["debit"];
    $closebal = $_POST["closebal"];

    $query="UPDATE daybook SET  
        DATE = '$date',
        TYPES = '$types',
        CUSTOMERNAME = '$customername',
        RECEIPT = '$receipt',
        VEHICLENAME = '$vehiclename',
        SERVICE = '$service',

        MODE = '$mode',
        REFERENCE = '$reference',
        CREDIT = '$credit',
        DEBIT = '$debit',
        CLOSINGBALANCE = '$closebal'
    WHERE ID='$id'";

    $query_run=mysqli_query($conn,$query);

    if($query_run) {
        ?>
        <script>
            alert("Successfully Updated");
            window.location.href='daybook_save.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Not Updated");
            window.location.href='daybook_save.php?error';
        </script>
        <?php
    }
}

$result=mysqli_query($conn,"SELECT * FROM daybook where id='".$_GET['id']."'");
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Employee Registration Form</title>
   <link rel="stylesheet" href="payslip.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
  body {
      width: 1500px;
height: 890px;
flex-shrink: 0;
      background: linear-gradient(180deg, #009DFF 0%, #4ED3BF 100%);
    }
.container1 {
  margin-top: 6.5rem;
  /* margin-top: 0px; */
    width: 877px;
height: max-content;
margin-left:3%;
flex-shrink: 0;
background: #FFF;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 6px -5px 4px 0px rgba(0, 0, 0, 0.25);
    
}
.label1{
  float:left;
  margin-left: -17px;
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
label {
    margin-left: -15px;
    display: inline-block;
}
.form-control {
    margin-left: -17px;
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.form{
  margin-left:160px;

  padding:50px;
}
.hide{
  display:none;
}
/* .h1{
  color: #1E38AB;
font-family: Inter;
font-size: 23px;
font-style: normal;
text-align:center;
font-weight: 700;
line-height: normal;
letter-spacing: 0.75px;
margin-bottom:-40px;
margin-top:20px;
} */
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

a{
  text-decoration:none;
  color:black;
}
.opening-balance-label {
    position: absolute;
    top: 23%;
    right: 24%;
    font-weight: bold;
    color: #333;
}
.back-link {
  text-decoration: none;
  font-size: 24px;
  margin-bottom: 20px;
  display: inline-block;
  color: #0d6efd;
}

.back-link i {
  margin-right: 5px; /* Add some spacing between the icon and the text */
  margin-bottom: 20px;
  margin-left: 80px;
}

.fa-arrow-left{
    margin-left: -60px;
    color:#03d2f3;
}
.back-link {
        text-decoration: none;
        font-size: 24px;
        margin-bottom: 20px;
        display: inline-block;
        color: #0d6efd;
        position: relative; /* Add this to make the position relative */
    }

    .back-link i {
        margin-right: 5px;
        margin-bottom: 20px;
        position: absolute; /* Add this to position the icon absolutely */
        left: -25px; /* Adjust the left position as needed */
        top: 50%; /* Center vertically */
        transform: translateY(-50%); /* Center vertically */
        color: #0d6efd;
    }
    i.fas.fa-arrow-left {
    position: absolute;
    margin-top: -82px;
    color: white;
    margin-left: -147px;
}

</style>
<body>


<div class="row">
  
<?php
include "nav1.php";
?>
</div>



<div class="container111">
<div class="container">
    <a href="daybook_save.php" >
                <i class="fas fa-arrow-left" class="fas fa-search" style="font-size:26px; cursor: pointer;"></i> </a>
<!-- <button class="button1"><a class="bbtn" href="daybook_save.php">Back</a></button> -->

  <div class="bg-color">

          <div class="container1">
          
            <div class="scroll-container">

          
<form action="" method="post" class="form">

    <div class="row">
        <div class="col-5">
          <div class="hide">

         
          <div class="form-group">
            <label>ID:</label> </DIV></DIV></DIV> </div>
 
              <div class="row">
        <div class="col-5">
        <div class="hide">
          <div class="form-group">
          <input class="form-control" type="text" name="id" value="<?php echo $row["ID"]; ?>" required>
  </DIV></DIV></DIV></div>
  





    <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label>Date</label> </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
            <label>Types</label>
              </DIV></DIV></DIV>
              <div class="row">
        <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="date" name="date" value="<?php echo $row["DATE"]; ?>" max="<?= date('Y-m-d') ?>" required>
  </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="types" value="<?php echo $row["TYPES"]; ?>" required >
              </DIV></DIV></DIV>

              <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label>Customer Name</label> </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
            <label>Receipt Number</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="customer_name" value="<?php echo $row["CUSTOMERNAME"]; ?>" required>
  </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="receipt" value="<?php echo $row["RECEIPT"]; ?>" required>
              </DIV></DIV> </DIV>



              <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label>Vehicle Name</label> </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
            <label>Types of services</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="vehicle_name" value="<?php echo $row["VEHICLENAME"]; ?>" required>
  </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="service" value="<?php echo $row["SERVICE"]; ?>" required>
              </DIV></DIV> </DIV>



              <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label>Mode of Payment</label> </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
            <label>Payment Ref. Number</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="mode" value="<?php echo $row["MODE"]; ?>" required>
  </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="reference" value="<?php echo $row["REFERENCE"]; ?>" required>
              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label>Credit Amount</label> </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
            <label>Debit Amount</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="credit" id="credit" value="<?php echo $row["CREDIT"]; ?>" required>
  </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="debit" id="debit" value="<?php echo $row["DEBIT"]; ?>" required>
              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label>Closing Balance</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-5">
      
          <div class="form-group">
          <input class="form-control" type="text" name="closebal" id="closebal" value="<?php echo $row["CLOSINGBALANCE"]; ?>" readonly>
              </DIV></DIV> </DIV>


                
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
<script>
    function calculateClosingBalance() {
      // Get the credit and debit input values
      var creditInput = document.getElementById('credit');
      var debitInput = document.getElementById('debit');
      var closeBalInput = document.getElementById('closebal');

      // Parse the input values as floats (assuming they contain numeric values)
      var creditAmount = parseFloat(creditInput.value) || 0;
      var debitAmount = parseFloat(debitInput.value) || 0;

      // Calculate the closing balance
      var closingBalance = creditAmount - debitAmount;

      // Update the closing balance input field
      closeBalInput.value = isNaN(closingBalance) ? '' : closingBalance.toFixed(); // Display with two decimal places or empty string if NaN
    }

    // Add event listeners to credit and debit inputs to trigger the calculation
    document.getElementById('credit').addEventListener('input', calculateClosingBalance);
    document.getElementById('debit').addEventListener('input', calculateClosingBalance);
  </script>
</html>
  
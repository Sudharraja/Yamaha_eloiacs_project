<?php 
  session_start(); // Resume the session
  include "connect.php";
  // Check if the user is not logged in
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // User is not logged in, redirect to login.php
  header("Location: login.php");
  exit; // Terminate the script after redirection
  }
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  button.view {
  padding: 5px 16px;
  border-radius: 5px;
  background-color: #0300c9;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  border:none;
  top: 22px;
  /* right: 8.5%; */
  left: 58.5%;

  position: absolute;
  }
  /* body {
  text-align: center;
  } */

  .container-box {
  width: 1000px;
  margin: 0 auto;
  margin-top: 16px;
  padding: 20px;
  background: rgba(255, 255, 255, 0.2); /* Use rgba with an alpha value (0.7 for 70% opacity) */
  margin-left: 162px;
  border-radius:15px;
}


  .form-group {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
  }

  .form-group label {
  flex: 1;
  text-align: left;
  color:white;
  }

  .form-group .form-control {
  flex: 2;
  border-radius: 5px;
  /* border: 0.2px dashed #0C00A3; */
  background: #FFF;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  height: 42px;
  }

  .button {

  width: 521px;
  height: 52px;
  flex-shrink: 0;
  border-radius: 5px;
  background: linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  margin-left: -271px;
  
  margin-top: 45px;
  }
  .button {
  margin-left: 8px;
  width: 500px;
  height: 52px;
  flex-shrink: 0;
  border-radius: 5px;
  background: linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);

  }
  label {
  color: #000;
  font-family: Inter;
  font-size: 15px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
  text-transform: uppercase;
  }

  a {
  color: white;
  text-decoration: none;
  }

  .btn2{
  width: 121px;
  margin-top: -75px;
    margin-left: 79%;
  height: 35px;
  float:right;
  margin-right: 10%;
  border-radius: 5px;
  /* background: linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%); */
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  }

  .img{
  margin-top: 42px;
  margin-left:60px;
  width: 450px;
  height: 1651px;
  flex-shrink: 0;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 6px -5px 4px 0px rgba(0, 0, 0, 0.25);
  }
  .sm {
  padding: 0.25rem 0.5rem;
  font-size: .875rem;
  border-radius: 0.2rem;
  margin-bottom: 4px;
  background-color:#3434ff;
  color:white;
  /* margin-left: 50px; */
  }
  th{
  color:orange;
  }

  .bbm {
  margin-right: 3px;
  margin-left: -28%;

  }

 
  /* .popup-table{
    overflow-y:auto;width: 70%;
  } */


  .blur {
  filter: blur(5px); /* Adjust the blur amount as needed */
  pointer-events: none; /* Prevent interactions with the blurred form */
  transition: filter 0.3s ease;
  }


body {
  text-align:center;
  background-image: url("back.jpeg");
  /* Add additional background properties if needed */
  background-repeat: no-repeat; /* Prevent image repetition */
  background-size: cover; /* Adjusts the image size to cover the entire body */
}

p{
    color:white;
}
.next-button {
  margin-left: 90%;
  background-color: #0014ff;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
  margin-top: 10px;
  font-size: 16px;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  transition: background-color 0.3s ease, color 0.3s ease;
}

.next-button:hover {
  background-color: #0300c9;
}








  /* .table {
  position: absolute;
  z-index: 1000;
  background-color: white;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  border-radius: 10px;
  padding: 20px;
  max-height: 400px;
  overflow-y: auto;
  margin-left: 1%;
  margin-top: 4%;
  width: 70%;
  } */


  .table-container {
    width: 72%;
    overflow-x: auto; /* Add horizontal scrollbar if the table overflows */
    margin: 0 auto; /* Center the table within the container */
    border-radius:10px;
    margin-bottom:4%;
  }

  .table {
    /* Your table styles here */
    width: 100%; /* Ensure the table takes up the full container width */
    border-collapse: collapse; /* Optional: Collapse table borders */
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background-color: white;
    max-height: 400px;
    border-radius: 10px;
    cursor: pointer;
    margin-top: 4%;
    
    /* z-index: 500;
    position: absolute; */
  }

  /*.table th,*/
  /*.table td {*/
    /* Your table cell styles here */
    /*border: 1px solid #ccc; */
    /*padding: 8px; */
    /*text-align: left; */
  /*}*/
</style>
</head>
  <body>

  <div class="total">

  <div class="row mt-4">
  <div class="col">

  <form action="" method="post">
  <div class="bbm">
  <!-- <div class="btn_logout_back"> <button type="button" class="button"><a href="form.php" style="color: white;">BACK</a></button> -->

  <input type="text" class="bm" id="search_chassis"placeholder="Search Chassis No" name="search">
  <button class="sm" type="submit" name="submit1">Search</button></div>
  <button type="text" class="view">
  <a href="save.php">View Details</a>
  </button>
  </form>





  <div class="container">
  <!-- <div class="popup-table"> -->
  <div class="table-container">
  <table class="table">




  <?php
  if(isset($_POST['submit1'])) {
  $search = $_POST['search'];

  // Construct the SQL query to check the 'project' table
  $projectQuery = "SELECT * FROM `project` WHERE RIGHT(CHASSISNO, 4) = '$search' AND BRANCHESDEALERS= '$userPlace' ";
  $projectResult = mysqli_query($conn, $projectQuery);

  if(mysqli_num_rows($projectResult) > 0) {
    ?>
    <thead>
  <tr>
  <th>Id</th>
  <th>Invoice Date</th>
  <th>Chassis No</th>
  <th>Vehicle Model</th>
  <th>Customer Name</th>
  <th>Payment Type</th>
  <th>Branches/Sub Dlrs</th>
  <th>Exchange</th>
  <th>Vehicle Cost</th>
  <th>Road Side Assistance</th>
  <th>Ipreceivable</th>
  <th>Ipreceived</th>
  <th>Cash</th>
  <th>FinanceReceivable</th>
  <th>FINANCERECEIVEDDATE</th>
  <th>FINANCERECEIVED</th>
  <th>TOTALAMOUNTRECIEVED</th>
  <th>FOLDERCLOSINGDATE</th>
  <th>STATUS</th>
  <th>EXTRAFITTING</th>
  <th>BASICEXTRA</th>
  <th>EXTENDEDWARRANTY</th>
  <th>CASHDISCOUNT</th>
  <th>PETROL</th>
  <th>VEHICLECOVER</th>
  <th>TOTALPRICE</th>
  <th>MECHANICCOMMISSION</th>
  <th>CUSTOMERSIDEINSURANCE</th>
  <th>DISCOUNT</th>
  </tr>
  </thead>
  <tbody>
<?php
  // Chassis number found in 'project' table, display those rows
  while($row = mysqli_fetch_assoc($projectResult)) {
  echo "<tr data-id='" . $row['ID'] . "'>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['INVOICEDATE'] . "</td>";
  echo "<td>" . $row['CHASSISNO'] . "</td>";
  echo "<td>" . $row['VEHICLEMODEL'] . "</td>";
  echo "<td>" . $row['CUSTOMERNAME'] . "</td>";
  echo "<td>" . $row['PAYMENTTYPE'] . "</td>";
  echo "<td>" . $userPlace . "</td>"; // Display the branch name
  echo "<td>" . $row['EXCHANGE'] . "</td>";
  echo "<td>" . $row['VEHICLECOST'] . "</td>";
  echo "<td>" . $row['ROADSIDEASSISTANCE'] . "</td>";
  echo "<td>" . $row['IPRECEIVABLE'] . "</td>";
  echo "<td>" . $row['IPRECEIVED'] . "</td>";
  echo "<td>" . $row['CASH'] . "</td>";
  echo "<td>" . $row['FINANCERECEIVABLE'] . "</td>";
  echo "<td>" . $row['FINANCERECEIVEDDATE'] . "</td>";
  echo "<td>" . $row['FINANCERECEIVED'] . "</td>";
  echo "<td>" . $row['TOTALAMOUNTRECIEVED'] . "</td>";
  echo "<td>" . $row['FOLDERCLOSINGDATE'] . "</td>";
  echo "<td>" . $row['STATUS'] . "</td>";
  echo "<td>" . $row['EXTRAFITTING'] . "</td>";
  echo "<td>" . $row['BASICEXTRA'] . "</td>";
  echo "<td>" . $row['EXTENDEDWARRANTY'] . "</td>";
  echo "<td>" . $row['CASHDISCOUNT'] . "</td>";
  echo "<td>" . $row['PETROL'] . "</td>";
  echo "<td>" . $row['VEHICLECOVER'] . "</td>";
  echo "<td>" . $row['TOTALPRICE'] . "</td>";
  echo "<td>" . $row['MECHANICCOMMISSION'] . "</td>";
  echo "<td>" . $row['CUSTOMERSIDEINSURANCE'] . "</td>";
  echo "<td>" . $row['DISCOUNT'] . "</td>";


  echo "</tr>";
  }
  } else {
    ?>
    <thead>
  <tr>
  <th>Id</th>
  <th>Invoice Date</th>
  <th>Chassis No</th>
  <th>Vehicle Model</th>
  <th>Customer Name</th>
  <th>Payment Type</th>
  <th>Branches/Sub Dlrs</th>
  </tr>
  </thead>
  <tbody>
<?php
  // Chassis number not found in 'project' table, display rows from 'a_project' table
  $aProjectQuery = "SELECT * FROM `a_project` WHERE RIGHT(CHASSISNO, 4) = '$search'AND BRANCHESDEALERS= '$userPlace' ";
  $aProjectResult = mysqli_query($conn, $aProjectQuery);

  while($row = mysqli_fetch_assoc($aProjectResult)) {
  echo "<tr data-id='" . $row['ID'] . "'>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['INVOICEDATE'] . "</td>";
  echo "<td>" . $row['CHASSISNO'] . "</td>";
  echo "<td>" . $row['VEHICLEMODEL'] . "</td>";
  echo "<td>" . $row['CUSTOMERNAME'] . "</td>";
  echo "<td>" . $row['PAYMENTTYPE'] . "</td>";
  echo "<td>" . $userPlace . "</td>"; // Display the branch name
  echo "</tr>";
  }
  }
  }
  ?>

  </tbody>
  </table>
  </div>
</div>
  </div>
  </div>
  </div>


  <div class="row ">
  <div class="col-md-9">
  <div class="container-box">
  <button type="button" class="btn2 btn-primary button"><a href="logout.php" style="color: white;">LOGOUT</a></button>


<!-- Initial content -->
<div id="initial-content" class="transparent-box-shadow">
  <form action="form_input.php" method="post" id="dataForm">
  <input type="hidden" name="selected_id" id="selected_id">

  <div class="row">
    
    <p style="text-align: center; margin-left: -418px;"><b>Sales Entry Form</b></p>
  </div>

  <!-- Invoice Date -->

  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <label>Invoice Date:</label>
  </DIV></DIV>
  <div class="col-6">
  <div class="form-group">

  <label>Chassis No:</label>

  </DIV></DIV></DIV>
  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="date" name="invoice_date" id="invoice_date" placeholder="Invoice Date" readonly>

  </DIV></DIV>
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="chassis_no" id="chaseNo" onkeypress="fetchUserData(event)" readonly>
  </DIV></DIV></DIV>

  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <label>Vehicle Model:</label>
  </DIV></DIV>
  <div class="col-6">
  <div class="form-group">

  <label>Customer Name:</label>

  </DIV></DIV>  </DIV>
  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="vehicle_model" id="vehicle_model" readonly>
  </DIV></DIV>
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="customer_name" id="customer_name" readonly>
  </DIV></DIV> </DIV>
  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <label>Payment Type:</label>
  </DIV></DIV>
  <div class="col-6">
  <div class="form-group">
  <label>Branches/Sub Dlrs:</label>
  </DIV></DIV>  </DIV>
  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="payment_type" id="payment_type" readonly>
  </DIV></DIV>
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="branches_dealers" id="branches_dealers" readonly>
  </DIV></DIV> </DIV>
  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <label>Vehicle Actual Cost:</label>
  </DIV></DIV>  </DIV>
  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="vehicle_cost" id="vehicle_cost"  required>
  </DIV></DIV> </DIV>
<br>


<p style="text-align: center; margin-left: -850px;"><b>Finance Details</b></p>
  <div class="row">

  <div class="col-6">
  <div class="form-group">
  <label>IP Receivable:</label>
  </DIV></DIV>  
  <div class="col-6">
    <div class="form-group">
    <label>IP Received:</label>
    </div>
  </div>



</DIV>


  
  <div class="row">

  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="ip_receivable" id="ip_receivable" required>
  </DIV></DIV> 
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="ip_received" id="ip_received"  required>
  </DIV></DIV>
</DIV>



  <div class="row">
 



  <div class="col-6">
  <div class="form-group">
  <label>Cash Outstanding:</label>
  </DIV></DIV>  
  <div class="col-6">
  <div class="form-group">
  <label>Finance Receivable:</label>
  </DIV></DIV>
</DIV>


  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="cash_outstanding" id="cash_outstanding" readonly >
  </DIV></DIV> 
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="finance_receivable" id="finance_receivable" readonly>
  </DIV></DIV>
</DIV>

  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <label>Finance Received date:</label>
  </DIV></DIV>  
  <div class="col-6">
  <div class="form-group">
  <label>Finance Received:</label>
  </DIV></DIV>
</DIV>


  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="date" name="finance_received_date" required>
  </DIV></DIV> 
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="number" id="finance_received" name="finance_received" required>
  </DIV></DIV>
</DIV>

  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <label>Total Amount Received:</label>
  </DIV></DIV></DIV>
  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="number" name="total_amount_received" id="total_amount_received" readonly>
  </DIV></DIV> </DIV>

  <!-- <button type="button" onclick="toggleContent()" class="next-button">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></button> -->
  <button type="button" onclick="showAdditionalContent()" class="next-button">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></button>



</div>
  <br>
  <div id="additional-content" class="box-shadow-content" style="display: none;">
  <p style="text-align: center; margin-left: -850px;"><b>Offer Details</b></p>
  <div class="row">
  <div class="col-4">
  <div class="form-group">
  <label>Exchange:</label>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <label>Road Side Assistance:</label>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <label>Customer Side Insurance:</label>
  </DIV></DIV></div>

  <div class="row">
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="exchange" id="exchange" required>
  </DIV></DIV>

  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="number" name="road_side_assistance" id="road_side_assistance" required>
  </DIV></DIV>

  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="customer_side_insurance" id="customer_side_insurance" required>
  </DIV></DIV></div>


<div class="row">
<div class="col-4">
  <div class="form-group">
  <label>Basic/Extra:</label>
  </DIV></DIV>  
  <div class="col-4">
  <div class="form-group">
  <label>Extended Warranty:</label>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <label>Cash Discount:</label>
  </DIV></DIV>  
</div>


  <div class="row">
<div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="basic_extra" id="basic_extra" required>
  </DIV></DIV> 
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="extended_warranty" id="extended_warranty" required>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="number" name="cash_discount" id="cash_discount" required>
  </DIV></DIV>
  </div>

  <div class="row">
  <div class="col-4">
  <div class="form-group">
  <label>Petrol:</label>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <label>Vehicle Cover:</label>
  </DIV></DIV>  
  <div class="col-4">
  <div class="form-group">
  <label>Mechanic Commission:</label>
  </DIV></DIV> 
</DIV>
  <div class="row">
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="petrol" id="petrol" required>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="vehicle_cover" id="vehicle_cover" required>
  </DIV></DIV> 
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="mechanic_commission" id="mechanic_commission" required>
  </DIV></DIV>
</DIV>


<div class="row">
  <div class="col-4">
  <div class="form-group">
  <label>Extra Fitting/Access:</label>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <label>Discount:</label>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <label>Total Price:</label>
  </DIV></DIV>
  </DIV>
  <div class="row">
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="extra_fitting" id="extra_fitting" required>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="number" name="discount" id="discount" readonly>
  </DIV></DIV> 
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="total_price" id="total_price" required>
  </DIV></DIV>
 </DIV>
<br>



 <p style="text-align:center; margin-left: -91%;"><b>File Details</b></p>


  <div class="row">
  <div class="col-4">
  <div class="form-group">
  <label>Folder Closing Date:</label>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <label>Status (Entered at branch):</label>
  </DIV></DIV>
 
  <div class="col-4">
  <div class="form-group">
  <label>Remarks:</label>
  </DIV></DIV></DIV>
  <div class="row">
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="date" name="folder_closing_date" id="folder_closing_date" required>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <select class="form-control" name="status" id="status" id="status" required>       
  <option>Open</option>
  <option>Closed</option>
  </select>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" id="remarks" name="remarks">
  </DIV></DIV></DIV>
  <button type="button" onclick="showInitialContent()" class="next-button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Previous</button>

  <div>
  <input type="submit" value="SAVE" name="save" class="button">
  </div>

  </div>
  </form>
  </div>
  



  <script>

  $(document).ready(function() {
  // Get references to the input fields

  var ipReceivedField = $('#ip_received');
  var cashOutstandingField = $('#cash_outstanding');
  var ipReceivableField = $('#ip_receivable');


  function updateCashOutstanding() {
  var ipReceivable = parseFloat(ipReceivableField.val()) || 0;
  var ipReceived = parseFloat(ipReceivedField.val()) || 0;
  var cashOutstanding = ipReceivable - ipReceived;
  cashOutstandingField.val(cashOutstanding.toFixed(0));
  }

  // Bind the update function to the input fields' change event
  ipReceivableField.on('input', updateCashOutstanding);
  ipReceivedField.on('input', updateCashOutstanding);
  });

  $(document).ready(function() {
  // Get references to the input fields

  var ipReceivableField = $('#ip_receivable');
  var frecievableField = $('#finance_receivable');
  var vehcostField = $('#vehicle_cost'); 

  function updateFinRecievable() {
  var ipReceivable = parseFloat(ipReceivableField.val()) || 0;
  var vehcost = parseFloat(vehcostField.val()) || 0;
  var frecievable = ipReceivable - vehcost;
  frecievableField.val(frecievable.toFixed(0));
  }
  // Bind the update function to the input fields' change event
  ipReceivableField.on('input', updateFinRecievable);
  vehcostField.on('input', updateFinRecievable);
  });

  $(document).ready(function() {
  // Get references to the input fields

  var ipReceivedField = $('#ip_received');
  var frecievedField = $('#finance_received');
  var tarField = $('#total_amount_received'); 

  function updateTAR() {
  var ipReceived = parseFloat(ipReceivedField.val()) || 0;
  var frecieved = parseFloat(frecievedField.val()) || 0;
  var tar = frecieved + ipReceived;
  tarField.val(tar.toFixed(0));
  }
  // Bind the update function to the input fields' change event
  frecievedField.on('input', updateTAR);
  ipReceivedField.on('input', updateTAR);
  });

  $(document).ready(function() {
  // Get references to the input fields
  var extraFittingField = $('#extra_fitting');
  var basicExtraField = $('#basic_extra');
  var extendedWarrantyField = $('#extended_warranty');
  var cashDiscountField = $('#cash_discount');
  var petrolField = $('#petrol');
  var vehicleCoverField = $('#vehicle_cover');
  var mechanicCommissionField = $('#mechanic_commission');
  var discountField = $('#discount'); // The Wings field

  function updateDiscount() {
  var extraFitting = parseFloat(extraFittingField.val()) || 0;
  var basicExtra = parseFloat(basicExtraField.val()) || 0;
  var extendedWarranty = parseFloat(extendedWarrantyField.val()) || 0;
  var cashDiscount = parseFloat(cashDiscountField.val()) || 0;
  var petrol = parseFloat(petrolField.val()) || 0;
  var vehicleCover = parseFloat(vehicleCoverField.val()) || 0;
  var mechanicCommission = parseFloat(mechanicCommissionField.val()) || 0;

  var discount = extraFitting + basicExtra + extendedWarranty + cashDiscount + petrol + vehicleCover + mechanicCommission;

  discountField.val(discount.toFixed(0)); // Adjust decimal places as needed
  }

  // Bind the update function to the input fields' input event
  extraFittingField.on('input', updateDiscount);
  basicExtraField.on('input', updateDiscount);
  extendedWarrantyField.on('input', updateDiscount);
  cashDiscountField.on('input', updateDiscount);
  petrolField.on('input', updateDiscount);
  vehicleCoverField.on('input', updateDiscount);
  mechanicCommissionField.on('input', updateDiscount);
  });

  </script>

  <script>
document.addEventListener("DOMContentLoaded", function() {
  const tableRows = document.querySelectorAll("tbody tr");
  const dataForm = document.getElementById("dataForm");
  const inputs = dataForm.querySelectorAll("input[name], select[name]");
  const tableContainer = document.querySelector(".container");
  const formContainer = document.querySelector(".container-box");
  const popupTable = document.querySelector(".table");

  tableRows.forEach(row => {
    row.addEventListener("click", function() {
      const selectedId = this.getAttribute("data-id");
      let rowData = {};

      if (this.cells.length === 7) {
        // If there are 7 cells, populate the specific fields
        rowData = {
          invoice_date: this.cells[1].textContent,
          chassis_no: this.cells[2].textContent,
          vehicle_model: this.cells[3].textContent,
          customer_name: this.cells[4].textContent,
          payment_type: this.cells[5].textContent,
          branches_dealers: this.cells[6].textContent,
        };
      } else if (this.cells.length === 29) {
        // If there are 29 cells, populate all fields
        rowData = {
          invoice_date: this.cells[1].textContent,
          chassis_no: this.cells[2].textContent,
          vehicle_model: this.cells[3].textContent,
          customer_name: this.cells[4].textContent,
          payment_type: this.cells[5].textContent,
          branches_dealers: this.cells[6].textContent,
          
          vehicle_cost: this.cells[8].textContent,
          ip_receivable: this.cells[10].textContent,
          ip_received: this.cells[11].textContent,
          cash_outstanding: this.cells[12].textContent,
          finance_receivable: this.cells[13].textContent,
          finance_received_date: this.cells[14].textContent,
          finance_received: this.cells[15].textContent,
          total_amount_received: this.cells[16].textContent,


          exchange: this.cells[7].textContent,
          road_side_assistance: this.cells[9].textContent,

          customer_side_insurance: this.cells[27].textContent,
          basic_extra: this.cells[20].textContent,
  extended_warranty: this.cells[21].textContent,
  cash_discount: this.cells[22].textContent,
  petrol: this.cells[23].textContent,
  vehicle_cover: this.cells[24].textContent,
  mechanic_commission: this.cells[26].textContent,
          
  extra_fitting: this.cells[19].textContent,
  discount: this.cells[28].textContent,
  total_price: this.cells[25].textContent,

  folder_closing_date: this.cells[17].textContent,
  status: this.cells[18].textContent,


          // Add more fields as needed...
        };
      } else {
        // Handle other cases as needed
        alert("Invalid number of cells");
        return;
      }

      // Populate the form fields with the extracted data
      inputs.forEach(input => {
        const fieldName = input.getAttribute("name");
        if (rowData[fieldName] !== undefined) {
          input.value = rowData[fieldName];
        }
      });

      // Set the selected ID in the hidden input field
      const selectedInput = document.querySelector(`input[name="selected_id"]`);
      selectedInput.value = selectedId;

      // Hide the table and show the form
      tableContainer.style.display = "none";
      popupTable.style.display = "block";
      formContainer.classList.remove("blur"); // Remove blur class when form is displayed
    });
  });

  // Handle the form submission to keep the form displayed
  dataForm.addEventListener("submit1", function(event) {
    event.preventDefault();
    // Your form submission logic here

    // Optionally, you can reset the form fields and hide the popup table
    // Reset the form fields
    inputs.forEach(input => {
      input.value = "";
    });
    // Hide the popup table
    popupTable.style.display = "none";
    tableContainer.style.display = "block"; // Show the table again
    formContainer.classList.add("blur"); // Add blur class when form is hidden
  });
});
</script>

<script>
  // Function to populate all fields in the additional-content form
  function populateFields(row) {
    const exchangeField = document.getElementById('exchange');
    const roadSideAssistanceField = document.getElementById('road_side_assistance');
    const customerSideInsuranceField = document.getElementById('customer_side_insurance');
    const basicExtraField = document.getElementById('basic_extra');
    const extendedWarrantyField = document.getElementById('extended_warranty');
    const cashDiscountField = document.getElementById('cash_discount');
    const petrolField = document.getElementById('petrol');
    const vehicleCoverField = document.getElementById('vehicle_cover');
    const mechanicCommissionField = document.getElementById('mechanic_commission');
    const extraFittingAccessField = document.getElementById('extra_fitting');
    const discountField = document.getElementById('discount');
    const totalPriceField = document.getElementById('total_price');
    const FolderclosingField = document.getElementById('folder_closing_date');
    const StatusField = document.getElementById('status');



    
    const exchangeValue = row.cells[7].textContent; // Assuming "Exchange" is in the 8th cell (index 7)
    const roadSideAssistanceValue = row.cells[9].textContent; // Assuming "Road Side Assistance" is in the 10th cell (index 9)
    const customerSideInsuranceValue = row.cells[27].textContent; // Assuming "Customer Side Insurance" is in the 28th cell (index 27)
    const basicExtraValue = row.cells[20].textContent; 
    const extendedWarrantyValue = row.cells[21].textContent; 
    const cashDiscountValue = row.cells[22].textContent; 
    const petrolValue = row.cells[23].textContent; 
    const vehicleCoverValue = row.cells[24].textContent; 
    const mechanicCommissionValue = row.cells[26].textContent; 
    const extraFittingAccessValue = row.cells[19].textContent; 
    const discountValue = row.cells[28].textContent;
   const totalPriceValue = row.cells[25].textContent; 
    const FolderCloseValue = row.cells[17].textContent;
    const StatusValue= row.cells[18].textContent;


    
    exchangeField.value = exchangeValue;
    roadSideAssistanceField.value = roadSideAssistanceValue;
    customerSideInsuranceField.value = customerSideInsuranceValue;
    basicExtraField.value = basicExtraValue;
    extendedWarrantyField.value = extendedWarrantyValue;
    cashDiscountField.value = cashDiscountValue;
    petrolField.value = petrolValue;
    vehicleCoverField.value = vehicleCoverValue;
    mechanicCommissionField.value = mechanicCommissionValue;
    extraFittingAccessField.value = extraFittingAccessValue;
    discountField.value = discountValue;
    
    totalPriceField.value = totalPriceValue;

    FolderclosingField.value = FolderCloseValue;
    StatusField.value = StatusValue;

  }

  document.addEventListener("DOMContentLoaded", function() {
    const tableRows = document.querySelectorAll("tbody tr");
    const dataForm = document.getElementById("dataForm");
    const inputs = dataForm.querySelectorAll("input[name], select[name]");
    const tableContainer = document.querySelector(".container");
    const formContainer = document.querySelector(".container-box");
    const popupTable = document.querySelector(".table");

    tableRows.forEach(row => {
      row.addEventListener("click", function() {
        // Remove "selected" class from previously selected rows
        document.querySelectorAll("tbody tr.selected").forEach(selectedRow => {
          selectedRow.classList.remove("selected");
        });

        // Add "selected" class to the clicked row
        this.classList.add("selected");
      });
    });

    // Function to show the additional content and populate the fields
    function showAdditionalContent() {
      const initialContent = document.getElementById('initial-content');
      const additionalContent = document.getElementById('additional-content');
      const selectedRow = document.querySelector("tbody tr.selected");

      if (selectedRow) {
        // If a row is selected, populate the fields
        populateFields(selectedRow);
      } else {
        // Handle the case when no row is selected
        alert("Please select a row first.");
        return;
      }

      initialContent.style.display = 'none';
      additionalContent.style.display = 'block';
    }

    // Add this event listener to your "Next" button
    document.querySelector(".next-button").addEventListener("click", showAdditionalContent);

    // Handle the form submission to keep the form displayed
    dataForm.addEventListener("submit1", function(event) {
      event.preventDefault();
      // Your form submission logic here

      // Optionally, you can reset the form fields and hide the popup table
      // Reset the form fields
      inputs.forEach(input => {
        input.value = "";
      });
      // Hide the popup table
      popupTable.style.display = "none";
      tableContainer.style.display = "block"; // Show the table again
      formContainer.classList.add("blur"); // Add blur class when form is hidden
    });
  });

  
</script>


<script>
    // JavaScript functions for showing/hiding form sections
    function showAdditionalContent() {
        document.getElementById('initial-content').style.display = 'none';
        document.getElementById('additional-content').style.display = 'block';
    }

    function showInitialContent() {
        document.getElementById('additional-content').style.display = 'none';
        document.getElementById('initial-content').style.display = 'block';
    }
</script>
  </body>
  </html>
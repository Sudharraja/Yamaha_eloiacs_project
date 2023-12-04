<?php 
include "connect.php";



if (isset($_REQUEST['save'])) {

$invoicedate = $_POST["invoice_date"];
$chassisno = $_POST["chassis_no"];
$vehiclemodel = $_POST["vehicle_model"];
$customername = $_POST["customer_name"];
$paymenttype = $_POST["payment_type"];
$branchesdealers = $_POST["branches_dealers"];

$exchange = $_POST["exchange"];
$vehiclecost = $_POST["vehicle_cost"];
$roadsideassistance= $_POST["road_side_assistance"];
$ipreceivable=$_POST["ip_receivable"];
$ipreceived = $_POST["ip_received"];
$cashoutstanding = $_POST["cash_outstanding"];
$financereceivable=$_POST["finance_receivable"];
$financereceiveddate = $_POST["finance_received_date"];

$financereceived = $_POST["finance_received"];
$totalamountreceived=$_POST["total_amount_received"];
$folderclosingdate = $_POST["folder_closing_date"];
$status = $_POST["status"];
$extrafitting = $_POST["extra_fitting"];
$basicextra=$_POST["basic_extra"];

$extendedwarranty = $_POST["extended_warranty"];
$cashdiscount = $_POST["cash_discount"];
$petrol = $_POST["petrol"];
$vehiclecover=$_POST["vehicle_cover"];
$totalprice = $_POST["total_price"];
$mechaniccommission = $_POST["mechanic_commission"];
$customersideinsurance = $_POST["customer_side_insurance"];
$discount=$_POST["discount"];
$rto=$_POST["rto"];



  $sql = "INSERT INTO `project` (INVOICEDATE, CHASSISNO, VEHICLEMODEL, CUSTOMERNAME, PAYMENTTYPE, BRANCHESDEALERS, EXCHANGE,
  VEHICLECOST,  ROADSIDEASSISTANCE, IPRECEIVABLE, IPRECEIVED, CASH,
  FINANCERECEIVABLE, FINANCERECEIVEDDATE, FINANCERECEIVED, TOTALAMOUNTRECIEVED,
  FOLDERCLOSINGDATE, STATUS, EXTRAFITTING, BASICEXTRA, EXTENDEDWARRANTY,
  CASHDISCOUNT, PETROL, VEHICLECOVER, TOTALPRICE, MECHANICCOMMISSION,
  CUSTOMERSIDEINSURANCE, DISCOUNT, RTOCONFIRMATION)
  VALUES ('$invoicedate', '$chassisno', '$vehiclemodel', '$customername', '$paymenttype', '$branchesdealers', 
  
  '$exchange', '$vehiclecost',  '$roadsideassistance', '$ipreceivable', '$ipreceived', '$cashoutstanding', '$financereceivable', '$financereceiveddate', '$financereceived', '$totalamountreceived',
  
   '$folderclosingdate', '$status', '$extrafitting', '$basicextra', '$extendedwarranty', '$cashdiscount', '$petrol', '$vehiclecover', '$totalprice', '$mechaniccommission', '$customersideinsurance', '$discount', '$rto')";

if ($conn->query($sql) === TRUE) {
  header("Location: actsave.php");
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
    button.view {
    padding: 5px 16px;
    border-radius: 5px;
  background-color: #0300c9;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    border:none;
    top: 22px;
    right: 8.5%;

      position: absolute;
  }
     body {
      text-align: center;
    }

    .container-box {
      width: 1000px;
      margin: 0 auto;
      padding: 20px;
      background: #FFF;
      margin-top: 60px;
      margin-left: 317px;
    }

    .form-group {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .form-group label {
      flex: 1;
      text-align: left;
    }

    .form-group .form-control {
      flex: 2;
      border-radius: 5px;
      border: 0.2px dashed #0C00A3;
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
margin-right: 329px;
margin-top: 45px;
}
.button {
margin-left: 70px;
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
      margin-top: -42px;
      
height: 35px;
float:right;
border-radius: 5px;
background: linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
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
  margin-right: 915px;
       
}

.popup-table {
  position: absolute;
    z-index: 1000;
    background-color: white;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    padding: 20px;
    max-height: 400px;
    overflow-y: auto;
    margin-left: 0%;
    width: 80%;
    margin-top: 4%;
}
.blur {
filter: blur(5px); /* Adjust the blur amount as needed */
pointer-events: none; /* Prevent interactions with the blurred form */
transition: filter 0.3s ease;
}
.table{
  width:10%;
}

  </style>
</head>
<body>

<div class="total">

<div class="row mt-4">
<div class="col">

<form action="" method="post">
  <div class="bbm">
<input type="text" class="bm" placeholder="Search Chassis No" name="search">
<button class="sm" type="submit" name="submit">Search</button></div>
<button type="text" class="view">
            <a href="actsave.php">View Details</a>
          </button>
</form>

<div class="container">
<div class="popup-table">
<table class="table">
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
<th>Vehicle cost</th>
<th>road side assistance</th>
<th>ipreceivable</th>
<th>ipreceived</th>
<th>cashoutstanding</th>
<th>financereceivable</th>
<th>financereceiveddate</th>
<th>financereceived</th>
<th>totalamountreceived</th>
<th>folderclosingdate</th>
<th>status</th>
<th>extrafitting</th>
<th>basicextra</th>
<th>extendedwarranty</th>
<th>cashdiscount</th>
<th>petrol</th>
<th>vehiclecover</th>
<th>totalprice</th>
<th>mechaniccommission</th>
<th>customersideinsurance</th>
<th>discount</th>



</tr>
</thead>
<tbody>
<?php 
if(isset($_POST['submit'])){
$search = $_POST['search'];

// Construct the SQL query with the branch name filter
$sql = "SELECT DISTINCT * FROM `project` WHERE RIGHT(CHASSISNO, 4) = '$search'";




$result = mysqli_query($conn, $sql);

if($result){
while($row = mysqli_fetch_assoc($result)) {
echo "<tr data-id='" . $row['ID'] . "'>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['INVOICEDATE'] . "</td>";
echo "<td>" . $row['CHASSISNO'] . "</td>";
echo "<td>" . $row['VEHICLEMODEL'] . "</td>";
echo "<td>" . $row['CUSTOMERNAME'] . "</td>";
echo "<td>" . $row['PAYMENTTYPE'] . "</td>";
echo "<td>" . $row['BRANCHESDEALERS'] . "</td>";
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
echo "<tr><td colspan='29'>Error: " . mysqli_error($conn) . "</td></tr>";
}
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>


<div class="row ">
<div class="col-md-2 ">
<img class="img" src="img1.png" alt="" srcset="">

</div>



<div class="col-md-9">
  <div class="container-box  ">
  <button type="button" class="btn2 btn-primary button"><a href="index.php" style="color: white;">LOGOUT</a></button>
  <!-- <button type="text" class="view">
            <a href="save.php">View Details</a>
          </button> -->

    
  <form action="" method="post" id="dataForm">
<input type="hidden" name="selected_id" id="selected_id">

      <!-- Invoice Date -->

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
          <input class="form-control" type="date" name="invoice_date" id="invoice_date" max="<?= date('Y-m-d') ?>" readonly>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

          <input class="form-control" type="text" name="chassis_no" id="chaseNo" onkeypress="fetchUserData(event)" readonly>

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
          <input class="form-control" type="text" name="vehicle_model" id="vehicle_model" readonly>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

          <input class="form-control" type="text" name="customer_name" id="customer_name" readonly>

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
          <input class="form-control" type="text" name="payment_type" id="payment_type" readonly>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

          <input class="form-control" type="text" name="branches_dealers" id="branches_dealers" readonly>
              </DIV></DIV> </DIV>


              

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Exchange:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Vehicle Actual Cost:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="exchange" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="vehicle_cost" id="vehicle_cost"  required>
              </DIV></DIV> </DIV>



              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Road Side Assistance:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>IP Receivable:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="number" name="road_side_assistance" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="ip_receivable" id="ip_receivable" required>
              </DIV></DIV> </DIV>



              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>IP Received:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Cash Outstanding:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="ip_received" id="ip_received"  required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="cash_outstanding" id="cash_outstanding" readonly >
              </DIV></DIV> </DIV>



              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Finance Receivable:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Finance Received date:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="finance_receivable" id="finance_receivable" readonly>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="date" name="finance_received_date" max="<?= date('Y-m-d') ?>" required>
              </DIV></DIV> </DIV>

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Finance Received:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Total Amount Received:</label>
              </DIV></DIV></DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="number" id="finance_received" name="finance_received" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="number" name="total_amount_received" id="total_amount_received" readonly>
              </DIV></DIV> </DIV>


              

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Folder Closing Date:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Status (Entered at branch):</label>
              </DIV></DIV></DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="date" name="folder_closing_date" max="<?= date('Y-m-d') ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <select class="form-control" name="status" id="status" required>       
        <option>Open</option>
        <option>Closed</option>
     
      </select>
              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Extra Fitting/Access:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Basic/Extra:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="extra_fitting" id="extra_fitting" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="basic_extra" id="basic_extra" required>
              </DIV></DIV> </DIV>

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Extended Warranty:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Cash Discount:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="extended_warranty" id="extended_warranty" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="number" name="cash_discount" id="cash_discount" required>
              </DIV></DIV> </DIV>


              

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Petrol:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Vehicle Cover:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="petrol" id="petrol" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="vehicle_cover" id="vehicle_cover" required>
              </DIV></DIV> </DIV>





              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Total Price:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Mechanic Commission:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="total_price" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="mechanic_commission" id="mechanic_commission" required>
              </DIV></DIV> </DIV>



              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Customer Side Insurance:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Discount:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="customer_side_insurance" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="number" name="discount" id="discount" readonly>
              </DIV></DIV> </DIV>

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                  <label>RTO Confirmation:</label>
                  </div>
                </div>
              </div>


              <div class="col-4">
              <div class="form-group">
          <select class="form-control" name="rto" id="rto" required>       
        <option>Yes</option>
        <option>No</option>
     
      </select>
              </DIV>
              </div>

              <!-- <div class="col-4">
          <div class="form-group">
            <label>RTO Confirmation:</label>  
              </DIV></DIV>  </DIV> -->

<!-- 
              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Excess/Shortage:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>RTO Confirmation:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="excess" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="status_main" required>
              </DIV></DIV> </DIV>
 

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Accounts Closing Date:</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Accounts Status:</label>
              </DIV></DIV></DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="date" name="accounts_closing_date" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <select class="form-control" name="accounts_status" id="accounts_status" required>       
        <option>Open</option>
        <option>Closed</option>
      </select>
              </DIV></DIV> </DIV>

<div class="row">
  <div class="col-4">
    <div class="form-group">
      <label>Pending:</label>
      </DIV></DIV>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="pending" required>
  </DIV></DIV>
       -->

      <div>
        <input type="Submit" value="SAVE" name="save" class="button">
        
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
    const popupTable = document.querySelector(".popup-table");
    const image = document.querySelector(".img"); // Replace with the actual class of your image

    if (tableRows.length === 0) {
        // No data available, hide the table and show a message
        tableContainer.style.display = "none";
        formContainer.style.display = "block"; // Hide the form as well, if applicable

        // Show a message or element indicating no data
        const noDataMessage = document.createElement("p");
        noDataMessage.textContent = "";
        formContainer.insertAdjacentElement("beforebegin", noDataMessage);
        formContainer.classList.remove("blur"); // Remove blur class when no data
    } else {
        formContainer.classList.add("blur"); // Add blur class when there's data
        image.style.filter = "blur(5px)"; // Apply blur to the image
    }

    tableRows.forEach(row => {
    row.addEventListener("click", function() {
        const selectedId = this.getAttribute("data-id");
        const rowData = {
                invoice_date: this.cells[1].textContent,
                chassis_no: this.cells[2].textContent,
                vehicle_model: this.cells[3].textContent,
                customer_name: this.cells[4].textContent,
                payment_type: this.cells[5].textContent,
                branches_dealers: this.cells[6].textContent,
                exchange : this.cells[7].textContent,
                vehicle_cost : this.cells[8].textContent,
                road_side_assistance : this.cells[9].textContent,
                ip_receivable : this.cells[10].textContent,
                ip_received : this.cells[11].textContent,
                cash_outstanding : this.cells[12].textContent,
                finance_receivable : this.cells[13].textContent,
                finance_received_date : this.cells[14].textContent,
                finance_received : this.cells[15].textContent,
                total_amount_received : this.cells[16].textContent,
                folder_closing_date : this.cells[17].textContent,
                // finance_received_date : this.cells[18].textContent,
                status : this.cells[18].textContent,
                extra_fitting : this.cells[19].textContent,
                basic_extra : this.cells[20].textContent,
                extended_warranty : this.cells[21].textContent,
                cash_discount : this.cells[22].textContent,
                petrol : this.cells[23].textContent,
                vehicle_cover : this.cells[24].textContent,
                total_price : this.cells[25].textContent,
                mechanic_commission : this.cells[26].textContent,
                customer_side_insurance : this.cells[27].textContent,
                discount : this.cells[28].textContent,               
                // ... Add other cell indices similarly
            };

            inputs.forEach(input => {
                const fieldName = input.getAttribute("name");
                if (rowData[fieldName] !== undefined) {
                    input.value = rowData[fieldName];
                }
            });

            const selectedInput = document.querySelector('input[name="selected_id"]');
            selectedInput.value = selectedId;

            // Hide the table and show the form
            tableContainer.style.display = "none";
            popupTable.style.display = "block";
            formContainer.classList.remove("blur"); // Remove blur class when form is displayed
            image.style.filter = "none"; // Show the image without blur
        });
    });

    // Handle the form submission to keep the form displayed
    dataForm.addEventListener("save", function(event) {
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
        image.style.filter = "blur(5px)"; // Apply blur to the image
    });
});

</script>
  
</body>
</html>
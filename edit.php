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

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $result = mysqli_query($conn, "SELECT * FROM project WHERE id='$id'");
    $row = mysqli_fetch_array($result);

    $fieldsChanged = false;

    if ($_POST["invoice_date"] != $row["INVOICEDATE"] ||
        $_POST["chassis_no"] != $row["CHASSISNO"] ||
        $_POST["vehicle_model"] != $row["VEHICLEMODEL"] ||
        $_POST["customer_name"] != $row["CUSTOMERNAME"] ||
        $_POST["payment_type"] != $row["PAYMENTTYPE"] ||
        $_POST["branches_dealers"] != $row["BRANCHESDEALERS"] ||
        $_POST["exchange"] != $row["EXCHANGE"] ||
        $_POST["vehicle_cost"] != $row["VEHICLECOST"] ||
        $_POST["road_side_assistance"] != $row["ROADSIDEASSISTANCE"] ||
        $_POST["ip_receivable"] != $row["IPRECEIVABLE"] ||
        $_POST["ip_received"] != $row["IPRECEIVED"] ||
        $_POST["cash_outstanding"] != $row["CASH"] ||
        $_POST["finance_receivable"] != $row["FINANCERECEIVABLE"] ||
        $_POST["finance_received_date"] != $row["FINANCERECEIVEDDATE"] ||
        $_POST["finance_received"] != $row["FINANCERECEIVED"] ||
        $_POST["total_amount_received"] != $row["TOTALAMOUNTRECIEVED"] ||
        $_POST["folder_closing_date"] != $row["FOLDERCLOSINGDATE"] ||
        $_POST["status"] != $row["STATUS"] ||
        $_POST["extra_fitting"] != $row["EXTRAFITTING"] ||
        $_POST["basic_extra"] != $row["BASICEXTRA"] ||
        $_POST["extended_warranty"] != $row["EXTENDEDWARRANTY"] ||
        $_POST["cash_discount"] != $row["CASHDISCOUNT"] ||
        $_POST["petrol"] != $row["PETROL"] ||
        $_POST["vehicle_cover"] != $row["VEHICLECOVER"] ||
        $_POST["total_price"] != $row["TOTALPRICE"] ||  
        $_POST["mechanic_commission"] != $row["MECHANICCOMMISSION"] ||
        $_POST["customer_side_insurance"] != $row["CUSTOMERSIDEINSURANCE"] ||
        $_POST["discount"] != $row["DISCOUNT"] ||
        $_POST["excess"] != $row["EXCESS"] ||
        $_POST["status_main"] != $row["RTOCONFIRMATION"] ||
        $_POST["accounts_closing_date"] != $row["ACCOUNTSCLOSINGDATE"] ||
        $_POST["accounts_status"] != $row["ACCOUNTSSTATUS"] ||
        $_POST["pending"] != $row["PENDING"]) {
        $fieldsChanged = true;
    }

    if ($fieldsChanged) {
        $invoicedate = $_POST["invoice_date"];
        $chassisno = $_POST["chassis_no"];
        $vehiclemodel = $_POST["vehicle_model"];
        $customername = $_POST["customer_name"];
        $paymenttype = $_POST["payment_type"];
        $branchesdealers = $_POST["branches_dealers"];
        $exchange = $_POST["exchange"];
        $vehiclecost = $_POST["vehicle_cost"];
        $roadsideassistance = $_POST["road_side_assistance"];
        $ipreceivable = $_POST["ip_receivable"];
        $ipreceived = $_POST["ip_received"];
        $cashoutstanding = $_POST["cash_outstanding"];
        $financereceivable = $_POST["finance_receivable"];
        $financereceiveddate = $_POST["finance_received_date"];
        $financereceived = $_POST["finance_received"];
        $totalamountreceived = $_POST["total_amount_received"];
        $folderclosingdate = $_POST["folder_closing_date"];
        $status = $_POST["status"];
        $extrafitting = $_POST["extra_fitting"];
        $basicextra = $_POST["basic_extra"];
        $extendedwarranty = $_POST["extended_warranty"];
        $cashdiscount = $_POST["cash_discount"];
        $petrol = $_POST["petrol"];
        $vehiclecover = $_POST["vehicle_cover"];
        $totalprice = $_POST["total_price"];
        $mechaniccommission = $_POST["mechanic_commission"];
        $customersideinsurance = $_POST["customer_side_insurance"];
        $discount = $_POST["discount"];
        $excess = $_POST["excess"];
        $statusmain = $_POST["status_main"];
        $accountsclosingdate = $_POST["accounts_closing_date"];
        $accountsstatus = $_POST["accounts_status"];
        $pending = $_POST["pending"];

        $query = "UPDATE project SET  
            INVOICEDATE = '$invoicedate',
            CHASSISNO = '$chassisno',
            VEHICLEMODEL = '$vehiclemodel',
            CUSTOMERNAME = '$customername',
            PAYMENTTYPE = '$paymenttype',
            BRANCHESDEALERS = '$branchesdealers',
            EXCHANGE = '$exchange',
            VEHICLECOST = '$vehiclecost',
             ROADSIDEASSISTANCE = '$roadsideassistance',
            IPRECEIVABLE = '$ipreceivable',
            IPRECEIVED = '$ipreceived',
            CASH = '$cashoutstanding',
            FINANCERECEIVABLE = '$financereceivable',
            FINANCERECEIVEDDATE = '$financereceiveddate',
            FINANCERECEIVED = '$financereceived',
            TOTALAMOUNTRECIEVED = '$totalamountreceived',
            FOLDERCLOSINGDATE = '$folderclosingdate',
            STATUS = '$status',
            EXTRAFITTING = '$extrafitting',
            BASICEXTRA = '$basicextra',
            EXTENDEDWARRANTY = '$extendedwarranty',
            CASHDISCOUNT = '$cashdiscount',
            PETROL = '$petrol',
            VEHICLECOVER = '$vehiclecover',
            TOTALPRICE = '$totalprice',
            MECHANICCOMMISSION = '$mechaniccommission',
            CUSTOMERSIDEINSURANCE = '$customersideinsurance',
            DISCOUNT = '$discount'
        
        WHERE
            ID = '$id'";

        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            ?>
            <script>
                alert("Successfully Updated");
                window.location.href = 'save.php';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Not Updated");
                window.location.href = 'save.php?error';
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("No changes detected. Database not updated.");
            window.location.href = 'save.php';
        </script>
        <?php
    }
}

$result = mysqli_query($conn, "SELECT * FROM project WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
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
 
.container1 {
    width: 877px;
height: 898px;
flex-shrink: 0;
background: #FFF;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 6px -5px 4px 0px rgba(0, 0, 0, 0.25);
margin-left: 191px;
margin-top: 40px;

}
.container111{
  background: linear-gradient(65deg, #0C00A3 0%, #3CE7BD 100%);
  
}

.label1{
  float:left;
  margin-left:15px;
}

.form-check-label{
  float:left;
}

h1 {
    color: orangered;
    margin-top: 15px;
    margin-bottom: 30px;
    margin-left: 383px;
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


.scroll-container::-webkit-scrollbar {
    display: none; 
  }


input{
  margin-top: 2.8px;
}
.row{
  margin-top:9px;
}


.form-control {
    display: block;
    width: 69%;
    padding: -1.6255rem 0.75rem;
    font-size: 1rem;
    font-weight: 300;
    margin-left: 40px;
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
label {
    display: inline-block;
    margin-left: 40px;
    width:200px;
}

a{
      text-decoration:none;
    }
    .button{
      margin-top:20px;
      width: 106px;
height: 34px;
flex-shrink: 0;
border:none;
border-radius:5px;
background: #151CA7;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
color:white;

      
    }
    .back{
      margin-top:20px;
      width: 106px;
height: 34px;
flex-shrink: 0;
border:none;
border-radius:5px;
background: #151CA7;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
color:white;
    }
.hide{
  display:none;
}
.buttons{
  margin-left:850px;

}
.save {
    /* margin-left: 140px; */
    margin-top:20px;
    margin-left:380px;
    width: 151px;
height: 39px;
flex-shrink: 0;
    align-items:center;
    margin-bottom:30px;

    font-weight:bold;
    /* font-size:500px; */
    border-radius: 5px;
    background: linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    color:white;
}
.save:hover{
  color:#0C00A3;
  background:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
}
</style>

<body>

<div class="container111">
  <div class="buttons">
<button class="back"><a class="bbtn" href="save.php" style="color: white;">BACK</a></button>
<button type="button" class="button"><a href="logout.php" style="color: white;">LOGOUT</a></button>
</div>
  <div class="bg-color">

          <div class="container1">
            <div class="scroll-container">
      
         
          
<form action="" method="post" >





    <div class="row">
        <div class="col-4">
        <div class="hide">
          <div class="form-group">
            <label>ID:</label> </DIV></DIV></DIV></div>
 
              <div class="row">
        <div class="col-4">
        <div class="hide">

        
          <div class="form-group">
          <input class="form-control" type="text" name="id" value="<?php echo $row["ID"]; ?>" required>
  </DIV></DIV></DIV>  </div>
  


  <div class="row">
    
    <p style="text-align: center; "><b>Sales Entry Form</b></p>
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
  <input class="form-control" type="date" name="invoice_date" id="invoice_date" placeholder="Invoice Date" value="<?php echo $row["INVOICEDATE"]; ?>">

  </DIV></DIV>
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="chassis_no" id="chaseNo" onkeypress="fetchUserData(event)" value="<?php echo $row["CHASSISNO"]; ?>">
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
  <input class="form-control" type="text" name="vehicle_model" id="vehicle_model" value="<?php echo $row["VEHICLEMODEL"]; ?>">
  </DIV></DIV>
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="customer_name" id="customer_name" value="<?php echo $row["CUSTOMERNAME"]; ?>">
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
  <input class="form-control" type="text" name="payment_type" id="payment_type" value="<?php echo $row["PAYMENTTYPE"]; ?>">
  </DIV></DIV>
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="branches_dealers" id="branches_dealers" value="<?php echo $row["BRANCHESDEALERS"]; ?>">
  </DIV></DIV> </DIV>
  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <label>Vehicle Actual Cost:</label>
  </DIV></DIV>  </DIV>
  <div class="row">
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="vehicle_cost" id="vehicle_cost"  value="<?php echo $row["VEHICLECOST"]; ?>">
  </DIV></DIV> </DIV>
<br>


<p style="text-align: center; "><b>Finance Details</b></p>
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
</div>
  
  <div class="row">

  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="ip_receivable" id="ip_receivable" value="<?php echo $row["IPRECEIVABLE"]; ?>">
  </DIV></DIV> 
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="ip_received" id="ip_received"  value="<?php echo $row["IPRECEIVED"]; ?>">
  </div></DIV>
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
  <input class="form-control" type="text" name="cash_outstanding" id="cash_outstanding" value="<?php echo $row["CASH"]; ?>" >
  </DIV></DIV> 
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="text" name="finance_receivable" id="finance_receivable" value="<?php echo $row["FINANCERECEIVABLE"]; ?>">
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
  <input class="form-control" type="date" name="finance_received_date" value="<?php echo $row["FINANCERECEIVEDDATE"]; ?>">
  </DIV></DIV> 
  <div class="col-6">
  <div class="form-group">
  <input class="form-control" type="number" id="finance_received" name="finance_received" value="<?php echo $row["FINANCERECEIVED"]; ?>">
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
  <input class="form-control" type="number" name="total_amount_received" id="total_amount_received" value="<?php echo $row["TOTALAMOUNTRECIEVED"]; ?>">
  </DIV></DIV> </DIV>

  <br>

   

  <p style="text-align: center;"><b>Offer Details</b></p>
  <form action="" method="post">
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
  <input class="form-control" type="text" name="exchange" value="<?php echo $row["EXCHANGE"]; ?>">
  </DIV></DIV>

  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="number" name="road_side_assistance" value="<?php echo $row["ROADSIDEASSISTANCE"]; ?>">
  </DIV></DIV>

  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="customer_side_insurance" value="<?php echo $row["CUSTOMERSIDEINSURANCE"]; ?>">
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
  <input class="form-control" type="text" name="basic_extra" id="basic_extra" value="<?php echo $row["BASICEXTRA"]; ?>">
  </DIV></DIV> 
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="extended_warranty" id="extended_warranty" value="<?php echo $row["EXTENDEDWARRANTY"]; ?>">
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="number" name="cash_discount" id="cash_discount" value="<?php echo $row["CASHDISCOUNT"]; ?>">
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
  <input class="form-control" type="text" name="petrol" id="petrol" value="<?php echo $row["PETROL"]; ?>">
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="vehicle_cover" id="vehicle_cover" value="<?php echo $row["VEHICLECOVER"]; ?>">
  </DIV></DIV> 
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="mechanic_commission" id="mechanic_commission" value="<?php echo $row["MECHANICCOMMISSION"]; ?>">
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
  <input class="form-control" type="text" name="extra_fitting" id="extra_fitting" value="<?php echo $row["EXTRAFITTING"]; ?>">
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="number" name="discount" id="discount" value="<?php echo $row["DISCOUNT"]; ?>">
  </DIV></DIV> 
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="total_price" value="<?php echo $row["TOTALPRICE"]; ?>">
  </DIV></DIV>
 </DIV>
<br>



 <p style="text-align:center; "><b>File Details</b></p>


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
  <input class="form-control" type="date" name="folder_closing_date" value="<?php echo $row["FOLDERCLOSINGDATE"]; ?>">
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <select class="form-control" name="status" id="status" value="<?php echo $row["STATUS"]; ?>">       
  <option>Open</option>
  <option>Closed</option>
  </select>
  </DIV></DIV>
  <div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="remarks" value="<?php echo $row["REMARKS"]; ?>">
  </DIV></DIV></DIV>

                <div class="edit-button-container">
        <button class="save" type="submit" id="edit" name="edit">UPDATE</button>
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
  
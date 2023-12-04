<?php 
  session_start(); // Resume the session
  include "connect.php";
  // Check if the user is not logged in
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // User is not logged in, redirect to login.php
  header("Location: login.php");
  exit; // Terminate the script after redirection
  }

  // Check if the user has the right credentials to show the "Account Summary" button
$showAccountSummaryButton = ($_SESSION['username'] === 'account' && $_SESSION['password'] === '123456');


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

  // Retrieve the customer credit value from the session
$customerCredit = isset($_SESSION['customerCredit']) ? $_SESSION['customerCredit'] : 0;
  ?>


<?php
include "connect.php";

if (isset($_POST['exchangesave'])) {
    // Extract exchange form data
    $exchange = $_POST["exchange"];
    $exchangeDate = $_POST["exchange_date"];
    $received = $_POST["received"];
    $receivedDate = $_POST["received_date"];
    $customerCode = $_POST["exchangeCustomerCode"];
    $customerName = $_POST["exchangeCustomerName"];

    // Prepare and execute the SQL update statement
    $sql = "UPDATE project SET EXCHANGE = '$exchange', EXCHANGEDATE = '$exchangeDate', RECEIVED = '$received', RECEIVEDDATE = '$receivedDate' WHERE CUSTOMERCODE = '$customerCode' AND CUSTOMERNAME = '$customerName'";

    if ($conn->query($sql) === TRUE) {
        echo "Exchange details updated successfully."; 
    } else {
        echo "Error updating exchange details: " . $conn->error;
    }
}
?>


<?php
include "connect.php";

if (isset($_POST['financesave'])) {
    
    $ipreceivable = $_POST["ip_receivable"];
    $ipreceived = $_POST["ip_received"];
    $financereceivable = $_POST["finance_receivable"];
    $financereceived = $_POST["finance_received"];
    $customerCode = $_POST["code"];
    $customerName = $_POST["name"];


    // Prepare and execute the SQL update statement
    $sql = "UPDATE project SET IPRECEIVABLE = '$ipreceivable', IPRECEIVED = '$ipreceived', FINANCERECEIVABLE = '$financereceivable', FINANCERECEIVED = '$financereceived' WHERE CUSTOMERCODE = '$customerCode' AND CUSTOMERNAME = '$customerName'";

    if ($conn->query($sql) === TRUE) {
        echo "Finance details updated successfully.";
    } else {
        echo "Error updating exchange details: " . $conn->error;
    }
}


if (isset($_POST['cashsave'])) {
    // Retrieve values from the form
    $roadsideAssistance = $_POST["roadsideAssistance"];
    $customerSideInsurance = $_POST["customerSideInsurance"];
    $extendedWarranty = $_POST["extendedWarranty"];
    $cashDiscount = $_POST["cashDiscount"];
    $customerCode = $_POST["cashOfferCustomerCode"];
    $customerName = $_POST["cashOfferCustomerName"];
    $cashOffer = floatval($_POST["Balance"]);

    // Perform the database update
    $sql = "UPDATE project SET ROADSIDEASSISTANCE = '$roadsideAssistance', CUSTOMERSIDEINSURANCE = '$customerSideInsurance', EXTENDEDWARRANTY = '$extendedWarranty', CASHDISCOUNT = '$cashDiscount', OFFERAMOUNT = '$cashOffer' WHERE CUSTOMERCODE = '$customerCode' AND CUSTOMERNAME = '$customerName'";

    if ($conn->query($sql) === TRUE) {
        echo "Cash details updated successfully.";
    } else {
        echo "Error updating exchange details: " . $conn->error;
    }
}



if (isset($_POST['giftsave'])) {
    
    $basicfit = $_POST["basicfit"];
    $petrol = $_POST["petrol"];
    $mechanic = $_POST["mechanic"];
    $vehiclecover = $_POST["vehiclecover"];
    $extrafit = $_POST["extrafit"];
    $anyother = $_POST["anyother"];
    $customerCode = $_POST["giftcustomercode"];
    $customerName = $_POST["giftcustomername"];
    


    // Prepare and execute the SQL update statement
    $gift = "UPDATE project SET BASICFITTINGS = '$basicfit', PETROL = '$petrol', MECHANICCOMMISSION = '$mechanic', VEHICLECOVER = '$vehiclecover', EXTRAFITTING = '$extrafit', ANYOTHER = '$anyother' WHERE CUSTOMERCODE = '$customerCode' AND CUSTOMERNAME = '$customerName'";

    if ($conn->query($gift) === TRUE) {
        echo "Gift details updated successfully.";
    } else {
        echo "Error updating exchange details: " . $conn->error;
    }
}



if (isset($_POST['filesave'])) {
    $filecustomerCode = $_POST["filecustomercode"];
    $filecustomerName = $_POST["filecustomername"];
    $status = $_POST["status"];
    $file_closing_date = $_POST["file_closing_date"];
    $remarks = $_POST["remarks"];
   
    $sql = "UPDATE project SET 	STATUS = '$status', FILECLOSINGDATE = '$file_closing_date', REMARKS = '$remarks' WHERE CUSTOMERCODE = '$filecustomerCode' AND CUSTOMERNAME = '$filecustomerName'";

    if ($conn->query($sql) === TRUE) {
        echo "File details updated successfully.";
    } else {
        echo "Error updating exchange details: " . $conn->error;
    }
}


if (isset($_POST['acc_save'])) {
    $acccustname = $_POST["acccustname"];
    $acccustcode = $_POST["acccustcode"];
    // $rto_confirm = $_POST["rto_confirm"];
    $acc_verified_date = $_POST["acc_verified_date"];
    $rto_status = $_POST["rto_status"];

    // Update the values in the database
    $sql = "UPDATE project SET ACCOUNTVERIFIEDDATE = '$acc_verified_date', RTOSTATUS = '$rto_status' WHERE CUSTOMERCODE = '$acccustcode' AND CUSTOMERNAME = '$acccustname'";

    if ($conn->query($sql) === TRUE) {
        echo "Account details updated successfully.";
    } else {
        echo "Error updating account details: " . $conn->error;
    }
}
?>

<?php
include "connect.php";

if (isset($_POST['sum_acc_save'])) {
    // Retrieve the data from the form
    $sumacccustname = $_POST["sum_acc_name"];
    $sumacccustcode = $_POST["sum_acc_code"];
    $short_excess = $_POST["short_excess"];
    $sum_rto_confirm = $_POST["sum_rto_confirm"];
    $folder_close = $_POST["folder_close"];
    $account_closing_date = $_POST["account_closing_date"];
    $sum_account_status = $_POST["sum_account_status"];
    $sum_acc_remarks = $_POST["sum_acc_remarks"];

    // Create an SQL query to update all the fields
    $sql = "UPDATE project 
            SET 
                EXCESSAMOUNT = '$short_excess',
                RTOCONFIRMATION = '$sum_rto_confirm',
                FOLDERCLOSINGDATE = '$folder_close',
                ACCOUNTCLOSINGDATE = '$account_closing_date',
                STATUS = '$sum_account_status',
                REMARKS = '$sum_acc_remarks'
            WHERE 
                CUSTOMERCODE = '$sumacccustcode' 
                AND CUSTOMERNAME = '$sumacccustname'";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Account Summary details updated successfully.";
    } else {
        echo "Error updating account details: " . $conn->error;
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sales</title>
</head>
<style>
.sales-border {
        text-align: center;
    /* margin-top: -44px;
    margin-left: -62px;
    margin-bottom: -26px; */
}
h4{
    color: #000;
text-align: center;
font-family: sans-serif;
font-size: 20px;
font-style: normal;
font-weight: 600;
line-height: 72.5%; /* 10.875px */
letter-spacing: 1.8px;
}

.options {
    display: flex;
    justify-content: center;
}

.col-2,
.col-1,
.col-3 {
    flex: 1; /* Distribute available space equally among these columns */
    text-align: center;
}

/* Set a fixed width for the buttons */
button[type="button"] {
    width: 100%; /* Make buttons take up 100% of their parent's width */
}

element.style {
}
[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
}
button[type="button"] {
    width: 100%;
}
[type=button], [type=reset], [type=submit], button {
    -webkit-appearance: button;
}
button, select {
    text-transform: none;
}
button,  optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: 13px;
    line-height: inherit;
}

 .form label {
        display: inline-block;
    width: 150px;
    text-align: left;
    margin-right: -4px;
    }

    .form input[type="text"] {
      width: 46%; /* Input fields take the remaining width */
    }

    /* Apply the same styles to the second form */
    .form1 label {
        display: inline-block;
    width: 150px;
    text-align: left;
    margin-right: -2px;
    }

    .form1 input[type="text"] {
      width: 46%;
    }


    .container-box{
        width:100%;
    }
    .border1{
        background: #49D0C3;
    width: 100%;
    height: 9px;
    }
     .image{
        width:80%;
        margin-left:50px;
     }
     input.list {
    width: 93%;
    margin-top: 40px;
    margin-left: 27px;
}
button.view {
    margin-top: 31px;
    margin-left: 10px;
    width: 134px;
    font-size: 15px;
    height: 45px;
    border: none;
    background: linear-gradient(0deg, #27B8DF -31.82%, #23B5E2 178.41%);
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    border-radius: 3px;
    color: white;
    font-weight: 700;
}
.view a{
    text-decoration:none;
    color: white;
}
i.fa.fa-search {
    margin-left: -67px;
}


.vehicle{
    margin-top:30px;

}
.form{
    background: #F8F9FA;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    margin-left: 76px;
    width: 75.5pc;
    border-radius:5px;
}
.form1{
    background: #F8F9FA;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    margin-left: 76px;
    width: 75.5pc;
    border-radius: 5px;
    height: 196px;
}
.invoice {
    width: 19pc;
    margin-bottom: 23px;
    margin-top: 15px;
    border-radius:5px;
    border:1px solid black;
    height:30px;
}
label{
    margin-left: 115px;
    color: black;
}
.label1{
    margin-left: -14px;
    color: black;
}
.vehicle1{
    margin-top:15px;
}
.search{
    background:white;
    border:none;
}


/* Style for modal overlay */
.modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
    text-align: center;
    overflow-y: auto; /* Add vertical scroll to the overlay */
}

/* Style for modal content */
.modal-content {
    position: absolute;
    top: 46%;
    left: 50%;
    max-height: 80%; /* Set a maximum height for the modal content */
    width: 90%; /* Set a width for the modal content */
    transform: translate(-50%, -50%);
    padding: 20px;
    background: #F8F9FA;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    border-radius: 5px;
    overflow-y: auto; /* Add vertical scroll to the modal content */
}



/* Style for modal overlay */
.accsum-modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
    text-align: center;
    overflow-y: auto; /* Add vertical scroll to the overlay */
}

/* Style for modal content */
.accsum-modal-content {
    position: absolute;
    top: 46%;
    left: 50%;
    max-height: 80%; /* Set a maximum height for the modal content */
    width: 47%; /* Set a width for the modal content */
    transform: translate(-50%, -50%);
    padding: 20px;
    border-radius: 5px;
    background: linear-gradient(180deg, #45CDC6 0%, #2ABADD 100%);
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    overflow-y: auto; /* Add vertical scroll to the modal content */
    border-radius:4px;
}












/* Style for modal overlay */
.sum-modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
    text-align: center;
    overflow-y: auto; /* Add vertical scroll to the overlay */
}

/* Style for modal content */
.sum-modal-content {
    position: absolute;
    top: 46%;
    left: 50%;
    max-height: 80%; /* Set a maximum height for the modal content */
    width: 45%; /* Set a width for the modal content */
    transform: translate(-50%, -50%);
    padding: 20px;
    border-radius: 5px;
    background: linear-gradient(180deg, #4ED3BF 0%, #0276B9 100%);
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    overflow-y: auto; /* Add vertical scroll to the modal content */
    border-radius:4px;
}




/* Style for close button */
.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
}

.close{
    position: absolute;
    top: 5px;
    right: 29px;
    font-size: 24px;
    cursor: pointer;
}


.acc-button{
    position: absolute;
    top: 9px;
    right: 29px;
    font-size: 24px;
    cursor: pointer;
}

.opening-balance-label {
margin-left: 16px;
font-weight: bold;
text-align:center;
margin-top: -10px;
color: black;
width: 254px;
padding-top:7px;
height: 40px;
flex-shrink: 0;
border-radius: 3px;
background: linear-gradient(180deg, #45CDC6 0%, #2ABADD 100%);
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}

.reduct_balance{
    margin-left: 16px;
font-weight: bold;
text-align:center;
margin-top: 11px;
color: black;
width: 254px;
padding-top:7px;
height: 40px;
flex-shrink: 0;
border-radius: 3px;
background: linear-gradient(180deg, #45CDC6 0%, #2ABADD 100%);
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}
.total-balance-label {
    margin-left: 55rem;
    margin-top: -34px;
    margin-bottom: 17px;
    width: 12rem;
    height: 34px;
    border-radius: 3px;
    font-weight: bold;
    flex-shrink: 0;
    color: black;
    text-align: center;
    padding-top: 7px;
    background: linear-gradient(180deg, #45CDC6 0%, #2ABADD 100%);
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}
.gift-balance-label{
    margin-left: 55rem;
    margin-top: -31px;
    margin-bottom: 14px;
    width: 12rem;
    height: 34px;
    border-radius: 3px;
    font-weight: bold;
    flex-shrink: 0;
    color: black;
    text-align: center;
    padding-top: 7px;
    background: linear-gradient(180deg, #45CDC6 0%, #2ABADD 100%);
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}
.file-balance-label{
    margin-left: 45rem;
    margin-top: -31px;
    margin-bottom: 19px;
    width: 15rem;
    height: 34px;
    border-radius: 3px;
    font-weight: bold;
    flex-shrink: 0;
    color: black;
    text-align: center;
    padding-top: 7px;
    background: linear-gradient(180deg, #45CDC6 0%, #2ABADD 100%);
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}


/* Styles for the dropdown */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a, .dropdown-content span {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    color: #333;
}

/* Style for the arrow icon */
.arrow-icon {
    float: right;
    margin-right: -23px;
}
.hidden {
    display: none;
}

  .table {
    width: 82%;
    margin-left: 5rem;
    border-collapse: collapse; 
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;    background-color: white;
    max-height: 400px;
    border-radius: 10px;
    cursor: pointer;
  } 
  button.financesave {
    color: white;
    border: none;
    width: 69px;
    height: 26px;
    font-weight: bold;
    border-radius: 4px;
    background: #2DBCDB;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    margin-left: 12px;
    margin-top: 18px;
}
button.exchangesave{
    color: white;
    border: none;
    width: 69px;
    height: 26px;
    font-weight: bold;
    border-radius: 4px;
    background: #2DBCDB;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    margin-left: 40px;
    margin-top: 17px;
}
button.giftsave{
    color: white;
    border: none;
    width: 69px;
    height: 26px;
    font-weight: bold;
    border-radius: 4px;
    background: #2DBCDB;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    margin-top: 17px;
    margin-left: 30px;
}
button.cashsave{
    color: white;
    border: none;
    width: 69px;
    height: 26px;
    font-weight: bold;
    border-radius: 4px;
    background: #2DBCDB;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}
button.filesave{
    color: white;
    border: none;
    width: 69px;
    height: 26px;
    font-weight: bold;
    border-radius: 4px;
    background: #2DBCDB;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    margin-left: 40px;
    margin-top: 17px;
}
button.acc_save{
    color: white;
    border: none;
    width: 69px;
    height: 26px;
    font-weight: bold;
    border-radius: 4px;
    background: #2DBCDB;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    margin-left: 40px;
    margin-top: 17px;
}


button.sales {
    width: 6pc;
    border-radius: 3px;
border: 1px solid #CACACA;
color:black;
opacity: 0.9;
}
button.payment {
    width: 6pc;
    border-radius: 3px;
border: 1px solid #CACACA;
color:black;
opacity: 0.9;
}
button.exchange {
    width: 6pc;
    border-radius: 3px;
border: 1px solid #CACACA;
color:black;
opacity: 0.9;
}
button.offer {

    /* border: 1px solid rgba(0, 0, 0, 0.5); Adjust the last parameter (0.5) for the desired opacity */
    border:none;
    background-color: #CACACA;
}
.dropdown {
    width: 6pc;
    background-color: #CACACA;
    border-radius: 3px;
border: 1px solid #CACACA;
color:black;
opacity: 0.9;
}
button.file {
    width: 6pc;
    border-radius: 3px;
border: 1px solid #CACACA;
color:black;
opacity: 0.9;
}
button.acc {
    width: 6pc;
    border-radius: 3px;
border: 1px solid #CACACA;
color:black;
opacity: 0.9;
}
button.summary {
    width: 88px;
    margin-left: 63rem;
    margin-top: -52px;
    font-size: 15px;
    margin-bottom: 22px;
    color: white;
    text-align: center;
    background: linear-gradient(180deg, #44CCC7 19.79%, #2FBED9 100%);
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    border: none;
    border-radius: 4px;
    padding-top: 7px;
    padding-bottom: 6px;
}

button#accountSummaryButton {
    width: 95px;
    margin-left: 63rem;
    margin-top: -33px;
    font-size: 15px;
    margin-bottom: 22px;
    color: white;
    text-align: center;
    background: linear-gradient(180deg, #44CCC7 19.79%, #2FBED9 100%);
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    border: none;
    border-radius: 4px;
    padding-top: 7px;
    padding-bottom: 6px;
}
/* Style for the summary form */
.summary-file-details {
            display: none;
        }
        i.fa.fa-sign-out {
    margin-left: 21px;
    font-size: 27px;
}
button.sum_acc_save {
    margin-left: -26pc;
    width: 60px;
    height: 34px;
    margin-bottom: 10px;
    border: none;
    border-radius: 4px;
}
</style>
<body>


<div class="container-box">
    <div class="border1"></div>
    <form action="" method="post">
        <div class="row">
            <div class="col-2">
                <img class="image" src="img2.png" alt="Image not Found" srcset="">
            </div>
            <div class="col-7">
                <input type="text" class="list" name="search" id="" placeholder="Search Chassis No">
                <button type="submit" name="submit1" class="search"><i class="fa fa-search"></i></button>
            </div>
            <div class="col-3">
    <button class="view"><a href="salesview.php">REPORT</a></button>

    <a href="login.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
    </form>

    <div class="container">
        
        <div class="table-container">
            <table class="table" id="myTable">
            <?php

            if (isset($_POST['submit1'])) {


                $search = $_POST['search'];

                $aProjectQuery = "SELECT a.*,
                    p.`Ex showroom`, p.`LT/RT`, p.`Insurance`, p.`Pro Plus`, p.`Accessories`, p.`On Road Price`,
                    SUM(db.CREDIT) AS TotalCredit,
                    SUM(db.HDFCCA) AS TotalHDFCCA,
                    SUM(db.HDRCC) AS TotalHDRCC,
                    SUM(db.INV) AS TotalINV,
                    SUM(db.HDFC) AS TotalHDFC,
                    SUM(db.IDFC) AS TotalIDFC,
                    SUM(db.IBC) AS TotalIBC,
                    a.ROADSIDEASSISTANCE AS TotalRoadsideAssistance,
                    a.CUSTOMERSIDEINSURANCE AS TotalCustomerSideInsurance,
                    a.EXTENDEDWARRANTY AS TotalExtendedWarranty,
                    a.CASHDISCOUNT AS TotalCashDiscount,
                    a.BASICFITTINGS AS TotalBasicFittings,
                    a.PETROL AS TotalPetrol,
                    a.MECHANICCOMMISSION AS TotalMechanicCommission,
                    a.VEHICLECOVER AS TotalVehicleCover,
                    a.EXTRAFITTING AS TotalExtraFitting,
                    a.ANYOTHER AS TotalAnyOther
                FROM `project` a
                INNER JOIN `product` p ON a.VEHICLEMODEL = p.Models
                LEFT JOIN daybook db ON a.CUSTOMERNAME = db.CUSTOMERNAME AND a.CUSTOMERCODE = db.CUSTOMERCODE";  
                
            

                 // Check if the userPlace is not empty
    if (!empty($userPlace)) {
        $aProjectQuery .= " WHERE RIGHT(a.CHASSISNO, 5) = '$search' AND a.BRANCHESDEALERS = '$userPlace'";
    } else {
        $aProjectQuery .= " WHERE RIGHT(a.CHASSISNO, 5) = '$search'";
    }

                

                $aProjectQuery .= " GROUP BY a.ID";
    
            



  $aProjectResult = mysqli_query($conn, $aProjectQuery);
  
  if (mysqli_num_rows($aProjectResult) > 0) {
    $totalCredit = 0; // Initialize the totalCredit variable
    $totalHDFCCA = 0; // Initialize the totalHDFCCA variable
    $totalHDRCC = 0; // Initialize the totalHDRCC variable
    $totalINV = 0; // Initialize the totalINV variable
    $totalHDFC = 0; // Initialize the totalHDFC variable
    $totalIDFC = 0; // Initialize the totalIDFC variable
    $totalIBC = 0; // Initialize the totalIBC variable
    $totalAccessories = 0; // Initialize the totalAccessories variable
    $TotalRoadsideAssistance = 0;
    $TotalCustomerSideInsurance = 0;
    $TotalExtendedWarranty = 0;
    $TotalCashDiscount = 0;
    $TotalBasicFittings = 0; 
    $TotalPetrol = 0; 
    $TotalMechanicCommission = 0;
    $TotalVehicleCover = 0;
    $TotalExtraFitting = 0;
    $TotalAnyOther = 0;
    $TotalInsurance = 0;
$TotalProPlus = 0;
$TotalAccessories = 0;
    $remaining = 0;
    $balance =0;
    $bal =0;
    $offer = 0;
      ?>
      <thead>
      <tr>
          <th>Invoice Date</th>
          <th>Chassis No</th>
          <th>Vehicle Model</th>
          <th>Customer Name</th>
          <th>Payment Type</th>
          <th>Branches/Sub Dlrs</th>
          <th>Customer Code</th>
          <th style="display:none;">Ex Showroom</th>
          <th>LT/RT</th>
          <th>Insurance</th>
          <th>Pro Plus</th>
          <th>Accessories</th>
          <th>On Road Price</th>
          <th>Road Side Assistance</th>
      </tr>
      </thead>
      <tbody>
<?php
while ($row = mysqli_fetch_assoc($aProjectResult)) {
    echo "<tr data-id='" . $row['ID'] . "'>";
    echo "<td>" . $row['INVOICEDATE'] . "</td>";
    echo "<td>" . $row['CHASSISNO'] . "</td>";
    echo "<td>" . $row['VEHICLEMODEL'] . "</td>";
    echo "<td>" . $row['CUSTOMERNAME'] . "</td>";
    echo "<td>" . $row['PAYMENTTYPE'] . "</td>";
    // echo "<td>" . $userPlace . "</td>";
    echo "<td>" . $row['BRANCHESDEALERS'] . "</td>";
    
    echo "<td>" . $row['CUSTOMERCODE'] . "</td>";
    echo '<td style="display: none;">' . $row['Ex showroom'] . '</td>';
    echo "<td>" . $row['LT/RT'] . "</td>";
    echo "<td>" . $row['Insurance'] . "</td>";
    echo "<td>" . $row['Pro Plus'] . "</td>";
    echo "<td>" . $row['Accessories'] . "</td>";
    echo "<td>" . $row['On Road Price'] . "</td>";
    echo "<td>" . $row['TotalRoadsideAssistance'] . "</td>";
    // Add JavaScript to update the "Vehicle Cost" field with the "On Road Price" when a row is clicked.
    echo "<script>
    document.querySelector('tr[data-id=\"" . $row['ID'] . "\"]').addEventListener('click', function() {
        document.getElementById('sum_vehicle_cost').value = '" . $row['On Road Price'] . "';
    });
  </script>";
    echo "</tr>"; 


    // Access the calculated totals for the additional fields
    $TotalRoadsideAssistance += floatval($row['TotalRoadsideAssistance']);
    $TotalCustomerSideInsurance += floatval($row['TotalCustomerSideInsurance']);
    $TotalExtendedWarranty += floatval($row['TotalExtendedWarranty']);
    $TotalCashDiscount += floatval($row['TotalCashDiscount']);
    $TotalBasicFittings += floatval($row['TotalBasicFittings']);
    $TotalPetrol += floatval($row['TotalPetrol']);
    $TotalMechanicCommission += floatval($row['TotalMechanicCommission']);
    $TotalVehicleCover += floatval($row['TotalVehicleCover']);
    $TotalExtraFitting += floatval($row['TotalExtraFitting']);
    $TotalAnyOther += floatval($row['TotalAnyOther']);
$TotalInsurance += floatval($row['Insurance']);
    $TotalProPlus += floatval($row['Pro Plus']);
    $TotalAccessories += floatval($row['Accessories']);
    $totalCredit += floatval($row['TotalCredit']); // Calculate total credit
    $totalHDFCCA += floatval($row['TotalHDFCCA']); // Calculate total HDFCCA
    $totalHDRCC += floatval($row['TotalHDRCC']); // Calculate total HDRCC
    $totalINV += floatval($row['TotalINV']); // Calculate total INV
    $totalHDFC += floatval($row['TotalHDFC']); // Calculate total HDFC
    $totalIDFC += floatval($row['TotalIDFC']); // Calculate total IDFC
    $totalIBC += floatval($row['TotalIBC']); // Calculate total IBC
    $totalAccessories += floatval($row['On Road Price']); // Calculate total accessories
    $credit = $totalCredit + $totalHDFCCA + $totalHDRCC + $totalINV + $totalHDFC + $totalIDFC + $totalIBC;

    



    $offer = $TotalRoadsideAssistance + $TotalCustomerSideInsurance + $TotalExtendedWarranty + $TotalCashDiscount + $TotalBasicFittings + $TotalPetrol + $TotalMechanicCommission + $TotalVehicleCover + $TotalExtraFitting + $TotalAnyOther;

    $cashoffer = $TotalRoadsideAssistance + $TotalCustomerSideInsurance + $TotalExtendedWarranty + $TotalCashDiscount;

    // Calculate total reductions
    $reductions = $TotalInsurance + $TotalProPlus + $TotalAccessories;

    $reductbalance =  $totalAccessories - $reductions;
    

    // + $totalHDFCCA + $totalHDRCC + $totalINV + $totalHDFC + $totalIDFC + $totalIBC;
    $remaining = $totalAccessories - $credit  - $reductions - $cashoffer;

  // Store the calculated "Offer Balance" value in the database
  if (isset($row['CUSTOMERCODE']) && isset($row['CUSTOMERNAME'])) {
    $customerCode = $row['CUSTOMERCODE'];
    $customerName = $row['CUSTOMERNAME'];
    // Update the "CASHOFFERAMT" column for the specific customer
    $updateOfferQuery = "UPDATE project SET OFFERAMOUNT = $offer, TOTALCASHRECEIVED = $credit, VEHICLETOTALPRICE = $totalAccessories, REDUCTIONS = $reductions, BALANCEAMOUNT = $remaining  WHERE CUSTOMERCODE = '$customerCode' AND CUSTOMERNAME = '$customerName'";
    mysqli_query($conn, $updateOfferQuery);
}


    
}
?>
</tbody>
<!-- Add a row to display the total credit -->
<tfoot>
    <tr>
        <td colspan="10" class="hidden"></td>
        <td>Total Credit: <?php echo $credit; ?></td>
        <td>Total On Road: <?php echo $totalAccessories; ?></td>
        <td>Offer Balance: <?php echo $offer ?></td>
        <td>Reductions: <?php echo $reductions ?></td>
        <td>Remaining Balance: <?php echo $remaining ?></td>
    </tr>
</tfoot>
                        <?php
                    } else {
                        // Chassis number not found in 'a_project' table, display an alert
                        echo '</table>'; // Close the table to prevent the header from showing
                        ?>
                        <script>
                            alert('Chassis No not found in a_project');
                            window.location.href = 'sales.php'; // Redirect to form.php
                        </script>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <script>
    document.getElementById('myTable').addEventListener('click', function() {
        this.style.display = 'none'; // Hide the table when it's clicked
    });
</script>
</div>

  </div>
  </div>


    <div class="sales-border">
    <p style="
    margin-top: -10px;
    font-weight: bold;"><?php echo $userPlace; ?></p>
    <div class="options">
        
  
    <div class="row">

    <div class="col-12"> 
    <span>
        <div class="row">
       
        <div class="col-2">
            <button type="button" class="sales">Sales</button>
        </div>
        <div class="col-1">
            <button type="button" class="payment">Payment</button>
        </div>  
        <div class="col-1">
            <button type="button" class="exchange">Exchange</button>
        </div>
        <div class="col-2">
                            <div class="dropdown">
                                <button id="offerButton" class="offer">
                                    Offer
                                    <span class="arrow-icon">▼</span>
                                </button>
                                <div class="dropdown-content" id="offerDropdown">
                                    <span id="option1">Cash offer</span>
                                    <span id="option2">Gift offer</span>                                    
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
    const offerButton = document.getElementById("offerButton");
    const offerDropdown = document.getElementById("offerDropdown");

    offerButton.addEventListener("click", function () {
        offerDropdown.style.display = offerDropdown.style.display === "block" ? "none" : "block";
    });

    // Close the dropdown when clicking outside of it
    window.addEventListener("click", function (event) {
        if (event.target !== offerButton && event.target.className !== "arrow-icon") {
            offerDropdown.style.display = "none";
        }
    });
});

                        </script>
        <div class="col-2">
            <button type="button" class="file" id="openFileDetailsModal">File Details</button>
        </div>
        <div class="col-1">
            <button type="button" class="acc" id="accountButton">Accounts</button>
        </div>
        <div class="col-3">
        <div class="opening-balance-label">
    Total Balance: <span id="remainingBalance">RS.<?php echo isset($remaining) ? $remaining : '0'; ?></span>
</div>
<div class="reduct_balance">
    Actual Amount: <span id="reductbalance">RS.<?php echo isset($reductbalance) ? $reductbalance : '0'; ?></span>
</div>
</div>
</div>
</div>
        </div>
        </div></span>
    </div>
    
    </div>
</div>
</div>











<div class="vehicle">
    <form class="form" action="" method="post" id="paymentForm">
        <div class="row">
            <div class="col-6">
                <label for="">Invoice Date</label>
                <input type="text" class="invoice" name="invoice" id="invoice" readonly>
            </div>
            <div class="col-6">
                <label for="" class="label1">Chassis No</label>
                <input type="text" class="invoice" name="chassis" id="chassis" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="">Vehicle Model</label>
                <input type="text" class="invoice" name="model" id="model" readonly>
            </div>
            <div class="col-6">
                <label for="" class="label1">Customer Name</label>
                <input type="text" class="invoice" name="custname" id="custname" oninput="updateBalance()" readonly>
               <script>
function updateBalance() {
    const currentBalance = document.getElementById("currentBalance");
    const remainingBalance = document.getElementById("remainingBalance");
    const customerNameInput = document.getElementById("custname");
    const onRoadPriceInput = document.getElementById("on_road");
    const customerName = customerNameInput.value;
    const onRoadPrice = parseFloat(onRoadPriceInput.value) || 0;
    const currentCredit = parseFloat("<?php echo isset($totalCredit) ? $totalCredit : '0'; ?>");

    // Make an AJAX request to fetch the customer's credit
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "fetch_customer_credit.php", true); // Replace with the correct URL for your server-side script
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const customerCredit = parseFloat(xhr.responseText) || 0;

            // Calculate remaining balance
            const remaining = customerCredit - onRoadPrice;

            // Update the Current Balance and Remaining Balance labels
            currentBalance.textContent = `RS. ${customerCredit.toFixed(2)}`;
            remainingBalance.textContent = `RS. ${remaining.toFixed(2)}`;
        }
        // Add an event listener to the customer name input
document.getElementById("custname").addEventListener("input", updateBalance);
    };

    // Send the customer name to the server
    xhr.send("customerName=" + customerName);
}
</script>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="">Payment Type</label>
                <input type="text" class="invoice" name="payment" id="payment" readonly>
            </div>
            <div class="col-6">
                <label for="" class="label1">Branches/Sub DLRS</label>
                <input type="text" class="invoice" name="branch" id="branch" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <label for="">Customer Code</label>
                <input type="text" class="invoice" name="code" id="code" readonly>
            </div>
        </div>
    </form>
</div>

<div class="vehicle1">
    <form class="form1" action="" method="post">
        <div class="row">
            <div class="col-6">
                <label for="">Ex-Showroom Price</label>
                <input type="text" class="invoice" name="exshow" id="exshow" readonly>
            </div>
            <div class="col-6">
                <label for="" class="label1">LT-RT</label>
                <input type="text" class="invoice" name="lt" id="lt" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="">Insurance</label>
                <input type="text" class="invoice" name="insurance" id="insurance" readonly>
            </div>
            <div class="col-6">
                <label for="" class="label1">Basic Fittings</label>
                <input type="text" class="invoice" name="basic_fittings" id="basic_fittings" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="">Production Plus</label>
                <input type="text" class="invoice" name="proplus" id="proplus" readonly>
            </div>
            <div class="col-6">
                <label for="" class="label1">On Road Price</label>
                <input type="text" class="invoice" name="on_road" id="on_road" readonly>
            </div>
        </div>
       
</div>




<script>
   // Get references to the input fields and the onroadbalance element
var insuranceField = document.getElementById("insurance");
var basicFittingsField = document.getElementById("basic_fittings");
var proplusField = document.getElementById("proplus");
var onRoadField = document.getElementById("on_road");
var onroadbalanceElement = document.getElementById("onroadbalance");

// Function to calculate and update the On Road Balance
function updateOnRoadBalance() {
    var insurance = parseFloat(insuranceField.value) || 0;
    var basicFittings = parseFloat(basicFittingsField.value) || 0;
    var proplus = parseFloat(proplusField.value) || 0;
    var onRoadPrice = parseFloat(onRoadField.value) || 0;

    // Calculate the On Road Balance
    var onRoadBalance = onRoadPrice - (insurance + basicFittings + proplus);

    // Set the On Road Balance in the onroadbalance element
    onroadbalanceElement.textContent = "RS." + onRoadBalance.toFixed(2);
}

// Add event listeners to the input fields to trigger the calculation
insuranceField.addEventListener("input", updateOnRoadBalance);
basicFittingsField.addEventListener("input", updateOnRoadBalance);
proplusField.addEventListener("input", updateOnRoadBalance);
onRoadField.addEventListener("input", updateOnRoadBalance);

// Initial calculation when the page loads
updateOnRoadBalance();

</script>
</div>





<!-- Account Details -->
<div class="modal-overlay" id="accountModal">
    <div class="modal-content">
    <span class="acc-button" id="accPaymentModal">&times;</span>
        <div class="sales-border">
            <div class="options">
                <div class="row">
                    <div class="col-12"> 
                        <div class="row"></div>
                    </div>
                    <h4>Account Form</h4>
                    <?php
    if ($showAccountSummaryButton) {
        echo '<button type="button" id="accountSummaryButton" class="account_summary">SUMMARY</button>';
    }
    ?>
                    <form class="" action="" id="accountForm" method="post">
                        <div class="acc-details">
                            <input class="hidden" type="text" name="acccustname" id="acccustname" readonly>
                            <input class="hidden" type="text" name="acccustcode" id="acccustcode" readonly>
                            <div class="row">
                                <div class="col-6"  style="margin-left: -6px; margin-top: 24px;">
                                    <label for="rto_confirm">RTO Confirmation</label>
                                    <input type="text" style="width: 17pc;" name="rto_confirm" id="rto_confirm" readonly>
                                </div>
                                <div class="col-6" style="margin-left: -76px; margin-top: 24px;">
                                    <label for="acc_verified_date">Account Verified Date</label>
                                    <input type="date" style="width: 17pc;" name="acc_verified_date" id="acc_verified_date" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="margin-left: 19px; margin-top: 31px;">
                                    <label for="rto_status">RTO Status</label>
                                    <select style="width: 17pc; height: 30px;" name="rto_status" id="rto_status" required>
                                        <option value="">Select Option</option>
                                        <option value="Open">Open</option>
                                        <option value="Closed" >Closed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="acc_save" name="acc_save" id="acc_save">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="accsum-modal-overlay" id="accsummaryModal" style="display: none;">
       <div class="accsum-modal-content">
           <div class="accsummary-file-details" id="accsummary-file-details">
           <form action="" method="post" class="sumaccform">
                <button type="submit" class="sum_acc_save" name="sum_acc_save">SAVE</button>
            <span class="close" id="accsummaryclose">&times;</span>
            

           <div class="row">
            <div class="col-12">
            <input class="hidden" type="text" name="sum_acc_name" id="sum_acc_name">
            <input class="hidden" type="text" name="sum_acc_code" id="sum_acc_code" style="margin-bottom: 11px;">
<br>
            <label for="short_excess" style="margin-left: -15px;
    margin-bottom: 15px;
    margin-right: 29px;
    color: white;
    font-size: 17px;">Shortage/Excess Amount:</label>
                <input type="text" name="short_excess" id="short_excess" style="border:none; border-radius:4px; width: 14pc;
    height: 2pc;" readonly>
            </div>
           </div>
           <div class="row">
            <div class="col-12">
                <label for="sum_rto_confirm" style="margin-left: 38px;
    margin-bottom: 15px;
    margin-right: 29px;
    color: white;
    font-size: 17px;">RTO Confirmation:</label>
                <select name="sum_rto_confirm" id="sum_rto_confirm" style="width: 12pc;
    height: 30px; border:none; border-radius:4px; width: 14pc;
    height: 2pc;" required>
                    <option value="">Select RTO Status</option>
                    <option value="Accept">Accept</option>
                    <option value="Reject">Reject</option>
                    <option value="Waiting">Waiting</option>
                </select>
            </div>
           </div>
           <div class="row">
            <div class="col-12">
                <label for="folder_close" style="margin-left: 25px;
    margin-bottom: 15px;
    margin-right: 29px;
    color: white;
    font-size: 17px;">Folder Closing Date:</label>
                <input type="date" name="folder_close" id="folder_close" style="border:none; border-radius:4px; width: 14pc;
    height: 2pc;">
            </div>
           </div>
           <div class="row">
            <div class="col-12">
                <label for="account_closing_date" style="margin-left: 10px;
    margin-bottom: 15px;
    margin-right: 29px;
    color: white;
    font-size: 17px;">Account Closing Date:</label>
                <input type="date" name="account_closing_date" id="account_closing_date" style="border:none; border-radius:4px; width: 14pc;
    height: 2pc;">
            </div>
           </div>
           <div class="row">
            <div class="col-12">
                <label for="sum_account_status" style="margin-left: 58px;
    margin-bottom: 15px;
    margin-right: 29px;
    color: white;
    font-size: 17px;">Account Status:</label>
                <input type="text" name="sum_account_status" id="sum_account_status" style="border:none; border-radius:4px; width: 14pc;
    height: 2pc;" required>
            </div>
           </div>
           <div class="row">
            <div class="col-12">
                <label for="sum_acc_remarks" style="margin-left: 104px;
    margin-bottom: 15px;
    margin-right: 29px;
    color: white;
    font-size: 17px;">Remarks:</label>
                <input type="text" name="sum_acc_remarks" id="sum_acc_remarks" style="border:none; border-radius:4px; width: 14pc;
    height: 2pc;" required>
            </div>
           </div>
                
            </form>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Attach a click event handler to the "Account Summary" button
    $("#accountSummaryButton").click(function() {
        // Show the "Summary Account Form" by changing its display style
        $("#accsummaryModal").css("display", "block");
        accountsumdata();
    });

    // Attach a click event handler to the close button
    $("#accsummaryclose").click(function() {
        // Hide the "Summary Account Form" when the close button is clicked
        $("#accsummaryModal").css("display", "none");
    });

    var totalBalance = $('#remainingBalance').text();

    // Remove "RS." and any leading/trailing whitespace from the value
    totalBalance = totalBalance.replace('RS.', '').trim();

    // Set the value of the "short_excess" input field to the "Total Balance" value
    $('#short_excess').val(totalBalance);
});




// Function to populate the account summary data
function accountsumdata() {
    // Extract the customer code
    const sum_acc_code = document.getElementById("sum_acc_code").value;

    // Elements to populate
    const short_excessInput = document.getElementById("short_excess");
    const sum_rto_confirmInput = document.getElementById("sum_rto_confirm");
    const folder_closeInput = document.getElementById("folder_close");
    const account_closing_dateInput = document.getElementById("account_closing_date");
    const sum_account_statusInput = document.getElementById("sum_account_status");
    const sum_acc_remarksInput = document.getElementById("sum_acc_remarks");

    // Make an AJAX request to fetch account summary data from the server
    $.ajax({
        type: "GET",
        url: "get_acc_sum.php", // Replace with the correct URL
        data: { customerCode: sum_acc_code },
        dataType: "json",
        success: function(data) {
            // Populate the form fields with the retrieved data
            short_excessInput.value = data.excess;
            sum_rto_confirmInput.value = data.rtoconfirm;
            folder_closeInput.value = data.folderclosedate;
            account_closing_dateInput.value = data.accountclosedate;
            sum_account_statusInput.value = data.status;
            sum_acc_remarksInput.value = data.remarks;
        },
        error: function() {
            alert("Error retrieving account summary data.");
        }
    });
}



// Add an event listener to the Account button to populate the account modal
accountButton.addEventListener('click', function() {
    // Call the function to populate the account modal fields
    populateAccountModal();
    // Set the values for "sum_acc_name" and "sum_acc_code" in the Summary Account Form
    document.getElementById('sum_acc_name').value = accCustNameInput.value;
    document.getElementById('sum_acc_code').value = accCustCodeInput.value;
    // Display the modal when the button is clicked
    accountModal.style.display = 'block';







});
</script>



<script>
    // Get references to the input fields in the account modal
    var accCustNameInput = document.getElementById('acccustname');
    var accCustCodeInput = document.getElementById('acccustcode');
    const accPaymentModal = document.getElementById("accPaymentModal");

    // Get the Account button
var accountButton = document.getElementById('accountButton');

    // Function to populate the account modal input fields with the customer name and code
    function populateAccountModal() {
        // Retrieve the values from the existing input fields
        var custName = document.getElementById('custname').value;
        var custCode = document.getElementById('code').value;


          // Check if the chassis number (custCode) is empty
    if (!custCode) {
        alert("Please search for a chassis number first.");
        return;
    }
    
        // Set the values in the account modal input fields
        accCustNameInput.value = custName;
        accCustCodeInput.value = custCode;
         // Fetch and populate the additional account data
        retrieveaccountdetails();
    }

    // Add an event listener to the Account button to populate the account modal
    accountButton.addEventListener('click', function() {
        // Call the function to populate the account modal fields
        populateAccountModal();
        // Display the modal when the button is clicked
        accountModal.style.display = 'block';
    });

    // You can also close the modal when clicking outside the modal content
    accountModal.addEventListener('click', function(e) {
        if (e.target === accountModal) {
            accountModal.style.display = 'none';
        }
    });

    accPaymentModal.addEventListener("click", function() {
        accountModal.style.display = "none";
    });

    // Event listener for the Save button in the Account modal
    document.getElementById('accountForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // Handle the form submission here (e.g., save data to the server)
        // Close the modal when you're done
        accountModal.style.display = 'none';
    });



    function retrieveaccountdetails() {
    // Extract the customer code
    const acccustomercode = document.getElementById("acccustcode").value;

    // Elements to populate
    const verifieddate = document.getElementById("acc_verified_date");
    const rtostatus = document.getElementById("rto_status");
    const rtoconfirm = document.getElementById("rto_confirm");


    // Make an AJAX request to fetch account data from the server
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `get_account_data.php?customerCode=${acccustomercode}`, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);

            // Populate the form fields with the retrieved data
            verifieddate.value = data.verifieddate;
            rtostatus.value = data.rtostatus;
            rtoconfirm.value = data.accountconfirm;
        }
    };

    xhr.send();
}
</script>






<!----Payment Mode---->

<div class="modal-overlay" id="paymentModal">
    <div class="modal-content">
        <span class="close-button" id="closePaymentModal">&times;</span>
        <div class="sales-border">
            <div class="options">
                <div class="row">
                    <h4>Payment Form</h4>
                    <a href="#" id="showDetailsLink">Show full details</a>
                </div>
            </div>
        </div>
        
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const tableRows = document.querySelectorAll("tbody tr");
    const paymentModal = document.getElementById("paymentModal");
    
    tableRows.forEach(row => {
        row.addEventListener("click", function() {
            // Get the values for customer code and name from the row
            const customerCode = this.cells[6].textContent;
            const customerName = this.cells[3].textContent;
            const PaymentType = this.cells[4].textContent;

            // Update the input fields in the payment form
            const paymentCodeInput = paymentModal.querySelector("#paymentCode");
            const paymentNameInput = paymentModal.querySelector("#paymentName");
            const paymentTypeInput = paymentModal.querySelector("#paymentType");

            paymentCodeInput.value = customerCode;
            paymentNameInput.value = customerName;
            paymentTypeInput.value = PaymentType;

            // Show the payment modal
            paymentModal.style.display = "block";

            retrieveFinanceData(customerCode);
        });
    });






    // Close the payment modal
    const closePaymentModalButton = document.getElementById("closePaymentModal");
    closePaymentModalButton.addEventListener("click", function() {
        paymentModal.style.display = "none";
    });

    // Function to fetch finance data from the server
    function retrieveFinanceData(customerCode) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `fetch_finance_data.php?customerCode=${customerCode}`, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const financeData = JSON.parse(xhr.responseText);

                if (!financeData.error) {
                    // Populate the input fields with the retrieved finance data
                    document.querySelector("input[name='ip_receivable']").value = financeData.ip_receivable;
                    document.querySelector("input[name='ip_received']").value = financeData.ip_received;
                    document.querySelector("input[name='finance_receivable']").value = financeData.finance_receivable;
                    document.querySelector("input[name='finance_received']").value = financeData.finance_received;
                } else {
                    alert(financeData.error);
                }
            }
        };
        xhr.send();
    }
});




</script>
        <div class="cashdetails">
            <table class="table table-bordered" style="margin-right: 10px;">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th class="hidden">TYPES</th>
                    <th>CUSTOMER NAME</th>
                    <th class="hidden">CUSTOMER CODE</th>
                    <th class="hidden">PHONE NUMBER</th>
                    <th>RECEIPT</th>
                    <th class="hidden">VEHICLE NAME</th>
                    <th>MODE</th>
                    <th>NEFTOPTION</th>
                    <th>HDFCCA</th>
                    <th>HDRCC</th>
                    <th>INV</th>
                    <th>FINANCEOPTION</th>
                    <th>HDFC</th>
                    <th>IDFC</th>
                    <th>IBC</th>
                    <th>CREDIT</th>
                </tr>
            </thead>
            <tbody id="customerDetailsTableBody">
            </tbody>
            </table>
        </div>



        <form class="" action="" method="post">
        <div class="cash-details1">
        <div class="row">
            <div class="col-6 hidden">
                <label for="paymentCode">Code</label>
                <input type="text" name="code" id="paymentCode">
            </div>
            <div class="col-6 hidden">
                <label for="paymentName">Name</label>
                <input type="text" name="name" id="paymentName" >
            </div>
            <div class="col-6 hidden">
                <label for="paymentType">Type</label>
                <input type="text" name="type" id="paymentType" >
            </div>
        </div>



<div class="finance_details" id="financeDetails">
    <div class="row">
        <div class="col-6" style="margin-left: -6px;
    margin-top: 24px;">
            <label for="ip_receivable">IP Receivable</label>
            <input style="width: 17pc;" type="text" name="ip_receivable" id="ip_receivable" >
        </div>
        <div class="col-6" style="margin-left: -70px;
    margin-top: 24px;">
            <label for="ip_received">IP Received</label>
            <input  style="width: 17pc;" type="text" name="ip_received" id="ip_received" >
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="margin-left: -25px;
    margin-top: 24px;">
            <label for="finance_receivable">Finance Receivable</label>
            <input type="text" style="width: 17pc;" name="finance_receivable" id="finance_receivable" >
        </div>
        <div class="col-6" style="margin-left: -69px;
    margin-top: 24px;">
            <label for="finance_received">Finance Received</label>
            <input type="text" style="width: 17pc;" name="finance_received" id="finance_received" >
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" name="financesave" class="financesave" id="financesave">SAVE</button>
        </div>
    </div>
</div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tableRows = document.querySelectorAll("tbody tr");
        const paymentModal = document.getElementById("paymentModal");
        const showDetailsLink = document.getElementById("showDetailsLink");
        const customerDetailsTable = document.querySelector(".cashdetails");

        // Initially hide the table
        customerDetailsTable.style.display = "none";

        // Add an event listener to the "Show full details" link
        showDetailsLink.addEventListener("click", function(e) {
            e.preventDefault(); // Prevent the link from navigating

            // Toggle the visibility of the table
            if (customerDetailsTable.style.display === "none") {
                customerDetailsTable.style.display = "block";
            } else {
                customerDetailsTable.style.display = "none";
            }
        });

        // Rest of your code for populating and handling the payment form
    });
</script>




    </div>
</div>
</div>


</div>
        </div></div>


        <script>
document.addEventListener("DOMContentLoaded", function() {
    const tableRows = document.querySelectorAll("tbody tr");
    const dataForm = document.querySelector(".form");
    const inputs = dataForm.querySelectorAll("input[name], select[name]");
    const tableContainer = document.querySelector(".table-container");
    const formContainer = document.querySelector(".container-box");
    const popupTable = document.querySelector(".table");
    


    // Add a click event listener to each row in the table
    tableRows.forEach(row => {
        row.addEventListener("click", function() {
            const selectedId = this.getAttribute("data-id");
            let rowData = {
                invoice: this.cells[0].textContent,
                chassis: this.cells[1].textContent,
                model: this.cells[2].textContent,
                custname: this.cells[3].textContent,
                payment: this.cells[4].textContent,
                branch: this.cells[5].textContent,
                code: this.cells[6].textContent
            };



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
            formContainer.style.display = "block";
            formContainer.classList.remove("blur");

            // Hide the table explicitly
            popupTable.style.display = "none";
        });
    });

    // Handle the form submission to keep the form displayed
    dataForm.addEventListener("submit", function(event) {
        event.preventDefault();
        
        // Optionally, you can reset the form fields and hide the form
        // Reset the form fields
        inputs.forEach(input => {
            input.value = "";
        });


        // Hide the main form and show the payment form
        formContainer.style.display = "none";
        formContainer.classList.add("blur");
    });
});
</script>



 <script>
document.addEventListener("DOMContentLoaded", function() {
    const tableRows = document.querySelectorAll("tbody tr");
    const dataForm = document.querySelector(".form1"); // Select the form for Ex showroom, LT/RT, Insurance, Pro Plus
    const inputs = dataForm.querySelectorAll("input[name]"); // Select input fields inside the form

    // Add a click event listener to each row in the table
    tableRows.forEach(row => {
        row.addEventListener("click", function() {
            // Get the values for Ex showroom, LT/RT, Insurance, and Pro Plus from the table
            const exShowroomValue = this.cells[7].textContent;
            const ltRtValue = this.cells[8].textContent;
            const insuranceValue = this.cells[9].textContent;
            const proPlusValue = this.cells[10].textContent;
            const basicValue = this.cells[11].textContent;
            const onroadValue = this.cells[12].textContent;


            // Update the input fields in the form with these values
            document.querySelector("input[name='exshow']").value = exShowroomValue;
            document.querySelector("input[name='lt']").value = ltRtValue;
            document.querySelector("input[name='insurance']").value = insuranceValue;
            document.querySelector("input[name='proplus']").value = proPlusValue;
            document.querySelector("input[name='basic_fittings']").value = basicValue;
            document.querySelector("input[name='on_road']").value = onroadValue;

        });
    });

    const paymentTypeInput = document.querySelector("input[name='payment']");  // Assuming this is the input field for Payment Type
    const financeDetails = document.getElementById("financeDetails");

    paymentTypeInput.addEventListener("input", function() {
        if (this.value.toLowerCase() === "cash") {  // Change "cash" to the value you want to trigger the condition
            financeDetails.style.display = "none";
        } else {
            financeDetails.style.display = "block";
        }
    });
    




});
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const paymentModal = document.getElementById("paymentModal");
        const openPaymentModalButton = document.querySelector(".payment");
        const paymentTableBody = document.getElementById("paymentTableBody");
        

        openPaymentModalButton.addEventListener("click", function() {
            paymentModal.style.display = "block"; 
        });

        const closePaymentModalButton = document.getElementById("closePaymentModal");
        closePaymentModalButton.addEventListener("click", function() {
            paymentModal.style.display = "none";
        });
    });
</script>







<!---Exchange Details--->

<div class="modal-overlay" id="exchangeModal">
    <div class="modal-content">
        <span class="close-button" id="closeExchangeModal">&times;</span>
        
        <div class="sales-border">
            <div class="options">
                <div class="row">
                    <div class="col-12"> 
                        <div class="row"></div>
                    </div>
                    <h4>Exchange Form</h4>
                </div>
            </div>
        </div>
        <form class="exchange-form" action="" method="post">
            <!-- Hidden input fields to store customer name and code -->
            <input class="hidden" type="text" id="exchangeCustomerName" name="exchangeCustomerName">
            <input class="hidden" type="text" id="exchangeCustomerCode" name="exchangeCustomerCode">
            
            <div class="row">
                <div class="col-6" style="margin-left: -6px;
    margin-top: 24px;">
                    <label for="exchange">Exchange Receivable</label>
                    <input style="width: 17pc;" type="text" name="exchange" id="exchange" required>
                </div>
                <div class="col-6" style="margin-left: -50px;
    margin-top: 24px;">
                    <label for="exchange_date">Exchange Date</label>
                    <input style="width: 17pc;" type="date"  name="exchange_date" id="exchange_date" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="margin-left: -2px;
    margin-top: 24px;">
                    <label for="received">Exchange Received</label>
                    <input style="width: 17pc;" type="text" name="received" id="received" required readonly>
                </div>
                <div class="col-6" style="margin-left: -50px;
    margin-top: 24px;">
                    <label for="received_date">Received Date</label>
                    <input style="width: 17pc;" type="date" name="received_date" id="received_date" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" name="exchangesave" id="exchangesave" class="exchangesave">SAVE</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const exchangeModal = document.getElementById("exchangeModal");
    const openExchangeFormButton = document.querySelector(".exchange");
    const closeExchangeModalButton = document.getElementById("closeExchangeModal");
    const tableRows = document.querySelectorAll("tbody tr");

    openExchangeFormButton.addEventListener("click", function() {
        exchangeModal.style.display = "block";
    });

    closeExchangeModalButton.addEventListener("click", function() {
        exchangeModal.style.display = "none";
    });

    tableRows.forEach(row => {
        row.addEventListener("click", function() {
            const customerName = this.cells[3].textContent; // Extract customer name from the selected row
            const customerCode = this.cells[6].textContent; // Extract customer code from the selected row

            // Populate the hidden input fields in the exchange form
            const exchangeCustomerNameInput = document.getElementById("exchangeCustomerName");
            const exchangeCustomerCodeInput = document.getElementById("exchangeCustomerCode");
            exchangeCustomerNameInput.value = customerName;
            exchangeCustomerCodeInput.value = customerCode;

            // Retrieve and populate the exchange data when a row is clicked
            retrieveExchangeAmount();
            retrieveExchangeData();
        });
    });

    function retrieveExchangeAmount() {
        // Extract the customer code
        const customerCode = document.getElementById("exchangeCustomerCode").value;

        const receivedInput = document.getElementById("received");

        // Make an AJAX request to fetch exchange data from the server
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `get_exchange_sum.php?customerCode=${customerCode}`, true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);

                // Populate the form fields with the retrieved data
                receivedInput.value = data.exchange_amount;
            }
        };

        xhr.send();
    }


    function retrieveExchangeData() {
        // Extract the customer code
        const customerCode = document.getElementById("exchangeCustomerCode").value;

        // Elements to populate
        const exchangeInput = document.getElementById("exchange");
        const exchangeDateInput = document.getElementById("exchange_date");
        // const receivedInput = document.getElementById("received");
        const receivedDateInput = document.getElementById("received_date");

        // Make an AJAX request to fetch exchange data from the server
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `get_exchange_data.php?customerCode=${customerCode}`, true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);

                // Populate the form fields with the retrieved data
                exchangeInput.value = data.exchange;
                exchangeDateInput.value = data.exchange_date;
                // receivedInput.value = data.received;
                receivedDateInput.value = data.received_date;
            }
        };

        xhr.send();
    }
});
</script>






<!---Offer Details--->

<div class="modal-overlay" id="offerDetailsModal">
    <div class="modal-content">
        <span class="close-button" id="closeOfferDetailsModal">&times;</span>
        <div class="sales-border">
            <div class="options">
                <div class="row">
                        </div>
                    </div>
                    <div class="offer-details-form">
                    <h4>Cash Offer</h4>
                    

                    <div class="total-balance-label">
    
    Cash Offer: <span id="Balance">RS.<?php echo isset($balance) ? $bal : '0'; ?></span>
</div>

                    <form class="Offer-Details" action="" method="post">
                    <input class="hidden" type="text" id="cashOfferCustomerName" name="cashOfferCustomerName">
                    <input class="hidden" type="text" id="cashOfferCustomerCode" name="cashOfferCustomerCode">
                    <div class="row">
                <div class="col-6" style="margin-left: -25px;
    margin-top: 24px;">
                    <label for="roadsideAssistance">Road Side Assistance</label>
                    <input style="width: 15pc;" type="text"  name="roadsideAssistance" id="roadsideAssistance" required>
                </div>
                <div class="col-6" style="margin-left: -25px;
    margin-top: 24px;">
                    <label for="customerSideInsurance">Customer Side Insurance</label>
                    <input style="width: 15pc;" type="text"  name="customerSideInsurance" id="customerSideInsurance" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="margin-left: -19px;
    margin-top: 24px;">
                    <label for="extendedWarranty">Extended Warranty</label>
                    <input style="width: 15pc;" type="text" name="extendedWarranty" id="extendedWarranty" required>
                </div>
                <div class="col-6" style="margin-left: 6px;
    margin-top: 24px;">
                    <label for="cashDiscount">Cash Discount</label>
                    <input style="width: 15pc;" type="text"  name="cashDiscount" id="cashDiscount" required>
                </div>
            </div>
            <input style="display: none;" type="text" name="Balance" id="Balance" value="<?php echo isset($balance) ? $bal : '0'; ?>">
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="cashsave" id="cashsave" name="cashsave">SAVE</button>
                </div>
            </div>
        </form>   
</div>
</div>
        </div>
        </div>
        
    </div>
</div>

<div class="modal-overlay" id="giftDetailsModal">
    <div class="modal-content">
        <span class="close-button" id="closegiftDetailsModal">&times;</span>
        <div class="sales-border">
            <div class="options">
                <div class="row">
                        </div>
                    </div>
                    <div class="gift-details-form">
                    <h4 style="margin-left: 73px;">Gift Offer</h4>
                    <div class="gift-balance-label">
    
    Gift Offer: <span id="giftBalance">RS.<?php echo isset($giftbalance) ? $giftbal : '0'; ?></span>
</div>
                    <form class="gift-Details" action="" method="post">
                        <!-- Hidden input fields to store customer name and code -->
            <input class="hidden" type="text" id="giftcustomername" name="giftcustomername">
            <input class="hidden" type="text" id="giftcustomercode" name="giftcustomercode">
                        
                    <div class="row">
                <div class="col-6" style="margin-left: -2px;
    margin-top: 24px;">
                    <label for="basicfit">Basic Fittings</label>
                    <input style="width: 17pc;" type="text" name="basicfit" id="basicfit" required>
                </div>
                <div class="col-6" style="margin-left: -51px;
    margin-top: 24px;">
                    <label for="petrol">Petrol</label>
                    <input style="width: 17pc;" type="text" name="petrol" id="petrol" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="margin-left: -43px;
    margin-top: 24px;">
                    <label for="mechanic">Mechanism Commission</label>
                    <input style="width: 17pc;" type="text" name="mechanic" id="mechanic" required>
                </div>
                <div class="col-6" style="margin-left: -34px;
    margin-top: 24px;">
                    <label for="vehiclecover">Vehicle Cover</label>
                    <input style="width: 17pc;" type="text" name="vehiclecover" id="vehiclecover" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="margin-left: -2px;
    margin-top: 24px;">
                    <label for="extrafit">Extra Fitting</label>
                    <input style="width: 17pc;" type="text" name="extrafit" id="extrafit" required>
                </div>
                <div class="col-6" style="margin-left: -62px;
    margin-top: 24px;">
                    <label for="anyother">Any Other</label>
                    <input style="width: 17pc;" type="text" name="anyother" id="anyother" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="giftsave" id="giftsave" name="giftsave">SAVE</button>
                </div>
            </div>
        </form>   
</div>
</div>
            </div>
        </div>

    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
       // Handle the click event for Option 1 (Cash offer)
       const option1Element = document.getElementById("option1");
    option1Element.addEventListener("click", function () {
        const offerDetailsModal = document.getElementById("offerDetailsModal");
        offerDetailsModal.style.display = "block";

        // Retrieve the selected customer's name and code and populate the form fields
        const customerName = document.getElementById("custname").value;
        const customerCode = document.getElementById("code").value;


        

        // Populate the form fields in the "Cash Offer Entry" modal
        const cashOfferCustomerNameInput = document.getElementById("cashOfferCustomerName");
        const cashOfferCustomerCodeInput = document.getElementById("cashOfferCustomerCode");
        
        cashOfferCustomerNameInput.value = customerName;
        cashOfferCustomerCodeInput.value = customerCode;
        
        retrieveCashData()
    });

    // Handle the click event for Option 2 (Gift offer)
const option2Element = document.getElementById("option2");
option2Element.addEventListener("click", function() {
    const giftDetailsModal = document.getElementById("giftDetailsModal");
    giftDetailsModal.style.display = "block";

    // Retrieve the selected customer's name and code and populate the form fields
    const customerName = document.getElementById("custname").value;
    const customerCode = document.getElementById("code").value;

    // Populate the form fields in the "Gift Offer Entry" modal
    const giftCustomerNameInput = document.getElementById("giftcustomername");
    const giftCustomerCodeInput = document.getElementById("giftcustomercode");

    giftCustomerNameInput.value = customerName;
    giftCustomerCodeInput.value = customerCode;
    retrieveGiftData()
});

    // Handle the close button for the Offer Details modal
    const closeOfferDetailsModalButton = document.getElementById("closeOfferDetailsModal");
    closeOfferDetailsModalButton.addEventListener("click", function() {
        const offerDetailsModal = document.getElementById("offerDetailsModal");
        offerDetailsModal.style.display = "none";
    });

    // Handle the close button for the Gift Offer modal
    const closeGiftDetailsModalButton = document.getElementById("closegiftDetailsModal");
    closeGiftDetailsModalButton.addEventListener("click", function() {
        const giftDetailsModal = document.getElementById("giftDetailsModal");
        giftDetailsModal.style.display = "none";
        
    });
    
    


    function retrieveGiftData() {
        // Extract the customer code
        const customerCode = document.getElementById("giftcustomercode").value;

        // Elements to populate
        const basicFit = document.getElementById("basicfit");
        const petrol = document.getElementById("petrol");
        const mechanic = document.getElementById("mechanic");
        const vehiclecover = document.getElementById("vehiclecover");
        const extraFit = document.getElementById("extrafit");
        const anyother = document.getElementById("anyother");

        // Make an AJAX request to fetch gift data from the server
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `get_gift_data.php?giftcustomercode=${customerCode}`, true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);

                // Populate the form fields with the retrieved data
                basicFit.value = data.basic_fit;
                petrol.value = data.petrol;
                mechanic.value = data.mechanic;
                vehiclecover.value = data.vehicle;
                extraFit.value = data.extra_fit;
                anyother.value = data.anyother;

                // Update the total balance in the "Balance" span
            const giftbalanceSpan = document.getElementById("giftBalance");
            giftbalanceSpan.textContent = `RS.${data.gift_balance}`;
            }
        };

        xhr.send();
    }




    function retrieveCashData() {
    // Extract the customer code
    const cashcustomerCode = document.getElementById("cashOfferCustomerCode").value;

    // Elements to populate
    const roadsideAssistance = document.getElementById("roadsideAssistance");
    const customerSideInsurance = document.getElementById("customerSideInsurance");
    const extendedWarranty = document.getElementById("extendedWarranty");
    const cashDiscount = document.getElementById("cashDiscount");

    // Make an AJAX request to fetch cash offer data from the server
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `get_cash_data.php?cashcustomercode=${cashcustomerCode}`, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);

            // Populate the form fields with the retrieved data
            roadsideAssistance.value = data.road_side;
            customerSideInsurance.value = data.customer_side;
            extendedWarranty.value = data.extended_warrant;
            cashDiscount.value = data.cash_discount;

            // Update the total balance in the "Balance" span
            const balanceSpan = document.getElementById("Balance");
            balanceSpan.textContent = `RS.${data.total_balance}`;
        }
    };

    xhr.send();
}


// Calculate and update Total Balance
function updateTotalBalance() {
        const balanceSpan = document.getElementById("Balance");
        const giftBalanceSpan = document.getElementById("giftBalance");
        const totalBalanceSpan = document.getElementById("totalbalance");

        const balance = parseFloat(balanceSpan.textContent.replace("RS.", "")) || 0;
        const giftBalance = parseFloat(giftBalanceSpan.textContent.replace("RS.", "")) || 0;

        // Calculate the Total Balance
        const totalBalance = balance + giftBalance;

        // Update the Total Balance element
        totalBalanceSpan.textContent = `RS. ${totalBalance.toFixed(2)}`;
    }

    // Call the updateTotalBalance function to calculate it initially
    updateTotalBalance();
    });
</script>






<!----File Details--->

<div class="modal-overlay" id="fileDetailsModal">
    <div class="modal-content">
        <span class="close-button" id="closeFileDetailsModal">&times;</span>
        <h4>File Details</h4>
        <div class="file-balance-label">
    Balance Amount: <span id="remainingBalance">RS.<?php echo isset($remaining) ? $remaining : '0'; ?></span>
    <!-- Offer Balance: <span id="offerBalance">RS.<php echo isset($offer) ? $offer : '0'; ?></span> -->
</div>
<button type="button" class="summary" id="showSummary">Summary</button>
<form class="File-Details" action="" method="post">
    <input class="hidden" type="text" name="filecustomername" id="filecustomername">
    <input class="hidden" type="text" name="filecustomercode" id="filecustomercode">

   

    

    <div class="form-file-details">
        <div class="row">
            <div class="col-6" style="margin-left: -31px;
    margin-top: 24px;">
                <label for="finip_receivable">IP Receivable</label>
                <input style="width: 17pc;" type="text" name="finip_receivable" id="finip_receivable" readonly>
            </div>
            <div class="col-6" style="margin-left: -51px;
    margin-top: 24px;">
                <label for="finip_received">IP Received</label>
                <input style="width: 17pc;" type="text"  name="finip_received" id="finip_received" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="margin-left: -51px;
    margin-top: 24px;">
                <label for="fin_receivable">Finance Receivable</label>
                <input style="width: 17pc;" type="text"  name="fin_receivable" id="fin_receivable" readonly>
            </div>
            <div class="col-6" style="margin-left: -51px;
    margin-top: 24px;">
                <label for="fin_received">Finance Received</label>
                <input style="width: 17pc;" type="text"  name="fin_received" id="fin_received" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="margin-left: -56px;
    margin-top: 24px;">
                <label for="exchange_receivable">Exchange Receivable</label>
                <input style="width: 17pc;" type="text" name="exchange_receivable" id="exchange_receivable" readonly>
            </div>
            <div class="col-6" style="margin-left: -51px;
    margin-top: 24px;">
                <label for="exchange_received">Exchange Received</label>
                <input style="width: 17pc;" type="text"  name="exchange_received" id="exchange_received" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="margin-left: -5px;
    margin-top: 24px;">
                <label for="status">Status</label>
                <select style="width: 17pc; height: 32px;" name="status" id="status" required>
                    <option value="">Select Option</option>
                    <option value="Open">Open</option>
                    <option value="Closed" id="closedOption">Closed</option>
                </select>

                <script>
    // Get the remaining balance value
    var remainingBalance = parseInt('<?php echo isset($remaining) ? $remaining : '0'; ?>');

    // Get the "Closed" option element
    var closedOption = document.getElementById("closedOption");

    // Hide the "Closed" option if the remaining balance is not 0
    if (remainingBalance !== 0) {
        closedOption.style.display = "none";
    }
</script>



            </div>
            <div class="col-6" style="margin-left: -95px;
    margin-top: 24px;">
                <label for="file_closing_date">File Closing Date</label>
                <input style="width: 17pc; height: 32px;" type="date" name="file_closing_date" id="file_closing_date" required>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="margin-left: -15px;
    margin-top: 24px;">
                <label for="remarks">Remarks</label>
                <input style="width: 17pc;" type="text" name="remarks" id="remarks" required>
            </div>
        </div>
        
            <div class="col-12">
                <button type="submit" class="filesave" name="filesave">SAVE</button>
            </div>
        </div>
    </div>
</form>



<div class="sum-modal-overlay" id="summaryModal">
       <div class="sum-modal-content">
           <div class="summary-file-details" id="summary-file-details">
            <span class="close" id="summaryclose">&times;</span>
               <form action="" action="" method="post">
                <h4 style="color: white; font-size: 18px;">Summary Details</h4>
                   <div class="row">
                    <input class="hidden" type="text" name="sum_customername" id="sum_customername">
                    <input class="hidden" type="text" name="sum_customercode" id="sum_customercode">
                       <div class="col-12">
                           <label for="" style="margin-left: 60px;">Vehicle Cost</label>
                           <input style="margin-top: 10px; margin-left: 46px; width: 15rem; margin-bottom:20px; border-radius: 5px; border: 1px solid #FFF;" type="text" name="sum_vehicle_cost" id="sum_vehicle_cost" readonly>
                       </div>
                       <div class="col-12">
                           <label for="" style="margin-left: 60px;">Cash Discount</label>
                           <input style="margin-left: 32px; width: 15rem; margin-bottom:20px; border-radius: 5px;
border: 1px solid #FFF;" type="text" name="sum_cash_dis" id="sum_cash_dis" readonly>
                       </div>
                       <div class="col-12">
                           <label for="" style="margin-left: 60px;">Actual Cost</label>
                           <input style="margin-left: 52px; width: 15rem; margin-bottom:20px; border-radius: 5px;
border: 1px solid #FFF;" type="text" name="sum_actual_cost" id="sum_actual_cost" readonly>
                       </div>
                       <div class="col-12">
                           <label for="" style="margin-left: 60px;">Balance Amount</label>
                           <input style="margin-left: 16px; width: 15rem; margin-bottom:20px; border-radius: 5px;
border: 1px solid #FFF;" type="text" name="sum_balance_amount" id="sum_balance_amount" readonly>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>


   <script>
document.getElementById('showSummary').addEventListener('click', function () {
    var summaryModal = document.getElementById('summaryModal');
    var summaryForm = document.getElementById('summary-file-details');
    var sumCustomerNameInput = document.getElementById('sum_customername');
    var sumCustomerCodeInput = document.getElementById('sum_customercode');

    if (summaryForm.style.display === 'none' || summaryForm.style.display === '') {
        // Show the summary form
        summaryForm.style.display = 'block';
        summaryModal.style.display = 'block';

        // Get the values of customer name and customer code inputs
        var sumcustomerName = document.getElementById('filecustomername').value;
        var sumcustomerCode = document.getElementById('filecustomercode').value;

        // Set the values in the summary form
        sumCustomerNameInput.value = sumcustomerName;
        sumCustomerCodeInput.value = sumcustomerCode;
    } else {
        // Hide the summary form
        summaryForm.style.display = 'none';
        summaryModal.style.display = 'none';
    }
});
  // Add an event listener for the close button in the summary form
  document.getElementById('summaryclose').addEventListener('click', function () {
        var summaryModal = document.getElementById('summaryModal');
        var summaryForm = document.getElementById('summary-file-details');

        // Hide the summary form
        summaryForm.style.display = 'none';
        summaryModal.style.display = 'none';
    });
</script>






<script>
document.addEventListener("DOMContentLoaded", function() {
    const fileDetailsModal = document.getElementById("fileDetailsModal");
    const openFileDetailsModalButton = document.getElementById("openFileDetailsModal");
    const closeFileDetailsModalButton = document.getElementById("closeFileDetailsModal");
    const fileCustomerNameInput = document.getElementById("filecustomername");
    const fileCustomerCodeInput = document.getElementById("filecustomercode");

    // Add an event listener to open the "File Details" modal when the button is clicked
    openFileDetailsModalButton.addEventListener("click", function() {
        // Retrieve the customer name and customer code from the customer name input field
        const customerNameInput = document.getElementById("custname");
        const customerCodeInput = document.getElementById("code");


        // Check if both customer name and customer code are not empty
        if (customerNameInput.value.trim() !== "" && customerCodeInput.value.trim() !== "") {
        // Update the file customer name and code inputs with the retrieved values
        fileCustomerNameInput.value = customerNameInput.value;
        fileCustomerCodeInput.value = customerCodeInput.value;

        // Show the "File Details" modal
        fileDetailsModal.style.display = "block";
        // Send an AJAX request to fetch file data
        retrieveFileData();
    } else {
            // Handle the case where the chassis number hasn't been searched
            alert('Please search for a chassis number before clicking the "File Details" button.');
        }
    });

    // Add an event listener to close the "File Details" modal when the close button is clicked
    closeFileDetailsModalButton.addEventListener("click", function() {
        fileDetailsModal.style.display = "none";
    });

    function retrieveFileData() {
        const filecustomercode = document.getElementById("code").value;
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `get_file_data.php?customerCode=${filecustomercode}`, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById("finip_receivable").value = data.ip_receivable;
                    document.getElementById("finip_received").value = data.ip_received;
                    document.getElementById("fin_receivable").value = data.finance_receivable;
                    document.getElementById("fin_received").value = data.finance_received;
                    document.getElementById("exchange_receivable").value = data.exchange_receivable;
                    document.getElementById("exchange_received").value = data.exchange_received;

                    document.getElementById("status").value = data.status;
                    document.getElementById("file_closing_date").value = data.file_closing_date;
                    document.getElementById("remarks").value = data.remarks;
                    

                    // Handle other fields in a similar way
                }
            }
        };
        xhr.send();
    }
});
</script>













<!-- <button type="button" class="account" id="accountButton">Accounts</button> -->


























</body>

<script>
document.querySelector(".payment").addEventListener("click", function () {
    const customerCode = document.querySelector("input[name='code']").value;
    const customerName = document.querySelector("input[name='custname']").value;
    const paymentType = document.querySelector("input[name='payment']").value;

    if (!customerCode || !customerName || !paymentType) {
        alert('Please search for a chassis number before clicking the payment button.');
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "fetch_daybook_data.php", true); // Replace with the correct URL for your server-side script to fetch daybook data
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const daybookData = JSON.parse(xhr.responseText);
            const totalCredit = calculateTotalCredit(daybookData); // Calculate total credit
            document.querySelector("input[name='ip_received']").value = totalCredit; // Update the "IP Received" input field

            const totalFinance = calculateTotalFinance(daybookData); // Calculate total finance
            document.querySelector("input[name='finance_received']").value = totalFinance; // Update the "Finance Received" input field

            updateCustomerTable(daybookData);
        }
    };

    const data = "customerCode=" + customerCode + "&customerName=" + customerName + "&paymentType=" + paymentType;
    xhr.send(data);
});

function calculateTotalCredit(data) {
    let totalCredit = 0;
    data.forEach(function (row) {
        // Assuming CREDIT, HDFCCA, HDRCC, and INV are numeric fields
        totalCredit += parseFloat(row.CREDIT) + parseFloat(row.HDFCCA) + parseFloat(row.HDRCC) + parseFloat(row.INV);
    });
    return totalCredit;
}

function calculateTotalFinance(data) {
    let totalFinance = 0;
    data.forEach(function (row) {
        // Check if HDFC, IDFC, or IBC has a value, and add it to the total finance
        totalFinance += (parseFloat(row.HDFC) || 0) + (parseFloat(row.IDFC) || 0) + (parseFloat(row.IBC) || 0);
    });
    return totalFinance;
}

function updateCustomerTable(data) {
    const customerDetailsTableBody = document.getElementById("customerDetailsTableBody");
    customerDetailsTableBody.innerHTML = "";

    data.forEach(function (row) {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${row.DATE}</td>
            <td class="hidden">${row.TYPES}</td>
            <td>${row.CUSTOMERNAME}</td>
            <td class="hidden">${row.CUSTOMERCODE}</td>
            <td class="hidden">${row.PHONENUMBER}</td>
            <td>${row.RECEIPT}</td>
            <td class="hidden">${row.VEHICLENAME}</td>
            <td>${row.MODE}</td>
            <td>${row.NEFTOPTION}</td>
            <td>${row.HDFCCA}</td>
            <td>${row.HDRCC}</td>
            <td>${row.INV}</td>
            <td>${row.FINANCEOPTION}</td>
            <td>${row.HDFC}</td>
            <td>${row.IDFC}</td>
            <td>${row.IBC}</td>
            <td>${row.CREDIT}</td>
        `;
        customerDetailsTableBody.appendChild(newRow);
    });
}

</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Calculate the sum of the database values
        var sumCashDiscount = <?php echo $TotalRoadsideAssistance; ?> +
                             <?php echo $TotalCustomerSideInsurance; ?> +
                             <?php echo $TotalExtendedWarranty; ?> +
                             <?php echo $TotalCashDiscount; ?> +
                             <?php echo $TotalBasicFittings; ?> +
                             <?php echo $TotalPetrol; ?> +
                             <?php echo $TotalMechanicCommission; ?> +
                             <?php echo $TotalVehicleCover; ?> +
                             <?php echo $TotalExtraFitting; ?> +
                             <?php echo $TotalAnyOther; ?>;
        
        var sumVehicleCost = <?php echo $totalAccessories; ?>;
        
        var sumActualCost = sumVehicleCost - sumCashDiscount;

        var balanceAmount = <?php echo isset($remaining) ? $remaining : '0'; ?>;

        // Set the calculated sums and balance amount in their respective input fields
        document.getElementById("sum_cash_dis").value = sumCashDiscount;
        document.getElementById("sum_vehicle_cost").value = sumVehicleCost;
        document.getElementById("sum_actual_cost").value = sumActualCost;
        document.getElementById("sum_balance_amount").value = balanceAmount;
    });
</script>





</html>
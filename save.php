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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>View Candidates</title>
    <link rel="stylesheet" href="">
    

</head>

<style>
    .search-container {
    margin: 20px 0;
    display: flex;
    align-items: center;
}
button#resetButton {
    margin-left: 6px;
    padding: 3px;
}

#searchInput {
    width: 200px;
    height: 30px;
    margin-right: 10px;
    border: 1px solid #ccc;
    padding: 5px;
    margin-left: 132px;
}

#filterButton {
    height: 34px;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background-color: blue;
    border: none;
    border-radius: 5px;
    color: white;
}


/*.box {*/
/*    margin: 5em 1em 1em 3em;*/
/*width: 1206px;*/
/*height: 100vh;*/
/*margin-left: 0%;*/
/*}*/

.box {
    margin: 5em 1em 1em 3em;
width: 1206px;
height: 70vh;
/* position: fixed; */
margin-left: 0%;
}

/*.salary_details {*/
/*overflow-x: scroll;*/

/*height: 500px;*/

/*border: 0px solid;*/

/*}*/

.salary_details {
overflow-x: scroll;
overflow-y:scroll;

height: 400px;

border: 0px solid;

}



.salary_details::-webkit-scrollbar {
height: 10px;
width: 4px;
background-color: transparent;
border: 0px solid #787676;
}

.salary_details::-webkit-scrollbar-track {
background-color: transparent;
}

.salary_details::-webkit-scrollbar-thumb {
background-color: transparent;
border-radius: 2px;
}

.salary_details::-webkit-scrollbar-thumb:horizontal {
/* background-color: #fb5407ba; */
background-color:cyan;
}

thead
{
width: 1610px;
height: 81px;
flex-shrink: 0;
background: linear-gradient(180deg, #0C00A3 0%, #49C6BD 100%);

}
.table-bordered thead th
{
color: #FFF;
text-align: center;
font-family: Inter;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: normal;


}

table.table-bordered
{

width: max-content;

}
.table-bordered tr td
{

flex-shrink: 0;
border-bottom: 0.5px solid #000;
background: #D9D9D9;

}

tbody {
height: 100px; /* Adjust the height as needed */
overflow-y: scroll;
}

/* Make the header row fixed */
thead {
border:1px orange solid;
position: sticky;

background-color: #f8f9fa; /* Adjust the background color as needed */
}
th, td {
padding: 8px;
text-align: left;
white-space: nowrap;
}

/* Add a border to the table */
table {
border-collapse: collapse;
}

/* Add a border to the table cells */
th, td {
border: 1px solid #ddd; /* Adjust the border color as needed */
}



.btn {
width: 68px;
height: 22px;
border: none;
flex-shrink: 0;
border-radius: 7px;
background: green;
color: #FFF;
font-size: 14px;
font-family: sans-serif;
font-style: normal;
font-weight: 700;
line-height: normal;
letter-spacing: 0.3px;
padding-bottom: 20px;

}

.btn:hover{
    border:1px solid green;
}
.btn2 {
width: 88px;
height: 22px;
border: none;
flex-shrink: 0;
border-radius:7px;
background: red;
color: #FFF;
font-size: 14px;
font-family: sans-serif;
font-style: normal;
font-weight: 700;
line-height: normal;
letter-spacing: 0.3px;
padding-bottom: 5px;
padding-top: 4px;
text-decoration:none;
padding-left:10px;
padding-right:10px;
}
.btn2:hover{
    border:1px solid red;
    color:black;
    background-color:white;
}
.box{

margin-top: -74%;
}






.col-md-9 {
width: 83% !important;
margin-left: 19%;
}

.col-md-3 {
width: 25%;
}



.table-bordered tr:hover td {
background-color: #FFF;
color: black;
}



.col-9 .table_over_scr_ol {


height: 500px;
margin-left: 30px;
border: 0px solid;
}

.row{
display: flex;
}.btn_logout_back {
padding:23px;
margin-left: 1040px; 
}


.button{ border-radius: 5px;
color: #FFF;
font-family: Inter;
font-size: 16px;

box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color:blue;
border:none ;
}
.btn_row{
margin-bottom: 200px;
}

a {
color: white;
text-decoration: none;
}

.btn_logout_back1 {
    margin-left: 83px;
    margin-bottom: 15px;
}
.btn_row {
    margin-left: 86%;
}





</style>


<body>
<div class="search-container">
    <input type="text" id="searchInput" placeholder="Customer Name">
    <button type="button" id="filterButton" class="button">Search</button>
    <button type="button" id="resetButton" class="button">Refresh</button>
</div>

    <div class="container">
                <div class="row btn_row">
                        <div class="btn_logout_back1"> <button type="button" class="button"><a href="form.php" style="color: white;">BACK</a></button>
                        <button type="button" class="button"><a href="logout.php" style="color: white;">LOGOUT</a></button></div>
                </div>
<div class="row">
<div class="col-md-3">
       
<div class="box">

 <div class="col-md-9"></div>
    <div class="salary_details">
        <table class="table table-bordered">
            <thead>
                <tr class="bc">
<th>ID</th>
<th>INVOICE DATE</th>
<th>CHASSIS NO</th>
<th>VEHICLE MODEL</th>
<th>CUSTOMER NAME</th>
<th>PAYMENT TYPE</th>
<th>BRANCHES DEALERS</th>
<th>EXCHANGE</th>
<th>VEHICLE ACTUAL COST</th>
<th>ROAD SIDE ASSISTANCE</th>
<th>IP RECEIVABLE</th>
<th>IP RECEIVED</th>
<th>CASH</th>
<th>FINANCE RECEIVABLE</th>
<th>FINANCE RECEIVEDDATE</th>
<th>FINANCE RECEIVED</th>
<th>TOTAL AMOUNT RECIEVED</th>
<th>FOLDER CLOSING DATE</th>
<th>STATUS</th>
<th>EXTRA FITTING</th>
<th>BASIC EXTRA</th>
<th>EXTENDED WARRANTY</th>
<th>CASH DISCOUNT</th>
<th>PETROL</th>
<th>VEHICLE COVER</th>
<th>TOTAL PRICE</th>
<th>MECHANIC COMMISSION</th>
<th>CUSTOMER SIDE INSURANCE</th>
<th>DISCOUNT</th>


<th colspan="2">EDIT / DELETE</th>   
</tr>
            </thead>
            <tbody>
                <?php
                include "connect.php";
               
                $sve = "SELECT * FROM project WHERE BRANCHESDEALERS = '$userPlace' AND Del_status = 1";

               
                                $ddd = mysqli_query($conn, $sve);

                                if (mysqli_num_rows($ddd) == 0) {
                                    echo "<tr><td colspan='31'>No information found.</td></tr>";
                                } else {
                                    while ($row = mysqli_fetch_assoc($ddd)) {
                              
       
            $id = $row['ID'];
            $invoicedate = $row['INVOICEDATE'];
            $chassisno= $row['CHASSISNO'];
            $vehiclemode = $row['VEHICLEMODEL'];
            $customername = $row['CUSTOMERNAME'];
            $mode = $row['PAYMENTTYPE'];
            $branchesdealers = $row['BRANCHESDEALERS'];
            $xchange = $row['EXCHANGE'];
            $vehiclecost = $row['VEHICLECOST'];                   
            $roadsideassistance = $row['ROADSIDEASSISTANCE'];
            $ipreceivable = $row['IPRECEIVABLE'];
            $ipreceived = $row['IPRECEIVED'];
            $cash = $row['CASH'];
            $financereceivable = $row['FINANCERECEIVABLE']; 
             $financereceiveddate = $row['FINANCERECEIVEDDATE'];
            $financereceived = $row['FINANCERECEIVED'];
            $totalamountreceived = $row['TOTALAMOUNTRECIEVED'];
            $folderclosingdate = $row['FOLDERCLOSINGDATE'];
            $status = $row['STATUS'];
            $extrafitting = $row['EXTRAFITTING'];
            $basicextra = $row['BASICEXTRA'];
            $extendedwarranty = $row['EXTENDEDWARRANTY'];
            $cashdiscount = $row['CASHDISCOUNT'];
            $petrol = $row['PETROL'];
             $vehiclecover = $row['VEHICLECOVER'];
             $totalprice = $row['TOTALPRICE'];
            $mechaniccommission = $row['MECHANICCOMMISSION'];
            $customersideinsurance = $row['CUSTOMERSIDEINSURANCE'];
            $discount = $row['DISCOUNT'];
             
 


        
        
                                   echo "<tr>";
                                    echo "<td>$id</td>";
                                    echo "<td>$invoicedate</td>";
                                    echo "<td>$chassisno</td>";
                                    echo "<td>$vehiclemode</td>";
                                    echo "<td>$customername</td>";
                                    echo "<td>$mode</td>";
                                    echo "<td>$branchesdealers</td>";
                                    echo "<td>$xchange</td>";
                                    echo "<td>$vehiclecost</td>";
                                    echo "<td>$roadsideassistance</td>";
                                    echo "<td>$ipreceivable</td>";
                                    echo "<td>$ipreceived</td>";
                                    echo "<td>$cash</td>";
                                    echo "<td>$financereceivable</td>";
                                    echo "<td>$financereceiveddate</td>";
                                    echo "<td>$financereceived</td>";
                                    echo "<td>$totalamountreceived</td>";
                                    echo "<td>$folderclosingdate</td>";
                                    echo "<td>$status</td>";
                                    echo "<td>$extrafitting</td>";
                                    echo "<td>$basicextra</td>";
                                    echo "<td>$extendedwarranty</td>";
                                    echo "<td>$cashdiscount</td>";
                                    echo "<td>$petrol</td>";
                                    echo "<td>$vehiclecover</td>";
                                    echo "<td>$totalprice</td>";
                                    echo "<td>$mechaniccommission</td>";
                                    echo "<td>$customersideinsurance</td>";
                                    echo "<td>$discount</td>";
                     
                                    echo "<td><a href='edit.php?id=$id' class='btn' role='button'>EDIT</a>";
                                    echo "<td><a href='delete.php?id=$id' class='btn2' role='button'>DELETE</a></td>";
                                    echo "</tr>";
                                    
                                }
                            }
               ?>
            </tbody>
        </table>
    </div><br>   
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterButton = document.getElementById("filterButton");
        const searchInput = document.getElementById("searchInput");
        const tableRows = document.querySelectorAll(".table tbody tr");

        filterButton.addEventListener("click", function () {
            const searchText = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const customerNameCell = row.querySelector("td:nth-child(5)");
                if (customerNameCell) {
                    const customerName = customerNameCell.textContent.toLowerCase();
                    row.style.display = customerName.includes(searchText) ? "table-row" : "none";
                }
            });
        });
          resetButton.addEventListener("click", function () {
        searchInput.value = "";
      
        tableRows.forEach(row => {
            row.style.display = "table-row";
        });
    });
});

</script>
</html>
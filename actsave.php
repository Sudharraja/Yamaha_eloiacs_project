<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>View Candidates</title>
    

    <style>
    .box {
        margin: 5em 1em 1em 3em;
width: 1206px;
height: 100vh;
/* position: fixed; */
margin-left: 0%;
}

.salary_details {
overflow-x: scroll;

height: 500px;

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
font-size: 13px;
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
.btn2 {
width: 68px;
height: 22px;
border: none;
flex-shrink: 0;
border-radius:3px;
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

}.box{
margin-left:-43px;
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
   margin-left: 788px; 
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
.search-container{
        margin-left: 79px;
    margin-top: 34px;
}

.btn_logout_back {
    padding: 23px;
    margin-left: 1007px;
}
</style>
</head>
<body>
    <div class="search-container">
    <input type="text" id="searchInput" placeholder="Customer Name">
    <button type="button" id="filterButton" class="button">Search</button>
    <button type="button" id="resetButton" class="button">Refresh</button>
</div>
    <div class="container">
                <div class="row btn_row">
                        <div class="btn_logout_back"> <button type="button" class="button"><a href="actform.php" style="color: white;">BACK</a></button>
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
<th>BRANCHES / DEALERS</th>
<th>EXCHANGE</th>
<th>VEHICLE ACTUAL COST</th>
<th>ROAD SIDE ASSISTANCE</th>
<th>IP RECEIVABLE</th>
<th>IP RECEIVED</th>
<th>CASH OUTSTANDING</th>  
<th>FINANCE RECEIVABLE</th>
<th>FINANCE RECEIVED DATE</th>  
<th>FINANCE RECEIVED</th>
<th>TOTAL AMOUNT RECEIVED</th>
<th>FOLDER CLOSING DATE</th>
<th>STATUS (ENTERED AT BRANCH)</th>
<th>EXTRA FITTING/ACCESS</th>  
<th>BASIC/EXTRA</th>
<th>EXTENDED WARRANTY</th>
<th>CASH DISCOUNT</th>
<th>PETROL</th>
<th>VEHICLE COVER</th>
<th>TOTAL PRICE</th>
<th>MECHANIC COMMISSION</th>
<th>CUSTOMER SIDE INSURANCE</th>
<th>DISCOUNT</th>
<th>RTO CONFIRMATION</th>

<th>FILE RECEIVED DATE</th>
<th>FORM20 DATE</th>
<th>FORM20 RECEIVED DATE</th>
<th>ACCOUNTS CONFIRMATION</th>
<th>REGISTRATION DATE</th>
<th>REGISTRATION NUMBER</th>
<th>RC STATUS</th>
<th>RC RECDATE</th>
<th>REMARKS</th>


<th colspan="2">EDIT</th>   
</tr>
            </thead>
            <tbody>
                <?php
                include "connect.php";
                $sve = "SELECT * FROM project";
                $ddd = mysqli_query($conn, $sve);
                while ($row = mysqli_fetch_assoc($ddd)) {
                    $id = $row['ID'];
                    $invoicedate = $row['INVOICEDATE'];
                    $chassisno= $row['CHASSISNO'];
                    $vehiclemode = $row['VEHICLEMODEL'];
                    $customername = $row['CUSTOMERNAME'];
                    $mode = $row['PAYMENTTYPE'];
                    $branchesdealers = $row['BRANCHESDEALERS'];         
$exchange = $row['EXCHANGE'];
$vehiclecost = $row['VEHICLECOST'];
$roadsideassistance= $row['ROADSIDEASSISTANCE'];
$ipreceivable=$row['IPRECEIVABLE'];
$ipreceived = $row['IPRECEIVED'];
$cashoutstanding = $row['CASH'];
$financereceivable=$row['FINANCERECEIVABLE'];
$financereceiveddate = $row['FINANCERECEIVEDDATE'];
$financereceived = $row['FINANCERECEIVED'];
$totalamountreceived=$row['TOTALAMOUNTRECIEVED'];
$folderclosingdate = $row['FOLDERCLOSINGDATE'];
$status = $row['STATUS'];
$extrafitting = $row['EXTRAFITTING'];
$basicextra=$row['BASICEXTRA'];
$extendedwarranty = $row['EXTENDEDWARRANTY'];
$cashdiscount = $row['CASHDISCOUNT'];
$petrol = $row['PETROL'];
$vehiclecover=$row['VEHICLECOVER'];
$totalprice = $row['TOTALPRICE'];
$mechaniccommission = $row['MECHANICCOMMISSION'];
$customersideinsurance = $row['CUSTOMERSIDEINSURANCE'];
$discount=$row['DISCOUNT'];
$rto=$row['RTOCONFIRMATION'];

$filereceiveddate = $row['FILERECEIVEDDATE'];
$form20date= $row['FORM20DATE'];
$Form20Received = $row['FORM20RECEIVEDDATE'];
$accountsconfirmation = $row['ACCOUNTSCONFIRMATION'];
$registrationdate = $row['REGISTRATIONDATE'];
$registrationnumber = $row['REGISTRATIONNUMBER'];
$rc = $row['RCSTATUS'];
$rcrec = $row['RCRECDATE'];
$remarks = $row['REMARKS'];


                    ?>   
                    <tr>
                    <td><?php echo $id ?></td>
                        <td><?php echo $invoicedate ?></td>
                        <td><?php echo $chassisno ?></td>
                        <td><?php echo $vehiclemode ?></td>
                        <td><?php echo $customername ?></td>
                        <td><?php echo $mode ?></td>
                        <td><?php echo $branchesdealers  ?></td>
                        





                        <td><?php echo $exchange ?></td>
                        <td><?php echo $vehiclecost ?></td>
                        <td><?php echo $roadsideassistance ?></td>
                        <td><?php echo $ipreceivable ?></td>
                        <td><?php echo $ipreceived ?></td>
                        <td><?php echo $cashoutstanding  ?></td>
                        <td><?php echo $financereceivable ?></td>
                        <td><?php echo $financereceiveddate  ?></td>
                        <td><?php echo $financereceived ?></td>
                        <td><?php echo $totalamountreceived ?></td>
                        <td><?php echo $folderclosingdate ?></td>
                        <td><?php echo  $status?></td>
                        <td><?php echo $extrafitting ?></td>
                        <td><?php echo $basicextra ?></td>
                        <td><?php echo $extendedwarranty ?></td>
                        <td><?php echo $cashdiscount ?></td>
                        <td><?php echo $petrol ?></td>
                        <td><?php echo $vehiclecover ?></td>
                        <td><?php echo $totalprice ?></td>
                        <td><?php echo $mechaniccommission ?></td>
                        <td><?php echo $customersideinsurance ?></td>
                        <td><?php echo $discount ?></td>
                        <td><?php echo $rto ?></td>
                       

                        <td><?php echo $filereceiveddate ?></td>
                        <td><?php echo $form20date ?></td>
                        <td><?php echo $Form20Received ?></td>
                        <td><?php echo $accountsconfirmation ?></td>
                        <td><?php echo $registrationdate ?></td>
                        <td><?php echo $registrationnumber  ?></td>
                        <td><?php echo $rc ?></td>
                        <td><?php echo $rcrec ?></td>
                        <td><?php echo $remarks  ?></td>




                        <td><a href="actedit.php?id=<?php echo $row["ID"]; ?>" class="btn" role="button">EDIT</a></td>
                       
                    </tr>
                <?php } ?>
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
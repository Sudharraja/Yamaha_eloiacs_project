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

</style>
</head>
<body>
    <div class="container">
                <div class="row btn_row">
                        <div class="btn_logout_back"> <button type="button" class="button"><a href="accform.php" style="color: white;">BACK</a></button>
                        <button type="button" class="button"><a href="acclogin.php" style="color: white;">LOGOUT</a></button></div>
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

<th>FILE RECEIVE DDATE</th>
<th>FORM20 DATE</th>
<th>FORM20 RECEIVED DDATE</th>
<th>ACCOUNTS CONFIRMATION</th>
<th>REGISTRATION DATE</th>
<th>REGISTRATION NUMBER</th>  

<th>RC STATUS</th>
<th>REMARKS</th>  

<th>EXCESS</th>
<th>RTO CONFIRMATION</th>
<th>ACCOUNTS CLOSING DATE</th>
<th>ACCOUNTS STATUS</th>
<th>PENDING</th>  

<th colspan="2">EDIT</th>   
</tr>
            </thead>
            <tbody>
                <?php
                include "connect.php";
                $sve = "SELECT * FROM account";
                $ddd = mysqli_query($conn, $sve);
                while ($row = mysqli_fetch_assoc($ddd)) {
                    $id = $row['ID'];
                    $invoicedate = $row['INVOICEDATE'];
                    $chassisno= $row['CHASSISNO'];
                    $vehiclemode = $row['VEHICLEMODEL'];
                    $customername = $row['CUSTOMERNAME'];
                    $mode = $row['PAYMENTTYPE'];
                    $branchesdealers = $row['BRANCHESDEALERS'];
                    
                    $filereceiveddate = $row['FILERECEIVEDDATE'];
                    $form20date= $row['FORM20DATE'];
                    $Form20Received = $row['FORM20RECEIVEDDATE'];
                    $accountsconfirmation = $row['ACCOUNTSCONFIRMATION'];
                    $registrationdate = $row['REGISTRATIONDATE'];
                    $registrationnumber = $row['REGISTRATIONNUMBER'];

                    $rc = $row['RCSTATUS'];
                    $remarks = $row['REMARKS'];

                    $excess = $row['EXCESS'];
                    $statusmain= $row['RTOCONFIRMATION'];
                    $accountsclosingdate = $row['ACCOUNTSCLOSINGDATE'];
                    $accountstatus = $row['ACCOUNTSSTATUS'];
                    $pending = $row['PENDING'];
                    ?>   
                    <tr>
                    <td><?php echo $id ?></td>
                        <td><?php echo $invoicedate ?></td>
                        <td><?php echo $chassisno ?></td>
                        <td><?php echo $vehiclemode ?></td>
                        <td><?php echo $customername ?></td>
                        <td><?php echo $mode ?></td>
                        <td><?php echo $branchesdealers  ?></td>
                        
                        <td><?php echo $filereceiveddate ?></td>
                        <td><?php echo $form20date ?></td>
                        <td><?php echo $Form20Received ?></td>
                        <td><?php echo $accountsconfirmation ?></td>
                        <td><?php echo $registrationdate ?></td>
                        <td><?php echo $registrationnumber  ?></td>

                        <td><?php echo $rc ?></td>
                        <td><?php echo $remarks  ?></td>


                        <td><?php echo $excess ?></td>
                        <td><?php echo $statusmain ?></td>
                        <td><?php echo $accountsclosingdate ?></td>
                        <td><?php echo  $accountstatus?></td>
                        <td><?php echo $pending ?></td>
                        <td><a href="accedit.php?id=<?php echo $row["ID"]; ?>" class="btn" role="button">EDIT</a></td>
                       
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div><br>   
</body>
</html>
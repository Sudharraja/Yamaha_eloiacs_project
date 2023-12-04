<?php
// Include your database connection
include "connect.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
$id = $_GET['id'];

// Perform the deletion
$deleteQuery = "DELETE FROM daybook WHERE ID = $id";
$result = mysqli_query($conn, $deleteQuery);

if ($result) {
// Redirect back to the page displaying the table
header("Location: daybook_save.php");
exit();
} else {
echo "Error deleting record: " . mysqli_error($conn);
}
} else {
echo "";
}
?>

<?php


// Add a query to retrieve the last stored CLOSINGBALANCE value
$query = "SELECT CLOSINGBALANCE FROM `daybook` ORDER BY ID DESC LIMIT 1";
$result = $conn->query($query);

$previousClosingBalance = 0.00; // Default value if no previous records are found

if ($result !== false && $result->num_rows > 0) {
$row = $result->fetch_assoc();
$previousClosingBalance = (float)$row['CLOSINGBALANCE'];
}

// Output the retrieved closing balance value
// echo "Retrieved Closing Balance: " . number_format($previousClosingBalance, 2);



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<title>DayBook Details</title>
<style>
    .form-select-sm {
    margin-left: 37%;
    margin-top: -33px;
    font-size: 12px;
    width: 146px;
}
.search-container {
margin-left: 3%;
margin-bottom: 38px;
}
body
{
width:100%;   

}
.row
{
width:100%;

}
.container1
{
width:82%;
margin-top: 7rem;
}

.salary_details {
margin-left:1%;
margin-top:-33px;
overflow-x: scroll;
height: 410px;
border: 0px solid;
width:100%;
background: rgba(255, 255, 255, 0.69);
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color:transparent;
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

background-color:cyan;
} 

.table-bordered thead th
{
color: #FFF;
font-size: 12px;
font-family: Inter;
font-weight: 700;
letter-spacing: 0.3px;
width: 125px;
}

.table-bordered tr td
{
flex-shrink: 0;
border-bottom: 0.5px solid #000;
background: #D9D9D9;
}

tbody {
height: 100px; 
overflow-y: scroll;
}

/* Make the header row fixed */
thead {
width: 1288px;
height: 69px;
position: sticky;
top: 0;
flex-shrink: 0;
background: linear-gradient(269deg, #49D0C3 33.2%, #1EB2E6 66.33%);

}
th, td {
width: 110px;
height: 60px;
flex-shrink: 0;
color: black;

text-align: center;
font-family: Inter;
font-size: 13px;
font-style: normal;
font-weight: 900;
line-height: normal;
letter-spacing: 0.26px;
}

/* Add a border to the table */
table {
border-collapse: collapse;
}
.filt {
color: #000;
font-size: 20px;
font-family: Inter;
font-style: normal;
font-weight: 600;
line-height: normal;
letter-spacing: 0.4px;
}

#filter {
width: 100px;
height: 35px;
flex-shrink: 0;
padding-bottom: 5px;
}


.button3{
margin-left: 89%;
width: 106px;
height: 34px;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color:#00c5bc;
border:none;
border-radius:5px;
color:white;
}
a{
color:black;
text-decoration:none;
}
#filter {
width: 100px;
height: 35px;
flex-shrink: 0;
padding-bottom: 5px;
background-color: #ff5733; /* Change this to your desired color */
border: none;
border-radius: 5px;
color: white;
}

/* Style for the Refresh button */
#resetButton {
margin-left: 0;
width: 106px;
height: 34px;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color: #001bdd;
border: none;
border-radius: 5px;
color: white;
font-size: 16px;
}
.filter-button {
width: 100px;
height: 35px;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color: #ff5733; /* Change this to your desired color */
border: none;
border-radius: 5px;
color: white;
font-size: 16px;
}
#fromDate, #toDate {
width: 125px; /* Adjust the width as needed */
padding: 5px;
border: 1px solid #ccc; /* Border color */
background-color: #f0f0f0; /* Background color */
border-radius: 5px; /* Rounded corners */
margin-right: 10px; /* Add some spacing between the input boxes */
}
.move{
margin-top:6px;
margin-left: -122px;
}
.back-link {
margin-left: -83px;

text-decoration: none;
font-size: 24px;
margin-bottom: 20px; /* Adjust the margin as needed */
display: inline-block;
color: #0d6efd; /* Change the color to your preference */
}
#exportButton{
margin-top: -3%;
margin-left: 100%;
width: 106px;
height: 34px;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color:#00c5bc;
border:none;
border-radius:5px;
color:white;
}

.fa-arrow-left{
margin-left: -60px;
color:#03d2f3;
}
button#refreshButton {
top: -39px;
position: relative;
}
button#exportButton {
top: -26px;
position: relative;
}

i.fa {
position: absolute;
font-size: 24px;
margin-left: -31%;
margin-top: 38px;
}
i.fas.fa-arrow-left {
position: absolute;
margin-top: -90px;
color: white;
margin-left: 60px;
}
i.fas.fa-search {
margin-top: 10px;
position: absolute;
margin-left: -2%;
}
.search{
font-size:15px;
margin-left:49%;
}
i.fa-solid.fa-arrows-rotate {
margin-top: 36px;
position: absolute;
color:#0d6efd ;
}
i.fa-solid.fa-arrows-rotate {
margin-top: 8px;
margin-left: -51%;
position: absolute;
}

.opening-balance-label {
position: absolute;
top: 17%;
right: 36%;
font-weight: bold;
text-align:center;
color: #333;
width: 254px;
padding-top:7px;
color:white;
height: 40px;
flex-shrink: 0;
border-radius: 3px;
background: #005EA6;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}



/* Tablet */

@media (min-width: 768px) and (max-width:1177px) {
i.fa-solid.fa-arrows-rotate {
margin-left: -77%;
margin-top: 25px;
}
.search-container {
margin-left: 2%;
}
input#filterCustomerName {
margin-top: 22px;
margin-left: 10px;
}
i.fas.fa-search {
margin-top: 28px;
margin-left: -24px;
}
button#exportButton {
margin-left: 97%;
margin-top: -5px;
}
.salary_details {
margin-left: 14px;
margin-top: 80px;
}
label.opening-balance-label {
margin-right: 3pc;
}
i.fas.fa-arrow-left {
margin-left: 30px;
color: black;
margin-top: -1pc;
}
} 



/* Mobile */
@media (min-width: 380px) and (max-width: 767px){
.salary_details {
margin-left: 1.2pc;
width: 83pc;
margin-top: 8pc;
}
.container1 {
width: 79rem;
}
.search-container {
margin-left: 97px;
width: 46pc;
}
label.opening-balance-label {
margin-top: -21px;
margin-right: -54pc;
}
input#filterCustomerName {
margin-left: 60px;
margin-top: 5px;
}
button#exportButton {
margin-left: 67pc;
}
i.fas.fa-arrow-left {
color: black;
margin-top: 0pc;
margin-left: 37px;
}
i.fa-solid.fa-arrows-rotate {
margin-left: -60%;
}
i.fas.fa-search {
margin-top: 11px;
margin-left: -20px;
}
}



/* Large Screen Desktop*/

/* @media (min-width: 1177px) and (max-width:2000px) {
label.opening-balance-label {
margin-top: -21%;
}
input#filterCustomerName {
margin-left: 22pc;
}
i.fa-solid.fa-arrows-rotate {
display: none;
}
} */
</style>


</head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<body>
<div class="row">
<?php
include "nav1.php";
?>




<div class="form-group">

<div class="container1">




    <div class="search-container">
    <label for="fromDate">From:</label>
    <input type="date" id="fromDate">
    <label for="toDate">To:</label>
    <input type="date" id="toDate">

    
<!-- Display the Current Balance using PHP -->
<label class="opening-balance-label" >Current Balance: <span style="border: 2px solid white; padding: 2px;">RS.<?php echo number_format($previousClosingBalance, 2); ?></span></label>
    <input type="text" id="filterCustomerName" placeholder="Customer Name..." class="search">
    <i class="fas fa-search" style="font-size:15px; cursor: pointer;" onclick="filterTableByName()"></i>
    <i class="fa-solid fa-arrows-rotate" style="cursor: pointer; font-size: 20px;"  onclick="resetFilter()"></i>
    <select id="filterType" class="form-select form-select-sm" aria-label="Filter by Type" onchange="filterTableByPaymentMode()">
                    <option value="">Mode of Payments</option>
                    <option value="G Pay">G Pay</option>
                    <option value="Cash">Cash</option>
                    <option value="Neft">Neft</option>
                    <option value="DD / Check">DD / Check</option>
                    <option value="Finance">Finance</option>
                    <!-- Add more options for different types as needed -->
                </select>
    <button id="exportButton" class="button" onclick="window.location.href='export.php'">Export</button>
    <a href="daybook_form.php" >
    <i class="fas fa-plus"   style="font-size:26px; color:#005EA6; cursor: pointer;"></i> </a>
</div>
</div>

<div class="salary_details">
<table class="table table-bordered">
    <thead>
        <tr class="bc">
<th>ID</th>
<th>DATE</th>
<th>TYPES</th>
<th>CUSTOMER NAME</th>
<th>CUSTOMER CODE</th>
<th>PHONE NUMBER</th>
<th>RECEIPT NUMBER</th>
<th>VEHICLE NAME</th>
<th>TYPES OF SERVICES</th>
<th>MODE OF PAYMENT</th>
<th>NEFT OPTION</th>
<th>FINANCE OPTION</th>
<th>HDFC</th>
<th>IDFC</th>
<th>IBC</th>
<th>PAYMENT REFERENCE NUMBER</th>
<th>HDFCCA</th>
<th>HDRCC</th>
<th>INV</th>
<th>DIRECT/EXCHANGE</th>
<th>EXCHANGE AMOUNT</th>
<th>CASH AMOUNT</th>
<th>DEBIT AMOUNT</th>
<th>CLOSING BALANCE</th>
<th>EDIT</th>   
<!--<th>DELETE</th>   -->
</tr>
</thead>
    <tbody id="tableBody">
        <?php
        include "connect.php";
        $sve = "SELECT * FROM daybook";
        $ddd = mysqli_query($conn, $sve);
        while ($row = mysqli_fetch_assoc($ddd)) {
            $id = $row['ID'];
            $date = $row['DATE'];
            $types= $row['TYPES'];
            $customername = $row['CUSTOMERNAME'];
            $customercode = $row['CUSTOMERCODE'];
            $phonenumber = $row['PHONENUMBER'];
            $receipt = $row['RECEIPT'];
            $vehiclename = $row['VEHICLENAME'];
            $service = $row['SERVICE'];
            $mode = $row['MODE'];
            $neftoption = $row['NEFTOPTION'];
            $financeoption = $row['FINANCEOPTION'];
            $hdfc = $row['HDFC'];
            $idfc = $row['IDFC'];
            $ibc = $row['IBC'];
            $reference = $row['REFERENCE'];
            $hdfcca = $row['HDFCCA'];
            $hdfca = $row['HDRCC'];
            $inv = $row['INV'];
            $dir = $row['DIRECT/EX'];
            $examt  = $row['EXCHANGEAMOUNT'];


            $credit = $row['CREDIT'];
            $debit = $row['DEBIT'];
            $closebal = $row['CLOSINGBALANCE'];
            ?>   
            <tr>
            <td><?php echo $id ?></td>
<td><?php echo $date ?></td>
<td><?php echo $types ?></td>
<td><?php echo $customername ?></td>
<td><?php echo !empty($customercode) ? $customercode : '-' ?></td>
<td><?php echo !empty($phonenumber) ? $phonenumber : '-' ?></td>
<td><?php echo !empty($receipt) ? $receipt : '-' ?></td>
<td><?php echo !empty($vehiclename) ? $vehiclename : '-' ?></td>
<td><?php echo !empty($service) ? $service : '-' ?></td>
<td><?php echo !empty($mode) ? $mode : '-' ?></td>
<td><?php echo !empty($neftoption) ? $neftoption : '-' ?></td>
<td><?php echo !empty($financeoption) ? $financeoption : '-' ?></td>
<td><?php echo !empty($hdfc) ? $hdfc : '-' ?></td>
<td><?php echo !empty($idfc) ? $idfc : '-' ?></td>
<td><?php echo !empty($ibc) ? $ibc : '-' ?></td>
<td><?php echo !empty($reference) ? $reference : '-' ?></td>
<td><?php echo !empty($hdfcca) ? $hdfcca : '-' ?></td>
<td><?php echo !empty($hdfca) ? $hdfca : '-' ?></td>
<td><?php echo !empty($inv) ? $inv : '-' ?></td>
<td><?php echo !empty($dir) ? $dir : '-' ?></td>
<td><?php echo !empty($examt) ? $examt : '-' ?></td>

<td><?php echo !empty($credit) ? $credit : '-' ?></td>
<td><?php echo !empty($debit) ? $debit : '-' ?></td>
<td><?php echo !empty($closebal) ? $closebal : '-' ?></td>
<td><a href="daybook_edit.php?id=<?php echo $row["ID"]; ?>" class="" role="button">
<i class="fas fa-edit" style="font-size: 20px; color:black;"></i>
</a></td>


</a>
<!--<td><a href="delete.php?id=<?php echo $row["ID"]; ?>" class="" role="button" onclick="return confirm('Are you sure you want to delete this record?')">-->
<!--<i class="fas fa-trash-alt" style="font-size: 20px; color:red;"></i>-->
<!--</a>-->
<!--</td>-->
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</body>
<script>
    function filterTableByPaymentMode() {
        const selectedPaymentMode = document.getElementById("filterType").value.toLowerCase();
        const tableBody = document.getElementById("tableBody");
        const rows = tableBody.getElementsByTagName("tr");

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const paymentModeColumn = row.getElementsByTagName("td")[9]; // Assuming mode of payment is in the 10th column (index 9)

            if (paymentModeColumn) {
                const rowPaymentMode = paymentModeColumn.textContent.toLowerCase();

                // Check if the row's payment mode matches the selected mode
                if (selectedPaymentMode === "" || rowPaymentMode === selectedPaymentMode) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
    }

    // Call this function initially to show all records
    filterTableByPaymentMode();
</script>

<script>

function confirmDelete(id) {
if (confirm("Are you sure you want to delete this record?")) {      
window.location.href = "daybook_save.php?id=" + id; 
}
}
</script>
<script>
document.getElementById("fromDate").addEventListener("input", filterTable);
document.getElementById("toDate").addEventListener("input", filterTable);



function filterTable() {
const fromDate = document.getElementById("fromDate").value;
const toDate = document.getElementById("toDate").value;
const tableBody = document.getElementById("tableBody");
const rows = tableBody.getElementsByTagName("tr");

for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    const dateColumn = row.getElementsByTagName("td")[1]; // Assuming date is in the second column (index 1)

    if (dateColumn) {
        const rowDate = dateColumn.textContent;
        if (rowDate >= fromDate && rowDate <= toDate) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}
}

function resetFilter() {
const tableBody = document.getElementById("tableBody");
const rows = tableBody.getElementsByTagName("tr");

for (let i = 0; i < rows.length; i++) {
const row = rows[i];
row.style.display = "";
}

// Clear the date input fields
document.getElementById("fromDate").value = "";
document.getElementById("toDate").value = "";
}
</script>
<script>
document.getElementById("filterCustomerName").addEventListener("input", filterTableByName);
function filterTableByName() {
const customerName = document.getElementById("filterCustomerName").value.toLowerCase();
const tableBody = document.getElementById("tableBody");
const rows = tableBody.getElementsByTagName("tr");

for (let i = 0; i < rows.length; i++) {
const row = rows[i];
const customerNameColumn = row.getElementsByTagName("td")[3]; // Assuming customer name is in the fourth column (index 3)

if (customerNameColumn) {
const rowCustomerName = customerNameColumn.textContent.toLowerCase();

// Check if the customer name contains the search term
if (rowCustomerName.includes(customerName)) {
    row.style.display = "";
} else {
    row.style.display = "none";
}
}
}
}
</script>   
<script>
document.addEventListener("DOMContentLoaded", function () {
const fromDateInput = document.getElementById("fromDate");
const toDateInput = document.getElementById("toDate");

// Event listener to handle date range changes
fromDateInput.addEventListener("input", filterTableByDateRange);
toDateInput.addEventListener("input", filterTableByDateRange);

function filterTableByDateRange() {
    const fromDate = fromDateInput.value;
    const toDate = toDateInput.value;
    const tableBody = document.getElementById("tableBody");
    const rows = tableBody.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        const dateColumn = row.getElementsByTagName("td")[1]; // Assuming date is in the second column (index 1)

        if (dateColumn) {
            const rowDate = dateColumn.textContent;
            if (
                (fromDate === "" || rowDate >= fromDate) &&
                (toDate === "" || rowDate <= toDate)
            ) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    }
}
});
</script>

<script>
function refreshPage() {
location.reload();
}
</script>



</html>
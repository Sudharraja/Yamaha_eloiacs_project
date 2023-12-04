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
.search{
    background:white;
    border:none;
}
.sales-details{
    width: 80pc;
    height: 74vh; /* Adjust the height as needed */
    overflow-x: auto;
    overflow-y: auto;
    margin-left: 38px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    border-radius:7px;
}

/* Style the vertical scrollbar thumb */
.sales-details::-webkit-scrollbar-thumb {
    background: linear-gradient(92deg, rgba(35, 181, 227, 0.80) 42.15%, rgba(71, 206, 198, 0.80) 50.76%);
}

/* Style the track (the background of the scrollbar) */
.sales-details::-webkit-scrollbar {
    width: 8px;
    height:8px;
    border-radius:10px;
}

td{
    font-size:12px;
}
th{
   text-align:center;
}
.thead {
    position: sticky;
    top: 0; 
    
    z-index: 1; 
    background: linear-gradient(92deg, rgba(35, 181, 227, 0.80) 42.15%, rgba(71, 206, 198, 0.80) 50.76%);
    color:white;
    font-size:12px;
    letter-spacing:1.6px;
}
#tableBody tr:hover {
    background-color: #F8F9FA;
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
            <div class="col-8">
            <input type="text" class="list" name="search" id="filterCustomerName" placeholder="Search list">
                <button type="submit" name="submit1" class="search"><i class="fa fa-search" onclick="filterTableByName()"></i></button>

           
            </div>
            <div class="col-2">
                <button class="view"><a href="sales.php">BACK</a></button>
            </div>
        </div>
    </form>

    <div class="sales-details">
    <table class="table">
        <thead class="thead">
            <tr>
                <th>INVOICE DATE</th>
                <th>CHASSIS NO</th>
                <th>VEHICLE MODEL</th>
                <th>CUSTOMER NAME</th>
                <th>CUSTOMER CODE</th>
                <th>PAYMENT TYPE</th>
                <th>BRANCHES DEALERS</th>
                <th>EXCHANGE</th>
                <th>EXCHANGE DATE</th>
                <th>RECEIVED</th>
                <th>RECEIVED DATE</th>
                <th>ROADSIDE ASSISTANCE</th>
                <th>IPRECEIVABLE</th>
                <th>IPRECEIVED</th>
                <th>FINANCE RECEIVABLE</th>
                <th>FINANCE RECEIVED</th>
                <th>FILE CLOSINGDATE</th>
                <th>STATUS</th>
                <th>EXTRA FITTING</th>
                <th>EXTENDED WARRANTY</th>
                <th>CASH DISCOUNT</th>
                <th>PETROL</th>
                <th>VEHICLE COVER</th>
                <th>MECHANIC COMMISSION</th>
                <th>CUSTOMER SIDEINSURANCE</th>
                <th>ACCOUNT VERIFIEDDATE</th>
                <th>RTO STATUS</th>
                <th>BASIC FITTINGS</th>



                <th>FILERECEIVEDDATE</th>
                <th>FORM20DATE</th>
                <th>FORM20RECEIVEDDATE</th>
                <th>ACCOUNTSCONFIRMATION</th>
                <th>REGISTRATIONDATE</th>
                <th>REGISTRATIONNUMBER</th>
                <th>RCSTATUS</th>
                <th>RCRECDATE</th>

                <th>VEHICLE TOTALPRICE</th>
                <th>TOTAL CASH RECEIVED</th>
                <th>OFFER AMOUNT</th>
                <th>REDUCTIONS</th>
                <th>ANY OTHER</th>
                <th>BALANCE AMOUNT</th>
                <th>REMARKS</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php
            include "connect.php";

            // SQL query to retrieve data from the "project" table
            $sql = "SELECT * FROM project";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if there are any rows in the result set
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['INVOICEDATE'] . "</td>";
                    echo "<td>" . $row['CHASSISNO'] . "</td>";
                    echo "<td>" . $row['VEHICLEMODEL'] . "</td>";
                    echo "<td>" . $row['CUSTOMERNAME'] . "</td>";
                    echo "<td>" . $row['CUSTOMERCODE'] . "</td>";
                    echo "<td>" . $row['PAYMENTTYPE'] . "</td>";
                    echo "<td>" . $row['BRANCHESDEALERS'] . "</td>";
                    echo "<td>" . $row['EXCHANGE'] . "</td>";
                    echo "<td>" . $row['EXCHANGEDATE'] . "</td>";
                    echo "<td>" . $row['RECEIVED'] . "</td>";
                    echo "<td>" . $row['RECEIVEDDATE'] . "</td>";
                    echo "<td>" . $row['ROADSIDEASSISTANCE'] . "</td>";
                    echo "<td>" . $row['IPRECEIVABLE'] . "</td>";
                    echo "<td>" . $row['IPRECEIVED'] . "</td>";
                    echo "<td>" . $row['FINANCERECEIVABLE'] . "</td>";
                    echo "<td>" . $row['FINANCERECEIVED'] . "</td>";
                    echo "<td>" . $row['FILECLOSINGDATE'] . "</td>";
                    echo "<td>" . $row['STATUS'] . "</td>";
                    echo "<td>" . $row['EXTRAFITTING'] . "</td>";
                    echo "<td>" . $row['EXTENDEDWARRANTY'] . "</td>";
                    echo "<td>" . $row['CASHDISCOUNT'] . "</td>";
                    echo "<td>" . $row['PETROL'] . "</td>";
                    echo "<td>" . $row['VEHICLECOVER'] . "</td>";
                    echo "<td>" . $row['MECHANICCOMMISSION'] . "</td>";
                    echo "<td>" . $row['CUSTOMERSIDEINSURANCE'] . "</td>";
                    echo "<td>" . $row['ACCOUNTVERIFIEDDATE'] . "</td>";
                    echo "<td>" . $row['RTOSTATUS'] . "</td>";
                    echo "<td>" . $row['BASICFITTINGS'] . "</td>";
                    echo "<td>" . $row['FILERECEIVEDDATE'] . "</td>";
                    echo "<td>" . $row['FORM20DATE'] . "</td>";
                    echo "<td>" . $row['FORM20RECEIVEDDATE'] . "</td>";
                    echo "<td>" . $row['ACCOUNTSCONFIRMATION'] . "</td>";
                    echo "<td>" . $row['REGISTRATIONDATE'] . "</td>";
                    echo "<td>" . $row['REGISTRATIONNUMBER'] . "</td>";
                    echo "<td>" . $row['RCSTATUS'] . "</td>";
                    echo "<td>" . $row['RCRECDATE'] . "</td>";
                    echo "<td>" . $row['VEHICLETOTALPRICE'] . "</td>";
                    echo "<td>" . $row['TOTALCASHRECEIVED'] . "</td>";
                    echo "<td>" . $row['OFFERAMOUNT'] . "</td>";
                    echo "<td>" . $row['REDUCTIONS'] . "</td>";
                    echo "<td>" . $row['ANYOTHER'] . "</td>";
                    echo "<td>" . $row['BALANCEAMOUNT'] . "</td>";
                    echo "<td>" . $row['REMARKS'] . "</td>";
                    // Add more cells for other columns as needed
                    echo "</tr>";
                }
            } else {
                echo "No data found in the database.";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>  
    </div>

    
</div>

    </body>
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
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
    margin-top: 35px;
    margin-left: 69px;
    width: 87px;
    font-size: 16px;
    height: 36px;
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
    margin-top: 14px;
    width: 80pc;
    height: 66vh; /* Adjust the height as needed */
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
.form-select-sm {
    margin-left: 56%;
    margin-top: -30px;
    font-size: 12px;
    width: 145px;
}
.form-select-ssm {
    margin-left: 69%;
    margin-top: -30px;
    font-size: 12px;
    width: 152px;
}
button#exportButton {
top: -26px;
position: relative;
}
button#refreshButton {
top: -39px;
position: relative;
}
button#exportButton {
    margin-left: 75pc;
top: -24px;
position: relative;
}
#exportButton{
margin-top: -3%;
margin-left: 100%;
width: 106px;
height: 34px;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color:#1fd1b0;
border:none;
border-radius:5px;
color:white;
}
i.fa-solid.fa-arrows-rotate {
    margin-left: 12px;
}
</style>
<body>


<div class="container-box">
    <div class="border1"></div>
    <form action="" method="post" id="exportForm">
        <div class="row">
            
            <div class="col-2">
                <img class="image" src="img2.png" alt="Image not Found" srcset="">
            </div>
            <div class="col-8">
            <input type="text" class="list" name="search" id="filterCustomerName" placeholder="Customer Name">
                <button type="submit" name="submit1" class="search"><i class="fa fa-search" onclick="filterTableByName()"></i></button>

           
            </div>
            <div class="col-2">
                <button class="view"><a href="sales.php">BACK</a></button>
            </div>
        </div></form>


        <div class="date">
        <label for="fromDate" style="margin-left: 8pc;">From:</label>
    <input style="width: 9pc;" type="date" id="fromDate" oninput="filterTableByDate()">
    <label for="toDate" style="margin-left: 1pc;">To:</label>
    <input style="width: 9pc;" type="date" id="toDate" oninput="filterTableByDate()">
    
    <i class="fa-solid fa-arrows-rotate" style="cursor: pointer; font-size: 20px;"  onclick="resetFilter()"></i>
    <select id="filterType" class="form-select form-select-sm" aria-label="Filter by Type" onchange="filterTable()">
                    <option value="">Mode of Payments</option>
                    <option value="Cash">Cash</option>
                    <option value="Finance">Finance</option>
                    <!-- Add more options for different types as needed -->
                </select>

                <select id="filterBranch" class="form-select form-select-ssm" aria-label="Filter by Type" onchange="filterTable()">
    <option value="">Select Branches</option>
    <option value="Karungal">Karungal</option>
    <option value="Puthukadai">Puthukadai</option>
    <option value="Pammam">Pammam</option>
    <option value="Kuzhithurai">Kuzhithurai</option>
    <option value="M M Motors">M M Motors</option>
    <option value="Triumph Motors">Triumph Motors</option>
    <option value="Oliver Motors">Oliver Motors</option>
</select>


                
<button type="button" onclick="exportTableData()" id="exportButton">Export</button>


    <div class="sales-details">
    <table class="table">
        <thead class="thead" id="thead">
        
            <tr>
                <th>INVOICE DATE</th>
                <th>CHASSIS NO</th>
                <th>VEHICLE MODEL</th>
                <th>CUSTOMER NAME</th>
                <th>CUSTOMER CODE</th>
                <th>PAYMENT TYPE</th>
                <th>PAYMENT MODE</th>
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
                <th>CUSTOMER SIDE INSURANCE</th>
                <th>ACCOUNT VERIFIED DATE</th>
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
                <th>EXCESS AMOUNT</th>
                <th>RTO CONFIRMATION</th>
                <th>FOLDER CLOSING DATE</th>
                <th>ACCOUNT CLOSING DATE</th>
                <th>VEHICLE TOTALPRICE</th>
                <th>TOTAL CASH RECEIVED</th>
                <th>OFFER AMOUNT</th>
                <th>REDUCTIONS</th>
                <th>ANY OTHER</th>
                <th>BALANCE AMOUNT</th>
                <th>REMARKS</th>
            </tr>
           
        </thead>
        <tr id="noDataFound" style="display: none;">
    <td colspan="15" style="text-align: center; font-weight: bold; border:none;">No Data Found</td>
</tr>
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
                    echo "<td>" . $row['PAYMENTMODE'] . "</td>";
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
                    
                    echo "<td>" . $row['EXCESSAMOUNT'] . "</td>";
                    echo "<td>" . $row['RTOCONFIRMATION'] . "</td>";
                    echo "<td>" . $row['FOLDERCLOSINGDATE'] . "</td>";
                    
                    echo "<td>" . $row['ACCOUNTCLOSINGDATE'] . "</td>";
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

function updateNoDataMessage() {
    const tableBody = document.getElementById("tableBody");
    const noDataFoundRow = document.getElementById("noDataFound");
    const visibleRows = tableBody.querySelectorAll("tr:not([style*='display: none'])");

    if (visibleRows.length === 0) {
        noDataFoundRow.style.display = ""; // Show "No Data Found" message
    } else {
        noDataFoundRow.style.display = "none"; // Hide "No Data Found" message
    }
}


        function resetFilter() {
            const tableBody = document.getElementById("tableBody");
            const rows = tableBody.getElementsByTagName("tr");

            for (let i = 0; i < rows.length; i++) {
                rows[i].style.display = "";
            }

            // Clear the date input fields
            document.getElementById("fromDate").value = "";
            document.getElementById("toDate").value = "";
            updateNoDataMessage();
        }
</script>

<script>
    // Define a function to handle both payment mode and branch filters
function filterTable() {
    const selectedPaymentMode = document.getElementById("filterType").value.toLowerCase();
    const selectedBranch = document.getElementById("filterBranch").value.toLowerCase();

    const tableBody = document.getElementById("tableBody");
    const rows = tableBody.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        const paymentModeColumn = row.getElementsByTagName("td")[6].textContent.toLowerCase();
        const branchColumn = row.getElementsByTagName("td")[7].textContent.toLowerCase();

        // Check if the row's payment mode and branch match the selected filters
        if ((selectedPaymentMode === "" || paymentModeColumn === selectedPaymentMode) &&
            (selectedBranch === "" || branchColumn === selectedBranch)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
    updateNoDataMessage();
}

// Call this function initially to show all records
filterTable();
 // After filtering, update the "No Data Found" message


</script>

<script>
        function filterTableByDate() {
            var fromDate = new Date(document.getElementById("fromDate").value);
            var toDate = new Date(document.getElementById("toDate").value);

            var table = document.getElementById("tableBody");
            var rows = table.getElementsByTagName("tr");

            for (var i = 0; i < rows.length; i++) {
                var dateCell = rows[i].getElementsByTagName("td")[0]; // Assuming date is in the first column
                if (dateCell) {
                    var rowDate = new Date(dateCell.textContent);
                    if (rowDate >= fromDate && rowDate <= toDate) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
            updateNoDataMessage();
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
updateNoDataMessage();
}
// After filtering, update the "No Data Found" message
updateNoDataMessage();
</script>



<script>
function exportTableData() {
    const table = document.querySelector("table");
    const visibleRows = table.querySelectorAll("#tableBody tr:not([style*='display: none'])"); // Select only visible (filtered) rows
    let csvContent = "data:text/csv;charset=utf-8,";

    // Generate a filename with the current date
    const currentDate = new Date();
    const formattedDate = currentDate.toISOString().slice(0, 10); // Format as YYYY-MM-DD
    const filename = "SalesReport_" + formattedDate + ".csv";

    // Extract headers from the thead
    const headerRow = table.querySelector("thead tr");
    let headers = [];
    for (let i = 0; i < headerRow.children.length; i++) {
        headers.push('"' + headerRow.children[i].textContent + '"');
    }
    csvContent += headers.join(",") + "\n";

    // Add rows to the CSV content starting from visibleRows
    for (let i = 0; i < visibleRows.length; i++) {
        const cols = visibleRows[i].children;
        let row = [];
        for (let j = 0; j < cols.length; j++) {
            row.push('"' + cols[j].textContent + '"');
        }
        csvContent += row.join(",") + "\n";
    }

    // Create a data URI for the CSV content
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", filename); // Use the generated filename
    document.body.appendChild(link);

    // Trigger the download
    link.click();
}


</script>

</html>

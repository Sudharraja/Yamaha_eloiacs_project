<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Display Products</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<style>
    .button {
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.export-button {
    background-color: white;
    color: blue;
    margin-left: 82%;
    border: 1px solid blue; /* Add blue border */
}

/* Style the icons */
.button i {
    margin-right: 10px;
}

.add-button {
    background-color: blue;
    color: white;
    margin-left: 2%;
    border: 2px solid blue; 
    margin-right: 10px;
}
.add-button a{
    text-decoration:none;
    color:white;
}
.add-button a:hover{
    color:white;
}

.box{
    position: fixed;
    height:100vh;
}
.container_1{
    margin-left: 23%;
    margin-top:16px;
}
table.table-bordered1
{
/* width: min-content; */
margin-top: 27px;
box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
border-radius:5px;
border: 2px solid; /* You can set the border style, width, and color in one line */
border-top-color: grey;
border-left-color: grey;
border-bottom-color: grey;
border-right-color: grey;
}
table.table-bordered1 thead th{
    letter-spacing: 0.3px;
}
thead{
background-color:blue;
color:white;
text-align:center;
flex-shrink: 0;
  position: sticky;
}
tbody{
    overflow-y: scroll;
}
td{
text-align:center;
}
table.table-bordered1 tbody tr:hover{
background-color:grey;
color:white;
font-weight:bold;
} 
.dataTables_filter{
    margin-left: 6rem;
    margin-bottom:10px;
}
.dataTables_info{
    width: 16rem;
    margin-bottom:15px;
}
#datatable_paginate{
    margin-left: 30rem;
    margin-top: 6px;
    margin-bottom:15px;
}

.datatables1 {
    overflow-x: scroll; 
    height: 500px;
    /* width:min-content; */
   
}

.datatables1::-webkit-scrollbar {
    height: 10px;
    width: 4px;
}

/* .datatables1::-webkit-scrollbar-thumb:horizontal {
    background-color: #fb5407ba;
} */

.status-box {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 5px;
    color: white;
    text-align: center;
}

.status-active {
    background-color: blue;
}

.status-inactive {
    background-color: red;
}


/* .inactive{
    margin-left: -5px;
    width: 68px;
    background-color: grey;
    color: white !important;
    padding: 2px;
    font-weight: bold;
    border-radius: 0 5px 5px 0;
}
.inactive a{
    text-decoration:none;  
    color:inherit; 
}
.inactive:hover{
    color:grey !important;
    background-color: white;
    border: 2px solid grey;
}
.all{
    padding: 2px;
    color: white !important;
    width: 106px;
    background-color: grey;
    font-weight: bold;
    border-radius: 5px 0 0 5px;
    margin-bottom: 15px;
}
.all a{
    text-decoration: none;
    color: inherit;
}
.all:hover{
    color:grey !important;
    background-color: white;
    border: 2px solid grey;
} */


.all {
    background-color: white;
    color: blue;
    width: 104px;
    padding: 3px;
    margin-bottom: 20px;
    font-weight: bold;
    border-radius: 5px 0 0 5px;
    border:none;
  }
.all a{
    text-decoration:none;
    color:inherit;
}
  .inactive {
    background-color: blue;
    color: white;
    margin-left:-5px;
    width: 68px;
    padding: 3px;
    font-weight: bold;
    border-radius: 1.5px 5px 5px 1.5px;
    border:none;
  }
  .inactive a{
    text-decoration:none;
    color:inherit;
}
.all:hover{
    color:white !important;
    background-color:blue;
}
.mat_delete1{
    color:red;
}






table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td {
    text-align: center;
}


/* Hide both ascending and descending DataTables sorting icons */
table.dataTable thead .sorting::before,
table.dataTable thead .sorting_asc::before,
table.dataTable thead .sorting_desc::before {
    display: none !important;
}
table.dataTable thead .sorting::after,
table.dataTable thead .sorting_asc::after,
table.dataTable thead .sorting_desc::after {
    display: none !important;
}
</style>
<body>
    <div class="row">
        <div class="col-lg-3">
        <?php include "nav.php"; ?>
        </div>
    </div>
    <div class="col">
    <div class="container_1">

    <button class="button export-button" id="export-button">
    <i class="fa fa-upload"></i> Export
</button>
<h5>Products</h5>
    <button type="button" class="all"><a href="main.php">All Products</a></button>
            <button type="button" class="inactive"><a href="main_inactive.php">Inactive</a></button>  
<div class="row">
<div class="col-md-3">
<div class="box">
    <div class="datatables1">
    
            <table class="table table-bordered1" id="datatable">
    <thead>
        <tr class="bc">
            <th>Material Code</th>
            <th>Models</th>
            <th>Ex showroom</th>
            <th>LT/RT</th>
            <th>Insurance</th>
            <th>Accessories</th>
            <th>Pro Plus</th>
            <th>On Road Price</th>
            <!-- <th>Status</th> -->
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php
    include "connect.php";
    // $sve = "SELECT * FROM product WHERE is_deleted = 0";

    $sve = "SELECT * FROM product WHERE is_deleted = 0 AND `expire/not` = 'expired'";

    $ddd = mysqli_query($conn, $sve);
    while ($row = mysqli_fetch_assoc($ddd)) {
        $materialcode = $row['Material Code'];
        $models = $row['Models'];
        $ex_showroom = $row['Ex showroom'];
        $lt = $row['LT/RT'];
        $insurance = $row['Insurance'];
        $accessories = $row['Accessories'];
        $pro_plus = $row['Pro Plus'];
        $on_road_price = $row['On Road Price'];
        $status = $row['Status'];
    
        // Display the row
        echo '<tr>';
        echo '<td>' . $materialcode . '</td>';
        echo '<td>' . $models . '</td>';
        echo '<td>' . $ex_showroom . '</td>';
        echo '<td>' . $lt . '</td>';
        echo '<td>' . $insurance . '</td>';
        echo '<td>' . $accessories . '</td>';
        echo '<td>' . $pro_plus . '</td>';
        echo '<td>' . $on_road_price . '</td>';
        // echo '<td>';
        // if ($status === "active") {
        //     echo '<div class="status-box status-active">Active</div>';
        // } elseif ($status === "inactive") {
        //     echo '<div class="status-box status-inactive">Inactive</div>';
        // }
        // echo '</td>';
        echo '<td><a href="product_edit.php?id=' . $row["ID"] . '"  role="button"><i class="fas fa-edit"></i></a></td>';
        echo '<td><a href="product_delete.php?id=' . $row["ID"] . '" class="mat_delete1" role="button" onclick="return confirm(\'Are you sure you want to delete this record?\')"><i class="fas fa-trash-alt"></i></a></td>';
        echo '</tr>';
    }
    
    
    ?>
    </tbody>
</table>
        </div>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Function to convert a table to CSV
    function convertToCSV(table) {
        const rows = Array.from(table.querySelectorAll("tr"));
        return rows
            .map((row) => {
                const columns = Array.from(row.querySelectorAll("th,td"));
                // Exclude the last two columns (Edit and Delete)
                const filteredColumns = columns.slice(0, -2);
                return filteredColumns
                    .map((column) => {
                        const data = column.textContent.trim();
                        return data.includes(",") ? `"${data}"` : data;
                    })
                    .join(",");
            })
            .join("\n");
    }

    // Function to download CSV
    function downloadCSV(csv, filename) {
        const csvBlob = new Blob([csv], { type: "text/csv;charset=utf-8;" });
        const csvURL = window.URL.createObjectURL(csvBlob);
        const link = document.createElement("a");
        link.href = csvURL;
        link.setAttribute("download", filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    const exportButton = document.getElementById("export-button");
    const table = document.getElementById("datatable");

    // Initialize DataTable
    const dataTable = new DataTable("#datatable", {
        ordering: false,
    });

    exportButton.addEventListener("click", function () {
        // Store the current page index
        const currentPage = dataTable.page();

        // Create an array to store CSV data
        const csvData = [];

        // Iterate through all pages and fetch data
        for (let i = 0; i < dataTable.page.info().pages; i++) {
            // Go to the current page
            dataTable.page(i).draw("page");

            // Convert the current page's data to CSV
            const csv = convertToCSV(table);

            // Split CSV data into an array of lines
            const lines = csv.split("\n");

            // Exclude the header (first line) if it's not the first page
            if (i > 0) {
                lines.shift();
            }

            // Concatenate CSV data to the array
            csvData.push(...lines);
        }

        // Restore the original page
        dataTable.page(currentPage).draw("page");

        // Join the CSV data for all pages
        const finalCSV = csvData.join("\n");

        // Define the filename
        const filename = "Expired Product Datas.csv";

        // Download the CSV
        downloadCSV(finalCSV, filename);
    });
});


</script>
</html>

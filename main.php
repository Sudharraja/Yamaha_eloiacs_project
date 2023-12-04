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
    z-index: 1000; /* Increase the z-index value */
    padding: 10px 20px;
    cursor: pointer;
    background-color: white;
    color: blue;
    margin-left: 53%;
    border: 1px solid blue;
    width: 128px;
    height: 44px;
    text-align: center;
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
/* width: max-content; */
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

th{
    margin-bottom:10%;
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
    margin-bottom:45px;
}

.datatables1 {
    overflow-x: scroll; 
    height: 500px;
    /* width:max-content; */
   
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
    padding: 1px 8px;
    border-radius: 5px;
    color: white;
    text-align: center;
    font-size: 13px;
}

.status-active {
    background-color: blue;
}

.status-inactive {
    background-color: red;
}


  .inactive {
    background-color: white;
    color: blue;
    margin-left:-5px;
    width: 68px;
    padding: 3px;
    font-weight: bold;
    border-radius: 1.5px 5px 5px 1.5px;
  }
  .inactive a{
    text-decoration:none;
    color:blue;
}
.inactive:hover{
    color:white !important;
    background-color:white;
}

.all {
    background-color: blue;
    color: white;
    width: 98px;
    padding: 3px;
    margin-bottom: 20px;
    font-weight: bold;
    border-radius: 5px 0 0 5px;
  }
  
/* .all:hover{
    color:blue !important;
    background-color:white;
}    */

.all a{
    color:white;
    text-decoration:none;
}
/* .all:hover a{
    text-decoration:none;
    color:blue;
} */

 




.form-group1{
    margin-left:22px;
    margin-top:10px;
}
.import{
    margin-left:18rem;
}
.btn-success{
    margin-left: -51px;
}
.mat_delete{
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

.fa-sign-out{
    width: 26px;
    height: 18px;
    padding: 10px;
}

label.btn-success{
    margin-left: 20rem;

    cursor: pointer;
    background-color: white;
    color: blue;
    border: 1px solid blue;
    width: 128px;
    height: 44px;
    text-align: center;
}
label.btn-success:hover{
    color:white;
    background-color:blue;
    border:1px solid blue;
}



/* .btn-success{
    margin-left:26rem;
} */

.import-icon::before {
    content: "\f56f"; /* Unicode for an import icon (you can change it) */
    font-family: FontAwesome; /* Use the FontAwesome or any other icon font you prefer */
    margin-right: 5px; /* Adjust spacing between icon and text as needed */
  }

</style>
<body>

<!-- <php
require 'vendor/autoload.php';
include 'functions.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$msg = ""; // Initialize the message variable

if (isset($_REQUEST['import-excel'])) {
    $file = $_FILES['excel-file']['tmp_name'];
    $extension = pathinfo($_FILES['excel-file']['name'], PATHINFO_EXTENSION);

    if ($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') {
        $obj = PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        $data = $obj->getActiveSheet()->toArray();

        // Remove the first row (headers) from the data
        array_shift($data);

        foreach ($data as $row) {
            // $materialCode = generateMaterialCode($conn); 
            $materialCode = $row['0'];
            $accessories = $row['1'];
            $models = $row['2'];
            $plus = $row['3'];
            $ex = $row['4'];
            $orp = $row['5'];
            $rt = $row['6'];
            $insurance = $row['7'];
            $status = $row['8'];

            $insert_query = mysqli_query($conn, "INSERT INTO `product` (`Material Code`, `Accessories`, `Models`, `Pro Plus`, `Ex showroom`, `On Road Price`, `LT/RT`, `Insurance`, `Status`) VALUES ('$materialCode', '$accessories', '$models', '$plus', '$ex', '$orp','$rt', '$insurance', '$status')");

            if ($insert_query) {
                $msg = "File Imported Successfully!";
            } else {
                $msg = "Not Imported!";
            }
        }
    } else {
        $msg = "Invalid File!";
    }
    $conn->close();
}
?> -->



<?php
require 'vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$msg = ""; // Initialize the message variable

if (isset($_POST['import-excel'])) {
    // Check if a file was uploaded
    if (isset($_FILES['excel-file'])) {
        $file = $_FILES['excel-file']['tmp_name'];
        $extension = pathinfo($_FILES['excel-file']['name'], PATHINFO_EXTENSION);

        if ($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') {
            // Load the Excel file
            $obj = PhpOffice\PhpSpreadsheet\IOFactory::load($file);

            if ($obj) {
                $data = $obj->getActiveSheet()->toArray();

                // Remove the first row (headers) from the data
                array_shift($data);

                // Database connection (update with your own credentials)
                $conn = mysqli_connect('localhost', 'u726014584_yamahauser', 'Y234567a', 'u726014584_yamaha');

                if (!$conn) {
                    die("Database connection failed: " . mysqli_connect_error());
                }

                // Prepared statement to insert data into the 'product' table
                $stmt = $conn->prepare("INSERT INTO `product` (`Material Code`, `Accessories`, `Models`, `Pro Plus`, `Ex showroom`, `On Road Price`, `LT/RT`, `Insurance`, `Status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssssss", $materialCode, $accessories, $models, $plus, $ex, $orp, $rt, $insurance, $status);

                foreach ($data as $row) {
                    $materialCode = $row['0'];
                    $accessories = $row['1'];
                    $models = $row['2'];
                    $plus = $row['3'];
                    $ex = $row['4'];
                    $orp = $row['5'];
                    $rt = $row['6'];
                    $insurance = $row['7'];
                    $status = $row['8'];

                    if ($stmt->execute()) {
                        $msg = "File Imported Successfully!";
                    } else {
                        $msg = "Error: " . $stmt->error;
                        break; // Exit the loop on the first error
                    }
                }

                $stmt->close();
                $conn->close();
            } else {
                $msg = "Error loading the Excel file.";
            }
        } else {
            $msg = "Invalid File!";
        }
    } else {
        $msg = "No file uploaded.";
    }
    // JavaScript alert to display the message
    echo '<script>alert("' . $msg . '");</script>';
}
?>






<form action="" method="post" enctype="multipart/form-data" id="import-form">

    <div class="form-group1">
        <div class="row">
            <div class="col-6">
            <!-- <input type="file" name="excel-file" class="import" name="import_file" id="">
            <input type="submit" class="btn btn-success" value="Import" name="import-excel"> -->





    <label for="file-input" class="btn btn-success">
    <span class="import-icon"></span>Import
</label>
<input type="file" name="excel-file" class="import" id="file-input" style="display: none;">
<input type="submit" class="btn btn-primary" id="upload-button" value="Upload" name="import-excel" style="display: none;">





            </div>
        <div class="col-3">
        <button type="button" class="button export-button" id="export-button">
    <i class="fa fa-upload"></i> Export
</button>
        </div>
        <div class="col-3">
        <button class="button add-button"><a href="add_product.php">
    <i class="fa fa-plus"></i> Add Product</a>
    </button>
    <a href="login.php"  class ="signout" role="button"><i class="fa fa-sign-out" style="font-size:24px" aria-hidden="true"></i></a>
        </div>
    </div>
</div>
</form>

    <div class="row">
        <div class="col-lg-3">
     <?php include "nav.php"; ?> 
        </div>
    </div>
    <div class="col">
    <div class="container_1">
    <h5>Products</h5>
    <button type="button" class="button all" id="allProductsButton"><a href="main.php">All Products</a></button>
            <button type="button" class="button inactive" id="inactiveButton"><a href="main_inactive.php">Inactive</a></button>  
<div class="row">
<div class="col-md-3">
    
<div class="box">
    <div class="datatables1">
        <table class="table table-bordered1" id="datatable">
            <thead>
                <tr class="bc">
                <!-- <th>ID</th> -->
<th>Material Code</th>
<th>Models</th>
<th>Ex showroom</th>
<th>LT/RT</th>
<th>Insurance</th>
<th>Accessories</th>
<th>Pro Plus</th>
<th>On Road Price</th>
<th>Status</th>
<th>Edit</th>   
<!-- <th>Delete</th> -->
</tr>
            </thead>
            <tbody>
            <?php
include "connect.php";
// $sve = "SELECT * FROM product WHERE is_deleted = 0";

$sve = "SELECT * FROM product WHERE is_deleted = 0 AND `expire/not` != 'expired'";

$ddd = mysqli_query($conn, $sve);
while ($row = mysqli_fetch_assoc($ddd)) {
    // $id = $row['ID'];
    $materialcode = $row['Material Code'];
    $models = $row['Models'];
    $ex_showroom = $row['Ex showroom'];
    $lt = $row['LT/RT'];
    $insurance = $row['Insurance'];
    $accessories = $row['Accessories'];
    $pro_plus = $row['Pro Plus'];
    $on_road_price = $row['On Road Price'];
    $status = $row['Status'];
    $statusClass = ($status === "active") ? "status-active" : "status-inactive";
    ?>
    <tr data-id="<?php echo $row['ID']; ?>">
        <!-- <td><php echo $id ?></td> -->
        <td><?php echo $materialcode ?></td>
        <td><?php echo $models ?></td>
        <td><?php echo $ex_showroom ?></td>
        <td><?php echo $lt ?></td>
        <td><?php echo $insurance  ?></td>
        <td><?php echo $accessories ?></td>
        <td><?php echo $pro_plus ?></td>
        <td><?php echo $on_road_price ?></td>
        <td>
        <?php if ($status === "active"): ?>
        <div class="status-box status-active">Active</div>
    <?php elseif ($status === "Inactive"): ?>
        <div class="status-box status-inactive">Inactive</div>
    <?php endif; ?>
</td>
        <td> <a href="product_edit.php?id=<?php echo $row["ID"]; ?>"  role="button">
        <i class="fas fa-edit"></i>
    </a></td>
    <!-- <td><a href="product_delete.php?id=<php echo $row["ID"]; ?>" class="mat_delete" role="button" onclick="return confirm('Are you sure you want to delete this record?')">
    <i class="fas fa-trash-alt"></i>
</a></td> -->
    </tr>
<?php } ?>
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
    new DataTable('#datatable', {
        ordering: false // Disable sorting
    });
</script>

<script>
   document.addEventListener("DOMContentLoaded", function () {
    const exportButton = document.getElementById("export-button");
    const datatable = $('#datatable').DataTable(); // Initialize DataTable

    exportButton.addEventListener("click", function () {
        // Send an AJAX request to your export PHP script
        $.ajax({
            url: 'export.php', // Update with the correct path to your PHP script
            type: 'POST',
            data: {
                tableHtml: $('#datatable').html() // Pass the current table HTML
            },
            success: function (data) {
                // Create a Blob from the response data
                const blob = new Blob([data], { type: 'text/csv' });
                const url = window.URL.createObjectURL(blob);

                // Create a temporary link and trigger a click event to download the file
                const a = document.createElement('a');
                a.style.display = 'none';
                a.href = url;
                a.download = 'Product_Datas.csv';
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
            },
            error: function () {
                // Handle errors if any
                alert('Error exporting data');
            }
        });
    });
});
</script>

<script>
$(document).ready(function() {
    // const datatable = $('#datatable').DataTable({
    //     ordering: false, // Disable sorting
    // });

    // Attach a delegated click event to the DataTable container for the status column
    $('#datatable tbody').on('click', '.status-box', function() {
        var row = $(this).closest('tr');
        var id = row.data('id'); // Get the product ID from the data attribute

        // Check if the clicked status is "Inactive"
        if ($(this).hasClass('status-inactive')) {
            // Ask for confirmation before closing the row
            if (confirm('Are you sure you want to close this record?')) {
                // Send the row data and ID to the server via AJAX
                $.ajax({
                    type: 'POST',
                    url: 'update_status.php', // Replace with your PHP script's URL for updating status
                    data: { id: id, status: 'Inactive' }, // Send the row's ID and status to update
                    success: function(response) {
                        // If you want to do something after success, you can add it here.
                        // For example, show a confirmation message.
                        alert('Record closed successfully.');
                        // Hide the row after successful AJAX request
                        row.hide();
                    },
                    error: function() {
                        // Handle AJAX error if needed
                        alert('Error updating status.');
                    }
                });
            }
        }
    });
});
</script>








<script>
 document.addEventListener("DOMContentLoaded", function() {
        const fileInput = document.getElementById("file-input");
        const uploadButton = document.getElementById("upload-button");

        fileInput.addEventListener("change", function() {
            // Show the "Upload" button when a file is selected
            if (fileInput.files.length > 0) {
                uploadButton.style.display = "inline-block";
            } else {
                uploadButton.style.display = "none";
            }
        });
    });
</script>

</html>



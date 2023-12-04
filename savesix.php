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
// Include your database connection
include "connect.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Perform the deletion
    $deleteQuery = "UPDATE  project SET Del_status= 1  WHERE ID = $id";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {
        // Redirect back to the page displaying the table
        header("Location: savesix.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "";
}
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

    <style>
        .search-container {
    margin-left: 10%;
}
        body
        {
            width:100%;   
          
        }
  .row
  {
    width:100%;

  }
.container
{
   
   
    width:82%;
   
}

.salary_details {
    overflow-x: scroll;
    height: 530px;
    border: 0px solid;
 
    width:99%;
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
font-size: 14px;
font-family: Inter;
font-weight: 900;
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
    color: #FFF;
font-family: Inter;
font-size: 14px;
font-style: normal;
font-weight: 700;
line-height: normal;
background: linear-gradient(166deg, #141AA6 0%, #47BEBC 100%);
letter-spacing: 0.42px;
}
th, td {
  padding: 8px;
  text-align: left;
  white-space: nowrap;
  border: 1px solid #ddd; 
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
a.bbtn {
    color: white;
    text-decoration: none;
}

a.btnn_download:hover {
    color: white;
}
.table-bordered tr:hover td {
    background-color: #FFF;
    color: black;
}



.btn_logout_back {
   padding:20px;
   margin-left: 789px; 
}


.button{
    width: 106px;
height: 34px;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color:blue;
border:none;
border-radius:5px;
color:white;
}
a{
    text-decoration:none;
}


    </style>


</head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<body>
<div class="search-container">
    <input type="text" id="searchInput" placeholder="Customer Name">

    <input type="month" id="monthFilter" >
    <input type="date" id="dateFilter">
    <button type="button" id="filterButton" class="button">Filter</button>
    <button type="button" id="resetButton" class="button">Refresh</button>
</div>



    <div class="container">
                <div class="row">
                        <div class="btn_logout_back"> <button type="button" class="button"><a href="formsix.php" style="color: white;">BACK</a></button>
                        <button type="button" class="button"><a href="logout.php" style="color: white;">LOGOUT</a></button></div>
                </div>

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
<th colspan="2">EDIT / DELETE</th>   
</tr>
            </thead>
                <tbody>
                    <?php
                    include "connect.php";
                    $sve = "SELECT * FROM project WHERE Del_status = 0";
                    $ddd = mysqli_query($conn, $sve);
                    while ($row = mysqli_fetch_assoc($ddd)) {
                        $id = $row['ID'];
                        $invoicedate = $row['INVOICEDATE'];
                        $chassisno= $row['CHASSISNO'];
                        $vehiclemode = $row['VEHICLEMODEL'];
                        $customername = $row['CUSTOMERNAME'];
                        $mode = $row['PAYMENTTYPE'];
                        $branchesdealers = $row['BRANCHESDEALERS'];
                     
                        ?>   
                        <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $invoicedate ?></td>
                            <td><?php echo $chassisno ?></td>
                            <td><?php echo $vehiclemode ?></td>
                            <td><?php echo $customername ?></td>
                            <td><?php echo $mode ?></td>
                            <td><?php echo $branchesdealers  ?></td>
                            <td> 
    <a href="editsix.php?id=<?php echo $row["ID"]; ?>" class="btn btn-primary btn-sm" role="button">
        <i class="fas fa-edit"></i>
    </a>
    
    </a>
    <a href="savesix.php?id=<?php echo $row["ID"]; ?>" class="btn btn-primary btn-sm delete-btn" role="button" onclick="return confirm('Are you sure you want to delete this record?')">
    <i class="fas fa-trash-alt"></i>
</a>
</td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            </div>
   
</body>
<script>
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this record?")) {      
        window.location.href = "delete.php?id=" + id; 
    }
}
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const filterButton = document.getElementById("filterButton");
    const resetButton = document.getElementById("resetButton");
    const searchInput = document.getElementById("searchInput");
    const monthFilter = document.getElementById("monthFilter");
    const dateFilter = document.getElementById("dateFilter");
    const tableRows = document.querySelectorAll(".table tbody tr");

    filterButton.addEventListener("click", function () {
        const searchText = searchInput.value.toLowerCase();
        const selectedMonth = monthFilter.value; // Get selected month value (YYYY-MM format)
        const selectedDate = dateFilter.value; // Get selected date value (YYYY-MM-DD format)

        tableRows.forEach(row => {
            const customerNameCell = row.querySelector("td:nth-child(5)");
            const invoiceDateCell = row.querySelector("td:nth-child(2)");
            if (customerNameCell && invoiceDateCell) {
                const customerName = customerNameCell.textContent.toLowerCase();
                const invoiceDate = invoiceDateCell.textContent.substring(0, 7); // Extract YYYY-MM from full date
                const matchesName = customerName.includes(searchText);
                const matchesMonth = selectedMonth === "" || invoiceDate === selectedMonth;
                const matchesDate = selectedDate === "" || invoiceDateCell.textContent === selectedDate;

                row.style.display = matchesName && matchesMonth && matchesDate ? "table-row" : "none";
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


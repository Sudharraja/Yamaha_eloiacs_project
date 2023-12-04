<?php
include "nav2.php";
?>
<?php
// Include your database connection
include "connect.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Perform the deletion
    $deleteQuery = "DELETE FROM customer_master WHERE ID = $id";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {
        // Redirect back to the page displaying the table
        header("Location: cmsave.php");
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
    margin-top: -57px;
}
.search-container .search {
    margin-left: 1%;
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
    margin-left: 135px;
    margin-top: 23px;
    overflow-x: scroll;
    height: 450px;
    border: 0px solid;
 
    width:80%;
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
background: linear-gradient(166deg, #147ca6 0%, #47BEBC 100%);
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
    margin-left: 49%;
    margin-top: 30px;
    width: 106px;
height: 34px;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color:#00c5bc;
border:none;
border-radius:5px;
color:white;
}
a{
    text-decoration:none;
}
.button1 {
    width: 127px;
    height: 50px;
    flex-shrink: 0;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background-color: #00cbaf;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    margin-top: 24px;
    color: white;
    margin-left: 225px;
}
.nav {
    background-color: #45dfdf;
    height: 15vh;
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
    background-color: #26b9d1;
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
/* .move{
margin-top:-50px;
margin-left: -122px;
} */

i.fas.fa-search {
    margin-left: 13px;
    color: #00aadd;
    /* size: 12px; */
}
i.fas.fa-arrow-left {
    margin-left: 72px;
    margin-top: 20px;
    color:#03d2f3;
}

    </style>


</head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<body>
    <a href="cmform.php"><i class="fas fa-arrow-left" style="font-size: 24px;"></i></a>
    <div class="search-container">
        <label for="fromDate">From:</label>
        <input type="date" id="fromDate">
        <label for="toDate">To:</label>
        <input type="date" id="toDate">
        <button type="button" id="resetButton" class="button filter-button" onclick="resetFilter()">Refresh</button>

        <input type="text" id="filterCustomerName" placeholder="Customer Name..." class="search"><i class="fas fa-search"
            style="font-size: 26px; cursor: pointer;"></i>
    </div>

    <div class="salary_details">
        <table class="table table-bordered">
            <thead>
                <tr class="bc">
                    <th>ID</th>
                    <th>DATE</th>
                    <th>CUSTOMER CODE</th>
                    <th>CUSTOMER NAME</th>
                    <th>ADDRESS-1</th>
                    <th>ADDRESS-2</th>
                    <th>PHONE NUMBER</th>
                    <th>VEHICLE CODE</th>
                    <th>VEHICLE NAME</th>
                    <th>FINANCIER CODE</th>
                    <th>FINANCIER NAME</th>

                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php
                include "connect.php";
                $sve = "SELECT * FROM customer_master";
                $ddd = mysqli_query($conn, $sve);
                while ($row = mysqli_fetch_assoc($ddd)) {
                    $id = $row['ID'];
                    $date = $row['DATE'];
                    $customercode = $row['CUSTOMERCODE'];
                    $customername = $row['CUSTOMERNAME'];
                    $add1 = $row['ADD1'];
                    $add2 = $row['ADD2'];
                    $phone = $row['PHONE'];

                    $vehiclecode = $row['VEHICLECODE'];
                    $vehiclename = $row['VEHICLENAME'];
                    $financiercode = $row['FCODE'];
                    $financiername = $row['FNAME'];
                ?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $date ?></td>
                        <td><?php echo $customercode ?></td>
                        <td><?php echo $customername ?></td>
                        <td><?php echo $add1 ?></td>
                        <td><?php echo $add2 ?></td>
                        <td><?php echo $phone ?></td>

                        <td><?php echo $vehiclecode ?></td>
                        <td><?php echo $vehiclename ?></td>
                        <td><?php echo $financiercode ?></td>
                        <td><?php echo $financiername ?></td>

                        <td><a href="cmedit.php?id=<?php echo $row["ID"]; ?>" class="btn btn-primary btn-sm"
                                role="button">
                                <i class="fas fa-edit"></i>
                            </a></td>

                        <td> <a href="cmsave.php?id=<?php echo $row["ID"]; ?>" class="btn btn-primary btn-sm delete-btn"
                                role="button"
                                onclick="return confirm('Are you sure you want to delete this record?')">
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
                // Compare date values after converting them to Date objects
                const fromDateObj = new Date(fromDate);
                const toDateObj = new Date(toDate);
                const rowDateObj = new Date(rowDate);

                if (rowDateObj >= fromDateObj && rowDateObj <= toDateObj) {
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

    document.getElementById("fromDate").addEventListener("input", filterTable);
    document.getElementById("toDate").addEventListener("input", filterTable);
    document.getElementById("filterCustomerName").addEventListener("input", filterTableByName);
</script>


</html>


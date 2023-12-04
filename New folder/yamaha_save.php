
<?php
session_start(); // Resume the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to index.php
    header("Location: yamaha_index.php");
    exit; // Terminate the script after redirection
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
    <link rel="stylesheet" href="save.css">

    <style>
        .box {
    margin: 2em 1em 1em 3em;
    width: 77%;
    height: 100vh;
    position: fixed;
    margin-left: 20%;
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
    background-color: #1c0d8f;
}

thead
{
width: 100%;
height: 45px;
flex-shrink: 0;
background: linear-gradient(166deg, #1c0d8f 0%, #1c0d8f 100%);

}
.table-bordered thead th
{
    color: #FFF;
font-size: 14px;
font-family: Inter;
font-weight: 900;
letter-spacing: 0.3px;

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
  top: 0;
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

.btn.btn-primary.down {
    border-radius: 5px;
    border: none;
    background: linear-gradient(180deg, #1c0d8f 0%, #1c0d8f 100%);
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    width: 120px;
    height: 42px;
    flex-shrink: 0;
    color: #FFF;
    font-size: 16px;
    font-family: sans-serif;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    letter-spacing: 0.4px;
}

.btn.btn-primary.btn-sm {
    width: 92px;
    height: 22px;
    border: none;
    flex-shrink: 0;
    border-radius: 2px;
    background: #1c0d8f;
    color: #FFF;
    font-size: 15px;
    font-family: sans-serif;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: 0.3px;
    padding-bottom: 20px;
    
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

.col-md-9 {
    width: 83% !important;
    margin-left: 19%;
}

.col-md-3 {
    width: 25%;
}

a.btnn_download:hover {
    color: white;
}

.table-bordered tr:hover td {
    background-color: #FFF;
    color: black;
}




.container1 {
    width: 98%;
}


.col-md-9 .table_over_scr_ol {
  
    
    height: 500px;
    margin-left: 30px;
    border: 0px solid;
}

.row{
    display: flex;
}
    </style>
</head>

<body>
    <div class="row">
<div class="col-md-3">
            <?php
            include "yamaha_nav.php";
            
            ?>
    <div class="box">

     <div class="col-md-9"></div>
        <div class="salary_details">
            <table class="table table-bordered">
                <thead>
                    <tr class="bc">
                        <th>CODE</th>
                        <th>NAME</th>
                        <th>DEPARTMENT</th>
                        <th>WORK NATURE</th>
                        <th>JOINING DATE</th>
                        <th>COMPANY</th>
                        <th>BASIC</th>
                        <th>BANKNAME</th>
                        <th>ACCOUNT NO</th>
                        <th>IFSCCODE</th>
                        <th>SALARY ACCOUNT</th>
                        <th>ESI_EPF</th>
                        <th>ESI NO</th>
                        <th>EPF NO</th>
                        <th>STATUS</th>
                        <th>EXIT DATE</th>
                        <th>MOBILE</th>

                        <th colspan="2">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "yamaha_conn.php";
                    $sve = "SELECT * FROM yamaha_employee_data";
                    $ddd = mysqli_query($conn, $sve);
                    while ($row = mysqli_fetch_assoc($ddd)) {
                        $id = $row['ID'];
                        $name = $row['NAME'];
                        $dept = $row['DEPARTMENT'];
                        $worknature = $row['WORKNATURE'];
                        $datejoining = $row['JOININGDATE'];
                        $company = $row['COMPANY'];
                        $basic = $row['BASIC'];
                        $bankname = $row['BANKNAME'];
                        $acntno = $row['ACCOUNTNO'];
                        $ifsc = $row['IFSCCODE'];
                        $salaryacnt = $row['SALARYACCOUNT'];
                        $Esi_epf = $row['ESI_EPF'];
                        $Esino = $row['ESINO'];
                        $Epfno = $row['EPFNO'];
                        $Status = $row['STATUS'];
                        $Exit = $row['EXITDATE'];
                        $mobile=$row['MOBILE'];
                    ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $dept ?></td>
                            <td><?php echo $worknature ?></td>
                            <td><?php echo $datejoining ?></td>
                            <td><?php echo $company ?></td>
                            <td><?php echo $basic ?></td>
                            <td><?php echo $bankname ?></td>
                            <td><?php echo $acntno ?></td>
                            <td><?php echo $ifsc ?></td>
                            <td><?php echo $salaryacnt ?></td>
                            <td><?php echo $Esi_epf ?></td>
                            <td><?php echo $Esino ?></td>
                            <td><?php echo $Epfno ?></td>
                            <td><?php echo $Status ?></td>
                            <td><?php echo $Exit ?></td>
                            <td><?php echo $mobile?></td>
                            <td><a href="yamaha_update.php?id=<?php echo $row["ID"]; ?>" class="btn btn-primary btn-sm" role="button">Edit</a></td>

                            <td><a href="yamaha_delete.php?id=<?php echo $row["ID"]; ?>" i class="fa fa-trash" aria-hidden="true" onclick='return checkdelete()'></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div><br>
        <div>
            <label class="filt" for="filter">Filter by Status:</label>
            <select id="filter" onchange="filterTable()">
                <option value="all">All</option>
                <option value="working">Working</option>
                <option value="exit">Exit</option>
            </select>
            <button class="btn  btn-primary down" onclick="downloadFilteredData()">Download</button>
        </div>
    </div>

<script>
        function checkdelete(){
            return confirm ('Are you sure you want to delete this record ?')
        }
    </script>
    <script>
        function filterTable() {
            const filter = document.getElementById("filter").value.toLowerCase();
            const rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                const statusCell = row.querySelector("td:nth-child(15)");
                const status = statusCell.textContent.toLowerCase();
                if (filter === "all" || status === filter) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        function downloadFilteredData() {
            const filteredRows = Array.from(document.querySelectorAll("tbody tr"))
                .filter(row => row.style.display !== "none");
            const headers = Array.from(document.querySelectorAll("thead th"))
                .map(header => header.textContent);
            const data = [headers].concat(filteredRows.map(row => Array.from(row.querySelectorAll("td"))
                .map(cell => cell.textContent)));

            const csvContent = "data:text/csv;charset=utf-8," + data.map(row => row.join(",")).join("\n");
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "filtered_data.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>


</body>
</html>
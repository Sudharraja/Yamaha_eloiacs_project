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
    width: 529%;
    height: 100vh;
    margin-left: -89px;
    margin-top: -74%;
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
}

.btn_logout_back {
    padding: 23px;
    margin-left: 80%;
    /* margin-top: -43px;  */
}
.search-container {
    MARGIN-TOP: 14px;
    margin-left: 144px;
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
                        <div class="btn_logout_back"> <button type="button" class="button"><a href="vmform.php" style="color: white;">BACK</a></button>
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
<th>MODEL CODE</th>
<th>MODEL NAME</th>
<th>EX.SHOWROOM</th>
<th>LT/RT</th>
<th>INSURANCE</th>
<th>ACCESSORIES</th>
<th>PROTECTION PLUS</th>
<th>OTHERS</th>
<th>ON ROAD PRICE</th>



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
    $modelcode = $row['MODELCODE'];
    $modelname = $row['MODELNAME'];
    $showroom = $row['SHOWROOM'];
    $it = $row['IT'];
    $insurance = $row['INSURANCE'];
    $accessories = $row['ACCESSORIES'];
    $protection = $row['PROTECTION'];
    $others = $row['OTHERS'];
    $orp = $row['ORP'];

    // Check if any of the values are empty, and skip the row if they are
    if (
        empty($modelcode) &&
        empty($modelname) &&
        empty($showroom) &&
        empty($it) &&
        empty($insurance) &&
        empty($accessories) &&
        empty($protection) &&
        empty($others) &&
        empty($orp)
    ) {
        continue; // Skip this row
    }
    ?>

    <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $modelcode ?></td>
        <td><?php echo $modelname ?></td>
        <td><?php echo $showroom ?></td>
        <td><?php echo $it ?></td>
        <td><?php echo $insurance ?></td>
        <td><?php echo $accessories  ?></td>
        <td><?php echo $protection ?></td>
        <td><?php echo $others ?></td>
        <td><?php echo $orp ?></td>
        <td><a href="vmedit.php?id=<?php echo $row["ID"]; ?>" class="btn" role="button">EDIT</a></td>
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
                    const isEmptyRow = Array.from(row.querySelectorAll("td")).every(td => td.textContent.trim() === "");
                    
                    if (isEmptyRow) {
                        row.style.display = "none"; // Hide empty rows
                    } else {
                        row.style.display = customerName.includes(searchText) ? "table-row" : "none";
                    }
                }
            });
        });

        document.getElementById("resetButton").addEventListener("click", function () {
            // Reset the form
            document.getElementById("myForm").reset();

           
            tableRows.forEach(row => {
                row.style.display = "table-row";
            });
        });
    });
</script>

</html>
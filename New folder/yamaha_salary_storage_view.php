<?php
session_start(); // Resume the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to index.php
    header("Location: yamaha_index.php");
    exit; // Terminate the script after redirection
}
?>

<?php
include('yamaha_conn.php');

$month = isset($_POST['month']) ? $_POST['month'] : '';
$year = isset($_POST['year']) ? $_POST['year'] : '';

if (isset($_POST['filter'])) {
    // Validate the month and year inputs
    if (!empty($month) && !empty($year)) {
        // Construct the filter query
        $formattedDate = date('Y-m', strtotime($year . '-' . $month));
        $query = "SELECT * FROM `yamaha_salary_data` WHERE DATE_FORMAT(STR_TO_DATE(sSALARY_DATE, '%d-%m-%Y'), '%Y-%m') = '$formattedDate'";
    } else {
        // Fetch all data if no month or year is selected
        $query = "SELECT * FROM `yamaha_salary_data`";
    }
} else {
    // Fetch all data if filter is not applied
    $query = "SELECT * FROM `yamaha_salary_data`";
}

$result = $conn->query($query);
$dataAvailable = ($result && $result->num_rows > 0);
?>

<!DOCTYPE html>
<html lang="en">

<head>


    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Krub:wght@500;700&display=swap"
    />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cac3eb7948.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Salary Details</title>
    


    <style>
 
.col-9 .emp_pay_search .col-auto_year
{
    width: 46%;
    height: 100%;
    border: 0px solid;
    background-color: #fff;
    padding: 2px 0px;
    text-align: center;
}
.col-9 .emp_pay_search .col-auto_month {
    width: 75%;
    height: 42px;
    border: 0px solid;
    background-color: #fff;
    padding: 0px 6px;

}

.col-9 .container1 .emp_table_head
{
    width: 95%;
    height: 83px;
    padding: 0px;
    flex-shrink: 0;
    border-radius: 5px;
    border: 0px solid #362995;
    margin: 18px 3px 5px 43px;
    display: flex;
    justify-content: space-between;
    
}
.col-9 .container1 .emp_pay_search {
    width: 28.5%;
    height: 45px;
    padding: 0px;
    flex-shrink: 0;
    border-radius: 5px;
    border: 1px solid #362995;
    margin: 18px 15px;
    display: flex;
}

.col-9 .btn_search_emp
{
border: 0px solid;
background-color: #ffffff00;
padding: 5px;
font-size: 20px;
text-align: right;


}
.btn_search_emp i
{
    width: 20px;
    height: 20px;
    flex-shrink: 0;
    color: #362995;
    margin: 6px 2px;
}
.col-9 .col-auto_download
{
    width: 134px;
    height: 42px;
    flex-shrink: 0;
    margin-top: 25px;
}
.col-9 select.month_select {
    border: 0px solid;
    width: 99%;
    padding: 8px 1px;

}
.col-9 input.form-control {
    width: 100%;
    font-size: 15px;
    text-align: center;
    margin: 1px -11px;
    border: none;
}

.col-9 .btn_search_emp_downld
{
    border-radius: 5px;
    background: #362995;
    color: #FFF;
    font-size: 17px;
    padding: 5px;
    margin-top: -9px;
    font-family: Quicksand;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: 0.4px;
}
/* button*/
.col-9 .btn_edit_salary_view
{
    border-radius: 5px;
    background: #362995;
    color: #FFF;
    margin: 4px 25px;
    padding: 3px;
    text-align: center;
    text-decoration: none;
    font-size: 12px;
    font-family: Quicksand;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: 0.3px;
}
/* table */




.col-9 .view_scroll {
    overflow-x: scroll;
    
    height: 500px;
    margin-left: 30px;
    border: 0px solid;
}

.view_scroll::-webkit-scrollbar {
    height: 10px;
    width: 4px;
    background-color: transparent;
    border: 0px solid #787676;
}

.view_scroll::-webkit-scrollbar-track {
    background-color: transparent;
}

.view_scroll::-webkit-scrollbar-thumb {
    background-color: transparent;
    border-radius: 2px;
}

.view_scroll::-webkit-scrollbar-thumb:horizontal {
    background-color: #362995;
}




.row.mt-3.table_over_scr_ol {
    width: 97%;
}



table.table.table-bordered
 {
margin: 1px -13px;
width: 100%;
 }

 table.table.table-bordered thead

{
    width: 100%;
    height: 66px;
    flex-shrink: 0;
    background: linear-gradient(166deg, #362995 0%, #362995 100%);
    color: white;
    text-align: center;
    margin: 10px; 
    
   
}
table.table.table-bordered thead th{
    padding: 7px 31px;
    position: sticky;
}

tbody tr
{
   
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
    border-bottom: 0.5px solid #000;
    background: #D9D9D9;
}

.col-9 {
    width: 83% !important;
 
    margin-left: 242px;
}
.col-md-3
{
    width: 17% !important;

}
a.btnn_download:hover {
    color: white;
}
.row
{
    width:100%;
}

tbody {
  height: 300px; /* Adjust the height as needed */
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
select.form-select {
    border: none;
}
select:focus {
  outline: 0px solid white; /* Change the color and style as needed */
  /* or */
  box-shadow: 0 0 5px white; /* Change the color and size as needed */
}
.btn_search_emp_downld{
    text-decoration:none;
}
body {
    width: 99.9%;
}

    </style>
</head>

<body>
<div class="row">
        <div class="col-md-3">
<?php
include 'yamaha_nav.php';
?>
</div>
<div class="col-9">
    <div class="container1">
        <div class="row ">
            <div class="col">
                <form method="POST" class="row g-3 align-items-center">
                <div class = "emp_table_head">
                <div class="emp_pay_search">
                    <div class="col-auto_month">
                       
                        <select class="form-select" name="month">
                            <option value="">Select Month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-auto_year">
                      
                      <input class="form-control sel" type="text" name="year" value="<?php echo $year; ?>"
                          placeholder="Year">
                  </div>
                  <div class="col-auto">
                      <button type="submit" name="filter" class="btn_search_emp"><i class="fas fa-search"></i></button>
                  </div>

                 
</div>
                    <div class="col-auto_download">
                        <a href="yamaha_download.php<?php echo isset($_POST['filter']) ? '?month=' . $month . '&year=' . $year : ''; ?>"
                            class="btn_search_emp_downld">Download</a>
                    </div>
                </form>
            </div>
        </div>

        <?php if (!$dataAvailable) : ?>
            <div class="row ">
                <div class="col">
                    <div class="alert alert-info">No data available.</div>
                </div>
            </div>
        <?php else : ?>
            <div class="row  table_over_scr_ol">
            <div class="view_scroll">
                <div class="col ">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="heading">
                                <th>Employee Code</th>
                                <th>Employee Name</th>
                                <th>Basic</th>
                                <th>Salary Date</th>
                                <th>Working Days</th>
                                <th>Convenience</th>
                                <th>Advance</th>
                                <th>Over Time</th>
                                <th>Salary</th>
                                <th>EPF 12%</th>
                                <th>EPF 18%</th>
                                <th>ESI 0.75%</th>
                                <th>ESI 3.25%</th>
                                <th>BASIC ALLOWANCE</th>
                                <th>RENTAL ALLOWANCE</th>
                                <th>MEDICAL ALLOWANCE</th>
                                <th>MOBILE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = $result->fetch_assoc()) : {
    $edit = '<a href="yamaha_view_edit.php?id=' . $row["ID"] . '" class="btn_edit_salary_view" role="button">Update</a>';
} ?>
<tr>
    <td><?php echo $row['sCODE']; ?></td>
    <td><?php echo $row['sNAME']; ?></td>
    <td><?php echo $row['sBASIC']; ?></td>
    <td><?php echo $row['sSALARY_DATE']; ?></td>
    <td><?php echo $row['sEMP_WORKING_DAYS']; ?></td>
    <td><?php echo $row['sCONVIENCE']; ?></td>
    <td><?php echo $row['sADVANCE']; ?></td>
    <td><?php echo $row['sOVER_TIME']; ?></td>
    <td><?php echo $row['sSALARY']; ?></td>
    <td><?php echo $row['sEPF12']; ?></td>
    <td><?php echo $row['sEPF18']; ?></td>
    <td><?php echo $row['sESI075']; ?></td>
    <td><?php echo $row['sESI325']; ?></td>
    <td><?php echo $row['sBASICALLOW']; ?></td>
    <td><?php echo $row['sRENTALALLOW']; ?></td>
    <td><?php echo $row['sMEDICALALLOW']; ?></td>
    <td><?php echo $row['sMOBILE']; ?></td>
    <td><?php echo $edit; ?></td> <!-- Added the variable echo here -->
</tr>

<?php endwhile; ?>
</tbody>
                        </div>
                        </div>
                    </table>
</div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
</div>
</body>

</html>
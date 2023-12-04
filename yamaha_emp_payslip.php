<?php
session_start(); // Resume the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to index.php
    header("Location: index.php");
    exit; // Terminate the script after redirection
}
if ($_SESSION['status'] !== 'Admin1') {
    // Display a message and redirect after 5 seconds
    echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh; text-align: center;">';
    echo '<p style="font-size: 18px;">You need permission to access this page. You will be redirected in 5 seconds.</p>';
    echo '</div>';
    echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 5000);</script>';
    exit; // Terminate the script
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
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/cac3eb7948.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Employee Payslip Details</title>

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
<style>
    
thead
{
width: 100%;
height: 66px;
flex-shrink: 0;
background: linear-gradient(166deg, #1c0d8f 0%, #1c0d8f 100%);

}
.table-bordered thead th
{
    color: #FFF;
font-size: 15px;
font-family: Inter;
font-weight: 900;
letter-spacing: 0.3px;

}

table.table-bordered
{
    
    width: max-content;
    margin-left: -12px;
}
.table-bordered tr td
{

flex-shrink: 0;
    border-bottom: 0.5px solid #000;
background: #D9D9D9;

}
.table-bordered tr:hover td
{
    background-color: #FFF;
    color: black;
}

td .btnn_download
{
    width: 120px;
height: 30px;
flex-shrink: 0;
border-radius: 2px;
background: #1c0d8f;
text-decoration: none;
color: #FFF;
font-size: 16px;
padding: 3px 7px 3px 7px;
font-family: Quicksand;
font-weight: 700;
letter-spacing: 0.3px;
text-decoration: none;

}
td .btnn_download :hover
{
    color: white;
    background: #362995;
}

.btn_search_emp
{
    border: 0px solid;
    background-color: #ffffff00;
    padding: 6px;
    font-size: 20px;
    text-align: right;
    margin-left: -40px;
    margin-top: 5px;
}
.btn_search_emp i
{
    width: 20px;
    height: 20px;
    flex-shrink: 0;
    color: #362995;
}
input.form-control {
    border:none;
    width: 61px;
    margin-right: 40px;
}

/*    top 1 */
.col-md-9 .emp_pay_search
{
    width: 21.5%;
    height: 45px;
    padding: 0px;
    border-radius: 5px;
    border: 1px solid #362995;
    margin: 10px;
    display: flex;
    
}
.col-md-9 .col-auto_year
{
    padding: 1px;
    height: 42px;
    background-color: #fff;
    text-align: center;
    margin-left: -11px;
    text-decoration: none;
    border: none;
}


.col-md-9 .emp_pay_search .col-auto_month {
    width: 91%;
    height: 42px;
    border: 0px solid;
    background-color: #ffffff00;
    padding: 0px 6px;
}
.table_over_scr_ol
{
    width: 98%;
    overflow-x: scroll;
    height:520px;
    margin-left: 15px;
    

}
.container1 {
    width: 98%;
}

.table_over_scr_ol::-webkit-scrollbar 
{
    width: 3px;
    background-color: #362995;
    margin-left: 15px;
}

.col-md-9 .table_over_scr_ol {
    overflow-x: scroll;
    
    height: 500px;
    margin-left: 10px;
    border: 0px solid;
    width: 99%;
}

.table_over_scr_ol::-webkit-scrollbar {
    height: 10px;
    width: 4px;
    background-color: transparent;
    border: 0px solid #787676;
}

.table_over_scr_ol::-webkit-scrollbar-track {
    background-color: transparent;
}

.table_over_scr_ol::-webkit-scrollbar-thumb {
    background-color: transparent;
    border-radius: 2px;
}

.table_over_scr_ol::-webkit-scrollbar-thumb:horizontal {
    background-color:#362995;
}
  
/** width max ***/

.col-md-9 {
    width: 83% !important;
    margin-left: 19%;
    height: 100vh;
}
.col-md-3
{
    width: 17%;

}
a.btnn_download:hover {
    color: white;
}

a.bbtn:hover {
    color: white;
}

a.btn_search_emp_downld:hover {
    color: white;
}
a.btn_search_emp_downld {
    float: right;
    margin: 10px 39px;
    border: 1px solid #362995;
    background-color: #362995;
    color: #fff;
    font-size: 15px;
    padding: 5px;
    border-radius: 5px;
    font-weight: 700;
    text-decoration:none;
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
.col-9 .btn_search_emp_downld_f
{
    border-radius: 5px;
    background: #362995;
    color: #FFF;
    font-size: 17px;
    padding: 6px;
    margin-right: 15px;
    font-family: Quicksand;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: 0.4px;
}
.bbtn{
    text-decoration:none;
}
.bbtn{
    float: right;
    margin: 10px 39px;
    border: 1px solid #362995;
    background-color: #362995;
    color: #fff;
    font-size: 15px;
    padding: 5px;
    border-radius: 5px;
    font-weight: 700;

}

.row
{
    width:100%;
}
</style>
</head>

<body>  


<body>


    <div class="container1">
        <div class="row">
            <div class="col-md-3">
                <?php
include ('yamaha_nav.php')
                ?>
            </div>
        </div>
            <div class="row">
                <div class="col-md-3"></div>
            <div class="col-md-9">
                <form method="POST" class="row g-3 align-items-center">

                <div class="col-auto_download">
                        <a href="yamaha_download_payslip.php<?php echo isset($_POST['filter']) ? '?month=' . $month . '&year=' . $year : ''; ?>"
                            class="btn_search_emp_downld">ESI/EPF</a>
                             <a href="yamaha_download1.php<?php echo isset($_POST['filter']) ? '?month=' . $month . '&year=' . $year : ''; ?>"
                            class="bbtn">Bank Details</a>
                              <a href="downloadall.php<?php echo isset($_POST['filter']) ? '?month=' . $month . '&year=' . $year : ''; ?>"
                            class="bbtn">Download all</a>
                           
                          
                    </div>
                    
                        <div class="emp_pay_search">
                        <div class="col-auto_month">
                        <select class="col-auto_month" name="month">
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
                        <input class="form-control" type="text" name="year" value="<?php echo $year; ?>"
                            placeholder="Year">
                    </div>
                    <div class="col-auto">
                        <button type="submit" name="filter" class="btn_search_emp"><i class="fas fa-search"></i></button>
                    </div>
                    </div>
                   
                </form>
         
                

        <?php if (!$dataAvailable) : ?>
            <div class="row ">
                <div class="row">
                <div class="col">
                    <div class="alert alert-info">No data available.</div>
                </div>
            </div>
        <?php else : ?>
            <div class="row table_over_scr_ol">
                <div class="col_payslip">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
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
                        <?php while ($row = $result->fetch_assoc()) : 
   
 ?>

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
   
    <td><a href="https://wa.me/<?php echo $row['sMOBILE']; ?>?text=Hello%20from%20Eloiacs"><?php echo $row['sMOBILE']; ?></a></td>
  
    <td>
            <a href="yamaha_pdf_maker.php?ID=<?php echo $row['ID']; ?>&ACTION=DOWNLOAD" class="btnn_download"> Download</a></td>
        </tr>


                                                                                                                                                                                                        
<?php endwhile; ?>

                        </tbody>

                    </table>

                </div>
            </div>
        <?php endif; ?>
    </div>
                        </div>
                        </div>
</body>

</html>
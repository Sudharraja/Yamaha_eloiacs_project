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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Entry</title>
     <script src="https://kit.fontawesome.com/cac3eb7948.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cac3eb7948.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-box {
            position: fixed;
            top: 0;
            left: 240px;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(10px);
            z-index: 9999;
        }

        .container-box-inner {
            
            margin-right:25%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 27%;
        }
        h1
        {
            font-weight:700;
        }
        h4
        {
            text-align:right;
            font-size:15px;
            border:none;
           
           
        }
        button.btn
        {
            background-color:#1c0d8f;
            color:white;
            font-weight:500;
        }
        button.btn:hover
        {
            background-color:#ffffff;
            border:1px solid #1c0d8f;
            color:black;
        }
       a.fas.fa-times {
    text-decoration: none;
     color:#1c0d8f;
}
    </style>
</head>
<body>
<?php
include "yamaha_nav.php";
?>

<div class="container-box">
    <div class="container-box-inner">
        <h4><a href="yamaha_Salary_details_payroll.php"> <i class="fas fa-times"></i></a></h4>
        <h1>YAMAHA</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="workingDays" class="form-label">Total Working Days:</label>
                <input type="number" class="form-control" id="workingDays" name="workingDays" required>
            </div>
            <input type="hidden" id="salary_date" name="salary_date" value="<?php echo date('d-m-Y'); ?>">

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</div>

<?php
// Assuming you have already established a database connection
include "yamaha_conn.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the working days and current date from the form submission
    $workingDays = $_POST["workingDays"];
    $salaryDate = $_POST["salary_date"];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO yamaha_workingdays (WORKING_DAYS, SALARY_DATE) VALUES (?, ?)");
    $stmt->bind_param("ss", $workingDays, $salaryDate);

    if ($stmt->execute()) {
        echo "Working days saved successfully!";
        echo '<script>window.location.href="yamaha_Salary_details_payroll.php";</script>';
        exit;
    } else {
        echo "Error saving working days: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

</body>
</html>
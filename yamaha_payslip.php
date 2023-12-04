<?php
session_start(); // Start the session

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php"); // Replace login.php with your login page URL
    exit;
}

// Check if there's a success message in the session
if (isset($_SESSION['success_message'])) {
    echo '<script>alert("' . $_SESSION['success_message'] . '");</script>';
    unset($_SESSION['success_message']); // Clear the success message after displaying it
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
include "yamaha_conn.php";

function generateEmpID($conn)
{
    $query = "SELECT * FROM yamaha_employee_data ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $lastID = $row['ID'];
    
    if (empty($lastID)) {
        $empID = "EMP001";
    } else {
        $empID = substr($lastID, 3);
        $empID = intval($empID);
        $empID = "EMP" . sprintf('%03d', ($empID % 999) + 1);
    }

    return $empID;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Employee Registration Form</title>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <!-- jQuery library -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Validation plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
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
</head>
<style>
.row{
  width: 100%;
  margin-bottom:9px;
}

.row.status {
    display: none;
}
.container1 {
  
    padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    margin: 6% 5% -27% -7%;
    width: 93%;
    height: 100%;
    border-radius: 5px;
background: rgba(217, 217, 217, 0.40);
}
button.view1 {
    padding: 2px 12px;
    border-radius: 5px;
    color: white;
    border: none;                 
    right: 12%;
    top: 16px;
    position: absolute;
    background-color: #240ec9;
}
button.view1:hover{                       
  color: black;
background-color: white;
border: 1px solid #240ec9;
}



button.view {
    width: 10%;
  padding: 5px 16px;
  border-radius: 5px;
background-color: #240ec9;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  border:none;
    top: 13px;
    right: 18.5%;
    position: absolute;
}
button.view:hover{                       
  color: black;
background-color: white;
border: 1px solid #240ec9;
}
button.view a{
  color: white;
  text-decoration: none;
}


input{
width: 365px;
height: 35px;
flex-shrink: 0;
border-radius: 5px;
background: #FFF;
margin-bottom: 10px;
margin-right: 10px;
}
select{
width: 370px;
height: 36px;
flex-shrink: 0;
border-radius: 5px;
border: 0.5px solid #240ec9;
background: #FFF;
margin-bottom: 10px;
}
.form-check-input{
width: 18px;
height: 16px;
flex-shrink: 0;
border: 1px solid #000;
}
.form-check-label{
color: #000;
font-size: 11px;
font-family: Inter;
font-style: normal;
font-weight: 400;
line-height: normal;
letter-spacing: 0.3px;
margin-top: 4px;
}
.col {
    font-size: 13px;
    margin-bottom: 2px;
}
.view:hover a{
  color: black;
}


button.view2 {
    padding: 6px 12px;
    border-radius: 5px;
    color: white;
    border: none;
    right: 29%;
    top: 12px;
    position: absolute;
    background-color: #240ec9;
}





</style>
<body>
  
<div class="row">
  <div class="col-md-3">
    <?php include "yamaha_nav.php";?>
  </div>

       <button type="text" class="view">
          <a href="yamaha_save.php">Candidate list</a>
        </button>

  <div class="col-md-9">
    <form id="myForm" action="yamaha_inputsave.php" method="post" >
      <div class="button1">
     
        <button type="button" class="view2" id="addEmployeeBtn" onclick="toggleForm()">
  +Add New Employee
</button></div>
      
<div id="form_hide" style="display:none">

      <div class="container1">
        <div class="scroll-container">     
          <div class="row">
            <div class="col-lg-6 rt">
              <div class="col-lg-3 lt"></div>
            </div>
          </div>
          <div class="button1">
  <button type="submit" class="view1" value="Submit">Save</button>
</div>


          <div class="row">
            <div class="col">Emp Code:
              <input type="text" class="form-control emp_code" name="id" value="<?php echo generateEmpID($conn); ?>" readonly required>
            </div>
            <div class="col">Company:
              <input type="text" class="form-control" name="company" value="YAMAHA" readonly required>
            </div>
          </div>

          <div class="row">
            <div class="col">Candidate Name:
              <input type="text" class="form-control" name="emp_name" required>
            </div>
            <div class="col">Branches:
              <select name="department" class="form-control des" required>
                <option value="" disabled selected hidden>Select your Branch</option>
                <option>Kuzhithurai</option>
                <option>Pammam</option>
                <option>Karungal</option>
                <option>Puthukadai</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col">Designation/nature of work:
              <input type="text" class="form-control des" name="designation" required>
            </div>
            <div class="col">Date of Joining:
              <input type="date" name="joining_date" class="form-control date" required  max="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>

          <div class="row">
            <div class="col">Basic Salary:
              <input type="text" class="form-control" name="basic" required pattern="[0-9]*">
            </div>
            <div class="col">Bank Name:
              <input type="text" class="form-control" name="bank_name" required>
            </div>
          </div>

          <div class="row">
            <div class="col">Account Number:
              <input type="text" class="form-control" name="account_number" required pattern="[0-9]*">
            </div>
            <div class="col">IFSC Code:
              <input type="text" class="form-control" name="ifsc_code" required>
            </div>
          </div>

          <div class="row">
            <div class="col">Salary Account:
              <select name="salary_account" class="form-control" required>
                <option value="" disabled selected hidden >Select</option>
                <option>Yes</option>
                <option>No</option>
              </select>
            </div>
            <div class="col">ESI/EPF:
              <select name="esi_epf" id="esi_epf" class="form-control" onchange="toggleFields(this)" required>
                <option value="" disabled selected hidden>Select</option>
                <option>Yes</option>
                <option>No</option>
              </select>
            </div>
          </div>
                   
          <div class="row">
            <div class="col-lg-6" id="esi_num">ESI Number:
              <input type="text" class="form-control" name="esi_number" id="esi_number" required>
            </div>
            <div class="col" id="epf_num">EPF Number:
              <input type="text" class="form-control" name="epf_number" id="epf_number" required>
            </div>
          </div>

          <div class="row">
                    <div class="col">Mobile Number:
                    <input type="text" class="form-control" name="mobile" placeholder="Mobile Number">

                    </div>
                </div>

          
          <div class="row status">
            <div class="col">Status:
              <select name="status" class="form-control" id="employee_status" placeholder="Status" onchange="toggleExitDate(this)" required>
                
                <option value="Working" selected>Working</option>
                <option value="Exit">Exit</option>
              </select>
            </div>
            <div class="col"></div>
          </div>
        </div>
       
      </div>
      </div>
    </form>
  </div>
</div>

<script>
  function toggleForm() {
  var formHideDiv = document.getElementById("form_hide");
  if (formHideDiv.style.display === "none") {
    formHideDiv.style.display = "block";
    
  } else {
    formHideDiv.style.display = "none";
   
  }
}

</script>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Perform form validation and processing here

    // If form validation is successful
    if ($validation_passed) {
        // Perform necessary actions and database operations

        // Echo a success message with a delayed redirect
        $message = "Form submitted successfully!";
        echo "<script>
                alert('$message');
                setTimeout(function() {
                    window.location.href='yamaha_payslip.php';
                }, 3000); // 3 seconds delay
              </script>";
        exit;
        
    } else {
        // Echo an error message
        $message = "Form submission failed. Please check your input and try again.";
        echo "<script>
                alert('$message');
                setTimeout(function() {
                    history.go(-1);
                }, 3000); // 3 seconds delay
              </script>";
        exit;
    }
}
?>




<script>
  document.getElementById("esi_num").style.display="none";
  document.getElementById("epf_num").style.display="none";
  function toggleFields(selectElement) {
    var esi_number = document.getElementById("esi_num");
    var epf_number = document.getElementById("epf_num");

    if (selectElement.value === "Yes") {
      esi_number.style.display = "block";
      epf_number.style.display = "block";
    } 
    else {
      esi_number.style.display = "none";
      epf_number.style.display = "none";
    }
  }
</script>


<script>
  $(document).ready(function() {
    $("#myForm").validate({
      rules: {
        id: {
          required: true,
          minlength: 6,
        },
        emp_name: {
          required: true,
          minlength: 2,
        },
        department: {
          required: true,
        },
        designation: {
          required: true,
        },
        joining_date: {
          required: true,
        },
        company: {
          required: true
        },
        bank_name: {
          required: true,
        },
        account_number: {
          required: true,
          minlength: 10
        },
        ifsc_code: {
          required: true,
          minlength: 11,
          maxlength: 11
        },
        salary_account: {
          required: true
        },
        esi_epf: {
          required: true
        },
        esi_number: {
          required: true
        },
        epf_number: {
          required: true
        },
        status: {
          required: true
        },
      },
      messages: {
        id: {
          required: "Please check",
          minlength: "Name should be at least 6 characters long"
        },
        emp_name: {
          required: "Please enter Employee Name",
          minlength: "Name should be at least 2 characters long"
        },
        department: {
          required: "Please enter department"
        },
        designation: {
          required: "Please enter the designation",
        },
        joining_date: {
          required: "Please enter joining date"
        },
        company: {
          required: "Please enter company name"
        },
        bank_name: {
          required: "Please enter Bank name",
        },
        account_number: {
          required: "Please enter Account Number",
        },
        ifsc_code: {
          required: "Please enter IFSC code",
          minlength: "Please enter 11 characters"
        },
        salary_account: {
          required: "Please confirm Yes/No"
        },
        esi_epf: {
          required: "Please confirm Yes/No"
        },
        esi_number: {
          required: "Please enter ESI Number"
        },
        epf_number: {
          required: "Please enter EPF Number"
        },
        status: {
          required: "Please confirm status"
        }
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>

</body>
</html>
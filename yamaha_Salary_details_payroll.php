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
    <title>payment entry</title>
    <script src="https://kit.fontawesome.com/cac3eb7948.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<!-- jQuery Validation plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<style>

    .container11{
        width:105%;
        height:100%;
    }
    
  
   .input-group .btn {
    background: none;
    border: none;
    color: #362995;
}
.card-header.text-center {
    padding-top: 17px;
    /* float: left; */
    COLOR: white;
    /* width: 666px; */
    height: 70px;
    flex-shrink: 0;
    border-radius: 10px;
    background: #362995;
}
h4 {
    padding-top: 6px;
    padding-left: 7px;
    float: left;
    color: #FFF;
    font-size: 30px;
    font-family: sans-serif;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: 0.6px;
    font-size: 1.3em;
}
.input-group-append {
    position: relative;
    top: 2px;
    left: -57px;
}

.searchid{
    width: 590px;
height: 62px;
flex-shrink: 0;

border-radius: 10px;
border: 0.5px solid #000;
}
.searchid::placeholder {
  color: #000;
  font-size: 13px;
  font-family: sans-serif;
  font-style: normal;
  font-weight: 500;
  line-height: normal;
  letter-spacing: 0.4px;
}
.searchid:focus {
    border:none;
  outline: none;
}
.input-group-append {
    z-index: 100;
}
button.btn.icon {
    padding-top: 16px;
}
button.btn.icon:hover {
    color:orangered;
}

.hidethis{
    display:none;
}
.card-body {
    background-color: #F0F0F0;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
}
.card{
    border:none !important;
}
input.form-control.searchid {
    text-transform: uppercase;
}
button.btn.btn-primary {
  color: #FFF;
  border:1px orangered solid;
  font-size: 20px;
  font-family: sans-serif;
  font-style: normal;
  font-weight: 600;
  line-height: normal;
  letter-spacing: 0.4px;
  border-radius: 5px;
  background: #362995;
  margin-top: 2%;
  margin-left:15px;
}
button.btn.btn-danger {
    margin-left:5px;
    border:1px green solid;
  color: #FFF;
  font-size: 20px;
  font-family: sans-serif;
  font-style: normal;
  font-weight: 600;
  line-height: normal;
  letter-spacing: 0.4px;
  border-radius: 5px;
  background: green;
  margin-top: 2%;
}
input.form-control {
    margin-left: 13px;
    width: 94%;
}
label {
    margin-bottom: 2px;
    margin-left: 15px;
    display: inline-block;
}
.move{
    margin-top:7%;
    margin-left:345px;
    width:76%;
}
.image_mobile img {
    width: 380px;
    right:10px;
    position: absolute;
    top: 5%;
    /* float: right; */
    height: 400px;
}
button.btn.btn-link {
    margin-top:20px;
    text-decoration:none;
    margin-right: 18%;
    float: right;
}
button.btn.btn-link a {
    font-weight:600;
    letter-spacing:1px;
    font-size:20px;
    color: #362995;
}
.link-with-spacing {
    text-decoration: none;
        border-bottom: 1px solid;
        padding-bottom: 5px;
    }


    @media (max-width: 767px) {
        .container11 {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .image_mobile {
            display: none;
        }

        .move {
            margin: 7% 0;
        }

        .input-group .btn {
            color: #362995;
        }

        .card-header.text-center {
            height: auto;
        }

        h4 {
            padding-top: 6px;
            padding-left: 7px;
            float: none;
            font-size: 24px;
        }

        .searchid {
            width: 100%;
            height: 52px;
        }

        .searchid::placeholder {
            font-size: 12px;
        }

        .input-group-append {
            position: relative;
            top: initial;
            left: initial;
            margin-left: 10px;
        }

        button.btn.icon {
            padding-top: 10px;
        }

        button.btn.btn-primary,
        button.btn.btn-danger {
            margin-top: 10px;
            margin-left: 5px;
            width: 48%;
        }

        input.form-control {
            margin-left: 0;
            width: 100%;
        }

        label {
            margin-left: 0;
        }

        button.btn.btn-link {
            margin-top: 10px;
            margin-right: 0;
            float: none;
        }
        .row
    {
        width:100%;
    }
    .col-9 {
    width: 83% !important;
    margin-left: 16%;
}
.col-md-3
{
    width: 17% !important;

}
    }

    /* Desktop Styles */
    @media (min-width: 768px) {
        .image_mobile {
            position: absolute;
            right: 150px;
            top: 25%;
            width: 500px;
            height: 400px;
        }

        button.btn.btn-link {
            margin-right: 18%;
        }
    }
    


/*
.input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu):not(.form-floating) {
    border-top-right-radius: 5PX;
    border-bottom-right-radius: 5PX;
}*/

</style>


<body>


<div class="row">
        <div class="col-md-3">
        <?php
include "yamaha_nav.php";
?>
</div>

<div class="col-md-9">
    <div class="container11">
    <div class="acnt-view">
                            
                            <button type="submit2" class="btn btn-link"><a href="yamaha_salary_storage_view.php" class="link-with-spacing">View salary details</a></button>
                            </div>
    <div class="image_mobile">
    <img src="Attributes/yam.jpg" alt="image">
</div>
    <div class="scrollable-container">
        <div class="row move">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>PAYROLL</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row" >
                            <div class="col-md-8 input-group" >
  <input type="text" name="stud_id" id="search" value="<?php if(isset($_GET['stud_id'])){echo $_GET['stud_id'];} ?>" class="form-control searchid" placeholder=" Employee ID">
  <div class="input-group-append">
    <button type="submit1" class="btn icon"><i class="fas fa-search"></i></button>
  </div>
</div>

<div class="col-md-9" style="position:relative;margin-top:-2px;margin-left:12px">
    <div class="list-group" id="show-list">
       
    </div>

</div>

                               
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php
                                include "yamaha_conn.php";

                                if (isset($_GET['stud_id'])) {
                                    $stud_id = $_GET['stud_id'];
                                
                                    // Retrieve data from employee_data table
                                    $employee_query = "SELECT * FROM yamaha_employee_data WHERE (id LIKE '$stud_id%' OR NAME LIKE '$stud_id%') AND STATUS != 'exit'";
                                    $employee_result = mysqli_query($conn, $employee_query);
                                
                                    if (mysqli_num_rows($employee_result) > 0) {
                                        $employee_exists = false; // Flag to check if employee exists (not exited)
                                        while ($employee_row = mysqli_fetch_assoc($employee_result)) {
                                            $employee_exists = true; // Set flag to true since employee exists
                                            // Retrieve data from workingdays table (last entered details)
                                            $workingdays_query = "SELECT * FROM yamaha_workingdays ORDER BY id DESC LIMIT 1";
                                            $workingdays_result = mysqli_query($conn, $workingdays_query);
                                            $workingdays_row = mysqli_fetch_assoc($workingdays_result);
                                
                                            ?>                       
                                                                                <form action="yamaha_salary_details_payroll_db.php" id="salary_details" method="post">
                                               <TABLE>
                                                <TR>
                                                    <TD>
                                                <div class="form-group mb-3">
                                                    <label for="">Employee Name</label>
                                                    <input type="text" name="Name" readonly value="<?= $employee_row['NAME']; ?>" class="form-control">
                                                </div></TD>
                                              <TD>  <div class="form-group mb-3">
                                                    <label for="">Employee  Code</label>
                                                    <input type="text" name="stu_id" readonly value="<?= $employee_row['ID']; ?>" class="form-control">
                                                </div></TD>
                                        </TR>
                                      


<tr>
<td>
                      <div class="form-group mb-3 ">
                      
    <label for="bas_inc">BASIC</label>
    <input type="text" id="Basic" name="Basic" value="" class="form-control" readonly required >
                                        </div>
                                        </td>
                                        <td>
                                        <div class="form-group mb-3">
<label for="">Increment</label>
    <input type="text" name="increse" id="increse" value="0" class="form-control"  required>
    </div>
                                        </td>
                                        </table>

<div class="form-group mb-3 hidethis">                                  
<label for="">Gross salary</label>
    <input type="text" name="bas_inc" id="bas_inc" value="<?= $employee_row['BASIC']; ?>" class="form-control" readonly required>
</div>       
                                                        
                                                <div class="form-group mb-3 hidethis">
                                                        <label for="">Total Working Days</label>
                                                        <input type="number" name="Total_no_of_days" id="Total_no_of_days" value="<?= $workingdays_row['WORKING_DAYS']; ?>" step="0.01"  required>
                                                    </div>

                                                            
                                                
                                                    <div class="form-group mb-3">
    <label for="">Employee Working days</label>
    <input type="number" name="emp_working" id="emp_working" value="" class="form-control" step="0.01" required>
</div>



                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">Final total Working days</label>
                                                    <input type="number" name="final_emp_working" step="0.01"  id="final_emp_working" value="" class="form-control" required>
                                                    </div>

                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">Total salary</label>
                                                    <input type="text" name="totalsalary" id="totalsalary" value="" class="form-control"  required>
                                                </div>

                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">ESI_Employee</label>
                                                    <input type="text" name="esi75" id="esi75" value="" class="form-control" readonly>
                                                </div>
                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">ESI_Company</label>
                                                    <input type="text" name="esi325" id="esi325" value="" class="form-control" readonly>
                                                </div>
                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">EPF_Employee</label>
                                                    <input type="text" name="EPF12" id="EPF12" value="" class="form-control" readonly>
                                                </div>
                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">EPF_Company_12%</label>
                                                    <input type="text" name="EPF18" id="EPF18" value="" class="form-control" readonly>

                                                </div>

                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">EPF_Basic</label>
                                                    <input type="text" name="EPF_BASIC" id="EPF_BASIC" value="" class="form-control" >
                                                </div>

                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">EPF_Company_8.33%</label>
                                                    <input type="text" name="EPF833" id="EPF833" value="" class="form-control" >

                                                </div>
                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">EPF_Company_3.67%</label>
                                                    <input type="text" name="EPF367" id="EPF367" value="" class="form-control" >

                                                </div>                                                                                             
                                          
                                               
                                               <div class="form-group mb-3">
                                                    <label for="">Conveyance/Others</label>
                                                    <input type="text" name="Convenience" id="Convenience" value="0" class="form-control"  required>
                                                </div>


  
                                                <div class="form-group mb-3 hidethis" >
                                                    <label for="">Conveyance Final</label>
                                                    <input type="text" name="conveyance" id="conveyance" value="" class="form-control"  required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="">Advance</label>
                                                    <input type="text" name="Advance" id="Advance" value="0" class="form-control"  required>
                                                </div>


                                               
                                                <div class="form-group mb-3">
                                                    <label for="">OT</label>
                                                    <input type="text" name="ot" id="ot" value="0" class="form-control"  required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Total salary</label>
                                                    <input type="text" id="final_salary_fixed" value="" name="final_salary_fixed" class="form-control" readonly>
                                                </div>
                                                

                                                <div class="form-group mb-3">
                                                <button type="submit" name="submit" class="btn btn-primary" onclick="showpoPup()">Save</button>
                                                <button type="submit" name="Code" class="btn btn-danger" onclick="resetPage()">Reset</button>
                                        </div>
                                        

                                                <div class="form-group mb-3 payslip">
                                                
                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">BASIC ALLOWANCE</label>

                                                    <input type="text" name="basicallowan" id="basicallowan"readonly value="" class="form-control">
                                                </div>

                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">RENTAL ALLOWANCE</label>
                                                    <input type="text" name="rentalallowan" id="rentalallowan" readonly value="" class="form-control">
                                                </div>

                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">MEDICAL ALLOWANCE</label>
                                                    <input type="text" name="medicalallowan" id="medicalallowan" readonly value="" class="form-control">
                                                </div>
                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">Employee Code</label>
                                                    <input type="text" name="Code" readonly value="<?= $employee_row['ID']; ?>" class="form-control">
                                                </div>
                                                                                                                
                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">Salary account</label>
                                                       <input type="text" name="Salary_Account" readonly value="<?= $employee_row['SALARYACCOUNT']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">Bank Name</label>
                                                    <input type="text" name="Bank_name" readonly value="<?= $employee_row['BANKNAME']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">Account no</label>
                                                    <input type="text" name="Account_no" readonly value="<?= $employee_row['ACCOUNTNO']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">Ifsc code</label>
                                                    <input type="text" name="Ifsc_code" readonly value="<?= $employee_row['IFSCCODE']; ?>" class="form-control">
                                                </div>
                                                
                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">ESI Number</label>
                                                    <input type="text" name="ESI_no" readonly value="<?= $employee_row['ESINO']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3 hidethis">
                                                    <label for="">EPF Number</label>
                                                    <input type="text" name="EPF_no" readonly value="<?= $employee_row['EPFNO']; ?>" class="form-control">
                                                </div>
            

                                                <div class="form-group mb-3 hidethis">
                                                        <label for="">Designation</label>
                                                        <input name="designation" id="designation" value="<?= $employee_row['WORKNATURE']; ?>" required>
                                                    </div>
                                                    <div class="form-group mb-3 hidethis">
                                                        <label for="">department</label>
                                                        <input name="deptmnt" id="deptmnt" value="<?= $employee_row['DEPARTMENT']; ?>" required>
                                                    </div>
                                                    
                                                    <div class="form-group mb-3 hidethis">
                                                        <label for="">lop</label>
                                                        <input name="LOP_DAYS" id="LOP_DAYS" value="" required>
                                                    </div>
                                                    <div class="form-group mb-3 hidethis">
                                                        <label for="">joining date</label>
                                                        <input name="joindate" id="joindate" value="<?= $employee_row['JOININGDATE']; ?>" required>
                                                    </div>
                                            
                                                      
                                                <div class="form-group mb-3 hidethis">
                                                        <label for="">Salary date</label>
                                                        <input name="salary_date" id="salary_date" value="<?= $workingdays_row['SALARY_DATE']; ?>" required>
                                                    </div>
                                                          
                                                <div class="form-group mb-3 hidethis">
                                                        <label for="">Increments</label>
                                                        <input name="increment" id="increment" value="" required>
                                                    </div>
                                                          
                                                <div class="form-group mb-3 hidethis">
                                                        <label for="">Deductions</label>
                                                        <input name="deduction" id="deduction" value="" required>
                                                    </div>

                                             <div class="col hidethis">ESI/EPF:
                                            <select name="esi_epf_value" id="esi_epf" class="form-control" required>
                                                <option value="Yes" <?php if ($employee_row['ESI_EPF'] == 'Yes') echo 'selected'; ?>>Yes</option>
                                                <option value="No" <?php if ($employee_row['ESI_EPF'] == 'No') echo 'selected'; ?>>No</option>
                                            </select>
                                            </div>

                                            <div class="form-group mb-3 hidethis">
                                                    <label for="">Mobile Number</label>
                                                    <input type="text" name="mobile" readonly value="<?= $employee_row['MOBILE']; ?>" class="form-control" readonl>
                                                </div>

                                                    <div class="form-group mb-3 hidethis">
                                                    <label for="">Status</label>
                                                    <input type="text" name="Status" readonly value="<?= $employee_row['STATUS']; ?>" class="form-control">
                                                </div>                                                
                                        </form>                                        

                     <?php
        }

        if (!$employee_exists) {
            echo "<p class='list-group-item border-1'>Employee has exited.</p>";
        }
    } else {
        // No existing employee records found
        $no_records_found = true;

        // Check if there are any exited employee records
        $exited_employee_query = "SELECT * FROM yamaha_employee_data WHERE (id LIKE '$stud_id%' OR NAME LIKE '$stud_id%') AND STATUS = 'exit'";
        $exited_employee_result = mysqli_query($conn, $exited_employee_query);
        if (mysqli_num_rows($exited_employee_result) > 0) {
            echo "<p class='list-group-item border-1'>Employee has exited.</p>";
        } else {
            echo "<p class='list-group-item border-1'>No Records</p>";
        }
    }
} else {
    echo "<p class='list-group-item border-1'>No Records</p>";
}

mysqli_close($conn);
?>

<script>
  function resetPage(){
    location.reload();
  }
</script>



<script>
  $(document).ready(function(){
   $('#getName').on("keyup", function(){
     var getName = $(this).val();
     $.ajax({
       method:'POST',
       url:'yamaha_searchajax.php',
       data:{name:getName},
       success:function(response)
       {
            $("#showdata").html(response);
       } 
     });
   });
  });
</script>





                                    <script>
    $(document).ready(function() {
        $("#salary_details").validate({
            rules: {
                Total_no_of_days: {
                    required: true,
                    minlength: 1,
                },
                ot: {
                    required: true,
                    minlength: 1,
                },
                Salary_date: {
                    required: true,                                                       
                }
            },
            messages: {
                Total_no_of_days: {
                    required: "Please check",
                },
                ot: {
                    required: "Please check",
                },
                Salary_date: {
                    required: "Please check",
                }
            },
            submitHandler: function(form) {
                form.submit();
               
            }
        });

      
    });
</script>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
 </div>
</div>
</div>

<script>    
                                   
document.getElementById('emp_working').addEventListener('input', calculateTotalWorkingDays);
document.getElementById('Basic').addEventListener('input', calculateTotalWorkingDays);
document.getElementById('ot').addEventListener('input', calculateTotalWorkingDays);
document.getElementById('Advance').addEventListener('input', calculateTotalWorkingDays);
document.getElementById('conveyance').addEventListener('input', calculateTotalWorkingDays);
document.getElementById('Convenience').addEventListener('input', calculateTotalWorkingDays);
document.getElementById('basicallowan').addEventListener('input', calculateTotalWorkingDays);
document.getElementById('rentalallowan').addEventListener('input', calculateTotalWorkingDays);
document.getElementById('medicalallowan').addEventListener('input', calculateTotalWorkingDays);
document.getElementById('esi_epf').addEventListener('change', calculateTotalWorkingDays);
document.getElementById('bas_inc').addEventListener('input', calculateTotalWorkingDays);
document.getElementById('increse').addEventListener('input', calculateTotalWorkingDays);

function calculateTotalWorkingDays() {
  let esiEpfOption = document.getElementById('esi_epf').value;
  let esi75Input = document.getElementById('esi75');
  let esi325Input = document.getElementById('esi325');
  let epf12Input = document.getElementById('EPF12');
  let epf18Input = document.getElementById('EPF18');
  let epf_367Input = document.getElementById('EPF367');
  let epf_833Input = document.getElementById('EPF833');
  let epf_basicInput = document.getElementById('EPF_BASIC');

  let basicPay = parseFloat(document.getElementById('bas_inc').value);
  let increment = parseFloat(document.getElementById('increse').value);

  let finalBasicPay = basicPay + increment;
  document.getElementById('Basic').value = finalBasicPay.toFixed(2);

  let company_basic_pay = parseFloat(document.getElementById('Basic').value);

  if (!isNaN(company_basic_pay)) {
    let monthlyWorkingDays = parseFloat(document.getElementById('Total_no_of_days').value);
    let employee_WorkingDays = parseFloat(document.getElementById('emp_working').value);
    let exactDaysInput = document.getElementById('final_emp_working');
    let convenience = parseFloat(document.getElementById('Convenience').value);
    let ot = parseFloat(document.getElementById('ot').value);
    let advance = parseFloat(document.getElementById('Advance').value);
    let totalsalary = parseFloat(document.getElementById('totalsalary').value);
    let basicAllowance = parseFloat(document.getElementById('basicallowan').value);
    let RentalAllowance = parseFloat(document.getElementById('rentalallowan').value);
    let MedicalAllowance = parseFloat(document.getElementById('medicalallowan').value);
    let lopdays = parseFloat(document.getElementById('LOP_DAYS').value);
    
 if (parseFloat(employee_WorkingDays) >= parseFloat(monthlyWorkingDays)-1 ) {
    employee_WorkingDays += 1;
} 
else if (parseFloat(employee_WorkingDays) >= parseFloat(monthlyWorkingDays)-2 ) {
    employee_WorkingDays += 1;
} 
 else {
  employee_WorkingDays = parseFloat(employee_WorkingDays)+1; // Convert the value to float
  exactDaysInput.value = employee_WorkingDays; // Assign the value directly to exactDaysInput
}

employee_WorkingDays = parseFloat(employee_WorkingDays); 


    let perDaySalary = parseFloat(company_basic_pay / monthlyWorkingDays);
    let final_BasicSalary = parseFloat(perDaySalary * employee_WorkingDays);
    document.getElementById('totalsalary').value = final_BasicSalary.toFixed(2);
    exactDaysInput.value = employee_WorkingDays.toFixed(2);

    let epf_basic = 0;
    let epf_employee = 0;
    let epf_company = 0;
    let esi_employee = 0;
    let esi_company = 0;
    let epfcomp833 = 0;
    let epfcomp367 = 0;

    if (company_basic_pay >= 1) {
      epf_basic = parseFloat(final_BasicSalary * 80 / 100);
    } 


if(epf_basic >=15000){
    epf_employee = 1800;
    epf_company = 1800;
    
}
else{
    epf_employee = parseFloat(epf_basic * 0.12);
     epf_company = parseFloat(epf_basic * 0.12);
}


   
    esi_employee = parseFloat(final_BasicSalary * 0.0075);
    esi_company = parseFloat(final_BasicSalary * 0.0325);
    epfcomp833 = parseFloat(epf_basic * 0.0833);
    epfcomp367 = parseFloat(epf_basic * 0.0367);

    if (esiEpfOption === 'Yes') {
      esi75Input.value = esi_employee.toFixed(2);
      esi325Input.value = esi_company.toFixed(2);
      epf12Input.value = epf_employee.toFixed(2);
      epf18Input.value = epf_company.toFixed(2);
      epf_367Input.value = epfcomp367.toFixed(2);
      epf_833Input.value = epfcomp833.toFixed(2);
      epf_basicInput.value = epf_basic.toFixed(2);
    } else {
      esi75Input.value = '0';
      esi325Input.value = '0';
      epf12Input.value = '0';
      epf18Input.value = '0';
      epf_367Input.value = '0';
      epf_833Input.value = '0';
      epf_basicInput.value = '0';
    }

    let additional_allow = parseFloat((company_basic_pay / monthlyWorkingDays) * employee_WorkingDays);
    let basic_allow = parseFloat(additional_allow * 0.45);
    let rental_allow = parseFloat(additional_allow * 0.25);
    let medical_allow = parseFloat(additional_allow * 0.30);
    let convenience_final = parseFloat((convenience / monthlyWorkingDays) * employee_WorkingDays);


    let totalsalary_all_value = 0;
    if (esiEpfOption === 'Yes') {
      totalsalary_all_value = parseFloat((convenience_final + ot + final_BasicSalary) - (advance + epf_employee + esi_employee));
    } else {
      totalsalary_all_value = parseFloat((convenience_final + ot + final_BasicSalary) - advance);
    }
    

    let lopdaysss = parseFloat(monthlyWorkingDays - employee_WorkingDays);
    let increments = parseFloat(basic_allow + medical_allow + rental_allow + ot + convenience_final);
    let deductions = parseFloat(epf_employee + esi_employee + advance);

    document.getElementById('esi75').value = esi75Input.value;
    document.getElementById('esi325').value = esi325Input.value;
    document.getElementById('EPF12').value = epf12Input.value;
    document.getElementById('EPF18').value = epf18Input.value;
    document.getElementById('EPF367').value = epf_367Input.value;
    document.getElementById('EPF833').value = epf_833Input.value;
    document.getElementById('EPF_BASIC').value = epf_basicInput.value;
    document.getElementById('basicallowan').value = basic_allow.toFixed(2);
    document.getElementById('rentalallowan').value = rental_allow.toFixed(2);
    document.getElementById('medicalallowan').value = medical_allow.toFixed(2);
    document.getElementById('final_salary_fixed').value = totalsalary_all_value.toFixed(2);
    document.getElementById('LOP_DAYS').value = lopdaysss.toFixed(2);
    document.getElementById('deduction').value = deductions.toFixed(2);
    document.getElementById('increment').value = increments.toFixed(2);
    document.getElementById('conveyance').value = convenience_final.toFixed(2);
  } else {
    // Invalid salary value
    document.getElementById('result').innerHTML = 'Please provide a valid basic salary.';
  }
}

var inputs = document.querySelectorAll('#Basic, #bas_inc, #increse');
inputs.forEach(function (input) {
  input.addEventListener('input', calculateTotalWorkingDays);
});

calculateTotalWorkingDays();
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function() {
            // Send Search Text to the server
            $("#search").keyup(function() {
                let searchText = $(this).val();
                if (searchText != "") {
                    $.ajax({
                        url: "yamaha_conn.php",
                        method: "post",
                        data: {
                            query: searchText
                        },
                        success: function(response) { 
                            $("#show-list").html(response);
                        }
                    });
                } else {
                    $("#show-list").html("");
                }
            });

            // Set searched text in input field on click of search button
            $(document).on("click", "a", function() {
                $("#search").val($(this).text());
                $("#show-list").html("");
            });
        });
    </script>

     </body>
</html>
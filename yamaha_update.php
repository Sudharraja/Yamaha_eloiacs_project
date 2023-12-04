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

include_once 'yamaha_conn.php';
if(isset($_POST['edit'])){
    $id=$_POST['ID'];
    $name = $_POST['NAME'];                                   
$department = $_POST['DEPARTMENT'];
$workNature = $_POST['WORKNATURE'];
$joiningDate = $_POST['JOININGDATE'];
$company = $_POST['COMPANY'];
$basic = $_POST['BASIC'];             
$bankName = $_POST['BANKNAME'];
$accountNo = $_POST['ACCOUNTNO'];
$ifscCode = $_POST['IFSCCODE'];
$salaryAccount = $_POST['SALARYACCOUNT'];
$esiEpf = $_POST['ESI_EPF'];
$esiNo = $_POST['ESINO'];
$epfNo = $_POST['EPFNO'];
$status = $_POST['STATUS'];
$exitdate=$_POST['EXITDATE'];


$query="UPDATE yamaha_employee_data SET NAME='$name',DEPARTMENT='$department',WORKNATURE='$workNature',JOININGDATE='$joiningDate',COMPANY='$company',BASIC='$basic',BANKNAME='$bankName',ACCOUNTNO='$accountNo',IFSCCODE='$ifscCode',SALARYACCOUNT='$salaryAccount',ESI_EPF='$esiEpf',ESINO='$esiNo',EPFNO='$epfNo',STATUS='$status',EXITDATE='$exitdate' where ID='$id'";

$query_run=mysqli_query($conn,$query);

if($query_run){


  
    
    ?>

    <script>
alert("Successfully Updated");
window.location.href='yamaha_save.php';
    </script>

    <?php

}

else{
    ?>
    <script>
alert("Not Updated");
window.location.href='yamaha_save.php?error';
    </script>

    <?php
}
}

$result=mysqli_query($conn,"SELECT * FROM yamaha_employee_data where id='".$_GET['id']."'");

$row=mysqli_fetch_array($result);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Employee Registration Form</title>
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
 }
.container1{
margin-bottom:40px; 
margin-left: -75px;
margin-right: 300px;
margin-bottom: 10px;
width: 87%;
height: 100%;
padding: 20px;
border-radius: 5px;
background: rgba(217, 217, 217, 0.40);
}
button.btn-success{
border: none; 
margin-top: 25px;
margin-bottom: 20px;
margin-left: 106vh;
color: #FFF;
font-size: 15px;
font-family: Quicksand;
font-style: normal;
font-weight: 700;
line-height: normal;
letter-spacing: 0.4px;
width: 70px;
height: 30px;
flex-shrink: 0;
border-radius: 5px;
background: #1c0d8f;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}
button.btn-success:hover{
color: black;
background-color: white;
border: 1px solid #1c0d8f;
}

.col{
color: #000;
font-size: 14px;
font-family: Inter;
font-style: normal;
font-weight: 400;
line-height: normal;
letter-spacing: 0.36px;
margin-bottom:2px;
padding-left: 15px;
padding-bottom: 2px;
}

input{
width: 370px;
height: 36px;
flex-shrink: 0;
border-radius: 5px;
border: 0.5px solid #1c0d8f;
background: #FFF;
margin-bottom: 10px;
margin-right: 10px;
}
select{
width: 370px;
height: 36px;
flex-shrink: 0;
border-radius: 5px;
border: 0.5px solid #1c0d8f;
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
#hidden-panel{
  display:none;
}
</style>

<div class="row">
  <div class="col-md-3">
    <?php
    include "yamaha_nav.php";?>
  </div>

<div class="col-md-9">



<div class="container">

<form action="" method="post" >
<button class="btn btn-success" type="submit" id="edit" name="edit" >Save</button> 
<div class="container1">

<div class="row">

<div class="col">Employee Code</div>
<div class="col">Company</div>
</div>

<div class="row">
<div class="col"><input type="text"  name="ID" value="<?php echo $row["ID"]; ?>"required></div>

<div class="col"><input type="text" name="COMPANY" value="<?php echo $row["COMPANY"]; ?>" required></div>
</div>


<div class="row">




<div class="col">Candidate Name</div>
<div class="col">Department</div>
</div>
<div class="row">

<div class="col"><input type="text"  name="NAME"  value="<?php echo $row["NAME"]; ?>" required></div>
<div class="col"><select type="text" name="DEPARTMENT" required>
<option value="">Select Your Branch</option>
<option <?php if ($row["DEPARTMENT"] == "Admin") echo "selected"; ?>>Kuzhithurai</option>
<option <?php if ($row["DEPARTMENT"] == "Project Team") echo "selected"; ?>>Pammam</option>
<option <?php if ($row["DEPARTMENT"] == "Developing") echo "selected"; ?>>Karungal</option>
<option <?php if ($row["DEPARTMENT"] == "EPub") echo "selected"; ?>>Puthukadai</option>
</select>
</div>           
</div>
<div class="row">

<div class="col">Designation/nature of work</div>
<div class="col">Date of Joining</div>
</div>

<div class="row">
<div class="col"><input type="text" name="WORKNATURE" value="<?php echo $row["WORKNATURE"]; ?>" required></div>
<div class="col"><input type="date" name="JOININGDATE" value="<?php echo $row["JOININGDATE"]; ?>" required></div>

</div>

<div class="row">

<div class="col">Basic Salary</div>
<div class="col">Bank Name</div>
</div>

<div class="row">
<div class="col"><input type="text" name="BASIC" value="<?php echo $row["BASIC"]; ?>" required></div>
<div class="col"><input type="text" name="BANKNAME" value="<?php echo $row["BANKNAME"]; ?>" required></div>
</div>

<div class="row">

<div class="col">Account Number</div>
<div class="col">IFSC Code</div>
</div>

<div class="row">


<div class="col"><input type="text" name="ACCOUNTNO" value="<?php echo $row["ACCOUNTNO"]; ?>" required></div>
<div class="col"><input type="text" name="IFSCCODE" value="<?php echo $row["IFSCCODE"]; ?>" required></div>
</div>

<div class="row">
    <div class="col">Salary Account</div>
    <div class="col">ESI/EPF</div>
  </div>
  <div class="row">
    <div class="col">
      <select type="text" name="SALARYACCOUNT" required>
        <option value="">Select</option>
        <option <?php if ($row["SALARYACCOUNT"] == "Yes") echo "selected"; ?>>Yes</option>
        <option <?php if ($row["SALARYACCOUNT"] == "No") echo "selected"; ?>>No</option>
      </select>
    </div>
    <div class="col">
      <select type="text" name="ESI_EPF" required onchange="updateESI_EPFFields(this)">
        <option value="">Select</option>
        <option <?php if ($row["ESI_EPF"] == "Yes") echo "selected"; ?>>Yes</option>
        <option <?php if ($row["ESI_EPF"] == "No") echo "selected"; ?>>No</option>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="col">ESI Number</div>
    <div class="col">EPF Number</div>
  </div>
  <div class="row">
    <div class="col">
      <input type="text" name="ESINO" id="esino" value="<?php echo $row["ESINO"]; ?>" >
    </div>
    <div class="col">
      <input type="text" name="EPFNO" id="epfno" value="<?php echo $row["EPFNO"]; ?>" >
    </div>
  </div>
<div class="row">
<div class="col">
Status
<select type="text" name="STATUS" id="exit" onchange="showHide()" required>
<option value="">Select Employee status</option>
<option value="Working" <?php if ($row["STATUS"] == "Working") echo "selected"; ?>>Working</option>
<option value="Exit" <?php if ($row["STATUS"] == "Exit") echo "selected"; ?>>Exit</option>
</select>
</div>
<div class="col">
<div name="hidden-panel" id="hidden-panel">
Exit Date
<input type="date" name="EXITDATE" id="exitdate">
</div>
</div>

<div class="row">

<div class="col">Mobile Number</div>

</div>

<div class="row">
<div class="col"> <input type="text" name="mobile" placeholder="Mobile Number" value="<?php echo $row["MOBILE"]; ?> " required></div>


</div>

</div>
</div>
</form>

</div>
</div>
</div>   
<div>   
</div>                                                                                                                                        
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>


function showHide() {
    let travelhistory = document.getElementById('exit')
    if (travelhistory.value == 'Exit') {
        document.getElementById('hidden-panel').style.display = 'block'
    } else {
        document.getElementById('hidden-panel').style.display = 'none'
    }
}

  $(document).ready(function() {
    $('form').validate({
      rules: {
        ID: {
          required: true,
          rangelength: [1, 8]
        },
        NAME: {
          required: true,
          rangelength: [1, 20]
        },

        // Add the same rules for other input fields that require a character limit
        // DEPARTMENT, WORKNATURE, JOININGDATE, COMPANY, BASIC, BANKNAME, ACCOUNTNO, IFSCCODE, SALARYACCOUNT, ESI_EPF, STATUS


        DEPARTMENT: {
          required: true,
          rangelength: [1, 20]
        },WORKNATURE: {
          required: true,
          rangelength: [1, 20]
        },JOININGDATE: {
          required: true,
          rangelength: [1, 20]
        },COMPANY: {
          required: true
        },BASIC: {
          required: true,
          rangelength: [1, 20]
        },BANKNAME: {
          required: true,
          rangelength: [1, 20]
        },ACCOUNTNO: {
          required: true,
          rangelength: [1, 20]
        },IFSCCODE: {
          required: true,
          rangelength: [1, 20]
        },SALARYACCOUNT: {
          required: true,
          rangelength: [1, 20]
        },ESI_EPF: {
          required: true,
          rangelength: [1, 20]
        },STATUS: {
          required: true,
          rangelength: [1, 20]
        }
       
      },
      messages: {
        ID: {
            required: 'Please Enter this field',
            rangelength: 'the lenth is too long'
        },
        NAME: {
          required: 'Please Enter this field',
          rangelength: 'the lenth is too long'
        },
        // Add the same messages for other input fields
        DEPARTMENT: {
          required: 'Please Enter this field',
          rangelength: 'the lenth is too long'
        },
        WORKNATURE: {
          required: 'Field is empty , Fill This',
          rangelength: 'the lenth is too long'
        },
        JOININGDATE: {
          required: 'Please Enter this field',
          rangelength: 'the lenth is too long'
        },
        COMPANY: {
          required: 'Field is empty , Fill This',
          rangelength: 'the lenth is too long'
        },
        BASIC: {
          required: 'Field is empty , Fill This',
          rangelength: 'the lenth is too long'
        }, 
        BANKNAME: {
          required: 'Field is empty , Fill This',
          rangelength: 'the lenth is too long'
        },
        ACCOUNTNO: {
          required: 'Field is empty , Fill This',
          rangelength: 'the lenth is too long'
        },
        IFSCCODE: {
          required: 'Field is empty , Fill This',
          rangelength: 'the lenth is too long'
        },
        SALARYACCOUNT: {
          required: 'Please Enter this field',
          rangelength: 'the lenth is too long'
        },
       
        EPFNO: {
          required: 'Please Enter this field',
          rangelength: 'the lenth is too long'
        },
        STATUS: {
          required: 'Please Enter this field',
          rangelength: 'the lenth is too long'
        },

      },
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>

<script>
  function updateESI_EPFFields(selectElement) {
    var esiNumberField = document.getElementById("esino");
    var epfNumberField = document.getElementById("epfno");

    if (selectElement.value === "No") {
      esiNumberField.value = "0";
      epfNumberField.value = "0";
      esiNumberField.setAttribute("disabled", "disabled");
      epfNumberField.setAttribute("disabled", "disabled");
    } else {
      esiNumberField.removeAttribute("disabled");
      epfNumberField.removeAttribute("disabled");
    }
  }
</script>



</body>
</html>
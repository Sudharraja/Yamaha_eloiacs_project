<?php

include "connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <LINK HREF="" REL=" "css>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/b272402e67.js" crossorigin="anonymous"></script>

<style>
    body {
      text-align: center;
      background: linear-gradient(226deg, #8ECEBD 25.42%, #7ABCCA 83.54%);
      
    }
    
    .container-box {
  width: 58pc;
  margin-left: 19%;
  height: max-content;
  flex-shrink: 0;
  background: white;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  /* Add transform property to skew the container */
  transform: skew(-4deg);
  transform-origin: left top; /* Set the origin to the top-left corner */
  border-top-left-radius: 4px; /* Top-left corner radius */
  border-top-right-radius: 4px; /* Top-right corner radius */
  margin-top: 20px; /* Adjust margin to fit the content */
  margin-bottom: 10px;
}


.form{
  margin-left:100px;
  margin-top:-9px;
  padding:50px;
}

    .form-group .form-control {
      flex: 2;
      border-radius: 5px;
      border: 0.2px solid #0C00A3;
      background: #FFF;
      box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
      height: 42px;
      
      width:300px;
      margin:5px;
    }
    label{
      
      margin:5px;
    }
     

.col-4{
  width: 45.333333%;
}

    
    h3 {
      margin-left: 107px;
    }
    
    label {
      float: left;
    }
    
    a {
      color: white;
      text-decoration: none;
    }
    
    h4 {
      margin-left: 255px;
    }
    .button1 {
    width: 83px;
    height: 35px;
    flex-shrink: 0;
    background: #45CDC6;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    color: #FFF;
    font-family: Quantico;
    font-size: 17px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: 1.15px;
    border:none;
}
.button1 a{
  color:white;
}
.button2 {
  width: 95px;
    height: 36px;
    border: none;
    flex-shrink: 0;
    background: #45CDC6;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    color: #FFF;
    font-family: Quantico;
    font-size: 20px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: 1px;
    margin-bottom: -18px;
    }

 .import{
  margin-left: 30%;
    margin-top: -40px;
}
button.view {
  width: 100px;
    height: 35px;
    flex-shrink: 0;
    background: #45CDC6;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    color: #FFF;
    font-family: Quicksand;
    font-size: 15px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: 1px;
    border: none;
    margin-left: 31pc;
    margin-top: 24px;
    margin-right: 10px;
  }
  button.view a{
    color:white;
  }
  .sm{
    background: linear-gradient(226deg, #8ECEBD 25.42%, #7ABCCA 83.54%);
    border:none;
    display:none;
}
i.fa.fa-search {
    margin-left: -55px;
}

th{
  color:orange;
}

.bbm {
  margin-right: 534px;
  margin-top: 10px;
}
.popup-table {

    position: absolute;
    z-index: 1000;
    background-color: white;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    padding: 20px;
    max-height: 400px;
    overflow-y: auto;
    margin-left: -3%;
    margin-top: 4%;
}
.blur {
    filter: blur(5px); /* Adjust the blur amount as needed */
    pointer-events: none; /* Prevent interactions with the blurred form */
    transition: filter 0.3s ease;
}
.icon{
    margin-top: -2pc;
    margin-left: 80pc;
    position: fixed;
}
.grid {
    position: fixed;
    margin-left: -69px;
}
.bell {
    position: fixed;
    margin-left: -34px;
}



</style>
</head>
<body>


<div class="total">

<div class="row">
<div class="col">

<form action="" method="post">
  <div class="row">
    <div class="col">
    <div class="bbm">


<input type="text" class="bm" placeholder="Search Chassis No" name="search">
<button class="sm" type="submit" name="submit"><i class="fa fa-search"></i></button>


          <div class="icon">
          <div class="grid"><i class="fa-solid fa-bars"></i></div>
          <div class="bell"><i class="fa-solid fa-bell"></i></div>
          <div class="user"><i class="fa-solid fa-user"></i></div> 
          </div>
</div>
</div>
          </div>
</form>

<div class="container">
<div class="popup-table">
<table class="table">
<thead>
<tr>
<th>Id</th>
<th>Invoice Date</th>
<th>Chassis No</th>
<th>Vehicle Model</th>
<th>Customer Name</th>
<th>Customer Code</th>
<th>Payment Type</th>
<th>Branches/Sub Dlrs</th>
<!-- <th>ACCOUNTS CONFIRMATION</th> -->
</tr>
</thead>
<tbody>
<?php 
if(isset($_POST['submit'])){
$search = $_POST['search'];

// Construct the SQL query with the branch name filter
$sql = "SELECT DISTINCT * FROM `project` WHERE RIGHT(CHASSISNO, 5) = '$search'";
// if (isset($selectedBranch)) {
//     $sql .= " AND BRANCHESDEALERS = '$selectedBranch'";
// }



$result = mysqli_query($conn, $sql);

if($result){
while($row = mysqli_fetch_assoc($result)) {
echo "<tr data-id='" . $row['ID'] . "'>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['INVOICEDATE'] . "</td>";
echo "<td>" . $row['CHASSISNO'] . "</td>";
echo "<td>" . $row['VEHICLEMODEL'] . "</td>";
echo "<td>" . $row['CUSTOMERNAME'] . "</td>";
echo "<td>" . $row['CUSTOMERCODE'] . "</td>";
echo "<td>" . $row['PAYMENTTYPE'] . "</td>";
echo "<td>" . $row['BRANCHESDEALERS'] . "</td>";
// echo "<td>" . $row['ACCOUNTSCONFIRMATION'] . "</td>";
echo "</tr>";
}
} else {
echo "<tr><td colspan='7'>Error: " . mysqli_error($conn) . "</td></tr>";
}
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>





<div class="container-box blur">  
<button type="button" class="view"><a href="rtosave.php">View List</a></button>

<button type="button" class="button1">
            <a href="login.php">Logout</a>
          </button>

  <form action="update.php" method="post" class="form" id="dataForm" enctype="multipart/form-data">
  <input type="hidden" name="selected_id" id="selected_id">



  <div class="row">
        <div class="col-6" style="margin-left: -63px;">
          <div class="form-group">
            <label>Invoice Date:</label>
            <input style="width: 13pc; margin-bottom: 18px;" type="date" name="invoice_date" id="invoice_date" max="<?= date('Y-m-d') ?>" required readonly>
  </DIV></DIV>
  <div class="col-6" style="margin-left: 47px;">
          <div class="form-group">

            <label>Chassis No:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="text" name="chassis_no" id="chaseNo" required readonly>
              </DIV></DIV>  </DIV>





          
          

              <div class="row">
        <div class="col-6"  style="margin-left: -63px;">
          <div class="form-group">
            <label>Vehicle Model:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="text" name="vehicle_model" id="vehicle_model" required readonly>
  </DIV></DIV>
  <div class="col-6" style="margin-left: 30px;">
          <div class="form-group">

            <label>Customer Name:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="text" name="customer_name" id="customer_name" required readonly>
              </DIV></DIV>  </DIV>
              
<div class="row">
  <div class="col-6" style="display:none;">
    <div class="form-group">
    <label>Customer Code:</label>
      <input type="text" name="customer_code" id="customer_code" readonly>
    </div>
  </div>
</div>




              <div class="row">
        <div class="col-6"  style="margin-left: -63px;">
          <div class="form-group">
            <label>Payment Type:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="text" name="payment_type" id="payment_type" required readonly>
  </DIV></DIV>
  <div class="col-6" style="margin-left: 53px;">
          <div class="form-group">

            <label>Branches:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="text" name="branches_dealers" id="branches_dealers" required readonly>

              </DIV></DIV>  </DIV>


              <div class="row" style="margin-left: -116px;">
        <div class="col-6">
          <div class="form-group">
            <label>File Received Date:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="date" name="file_received_date" id="file_received_date" max="<?= date('Y-m-d') ?>" required >
  </DIV></DIV>
  <div class="col-6">
          <div class="form-group">

            <label>Form 20 Date:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="date" name="form20_date" id="form20_date" max="<?= date('Y-m-d') ?>" required >

              </DIV></DIV>  </DIV>



              <div class="row" style="margin-left: -129px;">
        <div class="col-6">
          <div class="form-group">
            <label>Form20 ReceivedDate:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="date" name="Form20_Received" id="Form20_Received" max="<?= date('Y-m-d') ?>" required >
  </DIV></DIV>
  <div class="col-6" style="margin-left: -9px;">
          <div class="form-group">

            <label>Accounts Confirm:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="text" name="accounts_confirmation" id="accounts_confirmation" required>

              </DIV></DIV>  </DIV>




              <div class="row" style="margin-left: -88px;">
        <div class="col-6" style="margin-left: -1px;">
          <div class="form-group">
            <label>Register Date:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="date" name="registration_date" id="registration_date" max="<?= date('Y-m-d') ?>" required >
  </DIV></DIV>
  <div class="col-6" style="margin-left: -13px;">
          <div class="form-group">

            <label>Register Number:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="text" name="registration_number" id="registration_number" required>


              </DIV></DIV></DIV>




              <div class="row" style="margin-left: -68px;">
        <div class="col-6">
          <div class="form-group">
            <label>RC Status:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="text" name="rc" required>
  </DIV></DIV>
  <div class="col-6">
          <div class="form-group">
            <label>RC Rec Date:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="date" name="rcrec" id="rcrec" max="<?= date('Y-m-d') ?>" required >

              </DIV></DIV>  </DIV>
              

              <div class="row" style="margin-left: -63px;">
              <div class="col-6">
          <div class="form-group">
            <label>Remarks:</label>
            <input style="width: 13pc; margin-bottom: 18px;" class="" type="text" name="remarks" >
            </DIV></DIV> </DIV> 
<!-- <img class="cycle" src="cycle.png" alt="" srcset=""> -->

            
  <div class="form-group">
        <input  type="submit" value="SAVE" class="button2" name="update">
    </div>  


<script>
document.addEventListener("DOMContentLoaded", function() {
    const tableRows = document.querySelectorAll("tbody tr");
    const dataForm = document.getElementById("dataForm");
    const inputs = dataForm.querySelectorAll("input[name], select[name]");
    const tableContainer = document.querySelector(".container");
    const formContainer = document.querySelector(".container-box");
    const popupTable = document.querySelector(".popup-table");

    if (tableRows.length === 0) {
        // No data available, hide the table and show a message
        tableContainer.style.display = "none";
        formContainer.style.display = "block"; // Hide the form as well, if applicable

        // Show a message or element indicating no data
        const noDataMessage = document.createElement("p");
        noDataMessage.textContent = "";
        formContainer.insertAdjacentElement("beforebegin", noDataMessage);
        formContainer.classList.remove("blur"); // Remove blur class when no data
    } else {
        formContainer.classList.add("blur"); // Add blur class when there's data
    }

    tableRows.forEach(row => {
        row.addEventListener("click", function() {
            const selectedId = this.getAttribute("data-id");
            const rowData = {
                invoice_date: this.cells[1].textContent,
                chassis_no: this.cells[2].textContent,
                vehicle_model: this.cells[3].textContent,
                customer_name: this.cells[4].textContent,
                customer_code: this.cells[5].textContent,
                payment_type: this.cells[6].textContent,
                branches_dealers: this.cells[7].textContent,
               
                
                
            };
        


            inputs.forEach(input => {
                const fieldName = input.getAttribute("name");
                if (rowData[fieldName] !== undefined) {
                    input.value = rowData[fieldName];
                }
            });

            const selectedInput = document.querySelector(`input[name="selected_id"]`);
            selectedInput.value = selectedId;

            // Hide the table and show the form
            tableContainer.style.display = "none";
            popupTable.style.display = "block";
            formContainer.classList.remove("blur"); // Remove blur class when form is displayed
        });
    });

    // Handle the form submission to keep the form displayed
    dataForm.addEventListener("save", function(event) {
        event.preventDefault();
        // Your form submission logic here

        // Optionally, you can reset the form fields and hide the popup table
        // Reset the form fields
        inputs.forEach(input => {
            input.value = "";
        });
        // Hide the popup table
        popupTable.style.display = "none";
        tableContainer.style.display = "block"; // Show the table again
        formContainer.classList.add("blur"); // Add blur class when form is hidden
    });
        // Set the customer code and other field values
        document.getElementById("customer_code").value = customerCode;
});


</script>
</html>
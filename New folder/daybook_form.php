 
<?php 
include "connect.php";
if(isset($_REQUEST['save'])){
  $date = $_POST["date"];
  $types = $_POST["types"];
  $otherType = $_POST["other_type"];

  // Check if the selected type is "Others"
  if ($types === "Others" && !empty($otherType)) {
      // Sanitize the "Other Type" input
      $otherType = mysqli_real_escape_string($conn, $otherType);
  } else {
      // If the selected type is not "Others," use the selected type as the value for TYPES
      $otherType = $types;
  }

  $customername = $_POST["customer_name"];
  $receipt = $_POST["receipt"];
  $vehiclename = $_POST["vehicle_name"];
  $service = $_POST["service"];
  $mode = $_POST["mode"];
  $reference = $_POST["reference"];
  $credit = $_POST["credit"];
  $debit = $_POST["debit"];
  $closebal = $_POST["closebal"];

  $sql = "INSERT INTO `daybook` (DATE, TYPES, CUSTOMERNAME, RECEIPT, VEHICLENAME, SERVICE, MODE, REFERENCE, CREDIT, DEBIT, CLOSINGBALANCE)
          VALUES ('$date', '$otherType', '$customername', '$receipt', '$vehiclename', '$service', '$mode', '$reference', '$credit', '$debit', '$closebal')";

  if ($conn->query($sql) === TRUE) {
      header("Location: daybook_save.php");
      exit;
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Payment Entry</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<style>
    body {
      text-align: center;
    }
    
    .container-box {
      margin-top: 24px;
        width: 880px;
    margin-left: 15%;
    height: max-content;
flex-shrink: 0;
background: rgb(255 255 255 / 59%);
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 1px -1px 4px 0px rgba(0, 0, 0, 0.25);
}

.form{
  margin-left:100px;
  margin-top: -60px;
  padding:50px;
}

    .form-group .form-control {
      flex: 2;
      border-radius: 5px;
      border: 0.2px solid #0000009e;
      background: #FFF;
      box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
      height: 35px;
      
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
 

.button2 {
    width: 155px;
    height: 44px;
    flex-shrink: 0;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background: linear-gradient(90deg, #2e97b9 0%, #6ffbf6  100%);
    color: white;
    margin-top: 22px;
    text-align: center;
    border-radius: 50px;
    margin-right: 10%;
}

    .button2:hover{
  color:#0C00A3;
  background:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
  
}
 .import{
  margin-left: 30%;
    margin-top: -40px;
}
button.view {
    padding: 5px 16px;
    border-radius: 5px;
  background-color: #00c9b6;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    border:none;
    top: 21px;
    right: 19.5%;
      position: absolute;
  }
  i.fa {
    font-size: 24px;
    margin-right: 86%;
    margin-top: 12px;
}
.opening-balance-label {
    position: absolute;
    top: 19%;
    right: 28%;
    font-weight: bold;
    color: #333;
}

.button3 {
    width: 116px;
    height: 41px;
    flex-shrink: 0;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background: #4fbfdb;
    color: white;
    margin-top: -26px;
    text-align: center;
    border-radius: 5px;
    margin-right: 81%;
    margin-bottom: 10px;
}
    .button3:hover{
  color:#0C00A3;
  background:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
  
}

</style>
</head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<?php
include "nav.php";
?>


          

  
<div class="container-box">


<i style="font-size:24px" class="fa" onclick="refreshPage()">&#xf021;</i>


 <form action="" method="post" class="form" enctype="multipart/form-data">
  
<div class="row">
  <div class="col">
  <button type="button" class="button3"><a href="daybook_save.php">View Details</a></button>
  </div>
  <div class="col">
  <div class="opening-balance-label">Opening Balance: $1000.00</div>
  </div>
</div>


  <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Date</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Types</label>

              </DIV></DIV>  </DIV> 
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="date" name="date" max="<?= date('Y-m-d') ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
    <select class="form-control" name="types" id="types" required>
  <option value="" disabled selected><--Select Sale type--></option>
  <option value="Sales">Sales</option>
  <option value="Service">Service</option>
  <option value="Counter">Counter</option>
  <option value="Insurance">Insurance</option>
  <option value="Others">Others</option> <!-- Updated value to "Others" -->
</select>


              </DIV></DIV> </DIV>
              
<div class="row" id="otherTypeRow" style="display:none;">
  <div class="col-4">
    
  </div>
  <div class="col-4">
  <div class="form-group">
      <label>Other Type</label>
    </div>
  </div>

  <div class="col-4">
    <div class="form-group">
      <input class="form-control" type="text" name="other_type">
    </div>
  </div>
</div>


              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Customer Name</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Receipt Number</label>

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="customer_name" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="receipt" required>
              </DIV></DIV> </DIV>

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Vehicle Name</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Types of services</label>

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="vehicle_name" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="service" required>
              </DIV></DIV> </DIV>



              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Mode of Payment</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Payment Reference Number</label>

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <select class="form-control" name="mode" required>
  <option value="" disabled selected><--Select Payment type--></option>
  <option value="Cash">Cash</option>
  <option value="G Pay">G Pay</option>
  <option value="Neft">Neft</option>
  <option value="DD / Check">DD / Check</option>
  <option value="Finance">Finance</option>
</select>


  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="reference" required>
              </DIV></DIV> </DIV>

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Credit Amount</label>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">

            <label>Debit Amount</label>

              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="credit" id="credit" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="debit" id="debit" required>
              </DIV></DIV> </DIV>

              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Closing Balance</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="closebal" id="closebal" readonly>
              </DIV></DIV> </DIV>


              <div class="form-group mt-4">
        <input type="Submit" value="SAVE" class="button2" name="save">
    </div>
</form>
</div>
</body>
<script>
    function calculateClosingBalance() {
      // Get the credit and debit input values
      var creditInput = document.getElementById('credit');
      var debitInput = document.getElementById('debit');
      var closeBalInput = document.getElementById('closebal');

      // Parse the input values as floats (assuming they contain numeric values)
      var creditAmount = parseFloat(creditInput.value) || 0;
      var debitAmount = parseFloat(debitInput.value) || 0;

      // Calculate the closing balance
      var closingBalance = creditAmount - debitAmount;

      // Update the closing balance input field
      closeBalInput.value = isNaN(closingBalance) ? '' : closingBalance.toFixed(); // Display with two decimal places or empty string if NaN
    }

    // Add event listeners to credit and debit inputs to trigger the calculation
    document.getElementById('credit').addEventListener('input', calculateClosingBalance);
    document.getElementById('debit').addEventListener('input', calculateClosingBalance);
  </script>
   <script>
        function refreshPage() {
            // Reload the current page
            window.location.reload();
        }
    </script>
    <script>
  // Function to show/hide the "Other Type" input box
  function toggleOtherTypeInput() {
    var typesDropdown = document.getElementById('types');
    var otherTypeRow = document.getElementById('otherTypeRow');

    if (typesDropdown.value === 'Others') {
      otherTypeRow.style.display = 'block';
    } else {
      otherTypeRow.style.display = 'none';
    }
  }

  // Add an event listener to the "Types" dropdown to trigger the toggle function
  document.getElementById('types').addEventListener('change', toggleOtherTypeInput);
</script>

</html>
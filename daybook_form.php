<?php
include "connect.php";

// Initialize the variable to avoid undefined variable warnings
$lastclosingBalance = 0.00;

$sql = "SELECT CLOSINGBALANCE FROM daybook ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastclosingBalance = $row["CLOSINGBALANCE"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DayBook</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<style>

body {
  width: max-content;
height: max-content;
flex-shrink: 0;
  background: linear-gradient(180deg, #009DFF 0%, #4ED3BF 100%);
  background-repeat:no-repeat;
  background-size:cover;
}

.container-box {
  margin-top: 20px;
  margin-left: 14%;
  width: 1023px;
  margin-bottom:30px;
flex-shrink: 0;
background: #FFF;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 1px -1px 4px 0px rgba(0, 0, 0, 0.25);
}

.form{
margin-left:100px;
margin-top: -60px;
padding:50px;
}

.form-group .form-control {
  width: 314px;
height: 37px;
color: #000;
font-family: Inter;
font-size: 13px;
font-style: normal;
font-weight: 700;
line-height: normal;
letter-spacing: 0.26px;
border-radius: 5px;
border: 1px solid #000;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
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
margin-top: 10px;
margin-left: 32%;
width: 171px;
height: 40px;
flex-shrink: 0;
border-radius: 50px;
border-radius: 50px;
background: linear-gradient(180deg, #4DD2C0 0%, #005EA6 100%);
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}

.button2:hover{

background: linear-gradient(180deg, #4DD2C0 0%, #005EA6 100%);
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);

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
position: absolute;
font-size: 24px;
margin-left: 85px;
margin-top: 30px;
}
.opening-balance-label {
margin-top: 48px;
margin-left: 16px;
font-weight: bold;
text-align:center;
color: #333;
width: 254px;
padding-top:7px;
color:white;
height: 40px;
flex-shrink: 0;
border-radius: 3px;
background: #005EA6;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}
.button3 {
width: 116px;
height: 41px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background: #4fbfdb;
color: white;
margin-top: 50px;
text-align: center;
border-radius: 5px;
margin-right: 81%;
margin-bottom: 10px;
}
#neftInfoRow[style*="block"] {
/* margin-top: -4px; */
margin-left: 4px;
width: 0%;
padding-right: 37%;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
/* text-align:center; */
}

#ddInfoRow[style*="block"] {
  /* margin-top: -4px; */
  margin-left: 4px;
  width: 0%;
  padding-right: 37%;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  /* text-align:center; */
  }


  #gpayInfoRow[style*="block"] {
    /* margin-top: -4px; */
    margin-left: 4px;
    width: 0%;
    padding-right: 37%;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    /* text-align:center; */
    }
p{
border-bottom:6px;
}
#financeInfoRow[style*="block"] {
/* margin-top: -4px; */
margin-left: 4px;
width: 0%;
padding-right: 37%;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}



#gpayInfoRow[style*="block"] {
/* margin-top: -4px; */
margin-left: 4px;
width: 0%;
padding-right: 37%;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}



.cust_dropdown{
width: 19.5rem;
background-color: white;
height: max-content;
border-radius: 4px;
box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
.dropdown-item {
border-bottom: 0.3px solid #4fbfdb;
}







/* Mobile */
@media (min-width: 380px) and  (max-width: 767px) {   
.button2 {
width: 120px;
margin-left: 11rem;
}

.container-box{
margin-left: 21px;
width: 46rem;
}
body{
flex-shrink: 0;
  background: linear-gradient(180deg, #009DFF 0%, #4ED3BF 100%);
  height:120.6rem;
  
}

/* Add custom CSS for mobile layout */
.form-group {
margin-top: 10px; /* Add spacing between form elements */
}

.form-group .form-control {
width: 100%; /* Make input fields full width */
margin-right: 0; /* Remove any right margin */
}



label {
display: block; /* Make labels block-level elements to stack them */
text-align: left; /* Align labels to the left */
margin: 5px 0; /* Add vertical margin for labels */
}


}


/* Tablet */

@media (min-width: 768px) and (max-width:1177px) { 
body{
flex-shrink: 0;
  background: linear-gradient(180deg, #009DFF 0%, #4ED3BF 100%);
  height:100rem;
} 

.container-box{
margin-left: 2%;
}
.opening-balance-label{
margin-top: 3.5rem;
}
}


@media (max-width: 1177px) {
.container-box {
margin-left: 5pc;
margin-top: 10pc;
}
}

/Other Style CSS/
.table-container {
width: 72%;
overflow-x: auto; /* Add horizontal scrollbar if the table overflows */

border-radius:10px;
margin-bottom:-4%;
margin-left: 4px;
}

.table {
/* Your table styles here */
width: 100%; /* Ensure the table takes up the full container width */
border-collapse: collapse; /* Optional: Collapse table borders */
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color: white;
height:max-content;
border-radius: 10px;
cursor: pointer;
margin-top: 4%;
margin-bottom: 4%;

/* z-index: 500;
position: absolute; */
}
  .sm{
    border:none;
    border-radius:10px;
    height:37px;
    background: grey;
    color:white;
    font-weight:bold;
  }
  .suggestion {
    width: 313px;
    background-color: #4fbfdb;
    letter-spacing:1px;
    color:white;
    border-radius: 3px;
    font-weight:400;
}
.suggested-name {
    margin-bottom: 10px;
    font-weight: bold;
    margin-left: 17px;
}
/* select#exchange {
    margin-top: 12px;
    width: 168px;
    margin-left: 17px;
} */

</style>

</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<div class="row">
<?php
include "nav1.php";
?>



<div class="container-box" style="margin-top: 127px;">
<i style="font-size:24px" class="fa"><a href="daybook_form.php">&#xf021;</a> </i>
<form action="form_save.php" method="post" class="form" enctype="multipart/form-data">

<div class="row" style="margin-top:-15px;">
<div class="col">
<button type="button" class="button3"><a href="daybook_save.php" style="color: white;">View Details</a></button>
</div>

<!-- Add an empty div to display the current balance -->
<div class="col">
<!-- Display the Current Balance using PHP -->
<div class="opening-balance-label"  >Current Balance: <span style="border: 2px solid white; padding: 2px;">RS.<?php echo number_format($lastclosingBalance, 2); ?></span></div>
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
  <input class="form-control" type="date" name="date" max="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d', strtotime('-1 day')) ?>" required>
</DIV></DIV>
<div class="col-4">
  <div class="form-group">
<select class="form-control" name="types" id="types" required>
<option value="" disabled selected><--Select Sale type--></option>
<option value="Sales">Sales</option>
<option value="Service">Service</option>
<option value="Counter">Counter</option>
<option value="Insurance">Insurance</option>
<option value="Expense">Expense</option>
<option value="Others">Others</option> <!-- Updated value to "Others" -->
</select>
</DIV></DIV></DIV>

<div class="row" id="otherTypeRow" style="display:none;">
<div class="col-4">
</div>
<div class="col-4">
<div class="form-group">
<input class="form-control" type="text" name="other_type" style="margin-left: 23.3rem;
margin-top: 5px;">
</div>
</div>
</div>

<div class="row" id="customerCodeRow">
<div class="col-4">
<div class="form-group">
<label>Customer Code</label>
<input class="form-control" type="text" name="customer_code"  id="customer_code">
</div>
</div>
<div class="col-4">
<div class="form-group">
<label>Phone Number</label>
<input class="form-control" type="text" name="phone_number" id="phone_number">
</div>
</div>
</div>

      <div class="row">
<div class="col-4">
  <div class="form-group">
    <label id="customer_name1" for="customer_name">Customer Name</label>
</DIV></DIV>






<div class="col-4">
  <div class="form-group">
  <label id="vehicle_name1">Vehicle Name</label>
      </DIV></DIV></DIV>
      <div class="row">
<div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="customer_name"  id="customer_name">
  <div class="suggestion"></div>

  </DIV></DIV>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  const suggestionBox = $('.suggestion');
  // Listen for input changes in the 'customer_name' input field
  $('#customer_name').on('input', function() {
    const customerName = $(this).val();

    if (customerName.trim() !== '') {
      // Make an AJAX request to fetch customer name suggestions
      $.ajax({
        url: 'fetch_customer_suggestions.php',
        method: 'POST',
        data: { customer_name: customerName },
        dataType: 'json',
        success: function(data) {
          suggestionBox.empty();
          if (data.length > 0) {
            data.forEach(function(suggestion) {
              // Display customer name suggestions in the suggestion box
              suggestionBox.append('<div class="suggested-name">' + suggestion.CUSTOMERNAME + '</div>');
            });
            // Handle click on a suggestion to fill the input field and clear suggestions
            $('.suggested-name').on('click', function() {
              const selectedName = $(this).text();
              $('#customer_name').val(selectedName);

              // Make an AJAX request to fetch customer details using the selected name
              $.ajax({
                url: 'fetch_customer_details.php',
                method: 'POST',
                data: { customer_name: selectedName },
                dataType: 'json',
                success: function(data) {
                  if (!data.error) {
                    // Populate the input fields with customer details
                    $('#customer_code').val(data.CUSTOMERCODE);
                    $('#phone_number').val(data.PHONE);
                    $('#vehicle_name').val(data.VEHICLENAME);
                  }
                },
                error: function(xhr, status, error) {
                  console.error('Error fetching customer details:', error);
                }
              });

              suggestionBox.empty(); // Clear the suggestions
            });
          } else {
            
          }
        },
        error: function(xhr, status, error) {
          console.error('Error fetching customer name suggestions:', error);
        }
      });
    } else {
      suggestionBox.empty();
    }
  });
});
</script>









<div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="vehicle_name" id="vehicle_name"
  class="vehicle_name" >
      </DIV></DIV></DIV>


<!-- Add this script after your HTML content -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
// Initially hide the customerCodeRow div
$('#customerCodeRow').hide();

// Hide the Debit Amount label and input fields initially
$('#debitAmountLabel, #debitAmountLabel1').hide();  

// Listen for changes in the 'types' select
$('#types').change(function() {
// Check if the selected option is "Sales"
if ($(this).val() === "Sales") {
// If "Sales" is selected, show the customerCodeRow div
$('#customerCodeRow').show();
$('#service, #service1').hide();

// Show the Debit Amount label and input fields when "Sales" is selected
$('#debitAmountLabel, #debitAmountLabel1').show();
} else if ($(this).val() === "Counter" || $(this).val() === "Insurance"  || $(this).val() === "Service" || $(this).val() === "Others") {
// If "Counter" is selected, hide the Debit Amount label and input fields
$('#debitAmountLabel, #debitAmountLabel1').hide();
$('#customerCodeRow').hide();

} else if ($(this).val() === "Expense") {
// If "Expense" is selected, hide the Customer Name, Vehicle Name, Receipt Number, and Types of services label and input fields
$('#customer_name, #customer_name1, #vehicle_name, #vehicle_name1, #receipt, #service').closest('.row').hide();

// Hide the Debit Amount label and input fields
$('#debitAmountLabel, #debitAmountLabel1').show();

// Hide the customerCodeRow div
$('#customerCodeRow').hide();

} else {
// If any other option is selected, hide the customerCodeRow div
$('#customerCodeRow').hide();

// Show the Debit Amount label and input fields when any other option is selected
$('#debitAmountLabel, #debitAmountLabel1').show();
}
});
});
</script>




      <div class="row">
<div class="col-4">
  <div class="form-group">
  <label id="receipt">Receipt Number</label>
</DIV></DIV>
<div class="col-4">
  <div class="form-group">

    <label id="service">Types of services</label>
      </DIV></DIV>  </DIV>
      <div class="row">
<div class="col-4">
  <div class="form-group">
  <input class="form-control" type="text" name="receipt" id="receipt">

</DIV></DIV>
<div class="col-4">
  <div class="form-group">
  <input class="form-control"  type="text" name="service" id="service1" >
      </DIV></DIV> </DIV>
      <div class="row">
<div class="col-4">
  <div class="form-group">
    <label>Mode of Payment</label>
</DIV></DIV>
<div class="col-4 payment_refno">
  <div class="form-group" id="paymentReferenceContainer">

    <label >Payment Reference Number</label>

      </DIV></DIV></DIV>
      <div class="row">
<div class="col-4">
  <div class="form-group">
  <select class="form-control" name="mode" id="mode" required onchange="toggleFinanceOptions()">
    <option value="" disabled selected><--Select Payment type--></option>
    <option value="Cash">Cash</option>
    <option value="G Pay">G Pay</option>
    <option value="Neft">Neft</option>
    <option value="DD / Check">DD / Check</option>
    <option value="Finance">Finance</option>
</select>
</DIV></DIV>

<div class="col-4 payment_refno1">
  <div class="form-group">
  <input class="form-control"  type="text" name="reference" id="reference">
      </DIV></DIV> </DIV>

<!-- Add a new div for the additional information, initially hidden -->
<div class="row" id="neftInfoRow" style="display: none;">
<div class="col-4">
<div class="form-group">
    <!-- Add your additional information here -->
    <p class="neft-info">HDFCCA<input type="radio" name="neftOption" value="HDFCCA" id="NeftHDFCCA" class="neft-radio" style="margin-left: 16pc; position: absolute; margin-top: -17px;"></p>
    <p class="neft-info">HDRCC<input type="radio" name="neftOption" value="HDRCC" id="NeftHDRCC" class="neft-radio" style="margin-left: 16pc; position: absolute; margin-top: -17px;"></p>
    <p class="neft-info">INV<input type="radio" name="neftOption" value="INV" id="NeftINV" class="neft-radio" style="margin-left: 16pc; position: absolute; margin-top: -17px;"></p>
</div>
</div>
</div>

<div class="row" id="financeInfoRow" style="display: none;">
<div class="col-4">
  <div class="form-group">
      <!-- Add your additional finance information here -->
      <p class="finance-info">
          HDFC <input type="radio" name="financeOption" id="financeHDFC" class="finance-radio" value="HDFC"style="margin-left: 16pc; position: absolute; margin-top: -17px;">
      </p>
      <p class="finance-info">
          IDFC <input type="radio" name="financeOption" id="financeIDFC" value="IDFC" class="finance-radio" style="margin-left: 16pc; position: absolute; margin-top: -17px;">
      </p>
      <p class="finance-info">
          IBC <input type="radio" name="financeOption" id="financeIBC"  value="IBC" class="finance-radio" style="margin-left: 16pc; position: absolute; margin-top: -17px;">
      </p>
  </div>
</div>
</div>

<div class="row" id="gpayInfoRow" style="display: none;">
<div class="col-4">
  <div class="form-group">
      <!-- Add your additional finance information here -->
      <p class="gpay-info">HDFCCA<input type="radio" name="gpayOption" value="HDFCCA" id="GpayHDFCCA" class="gpay-radio" style="margin-left: 16pc; position: absolute; margin-top: -17px;"></p>
    <p class="gpay-info">HDRCC<input type="radio" name="gpayOption" value="HDRCC" id="GpayHDRCC" class="gpay-radio" style="margin-left: 16pc; position: absolute; margin-top: -17px;"></p>
    <p class="gpay-info">INV<input type="radio" name="gpayOption" value="INV" id="GpayINV" class="gpay-radio" style="margin-left: 16pc; position: absolute; margin-top: -17px;"></p>
  </div>
</div>
</div>

<script>
function toggleFinanceOptions() {
var modeDropdown = document.getElementById('mode');
var financeInfoRow = document.getElementById('financeInfoRow');
var neftInfoRow = document.getElementById('neftInfoRow');
var gpayInfoRow = document.getElementById('gpayInfoRow'); // Added Gpay row

if (modeDropdown.value === 'Finance') {
  financeInfoRow.style.display = 'block';
  neftInfoRow.style.display = 'none'; // Hide Neft options
} else if (modeDropdown.value === 'Neft') {
  financeInfoRow.style.display = 'none'; // Hide Finance options
  neftInfoRow.style.display = 'block'; // Show Neft options
}else if (modeDropdown.value === 'G Pay' || modeDropdown.value === 'DD / Check'){
financeInfoRow.style.display = 'none'; // Hide Finance options
neftInfoRow.style.display = 'none'; // Hide Neft options
gpayInfoRow.style.display = 'block'; // Show Gpay options
}
else {
  financeInfoRow.style.display = 'none'; // Hide Finance options
  neftInfoRow.style.display = 'none'; // Hide Neft options
}
}
// Get all the radio buttons by their class
var financeRadios = document.querySelectorAll('.finance-radio');
var neftRadios = document.querySelectorAll('.neft-radio');
var gpayRadios = document.querySelectorAll('.gpay-radio'); // Added Gpay radios

// Add a change event listener to each radio button
financeRadios.forEach(function (radio) {
radio.addEventListener('change', function () {
  // Update the display style of the financeInfoRow based on radio button status
  var financeInfoRow = document.getElementById('financeInfoRow');
  financeInfoRow.style.display = 'none';
});
});

neftRadios.forEach(function (radio) {
radio.addEventListener('change', function () {
  // Update the display style of the neftInfoRow based on radio button status
  var neftInfoRow = document.getElementById('neftInfoRow');
  neftInfoRow.style.display = 'none';
});
});

gpayRadios.forEach(function (radio) {
radio.addEventListener('change', function () {
// Update the display style of the gpayInfoRow based on radio button status
var gpayInfoRow = document.getElementById('gpayInfoRow');
gpayInfoRow.style.display = 'none';
});
});
</script>

<!-- Add an ID to the Expense-related label and input elements -->
<div class="row" id="expenseInfoRow" style="display: none;">
<div class="col-4">
<div class="form-group">
    <label id="particularLabel" for="particular">Particulars</label>
</div>
</div>
<div class="col-4 vouchernm">
<div class="form-group" id="voucherLabelContainer">
    <label id="voucherLabel" for="voucher">Voucher Name</label>
</div>
</div>
</div>
<div class="row" id="expenseInputRow" style="display: none;">
<div class="col-4">
<div class="form-group">
    <input class="form-control" type="text" name="particular" id="particularInput">
</div>
</div>
<div class="col-4 vouchernm1">
<div class="form-group" id="voucherInputContainer">
    <input class="form-control" type="text" name="voucher" id="voucherInput">
</div>
</div>
</div>





<div class="row">
  <div class="col-4">
    <div class="form-group">
      <label for="exchange" style="margin-top: 12px;">Payment For</label>
    </div>
  </div>
  <div class="col-4 deb" id="debitAmountDiv">
  <div class="form-group" id="debitAmountLabel">

    <label for="debit">Debit Amount</label>
      </DIV></DIV>
</div>
<div class="row">
  <div class="col-4">
    <div class="form-group">
    <select class="form-control exchange" name="exchange" id="exchange">
        <option value="">Select Option</option>
        <option value="Direct">Direct</option>
        <option value="Exchange">Exchange</option>
      </select>
    </div>
  </div>
  <div class="col-4 deb1" id="debitAmountDiv1">
  <div class="form-group" id="debitAmountLabel1">
  <input class="form-control" type="text" name="debit" id="debit">
      </DIV></DIV>
</div>





<div class="row">
<div class="col-4">
  <div class="form-group" id="creditLabelContainer">
    <label for="credit">Cash Amount</label>
</DIV></DIV>
</DIV>
      <div class="row"> 
<div class="col-4">
  <div class="form-group" id="creditInputContainer">
  <input class="form-control" type="text" name="credit" id="credit" >
</DIV></DIV>
</DIV>



      <div class="form-group mt-4">
<input type="submit" value="SAVE" class="button2" name="save">
</div>
</form>
</div>
</div>
</body>

<script>
// Add an event listener to the "Mode of Payment" dropdown
document.getElementById('mode').addEventListener('change', function () {
var selectedMode = this.value;
var paymentReferenceContainer = document.getElementById('paymentReferenceContainer');
var debitContainer = document.getElementById('debitContainer');


var debitAmountDiv = document.getElementById('debitAmountDiv');
var debitAmountDiv1 = document.getElementById('debitAmountDiv1');
var selectedMode = $('#mode').val();

// Check if the selected option is "Cash"
if (selectedMode === 'Cash') {
    // Hide the "Payment Reference Number" input and move "Debit Amount" to the opposite side
    paymentReferenceContainer.style.display = 'none';
    debitContainer.classList.remove('col-4');
    debitContainer.classList.add('col-8');
   
} else {
    // Show the "Payment Reference Number" input and reset "Debit Amount" to its original position
    paymentReferenceContainer.style.display = 'block';
    debitContainer.classList.remove('col-8');
    debitContainer.classList.add('col-4');
    debitAmountDiv.style.marginTop = '';
    debitAmountDiv1.style.marginTop = '';
}
});

// Function to update selected option
function updateSelectedOption(option) { 
document.getElementById('reference').value = option;
}

document.getElementById('mode').addEventListener('change', function () {
var selectedMode = this.value;
var referenceInput = document.getElementById('reference');

var debitAmountInput = document.getElementById('debitAmountDiv');
var debitAmountInput1 = document.getElementById('debitAmountDiv1');


// Check if the selected option is "Cash"
if (selectedMode === 'Cash') {
// Hide the "Payment Reference Number" input
referenceInput.style.display = 'none';
$('.col-4.vouchernm').css('margin-top', '-8.5%');
$('.col-4.vouchernm1').css('margin-top', '-8.5%');
$('.col-4.deb').css('margin-top', '-8.5%');
$('.col-4.deb1').css('margin-top', '-8.5%');

// // Adjust margin-top for "Debit Amount" input
// debitAmountInput.style.marginTop = '-8.6rem';
// debitAmountInput1.style.marginTop = '-6.6rem';
} else {
// Show the "Payment Reference Number" input
referenceInput.style.display = 'block';
$('.col-4.vouchernm').css('margin-top', '0');
$('.col-4.vouchernm1').css('margin-top', '0');
$('.col-4.deb').css('margin-top', '0');
$('.col-4.deb1').css('margin-top', '0');

// Reset margin-top for "Debit Amount" input
debitAmountInput.style.marginTop = '';
debitAmountInput1.style.marginTop = '';
}
});

// Get the types and mode of payment elements
var typesDropdown = document.getElementById("types");
var modeDropdown = document.getElementById("mode");

// Add an event listener to the types dropdown
typesDropdown.addEventListener("change", function () {
    var selectedType = typesDropdown.value;

    // Check if the selected type is "Expense"
    if (selectedType === "Expense") {
        // If it is, hide options other than "Cash" and "Neft" in the mode of payment dropdown
        hideOptionsInDropdown(modeDropdown, ["Cash", "Neft"]);
    } else {
        // If it's not "Expense," show all options in the mode of payment dropdown
        showAllOptionsInDropdown(modeDropdown);
    }
});

// Function to hide options in a dropdown except for specified values
function hideOptionsInDropdown(dropdown, valuesToKeep) {
    for (var i = 0; i < dropdown.options.length; i++) {
        var option = dropdown.options[i];
        if (valuesToKeep.indexOf(option.value) === -1) {
            option.style.display = "none";
        } else {
            option.style.display = "block";
        }
    }
}

// Function to show all options in a dropdown
function showAllOptionsInDropdown(dropdown) {
    for (var i = 0; i < dropdown.options.length; i++) {
        var option = dropdown.options[i];
        option.style.display = "block";
    }
}
</script>
<script>
$(document).ready(function() {
// Initially hide the customerCodeRow, expenseInfoRow, and expenseInputRow divs
$('#customerCodeRow, #expenseInfoRow, #expenseInputRow, #gpayInfoRow').hide();

// Listen for changes in the 'types' select
$('#types').change(function() {
var selectedType = $(this).val();


// Hide the "Debit Amount" label and input for "Sales" option
if (selectedType === "Sales") {
  $('#debitAmountDiv, #debitAmountDiv1').hide();
  $('.col-4.payment_refno').css('margin-top', '-7%');
  $('.col-4.payment_refno1').css('margin-top', '-7%');
} else {
  $('#debitAmountDiv, #debitAmountDiv1').show();
  $('.col-4.payment_refno').css('margin-top', '0');
  $('.col-4.payment_refno1').css('margin-top', '0');
}


// Show/hide the "Customer Code" row based on the selected option
if (selectedType === "Sales") {
$('#customerCodeRow').show();
} else {
$('#customerCodeRow').hide();
}

 // Show/hide the "Expense" related rows based on the selected option
 if (selectedType === "Expense") {
      $('#expenseInfoRow, #expenseInputRow').show();
      $('#creditLabelContainer, #creditInputContainer').hide();

      
    } else {
      $('#expenseInfoRow, #expenseInputRow').hide();
      $('#creditLabelContainer, #creditInputContainer').show();
    }
// Hide the G Pay options when not selected
if (selectedType !== "G Pay") {
            $('#gpayInfoRow').hide();
        }
});
});

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



document.getElementById('myTable').addEventListener('click', function() {
        this.style.display = 'none'; // Hide the table when it's clicked
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>
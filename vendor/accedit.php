<?php
include_once 'connect.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $result = mysqli_query($conn, "SELECT * FROM account WHERE id='$id'");
    $row = mysqli_fetch_array($result);

    $fieldsChanged = false;

    if ($_POST["invoice_date"] != $row["INVOICEDATE"] ||
        $_POST["chassis_no"] != $row["CHASSISNO"] ||
        $_POST["vehicle_model"] != $row["VEHICLEMODEL"] ||
        $_POST["customer_name"] != $row["CUSTOMERNAME"] ||
        $_POST["payment_type"] != $row["PAYMENTTYPE"] ||
        $_POST["branches_dealers"] != $row["BRANCHESDEALERS"] ||


        $_POST["file_received_date"] != $row["FILERECEIVEDDATE"] ||
        $_POST["form20_date"] != $row["FORM20DATE"] ||
        $_POST["Form20_Received"] != $row["FORM20RECEIVEDDATE"] ||
        $_POST["accounts_confirmation"] != $row["ACCOUNTSCONFIRMATION"] ||
        $_POST["registration_date"] != $row["REGISTRATIONDATE"] ||
        $_POST["registration_number"] != $row["REGISTRATIONNUMBER"] ||
        $_POST["rc"] != $row["RCSTATUS"] ||
        $_POST["remarks"] != $row["REMARKS"] ||
       
        $_POST["excess"] != $row["EXCESS"] ||
        $_POST["status_main"] != $row["RTOCONFIRMATION"] ||
        $_POST["accounts_closing_date"] != $row["ACCOUNTSCLOSINGDATE"] ||
        $_POST["accounts_status"] != $row["ACCOUNTSSTATUS"] ||
        $_POST["pending"] != $row["PENDING"]) {
        $fieldsChanged = true;
    }

    if ($fieldsChanged) {
        $invoicedate = $_POST["invoice_date"];
        $chassisno = $_POST["chassis_no"];
        $vehiclemodel = $_POST["vehicle_model"];
        $customername = $_POST["customer_name"];
        $paymenttype = $_POST["payment_type"];
        $branchesdealers = $_POST["branches_dealers"];

        $filereceiveddate = $_POST["file_received_date"];
        $form20date = $_POST["form20_date"];
        $Form20Received = $_POST["Form20_Received"];
        $accountsconfirmation = $_POST["accounts_confirmation"];
        $registrationdate = $_POST["registration_date"];
        $registrationnumber = $_POST["registration_number"];
        $rc = $_POST["rc"];
        $remarks = $_POST["remarks"];
 



        $excess = $_POST["excess"];
        $statusmain = $_POST["status_main"];
        $accountsclosingdate = $_POST["accounts_closing_date"];
        $accountsstatus = $_POST["accounts_status"];
        $pending = $_POST["pending"];

        $query = "UPDATE account SET  
            INVOICEDATE = '$invoicedate',
            CHASSISNO = '$chassisno',
            VEHICLEMODEL = '$vehiclemodel',
            CUSTOMERNAME = '$customername',
            PAYMENTTYPE = '$paymenttype',
            BRANCHESDEALERS = '$branchesdealers',


            FILERECEIVEDDATE = '$filereceiveddate',
            FORM20DATE = '$form20date',
            FORM20RECEIVEDDATE = '$Form20Received',
            ACCOUNTSCONFIRMATION = '$accountsconfirmation',
            REGISTRATIONDATE = '$registrationdate',
            REGISTRATIONNUMBER = '$registrationnumber',
            RCSTATUS = '$rc',
            REMARKS = '$remarks',

            EXCESS = '$excess',
            RTOCONFIRMATION = '$statusmain',
            ACCOUNTSCLOSINGDATE = '$accountsclosingdate',
            ACCOUNTSSTATUS = '$accountsstatus',
            PENDING = '$pending'
           
        
        WHERE
            ID = '$id'";

        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            ?>
            <script>
                alert("Successfully Updated");
                window.location.href = 'accsave.php';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Not Updated");
                window.location.href = 'accsave.php?error';
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("No changes detected. Database not updated.");
            window.location.href = 'accsave.php';
        </script>
        <?php
    }
}

$result = mysqli_query($conn, "SELECT * FROM account WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Employee Registration Form</title>
   <link rel="stylesheet" href="payslip.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
 
.container1 {
    width: 877px;
height: 898px;
flex-shrink: 0;
background: #FFF;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 6px -5px 4px 0px rgba(0, 0, 0, 0.25);
margin-left: 191px;
margin-top: 40px;

}
.container111{
  background: linear-gradient(65deg, #0C00A3 0%, #3CE7BD 100%);
  
}

.label1{
  float:left;
  margin-left:15px;
}

.form-check-label{
  float:left;
}

h1 {
    color: orangered;
    margin-top: 15px;
    margin-bottom: 30px;
    margin-left: 383px;
}
table {
    width: 100%;
    font-size: 120%;
    font-family: serif;
    text-align: left;
    margin: 30px auto; /* Center the table */
    border-collapse: collapse;
}

table tr {
    font-size: 80%;
}

td {
    padding: 8px; /* Add some padding to the table cells */
}

th {
    background-color: #f2f2f2; /* Add background color to the table header */
}
.scroll-container {
        width: 100%; /* Set the desired width for the container */
        height:100%;/* Set the desired height for the container */
        overflow: auto;
        flex-direction: column;
      
}


.scroll-container::-webkit-scrollbar {
    display: none; 
  }


input{
  margin-top: 2.8px;
}
.row{
  margin-top:9px;
}


.form-control {
    display: block;
    width: 100%;
    padding: -1.6255rem 0.75rem;
    font-size: 1rem;
    font-weight: 300;
    margin-left: 152px;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
label {
    display: inline-block;
    margin-left: 152px;
    width:200px;
}

a{
      text-decoration:none;
    }
    .button{
      margin-top:20px;
      width: 106px;
height: 34px;
flex-shrink: 0;
border:none;
border-radius:5px;
background: #151CA7;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
color:white;

      
    }
    .back{
      margin-top:20px;
      width: 106px;
height: 34px;
flex-shrink: 0;
border:none;
border-radius:5px;
background: #151CA7;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
color:white;
    }
.hide{
  display:none;
}
.buttons{
  margin-left:850px;

}
.save {
    /* margin-left: 140px; */
    margin-top:20px;
    margin-left:380px;
    width: 151px;
height: 39px;
flex-shrink: 0;
    align-items:center;
    margin-bottom:30px;

    font-weight:bold;
    /* font-size:500px; */
    border-radius: 5px;
    background: linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    color:white;
}
.save:hover{
  color:#0C00A3;
  background:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
}
</style>

<body>

<div class="container111">
  <div class="buttons">
<button class="back"><a class="bbtn" href="accsave.php" style="color: white;">BACK</a></button>
<button type="button" class="button"><a href="acclogin.php" style="color: white;">LOGOUT</a></button>
</div>
  <div class="bg-color">

          <div class="container1">
            <div class="scroll-container">
      
         
          
<form action="" method="post" >





    <div class="row">
        <div class="col-4">
        <div class="hide">
          <div class="form-group">
            <label>ID:</label> </DIV></DIV></DIV></div>
 
              <div class="row">
        <div class="col-4">
        <div class="hide">

        
          <div class="form-group">
          <input class="form-control" type="text" name="id" value="<?php echo $row["ID"]; ?>" required>
  </DIV></DIV></DIV>  </div>
  





    <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Invoice Date:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Chassis No:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="date" name="invoice_date" value="<?php echo $row["INVOICEDATE"]; ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="chassis_no" value="<?php echo $row["CHASSISNO"]; ?>" required >
              </DIV></DIV> </DIV>



              


              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Vehicle Model:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Customer Name:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="vehicle_model" value="<?php echo $row["VEHICLEMODEL"]; ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="customer_name" value="<?php echo $row["CUSTOMERNAME"]; ?>" required>
              </DIV></DIV> </DIV>





              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Payment Type:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Branches/Sub Dealers:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="payment_type" value="<?php echo $row["PAYMENTTYPE"]; ?>" readonly>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="branches_dealers" id="branches_dealers" value="<?php echo $row["BRANCHESDEALERS"]; ?>" readonly>
           </DIV></DIV> </DIV>






<div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>File Received Date:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Form 20 Date:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="file_received_date" value="<?php echo $row["FILERECEIVEDDATE"]; ?>"  required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="date" name="form20_date" value="<?php echo $row["FORM20DATE"]; ?>" required>
              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Form 20 Received Date:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Accounts Confirmation:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="date" name="Form20_Received" value="<?php echo $row["FORM20RECEIVEDDATE"]; ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="accounts_confirmation" value="<?php echo $row["ACCOUNTSCONFIRMATION"]; ?>" required>
              </DIV></DIV> </DIV>




              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Registration Date:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Registration Number:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="registration_date" value="<?php echo $row["REGISTRATIONDATE"]; ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="registration_number" value="<?php echo $row["REGISTRATIONNUMBER"]; ?>" required>
              </DIV></DIV> </DIV>



              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>RC Status:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Remarks:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="rc" value="<?php echo $row["RCSTATUS"]; ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="date" name="remarks" value="<?php echo $row["REMARKS"]; ?>" required>
              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Excess/Shortage:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>RTO Confirmation:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="number" name="excess" value="<?php echo $row["EXCESS"]; ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="number" name="status_main" value="<?php echo $row["RTOCONFIRMATION"]; ?>" required>
              </DIV></DIV> </DIV>




              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Accounts Closing Date:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>Accounts Status:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="date" name="accounts_closing_date" value="<?php echo $row["ACCOUNTSCLOSINGDATE"]; ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <select class="form-control" type="text" name="accounts_status" value="<?php echo $row["ACCOUNTSSTATUS"]; ?>" required>
          <option>Open</option>
        <option>Closed</option>
      </select>
        </DIV></DIV> </DIV>



            <div class="row">
     
  <div class="col-4">
          <div class="form-group">
            <label>Pending:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <select class="form-control" type="text" name="pending" value="<?php echo $row["PENDING"]; ?>" required>
          <option>Pending</option>
        <option>No Pending</option>
      </select>
        </DIV></DIV>
  
         
                <div class="edit-button-container">
        <button class="save" type="submit" id="edit" name="edit">UPDATE</button>
      </div>
</form>
</div>
      </div>
    </div>   
    <div>                                                                                                                                           
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


</body>
</html>
  
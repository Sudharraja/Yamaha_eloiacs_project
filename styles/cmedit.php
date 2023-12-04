
<?php
include "nav2.php";
?>
<?php
include_once 'connect.php';

// Check if the form is submitted
if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $date = $_POST["date"];
    $customercode = $_POST["customer_code"];
    $customername = $_POST["customer_name"];
    $add1 = $_POST["add1"];
    $add2 = $_POST["add2"];
    $phone = $_POST["phone"];

    $vehiclecode = $_POST["vehicle_code"];
    $vehiclename = $_POST["vehicle_name"];
    $financiercode = $_POST["financier_code"];
    $financiername = $_POST["financier_name"];
    

    $query="UPDATE customer_master SET  
        DATE = '$date',
        CUSTOMERCODE = '$customercode',
        CUSTOMERNAME = '$customername',
        ADD1 = '$add1',
        ADD2 = '$add2',
        PHONE = '$phone',

        VEHICLECODE = '$vehiclecode',
        VEHICLENAME = '$vehiclename',
        FCODE = '$financiercode',
        FNAME = '$financiername'
    WHERE ID='$id'";

    $query_run=mysqli_query($conn,$query);

    if($query_run) {
        ?>
        <script>
            alert("Successfully Updated");
            window.location.href='cmsave.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Not Updated");
            window.location.href='cmsave.php?error';
        </script>
        <?php
    }
}

$result=mysqli_query($conn,"SELECT * FROM customer_master where id='".$_GET['id']."'");
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b272402e67.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <title>Employee Registration Form</title>
   <link rel="stylesheet" href="payslip.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
  /* .container111{
    width: 877px;
height:max-content;
flex-shrink: 0;
margin-left:20%;
background: #FFF;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 6px -5px 4px 0px rgba(0, 0, 0, 0.25);
  } */
.container1 {
  margin-top: -50px;
    width: 877px;
height: max-content;
margin-left:18%;
flex-shrink: 0;
background: #FFF;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 6px -5px 4px 0px rgba(0, 0, 0, 0.25);
    
}
.label1{
  float:left;
}

.form-check-label{
  float:left;
}
button.btn.btn-danger {
    font-weight: 700;
    padding: 6px 18px;
    margin-top: -12px;
}
h1{

  color:orangered;
  margin-top: 11px;
  margin-bottom:30px;
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
.btn2{
  margin-left:5px;
  
    font-weight: 500;
    font-size: 18px;
}

.scroll-container::-webkit-scrollbar {
    display: none; 
  }
  .edit-button-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }
  
  button.btn-success{
    font-weight: bold;
    font-size: 18px;
    padding: 6px 18px;
}
button.btn-success:hover{
    background-color: white;
    color: green;
}
input{
  margin-top: 2.8px;
}
.row{
  margin-top:9px;
}
button#edit {
  margin-top:5%;
    margin-left: 40%;
}

.form{
  margin-left:160px;

  padding:50px;
}
.hide{
  display:none;
}
.h1{
  color: #1E38AB;
font-family: Inter;
font-size: 25px;
font-style: normal;
text-align:center;
font-weight: 700;
line-height: normal;
letter-spacing: 0.75px;
margin-bottom:-40px;
margin-top:20px;
}
.btn-success{

      width: 126px;
height: 44px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background: linear-gradient(90deg, #1C66DC 0%, #48C1BD 100%);

color:white;
margin-top: 60px;
text-align:center;
border-radius:50px;
margin-right:70%;

    }

    .btn-success:hover{
  color:#0C00A3;
  background:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
}
.button1{
      width: 127px;
height: 50px;
flex-shrink: 0;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
background-color:#00c5bc;
margin-left:20%;
font-weight:bold;
    border-radius:5px;
margin-top:20px;
margin-bottom:20px;
border:none;

color:white;
    }
    .button1:hover{

background-color:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
}
.button1:hover a{
  color: #0C00A3;

}
a{
  text-decoration:none;
  color:white;
}
.nav {
    background-color: #45dfdf;
    height: 15vh;
}
.button {
    width: 127px;
    height: 34px;
    flex-shrink: 0;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    background-color: #00cbaf;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    margin-top: 29px;
    color: white;
    margin-left: 44%;
}
.back-link {
  text-decoration: none;
  font-size: 24px;
  margin-bottom: 20px;
  display: inline-block;
  color: #0d6efd;
}

.back-link i {
  margin-right: 5px; /* Add some spacing between the icon and the text */
  margin-bottom: 20px;
  margin-left: 136px;
}
label {
    margin-left: -18px;
    display: inline-block;
}
.form-control {
    margin-left: -22px;
    display: block;
    width: 96%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
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
</style>
<body>
<div class="container111">
<a href="cmsave.php" class="back-link"><i class="fa-solid fa-arrow-left"></i>
        </a>
<!-- <button class="button1"><a class="bbtn" href="cmsave.php">Back</a></button> -->

  <div class="bg-color">

          <div class="container1">

            <div class="scroll-container">

      
          <h1 class="h1">EDIT FORM </h1>
          
<form action="" method="post" class="form">

    <div class="row">
        <div class="col-4">
          <div class="hide">

         
          <div class="form-group">
            <label>ID:</label> </DIV></DIV></DIV> </div>
 
              <div class="row">
        <div class="col-5">
        <div class="hide">
          <div class="form-group">
          <input class="form-control" type="text" name="id" value="<?php echo $row["ID"]; ?>" required>
  </DIV></DIV></DIV></div>
  
  <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label>Date</label> </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
            <label>Customer Code</label>
              </DIV></DIV></DIV>
              <div class="row">
        <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="date" name="date" value="<?php echo $row["DATE"]; ?>" max="<?= date('Y-m-d') ?>" required>
  </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="customer_code" value="<?php echo $row["CUSTOMERCODE"]; ?>" required >
              </DIV></DIV></DIV>

              <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label>Customer Name</label> </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
            <label>Address 1</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="customer_name" value="<?php echo $row["CUSTOMERNAME"]; ?>" required>
  </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="add1" value="<?php echo $row["ADD1"]; ?>" required>
              </DIV></DIV> </DIV>

              <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label>Address 2</label> </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
            <label>Phone Number</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="add2" value="<?php echo $row["ADD2"]; ?>" required>
  </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="phone" value="<?php echo $row["PHONE"]; ?>" required>
              </DIV></DIV> </DIV>






              <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label>Vehicle Code</label> </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
            <label>Vehicle Name</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="vehicle_code" value="<?php echo $row["VEHICLECODE"]; ?>" required>
  </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="vehicle_name" value="<?php echo $row["VEHICLENAME"]; ?>" required>
              </DIV></DIV> </DIV>




              <div class="row">
        <div class="col-5">
          <div class="form-group">
            <label>Financier Code</label> </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
            <label>Financier Name</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="financier_code" id="credit" value="<?php echo $row["FCODE"]; ?>" required>
  </DIV></DIV>
  <div class="col-5">
          <div class="form-group">
          <input class="form-control" type="text" name="financier_name" id="debit" value="<?php echo $row["FNAME"]; ?>" required>
              </DIV></DIV> </DIV>

                
                <div class="edit-button-container">
        <button class="btn btn-success" type="submit" id="edit" name="edit">UPDATE</button>
      </div>
</form>
</div>
      </div>
    </div>   
    <div>                                                                                                                                           
</body>
</html>
  
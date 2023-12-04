<?php
include_once 'connect.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $result = mysqli_query($conn, "SELECT * FROM project WHERE id='$id'");
    $row = mysqli_fetch_array($result);

    $fieldsChanged = false;

    if ($_POST["model_code"] != $row["MODELCODE"] ||
        $_POST["model_name"] != $row["MODELNAME"] ||
        $_POST["showroom"] != $row["SHOWROOM"] ||
        $_POST["it"] != $row["IT"] ||
        $_POST["insurance"] != $row["INSURANCE"] ||
        $_POST["accessories"] != $row["ACCESSORIES"] ||


        $_POST["protection"] != $row["PROTECTION"] ||
        $_POST["others"] != $row["OTHERS"] ||
       
        $_POST["orp"] != $row["ORP"] 
       
       ) {
        $fieldsChanged = true;
    }

    if ($fieldsChanged) {
        $modelcode = $_POST["model_code"];
        $modelname = $_POST["model_name"];
        $showroom = $_POST["showroom"];
        $it = $_POST["it"];
        $insurance = $_POST["insurance"];
        $accessories = $_POST["accessories"];

        $protection = $_POST["protection"];
        $others = $_POST["others"];
        $orp = $_POST["orp"];
 



       
        $query = "UPDATE project SET  
            MODELCODE = '$modelcode',
            MODELNAME = '$modelname',
            SHOWROOM = '$showroom',
            IT = '$it',
            INSURANCE = '$insurance',
            ACCESSORIES = '$accessories',


            PROTECTION = '$protection',
            OTHERS = '$others',
            ORP = '$orp'
        
        WHERE
            ID = '$id'";

        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            ?>
            <script>
                alert("Successfully Updated");
                window.location.href = 'vmsave.php';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Not Updated");
                window.location.href = '.php?error';
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("No changes detected. Database not updated.");
            window.location.href = 'vmsave.php';
        </script>
        <?php
    }
}

$result = mysqli_query($conn, "SELECT * FROM project WHERE id='" . $_GET['id'] . "'");
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
  form {
    margin-left: 150px;
}
 
.container1 {
    width: 785px;
height: 555px;
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
        height:80%;/* Set the desired height for the container */
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
    margin-left: 20px;
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
    margin-left: 20px;
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
    margin-top:20px;
    margin-left:305px;
    width: 151px;
height: 39px;
flex-shrink: 0;
    align-items:center;
    margin-bottom:30px;
    font-weight:bold;
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
<button class="back"><a class="bbtn" href="vmsave.php" style="color: white;">BACK</a></button>
<button type="button" class="button"><a href="logout.php" style="color: white;">LOGOUT</a></button>
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
            <label>MODEL CODE:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>MODEL NAME:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="model_code" value="<?php echo $row["MODELCODE"]; ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="model_name" value="<?php echo $row["MODELNAME"]; ?>" required >
              </DIV></DIV> </DIV>



              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>EX.SHOWROOM:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>LT/RT:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="showroom" value="<?php echo $row["SHOWROOM"]; ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="it" value="<?php echo $row["IT"]; ?>" required>
              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>INSURANCE:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>ACCESSORIES:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="insurance" value="<?php echo $row["INSURANCE"]; ?>" required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="accessories" id="accessories" value="<?php echo $row["ACCESSORIES"]; ?>" required>
           </DIV></DIV> </DIV>



<div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>PROTECTION PLUS:</label> </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
            <label>OTHERS:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="protection" value="<?php echo $row["PROTECTION"]; ?>"  required>
  </DIV></DIV>
  <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="others" value="<?php echo $row["OTHERS"]; ?>" required>
              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>ON ROAD PRICE:</label> 
          </DIV></DIV></DIV>
              <div class="col-4">
          <div class="form-group">
          <input class="form-control" type="text" name="orp" value="<?php echo $row["ORP"]; ?>" required>
              </DIV></DIV> </DIV>
      
           
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
  
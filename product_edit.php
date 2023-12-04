<?php
include_once 'connect.php';
include_once 'nav.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $result = mysqli_query($conn, "SELECT * FROM product WHERE id='$id'");
    $row = mysqli_fetch_array($result);

    $fieldsChanged = false;

    if ($_POST["materialcode"] != $row["Material Code"] ||
        $_POST["models"] != $row["Models"] ||
        $_POST["status"] != $row["Status"] ||
        $_POST["ex"] != $row["Ex showroom"] ||
        $_POST["rt"] != $row["LT/RT"] ||
        $_POST["insurance"] != $row["Insurance"] ||

        $_POST["accessories"] != $row["Accessories"] ||
        $_POST["plus"] != $row["Pro Plus"] ||
       
        $_POST["orp"] != $row["On Road Price"] 
       
       ) {
        $fieldsChanged = true;
    }

    if ($fieldsChanged) {
        $materialcode = $_POST["materialcode"];
        $models = $_POST["models"];
        $status = $_POST["status"];
        $ex = $_POST["ex"];
        $rt = $_POST["rt"];
        $insurance = $_POST["insurance"];

        $accessories = $_POST["accessories"];
        $plus = $_POST["plus"];
        $orp = $_POST["orp"];


       
        $query = "UPDATE product SET  
    `Material Code` = '$materialcode',
    Models = '$models',
    Status = '$status',
    `Ex showroom` = '$ex',
    `LT/RT` = '$rt',
    Insurance = '$insurance',
    Accessories = '$accessories',
    `Pro Plus` = '$plus',
    `On Road Price` = '$orp'
WHERE
    ID = '$id'";


        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            ?>
            <script>
                alert("Successfully Updated");
                window.location.href = 'main.php';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Not Updated");
                window.location.href = 'main.php?error';
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("No changes detected.");
            window.location.href = 'main.php';
        </script>
        <?php
    }
}

$result = mysqli_query($conn, "SELECT * FROM product WHERE id='" . $_GET['id'] . "'");
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
  padding-top: 8px;
    width: 785px;
    height: max-content;
    flex-shrink: 0;
    background: #FFF;
    margin-left: 380px;
    margin-top: 14px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* Add the box-shadow property */
    border-radius:10px;
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
    margin: 30px auto;
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
        margin-left: -70px;
        height:75%;/* Set the desired height for the container */
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


/* .form-control {
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
} */
label {
    display: inline-block;
    margin-left: 20px;
    width:200px;
}

   a{
      text-decoration:none;
      color: white !important;
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
margin-left: 200px;
      
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

.buttons{
  margin-left:850px;

}
.save {
  margin-top: 20px;
    margin-left: 97px;
    width: 121px;
    height: 39px;
flex-shrink: 0;
    align-items:center;
    margin-bottom:30px;
    font-weight:bold;
    border-radius: 5px;
    background: blue;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    color:white;
}

.save:hover{
  color:#0C00A3;
  background:white;
  border:linear-gradient(90deg, #0C00A3 0%, #4DD1BF 100%);
}
.hide{
  display:none;
}
.h {
    margin-left: 13%;
}
.all{
    background-color: blue;
    width: 101px;
    height: 32px;
    color:white !important;
    border-radius: 5px 0px 0px 5px;
    border:1px solid white;
    margin-bottom:1px;

}
.inactive{
    background-color: white;
    width: 68px;
    height: 30px;
    margin-left: -5px;
    color:blue ;
    border-radius: 0px 5px 5px 0px;
    border:1px solid white;
}
.inactive:hover{
  color:white;
  background-color:blue;
  border:1px solid blue;
}
.back{
  font-weight:bold;
  color:white !important;
}



.label{
margin-top: 2px;
margin-bottom: 4px;
width: 75%;
font-size: 17px;
}
.input{
width: 88%;
height: 38px;
margin-bottom: 4px;
border-radius: 5px;
border: 1px solid blue;
margin-left:17px;
}
/* .back:hover{
  color:blue !important;
  background-color:white;
  border:1px solid blue;
} */
</style>

<body>
<div class="container111">
  <div class="buttons">
<!-- <button class="back"><a class="bbtn" href="main.php" style="color: white;">BACK</a></button> -->
<button type="button" class="button back"><a href="main.php" style="color: white;">BACK</a></button>
</div>
  <div class="bg-color">

          <div class="container1">
            <div class="h">
          <h4 class="h4">Add Products</h4>
            <button type="button" class="all"><a href="main.php">All Products</a></button>
            <button type="button" class="inactive">Inactive</button>  </div>
            <div class="scroll-container">          
<form action="" method="post" >

    <div class="row">
        <div class="col">
        <div class="hide">
          <div class="form-group">
            <label class="label">ID:</label> </DIV></DIV></DIV></div>
              <div class="row">
        <div class="col-4">
        <div class="hide">

        
          <div class="form-group">
          <input class="form-control input" type="text" name="id" value="<?php echo $row["ID"]; ?>" required>
  </DIV></DIV></DIV>  </div>
  
    <div class="row">
        <div class="col">
          <div class="form-group">
            <label class="label">Material Code:</label> </DIV></DIV>
  <div class="col">
          <div class="form-group">
            <label class="label">Models:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col">
          <div class="form-group">
          <input class="form-control input" type="text" name="materialcode" value="<?php echo $row["Material Code"]; ?>" readonly>
  </DIV></DIV>
  <div class="col">
          <div class="form-group">
          <input class="form-control input" type="text" name="models" value="<?php echo $row["Models"]; ?>" required >
              </DIV></DIV> </DIV>



              <div class="row">
        <div class="col">
          <div class="form-group">
            <label class="label">Ex showroom:</label> </DIV></DIV>
  <div class="col">
          <div class="form-group">
            <label class="label">LT/RT:</label>
              </DIV></DIV>  </DIV>





              <div class="row">
        <div class="col">
          <div class="form-group">
          <input class="form-control input" type="text" name="ex" value="<?php echo $row["Ex showroom"]; ?>" required>
  </DIV></DIV>
  <div class="col">
          <div class="form-group">
          <input class="form-control input" type="text" name="rt" value="<?php echo $row["LT/RT"]; ?>" required>
              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col">
          <div class="form-group">
            <label class="label">Insurance:</label> </DIV></DIV>
  <div class="col">
          <div class="form-group">
            <label class="label">Accessories:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col">
          <div class="form-group">
          <input class="form-control input" type="text" name="insurance" id="insurance" value="<?php echo $row["Insurance"]; ?>" required>
  </DIV></DIV>
  <div class="col">
          <div class="form-group">
          <input class="form-control input" type="text" name="accessories" value="<?php echo $row["Accessories"]; ?>"  required>
           </DIV></DIV> </DIV>



<div class="row">
        <div class="col">
          <div class="form-group">
            <label class="label">Pro Plus:</label> </DIV></DIV>
  <div class="col">
          <div class="form-group">
            <label class="label">On Road Price:</label>
              </DIV></DIV>  </DIV>
              <div class="row">
        <div class="col">
          <div class="form-group">
          <input class="form-control input" type="text" name="plus" value="<?php echo $row["Pro Plus"]; ?>" required>
  </DIV></DIV>
  <div class="col">
          <div class="form-group">
          <input class="form-control input" type="text" name="orp" value="<?php echo $row["On Road Price"]; ?>" required>
              </DIV></DIV> </DIV>


              <div class="row">
        <div class="col">
          <div class="hidden" style="display:none;">
          <div class="form-group">
            <label>Active / Inactive:</label> 
          </DIV></DIV></DIV>
          </div>
          
              <div class="col">
              <div class="hidden" style="display:none;">
          <div class="form-group">
          <input class="form-control" type="text" name="status" value="<?php echo $row["Status"]; ?>" required>
              </DIV></DIV> </DIV></div>
      
           
                <div class="edit-button-container">
        <button class="save" type="submit" id="edit" name="edit">SAVE</button>
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
  
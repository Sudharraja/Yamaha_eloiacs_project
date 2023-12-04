<?php
include "connect.php";


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    // Retrieve form data
    $material = $_POST['material'];
    $accessories = $_POST['accessories'];
    $models = $_POST['models'];
    $pro_plus = $_POST['pro_plus'];
    $ex_showroom = $_POST['ex_showroom'];
    $on_road_price = $_POST['on_road_price'];
    $lt_rt = $_POST['lt_rt'];
    $insurance = $_POST['insurance'];
    $status = $_POST['status'];
    $expire= "Not expired";



    // Insert data into the "product" table
    $sql = "INSERT INTO `product` (`Material Code`, `Accessories`, `Models`, `Pro Plus`, `Ex showroom`, `On Road Price`, `LT/RT`, `Insurance`, `Status`, `expire/not`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssssssssss", $material, $accessories, $models, $pro_plus, $ex_showroom, $on_road_price, $lt_rt, $insurance, $status, $expire);

        // Execute the query
        if ($stmt->execute()) {
            // Data was successfully inserted
            echo '<script>alert("Product Added successful!");</script>';
            // Redirect to add_product.php
            echo '<script>location.replace("main.php");</script>';
        } else {
            echo "Database query error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Database query error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">
</head>
<style>
    .all {
    background-color: blue;
    color: white;
    width: 104px;
    padding: 3px;
    margin-bottom: 10px;
    font-weight: bold;
    border-radius: 5px 0 0 5px;
    border:none;
  }
.all a{
    text-decoration:none;
    color:inherit;
}
  .inactive {
    background-color: white;
    color: blue;
    margin-left:-5px;
    width: 68px;
    padding: 3px;
    font-weight: bold;
    border-radius: 1.5px 5px 5px 1.5px;
    border:none;
  }
  .inactive a{
    text-decoration:none;
    color:inherit;
}

.btn_logout a{
text-decoration:none;
color:white !important;
}
</style>
<body>
    <div class="row">
        <div class="col-lg-3">
        <?php include "nav.php"; ?>

        </div>
        <div class="col-8">
            <div class="container_pro">
            <!-- <form id="productForm" method="POST" action="">    -->
            <form action="" method="post" class="form" enctype="multipart/form-data">
<div class="row">
    <div class="col">
    

<button type="button" class="btn_logout"><a href="main.php">BACK</a></button>
    </div>
</div>

<div class="container1">
            <h4 class="h4">Add Products</h4>
            <button type="button" class="button all" id="allProductsButton"><a href="main.php">All Products</a></button>
            <button type="button" class="button inactive" id="inactiveButton">Inactive</button>  
            <div class="add">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="" class="label">Model Code</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="" class="label">Accessories</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                        <!-- <input type="text" class="input" name="material" id="material" value="<php echo generateMaterialCode($conn); ?>" readonly required> -->
                        <input type="text" class="input" name="material" id="material" required>                        
                    </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="input" name="accessories" id="accessories" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="" class="label">Models</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="" class="label">Pro Plus</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="input" name="models" id="models" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="input" name="pro_plus" id="pro_plus" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="" class="label">Ex Showroom</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="" class="label">On Road Price</label>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="input" name="ex_showroom" id="ex_showroom" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="input" name="on_road_price" id="on_road_price" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="" class="label">LT/RT</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="" class="label">Insurance</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="input" name="lt_rt" id="lt_rt" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="input" name="insurance" id="insurance" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                    <div class="hidden" >
                        <div class="form-group" style="display:none";>
                            <label for="status">Select Active/Inactive</label>
                            <select name="status" id="status">
                                <option value="active" >Active</option>
                                <option value="Inactive" selected>Inactive</option>
                            </select>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                        <input type="submit" class="save" value="SAVE" name="save" id="saveButton">

                        </div>
                    </div>
                </div>
            </div>
            </form>
            </div>
        </div>
    </div>
</body>
<script>
    // Check if the message is not empty and display an alert
    const importMessage = document.getElementById('import-message');
    if (importMessage.textContent !== "") {
        alert(importMessage.textContent);
    }
</script>
</html>
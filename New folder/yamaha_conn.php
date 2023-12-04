<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "u726014584_emp_detailss";


// Create connection
$conn = new mysqli($hostname, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if(isset($_POST['query'])){
    $inpText=$_POST['query'];
    $query="SELECT * from yamaha_employee_data WHERE NAME like '%$inpText%'";
    $result=$conn->query($query);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['NAME']."</a>";                                            
        }
    }
    else{
        echo"<p class='list-group-item border-1'>No Records</p>";
    }
}

?>

<!--


// $hostname = "localhost";
// $username = "u726014584_eloipayslips";
// $password = "Eloiacs@123";
// $db = "u726014584_emp_detailss";


// // Create connection
// $conn = new mysqli($hostname, $username, $password, $db);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }



// if(isset($_POST['query'])){
//     $inpText=$_POST['query'];
//     $query="SELECT * from yamaha_employee_data WHERE NAME like '%$inpText%'";
//     $result=$conn->query($query);
//     if($result->num_rows>0){
//         while($row=$result->fetch_assoc()){
//             echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['NAME']."</a>";                                            
//         }
//     }
//     else{
//         echo"<p class='list-group-item border-1'>No Records</p>";
//     }
// }

// ?>
-->
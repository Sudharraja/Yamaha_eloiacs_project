<?php


$hostname = "localhost";
$username = "u726014584_yamahauser";
$password = "Y234567a";
$db = "u726014584_yamaha";

$conn = new mysqli($hostname, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
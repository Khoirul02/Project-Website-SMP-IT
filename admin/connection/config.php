<?php
$servername = "localhost";
//$database = "bimario_website_school";
//$username = "bimario_huda123";
//$password = "hudak006123";
$database = "website_school";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysqli_close($conn);
?>
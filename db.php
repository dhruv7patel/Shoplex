<?php
$servername = "localhost";
$username = "root";  
$password = "Dhruv@1373";      
$dbname = "shoplex"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

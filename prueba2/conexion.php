<?php

$servername = "phpmyadmin";
$username = "root";    
$password = ""; 
$dbname = "dreamcode";  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->close();
?>
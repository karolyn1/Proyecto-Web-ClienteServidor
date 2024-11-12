<?php
$servername = "localhost";
$username = "root";
$password = "123"; 
$database = "casa_natura";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}
?>

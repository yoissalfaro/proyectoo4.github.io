<?php
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$database = "proyecto4";

$conn = new mysqli($servername, $usernameDB, $passwordDB, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
?>

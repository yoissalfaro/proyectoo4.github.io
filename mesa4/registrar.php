<?php

//Se crea una condicion y se verifica que el formulario sea con el metodo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $database = "proyecto4";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $database);  // Aquí se conecta a la base de datos

//Si la condicion no se cumple y no se conecta a la base de datos se motrara un mensaje de error
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }
    $username = $_POST["nombredeusuario"]; // Nombre de usuario para el formulario

    $password = $_POST["contra"]; //contraseña para el usuario

//en esta parte se insertan las variables asignadas en el formulario a la tabla de usuario
    $sql = "INSERT INTO usuario (nombredeusuario, contra) VALUES ('$username', '$password')";


    if ($conn->query($sql) == TRUE) { //se crea una condicion la cual es que si se cumple se te enviara al login
        header("Location: login.html");
    } else { //si la condicion no se cumple se mostrara un mensaje de error
        echo "No se pudo registrar el usuario correctamente: " . $conn->error;

    }
}
?>

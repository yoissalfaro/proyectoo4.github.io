<?php
session_start();

// Verifica si se ha enviado un formulario mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "proyecto4";

    // Conectar a la base de datos
    $conn = new mysqli($servername, $username, $password, $database);

    // Obtener el nombre de usuario y la contraseña ingresados en el inicio de sesión
    $username = $_POST["nombredeusuario"];
    $password = $_POST["contra"];

    // Seleccionar el nombre de usuario y la contraseña en la base de datos
    $sql = "SELECT * FROM usuario WHERE nombredeusuario='$username' AND contra='$password'";
    $result = $conn->query($sql);

    // Comprobar si se ha encontrado 1 usuario con esos parámetros
    if ($result->num_rows == 1) {
        // Obtener todos los datos del usuario
        $usuario = $result->fetch_assoc();

        // Verificar si el nombre de usuario es "Admin"
        if ($usuario['nombredeusuario'] == 'Admin') {
            // Si es "Admin", redirigir a la página de administrador
            header("Location: index2.html");
        } else {
            // Si no es "Admin", redirigir a la página de usuario normal
            header("Location: index.html");
        }

        // Iniciar la sesión
        $_SESSION['username'] = $usuario['nombredeusuario'];

    } else {
        // Si el usuario no existe, mostrar un mensaje de error
        echo "Usuario o contraseña incorrectos";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

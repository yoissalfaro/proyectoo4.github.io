<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "proyecto4";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitizar y validar la entrada
    $nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
    $direccion = mysqli_real_escape_string($conn, $_POST["direccion"]);
    $Correo = mysqli_real_escape_string($conn, $_POST["Correo"]);
    $mensaje = mysqli_real_escape_string($conn, $_POST["mensaje"]);

    // Preparar la consulta SQL
    $sql = "INSERT INTO mensaje (Nombre, Direccion, Correo, Mensaje) VALUES ('$nombre', '$direccion', '$Correo', '$mensaje')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        header("Location: contacto2.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

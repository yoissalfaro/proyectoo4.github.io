<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_POST["idUsuario"];
    $nuevoNombre = $_POST["nuevoNombre"];
    $nuevaContra = $_POST["nuevaContra"];

    $stmt = $conn->prepare("UPDATE usuario SET nombredeusuario=?, contra=? WHERE ID_usuario=?");
    $stmt->bind_param('ssi', $nuevoNombre, $nuevaContra, $idUsuario);

    if ($stmt->execute()) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error al actualizar el usuario: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_GET["id"])) {
    $idUsuario = $_GET["id"];
    $sql = "SELECT * FROM usuario WHERE ID_usuario=$idUsuario";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $idUsuario = $row["ID_usuario"];
        $nombreUsuario = $row["nombredeusuario"];
        $contra = $row["contra"];
    } else {
        echo "Usuario no encontrado.";
        exit();
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>

<h2>Editar Usuario</h2>
<form action="editar.php" method="post">
    <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
    <label for="nuevoNombre">Nuevo Nombre de Usuario:</label>
    <input type="text" id="nuevoNombre" name="nuevoNombre" value="<?php echo $nombreUsuario; ?>" required><br>

    <label for="nuevaContra">Nueva Contraseña:</label>
    <input type="password" id="nuevaContra" name="nuevaContra" value="<?php echo $contra; ?>" required><br>

    <input type="submit" value="Actualizar">
</form>

</body>
</html>

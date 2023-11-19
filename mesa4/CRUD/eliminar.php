<?php
include "conexion.php";

if (isset($_GET["id"])) {
    $idUsuario = $_GET["id"];

    $stmt = $conn->prepare("DELETE FROM usuario WHERE ID_usuario=?");
    $stmt->bind_param('i', $idUsuario);

    if ($stmt->execute()) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al eliminar el usuario: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID de usuario no proporcionado.";
}
?>
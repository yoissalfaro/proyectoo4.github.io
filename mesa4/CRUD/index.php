<?php
include "conexion.php";

$sql = "SELECT * FROM usuario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuarios</title>
</head>
<body>

<h2>Lista de Usuarios</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre de Usuario</th>
        <th>Contraseña</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID_usuario"] . "</td>";
        echo "<td>" . $row["nombredeusuario"] . "</td>";
        echo "<td>" . $row["contra"] . "</td>";
        echo "<td><a href='editar.php?id=" . $row["ID_usuario"] . "'>Editar</a></td>";
        echo "<td><a href='eliminar.php?id=" . $row["ID_usuario"] . "'>Eliminar</a></td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

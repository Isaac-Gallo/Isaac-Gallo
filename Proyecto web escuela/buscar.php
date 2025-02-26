<?php
include "conection.php";

if (isset($_POST['query'])) {
    $search = $conn->real_escape_string($_POST['query']);
    $sql = "SELECT * FROM usuarios WHERE estado='activo' AND (Nombre LIKE '%$search%' OR Apellidos LIKE '%$search%' OR Correo LIKE '%$search%')";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($datos = $resultado->fetch_object()) {
            echo '<tr>
                    <td>' . htmlspecialchars($datos->Nombre) . '</td>
                    <td>' . htmlspecialchars($datos->Apellidos) . '</td>
                    <td>' . htmlspecialchars($datos->Correo) . '</td>
                    <td><a href="editar.php?id=' . $datos->idUsuario . '" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="eliminar.php?id=' . $datos->idUsuario . '" class="btn btn-small btn-danger"><i class="fa-solid fa-user-minus"></i></a></td>
                  </tr>';
        }
    } else {
        echo '<tr><td colspan="5">No se encontraron resultados</td></tr>';
    }
}

$conn->close();
?>

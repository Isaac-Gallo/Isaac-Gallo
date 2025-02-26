<?php
// Incluir el archivo de conexión
include "conection.php";

// Verificar si se ha enviado el ID del usuario a eliminar
if (isset($_GET['id'])) {
    // Obtener el ID del usuario a eliminar
    $id = $_GET['id'];
    $nest = "inactivo";

    // Crear la consulta SQL para eliminar el usuario
    $sql = "UPDATE usuarios SET estado = '$nest' WHERE idUsuario = $id";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Usuario eliminado correctamente";
    } else {
        echo "Error al eliminar usuario: " . $conn->error;
    }
} else {
    echo "ID de usuario no especificado";
}

// Cerrar la conexión
$conn->close();
header("Location: menu.php");
?>

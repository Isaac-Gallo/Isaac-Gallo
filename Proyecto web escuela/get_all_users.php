<?php
include "conection.php";

$sql = "SELECT * FROM usuarios WHERE estado='activo' ORDER BY idUsuario DESC";
$resultado = $conn->query($sql);

$usuarios = array();
while ($datos = $resultado->fetch_object()) {
    $usuarios[] = array(
        "Nombre" => htmlspecialchars($datos->Nombre),
        "Apellidos" => htmlspecialchars($datos->Apellidos),
        "Correo" => htmlspecialchars($datos->Correo)
    );
}

$conn->close();

echo json_encode($usuarios);
?>

<?php
include "conection.php";

// Verificar si se ha enviado el ID del usuario
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    echo "EL ID ES '$id'";
    header("Location: menu.php?v=$id");
}



$conn->close();
?>
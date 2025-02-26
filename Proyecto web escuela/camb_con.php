<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $v = $_POST['v'];

    if ($c1 == $c2) {
        echo "C1 y C2 son iguales.";

    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "webpage";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "UPDATE usuarios SET Contraseña = '$c1' WHERE idUsuario = '$v'";
    

    if ($conn->query($sql) === TRUE) {
        echo "Contraseña actualizada correctamente.";
        $sql2 = "DELETE FROM solcon WHERE idUsuario = '$v'";
    } else {
        echo "Error al actualizar la contraseña: " . $conn->error;
    }

    $conn->close();

        header("Location: index.php?cam=1");
        exit();
    } else {
        echo "C1 y C2 son diferentes.";
        header("Location: index.php?cam=2&v=$v");
        exit();
    }
}
?>

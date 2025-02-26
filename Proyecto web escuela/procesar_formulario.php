<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $contraseña = $_POST["password"];

    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "webpage";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    $sql = "SELECT idUsuario FROM usuarios WHERE Correo = '$email' AND Contraseña = '$contraseña'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idUsuario = $row['idUsuario'];
        echo "Correo y contraseña válidos para el usuario con ID: $idUsuario";
        header("Location: menu.php");
        exit();
    } else {
        echo "Correo o contraseña incorrectos";
    }

    $conn->close();
}
?>

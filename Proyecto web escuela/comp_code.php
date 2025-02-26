<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico y codigo
    $correo = $_POST['email'];
    $codigo = $_POST['codigo'];

    // Conectar a la base de datos (reemplaza los valores con los de tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "webpage";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM solcon WHERE correo = '$correo' AND codigo = '$codigo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El correo y el código coinciden, verificar el ID
        $row = $result->fetch_assoc();
        $idU = $row['idU'];

        // Obtener el ID del correo
        $sql_id = "SELECT idUsuario FROM usuarios WHERE Correo = '$correo'";
        $result_id = $conn->query($sql_id);

        if ($result_id->num_rows > 0) {
            $row_id = $result_id->fetch_assoc();
            $idUsuario = $row_id['idUsuario'];

            if ($idU == $idUsuario) {
                echo "El correo y el código pertenecen al mismo ID.";

                header("Location: index.php?v=$idU");
                exit();
            } else {
                echo "El correo y el código no pertenecen al mismo ID.";
                header("Location: index.php?v=0");
                exit();
            }
        } else {
            echo "Correo no encontrado en la base de datos.";
            header("Location: index.php?v=0");
            exit();
        }
    } else {
        echo "Correo y/o código incorrecto.";
        header("Location: index.php?v=0");
        exit();
    }

    $conn->close();
} else {
    echo "Método no permitido.";
}
?>
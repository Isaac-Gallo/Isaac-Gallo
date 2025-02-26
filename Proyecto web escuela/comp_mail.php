<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico ingresado por el usuario
    $correo = $_POST['email'];

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

    // Consulta para comparar el correo ingresado con los correos en la base de datos
    $sql = "SELECT * FROM usuarios WHERE Correo = '$correo'";
    $result = $conn->query($sql);

    // Verificar si se encontró algún resultado
    if ($result->num_rows > 0) {
        // El correo electrónico existe en la base de datos
        echo "El correo electrónico existe en la base de datos.";
        $clave_aleatoria = generarClaveAleatoria();
        echo $clave_aleatoria;

        $row = $result->fetch_assoc();
        $idU = $row['idUsuario'];

        // Insertar en la tabla solcon los datos del correo, la clave aleatoria y el idU
        $sql_insert = "INSERT INTO solcon (idU, correo, codigo) VALUES ('$idU', '$correo', '$clave_aleatoria')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "Datos guardados en la tabla solcon.";
        } else {
            echo "Error al guardar los datos en la tabla solcon: " . $conn->error;
        }
        header("Location: index.php?valor=1");
        exit();

    } else {
        // El correo electrónico no existe en la base de datos
        echo "El correo electrónico no existe en la base de datos.";
        header("Location: index.php?valor=2");
        exit();
    }

    // Cerrar la conexión
    $conn->close();

}else {
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Correo:</label>
        <input type="text" name="correo">
        <input type="submit" value="Enviar">
    </form>
    <?php
}

function generarClaveAleatoria($longitud = 8) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longitud_caracteres = strlen($caracteres);
    $clave_aleatoria = '';
    for ($i = 0; $i < $longitud; $i++) {
        $clave_aleatoria .= $caracteres[rand(0, $longitud_caracteres - 1)];
    }
    return $clave_aleatoria;
}
?>
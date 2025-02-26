<?php
// Incluir el archivo de conexión
include "conection.php";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['mail'];
    $contrasena = $_POST['con'];

    // Validar los datos
    if (!empty($nombre) && !empty($apellido) && !empty($correo) && !empty($contrasena)) {
        // Escapar los datos para evitar inyecciones SQL
        $nombre = $conn->real_escape_string($nombre);
        $apellido = $conn->real_escape_string($apellido);
        $correo = $conn->real_escape_string($correo);
        $contrasena = $conn->real_escape_string($contrasena);
        $est = "activo";

        // Crear la consulta SQL
        $sql = "INSERT INTO usuarios (Nombre, Apellidos, Correo, Contraseña, estado) VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$est')";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo usuario agregado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }

    // Cerrar la conexión
    $conn->close();
    header("Location: index.php");
}
?>
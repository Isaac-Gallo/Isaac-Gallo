<?php

include('conection.php');
// Recibe los datos del formulario
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Combina first_name y last_name para crear el username
$username = $first_name . "_" . $last_name;

// Prepara la consulta SQL (cambia 'tu_tabla' por el nombre real de tu tabla)
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$email', '$password')";
?>
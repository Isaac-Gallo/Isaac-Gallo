<?php
include('conection.php');
include('index.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Aquí puedes procesar los valores como desees
    echo "Email: " . $email . "<br>";
    echo "Contraseña: " . $password . "<br>";
}
?>

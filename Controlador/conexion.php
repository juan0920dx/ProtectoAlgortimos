
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bar";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error al conectar a la base de datos: " . $conexion->connect_error);
}
?>
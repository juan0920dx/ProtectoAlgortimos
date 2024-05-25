<?php
session_start();

include("conexion.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

//Consulta Admin
$sql = "SELECT * FROM administrador WHERE nombreAdministrador = '$usuario' AND contraseñaAdministrador = '$contrasena'";
$result = $conexion->query($sql);
if ($result && $result->num_rows > 0) {
    header("Location: ../Vista/administrador.php");
    exit;
}

// Consulta cajero
$sql = "SELECT * FROM cajero WHERE nombreCajero = '$usuario' AND contraseñaCajero = '$contrasena'";
$result = $conexion->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sede = $row['idSede'];
    if ($sede == "1") { 
        header("Location: ../Vista/cajero_kennedy.php");
        exit;
    } elseif ($sede == "2") { 
        header("Location: ../Vista/cajero_bosa.php");
        exit;
    } elseif ($sede == "3") { 
        header("Location: ../Vista/cajero_suba.php");
        exit;
    }
}

// Consulta mesero
$sql = "SELECT * FROM mesero WHERE nombreMesero = '$usuario' AND contraseñaMesero = '$contrasena'";
$result = $conexion->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sede = $row['idSede'];
    if ($sede == "1") { 
        header("Location: ../Vista/Bar_Kennedy.php");
        exit;
    } elseif ($sede == "2") { 
        header("Location: ../Vista/Bar_Bosa.php");
        exit;
    } elseif ($sede == "3") {
        header("Location: ../Vista/Bar_Suba.php");
        exit;
    }
}

echo "<script>alert('Error: Los datos son incorrectos'); window.location='../Vista/Home.php';</script>";

// Cerrar conexión
$conexion->close();
?>

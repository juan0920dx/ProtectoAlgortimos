<?php
include("conexion.php");

// Obtener Usuarios
$sql = "SELECT c.nombreCajero, c.correoCajero, c.telefonoCajero, s.nombreSede, c.estado
        FROM cajero c
        INNER JOIN sede s ON c.idSede = s.idSede
        UNION
        SELECT m.nombreMesero, m.correoMesero, m.telefonoMesero, s.nombreSede, m.estado
        FROM mesero m
        INNER JOIN sede s ON m.idSede = s.idSede";
$result = $conexion->query($sql);
$usuarios = array();

while($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}
$conexion->close();
echo json_encode($usuarios);
?>

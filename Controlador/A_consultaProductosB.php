<?php
include("conexion.php");

$sql = "SELECT idProductoB, productoB, PrecioB, descripcionB, cantidadB, imagenB FROM inventariobosa";
$result = $conexion->query($sql);
$productos = array();

while($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

$conexion->close();
echo json_encode($productos);
?>

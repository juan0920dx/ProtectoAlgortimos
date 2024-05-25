<?php
include("conexion.php");

$sql = "SELECT idProductoK, productoK, PrecioK, descripcionK, cantidadK, imagenK FROM inventariokennedy";
$result = $conexion->query($sql);
$productos = array();

while($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

$conexion->close();
echo json_encode($productos);
?>

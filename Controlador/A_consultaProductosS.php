<?php
include("conexion.php");

$sql = "SELECT idProductoS, productoS, PrecioS, descripcionS, cantidadS, imagenS FROM inventariosuba";
$result = $conexion->query($sql);
$productos = array();

while($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

$conexion->close();
echo json_encode($productos);
?>

<?php
include("conexion.php");

$productoId = $_GET['productoId'];
$cantidad = $_GET['cantidad'];

$sql = "INSERT INTO inventariobosa (idProductoB, cantidadB)
        VALUES ('$productoId', '$cantidad')
        ON DUPLICATE KEY UPDATE cantidadB = cantidadB + VALUES(cantidadB)";

if ($conexion->query($sql) === TRUE) {
    echo "La cantidad del producto se ha actualizado correctamente";
} else {
    echo "Error al actualizar la cantidad del producto: " . $conexion->error;
}

$conexion->close();
?>

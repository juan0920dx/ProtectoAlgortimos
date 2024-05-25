<?php
include("conexion.php");

$productoId = $_GET['productoId'];
$cantidad = $_GET['cantidad'];

$sql = "INSERT INTO inventariosuba (idProductoS, cantidadS)
        VALUES ('$productoId', '$cantidad')
        ON DUPLICATE KEY UPDATE cantidadS = cantidadS + VALUES(cantidadS)";

if ($conexion->query($sql) === TRUE) {
    echo "La cantidad del producto se ha actualizado correctamente";
} else {
    echo "Error al actualizar la cantidad del producto: " . $conexion->error;
}

$conexion->close();
?>

<?php
include("conexion.php");

$productoS = $_POST['nombre-producto'];
$precioS = $_POST['precio-producto'];
$descripcionS = $_POST['descripcion-producto'];
$cantidadS = $_POST['cantidad-producto'];
$imagenS = $_FILES['imagen-producto']['name'];

$ruta = "../ImagenesProductos/" . $imagenS;
$urlImagen = "http://localhost/ImagenesProductos/" . $imagenS;

$sql = "INSERT INTO inventariosuba (productoS, PrecioS, descripcionS, cantidadS, imagenS) 
        VALUES ('$productoS', '$precioS', '$descripcionS', '$cantidadS', '$urlImagen')";

if ($conexion->query($sql) === TRUE) {
    echo "<script>window.location.href = '../Vista/A_Inventario-suba.php';</script>";
} else {
    echo "Error al insertar el producto: " . $conexion->error;
}

$conexion->close();
?> 
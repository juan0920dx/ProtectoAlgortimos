<?php
include("conexion.php");

$productoB = $_POST['nombre-producto'];
$precioB = $_POST['precio-producto'];
$descripcionB = $_POST['descripcion-producto'];
$cantidadB = $_POST['cantidad-producto'];
$imagenB = $_FILES['imagen-producto']['name'];

$ruta = "../ImagenesProductos/" . $imagenB;
$urlImagen = "http://localhost/ImagenesProductos/" . $imagenB;

$sql = "INSERT INTO inventariobosa (productoB, PrecioB, descripcionB, cantidadB, imagenB) 
        VALUES ('$productoB', '$precioB', '$descripcionB', '$cantidadB', '$urlImagen')";

if ($conexion->query($sql) === TRUE) {
    echo "<script>window.location.href = '../Vista/A_Inventario-bosa.php';</script>";
} else {
    echo "Error al insertar el producto: " . $conexion->error;
}

$conexion->close();
?> 
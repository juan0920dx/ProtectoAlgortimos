<?php
include("conexion.php");

$productoK = $_POST['nombre-producto'];
$precioK = $_POST['precio-producto'];
$descripcionK = $_POST['descripcion-producto'];
$cantidadK = $_POST['cantidad-producto'];
$imagenK = $_FILES['imagen-producto']['name'];

$ruta = "../ImagenesProductos/" . $imagenK;
$urlImagen = "http://localhost/ImagenesProductos/" . $imagenK;

$sql = "INSERT INTO inventariokennedy (productoK, PrecioK, descripcionK, cantidadK, imagenK) 
        VALUES ('$productoK', '$precioK', '$descripcionK', '$cantidadK', '$urlImagen')";

if ($conexion->query($sql) === TRUE) {
    echo "<script>window.location.href = '../Vista/A_Inventario-kennedy.php';</script>";
} else {
    echo "Error al insertar el producto: " . $conexion->error;
}
$conexion->close();
?> 
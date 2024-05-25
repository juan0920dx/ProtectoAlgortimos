<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idProducto = $_POST['id-producto'];
    $nombreProducto = $_POST['nombre-producto'];
    $precioProducto = $_POST['precio-producto'];
    $descripcionProducto = $_POST['descripcion-producto'];
    $cantidadProducto = $_POST['cantidad-producto'];

    // Preparar la consulta para actualizar el producto
    $sql = "UPDATE inventariobosa 
            SET productoB = ?, PrecioB = ?, descripcionB = ?, cantidadB = ? 
            WHERE idProductoB = ?";

    // Preparar la declaración
    $stmt = $conexion->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("ssssi", $nombreProducto, $precioProducto, $descripcionProducto, $cantidadProducto, $idProducto);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al actualizar el producto: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conexion->close();
}
?>
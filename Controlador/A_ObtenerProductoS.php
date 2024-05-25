<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];

    $sql = "SELECT idProductoS, productoS, precioS, descripcionS, cantidadS, imagenS FROM inventariosuba WHERE idProductoS = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idProducto);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        echo json_encode($producto);
    } else {
        echo json_encode(['error' => 'Producto no encontrado']);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'No se recibió el ID del producto']);
}

$conexion->close();
?>
<?php
include("conexion.php");

if(isset($_POST['idProducto'])) {
    $idProducto = $_POST['idProducto'];
    
    $sql = "DELETE FROM inventariobosa WHERE idProductoB = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idProducto);
    
    if($stmt->execute()) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $conexion->error;
    }
    
    $stmt->close();
} else {
    echo "No se recibió el ID del producto.";
}

$conexion->close();
?>

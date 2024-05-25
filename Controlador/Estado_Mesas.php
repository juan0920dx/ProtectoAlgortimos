<?php
include("conexion.php");

if (isset($_POST['idMesa']) && isset($_POST['nuevoEstado'])) {
    $idMesa = $_POST['idMesa'];
    $nuevoEstado = $_POST['nuevoEstado'];

    $sql = "UPDATE mesasbosa SET estado='$nuevoEstado' WHERE idMesa='$idMesa'";

    if ($conexion->query($sql) === TRUE) {
        echo "El estado de la mesa se actualizó correctamente";
    } else {
        echo "Error al actualizar el estado de la mesa: " . $conexion->error;
    }
} else {
    echo "ID de mesa o nuevo estado no proporcionado";
}
?>
<?php
// Verificar si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Decodificar los datos JSON recibidos y almacenarlos en $data
    $data = json_decode(file_get_contents("php://input"), true);
    
    // Incluir el archivo de conexión a la base de datos
    include("conexion.php");

    // Iterar sobre los datos recibidos
    foreach ($data as $productoId => $pedido) {
        // Obtener la cantidad del pedido
        $cantidad = $pedido["cantidad"];

        $sql = "UPDATE inventariosuba SET cantidadS = cantidadS - $cantidad WHERE idProductoS = $productoId";
        if (!mysqli_query($conexion, $sql)) {
            echo json_encode(array("success" => false, "error" => "Error al actualizar el inventario"));
            mysqli_close($conexion);
            exit();
        }
    }
    echo json_encode(array("success" => true));
    mysqli_close($conexion);
} else {
    echo json_encode(array("success" => false, "error" => "Metodo de solicitud no permitido"));
}
?>
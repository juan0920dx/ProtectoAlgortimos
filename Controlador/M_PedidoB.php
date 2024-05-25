<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Decodificar los datos JSON recibidos del cliente
    $data = json_decode(file_get_contents("php://input"), true);

    // Incluir el archivo de conexión a la base de datos
    include("../Controlador/conexion.php");

    // Iterar sobre los productos del resumen y realizar la inserción en la tabla
    foreach ($data as $producto) {
        $nombreProducto = $producto["nombreProducto"];
        $costoTotal = $producto["costoTotal"];
        $cantidad = $producto["cantidad"];
        $descripcion = $producto["descripcion"];

        // Realizar la inserción en la tabla resumen_pedido
        $sql = "INSERT INTO resumen_pedido (nombre_producto, costo_total, cantidad, descripcion) 
                VALUES ('$nombreProducto', '$costoTotal', '$cantidad', '$descripcion')";
        mysqli_query($conexion, $sql);
    }

    // Enviar una respuesta al cliente indicando que la operación fue exitosa
    exit(json_encode(["success" => true]));
} else {
    // Enviar una respuesta al cliente indicando que el método de solicitud no es válido
    exit(json_encode(["success" => false, "error" => "Método de solicitud no permitido"]));
}
?>
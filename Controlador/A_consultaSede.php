<?php
include("conexion.php");

$sedes = array();

// Definir las URLs de las sedes
$url_sede1 = "Bar_Suba.php";
$url_sede2 = "Bar_Kennedy.php";
$url_sede3 = "Bar_Bosa.php";

// Consultar los datos de las sedes
$sql = "SELECT idSede, nombreSede, direccionSede, telefonoSede FROM sede";
$result = $conexion->query($sql);

while($row = $result->fetch_assoc()) {
    // Determinar la URL de cada sede según su nombre
    switch ($row['nombreSede']) {
        case 'Suba':
            $row['url'] = $url_sede1;
            break;
        case 'Kennedy':
            $row['url'] = $url_sede2;
            break;
        case 'Bosa':
            $row['url'] = $url_sede3;
            break;
        default:
            break;
    }
    $sedes[] = $row;
}

$conexion->close();
echo json_encode($sedes);
?>

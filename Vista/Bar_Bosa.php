<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Bosa</title>
    <link rel="stylesheet" href="../CSS/Bar_Sedes.css">
</head>
<body>
<div class="titulo-container">
    <h1>Restaurante Bosa</h1>
    <br>
    <h3>Gestión de Mesas - Click para tomar pedido</h3>
</div>

<div class="mesas-container">
    <div class="columna">
        <div class="mesa" id="mesa1">
            <figure>
                <a href="mesero_bosa.php?mesa=1">
                    <img src="../IMG/Icons/Mesa.svg" alt="Mesa" width="100" height="100">
                </a>
            </figure>
            <div class="mesa-info">
                <h2>Mesa 1</h2>
                <br>
                <p id="estado-mesa-1">Estado: Disponible</p>
                <br>
                <p>Productos:</p>
                <br>
                <table>
                    <?php
                    include("../Controlador/conexion.php");
                    $sql = "SELECT nombre_producto, cantidad FROM resumen_pedido";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $row['nombre_producto'] . "</td>";
                        echo "<td>" . $row['cantidad'] . "</td>";
                        echo "</tr>";
                    }
                    $sqlTotal = "SELECT SUM(costo_total) AS total FROM resumen_pedido";
                    $resultadoTotal = mysqli_query($conexion, $sqlTotal);
                    $rowTotal = mysqli_fetch_assoc($resultadoTotal);
                    $totalCuenta = $rowTotal['total'];
                    mysqli_close($conexion);
                    ?>
                </table>
                <br>
                <p>Cuenta: $<?php echo number_format($totalCuenta); ?></p>
                <button onclick="cambiarEstado(1)" class="disponible">Disponible</button>
            </div>
        </div>
        <!-- mesas -->
    </div>
    <div class="columna">
        <!-- mesas -->
    </div>
    <div class="columna">
        <!-- mesas -->
    </div>
</div>

<button onclick="cerrarSesion()" class="boton-cerrar-sesion">Cerrar Sesión</button>

<script>
function cambiarEstado(numeroMesa) {
    var estadoMesa = document.getElementById('estado-mesa-' + numeroMesa);
    var botonEstado = document.querySelector('#mesa' + numeroMesa + ' button');
    var nuevoEstado = estadoMesa.textContent.includes('Disponible') ? 'ocupada' : 'disponible';
    
    estadoMesa.textContent = 'Estado: ' + (nuevoEstado === 'disponible' ? 'Disponible' : 'Ocupada');
    botonEstado.textContent = nuevoEstado.charAt(0).toUpperCase() + nuevoEstado.slice(1);
    botonEstado.className = nuevoEstado;
    document.cookie = 'estado-mesa-' + numeroMesa + '=' + nuevoEstado + ';expires=' + new Date(new Date().getTime() + 30 * 24 * 60 * 60 * 1000).toUTCString() + ';path=/';
}

document.addEventListener('DOMContentLoaded', function() {
    for (var i = 1; i <= 6; i++) {
        var estadoGuardado = getCookie('estado-mesa-' + i);
        if (estadoGuardado) { 
            var estadoMesa = document.getElementById('estado-mesa-' + i);
            var botonEstado = document.querySelector('#mesa' + i + ' button');
            estadoMesa.textContent = 'Estado: ' + (estadoGuardado === 'disponible' ? 'Disponible' : 'Ocupada');
            botonEstado.textContent = estadoGuardado.charAt(0).toUpperCase() + estadoGuardado.slice(1);
            botonEstado.className = estadoGuardado; 
        }
    }
});

function getCookie(nombre) {
    var nombreCookie = nombre + "=";
    var cookies = decodeURIComponent(document.cookie).split(';');
    for(var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf(nombreCookie) == 0) {
            return cookie.substring(nombreCookie.length, cookie.length);
        }
    }
    return "";
}

function cerrarSesion() {
    window.location.href = "Home.php";
}
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Kennedy</title>
    <link rel="stylesheet" href="../CSS/Bar_Sedes.css">
</head>
<body>
<div class="titulo-container">
    <h1>Restaurante Kennedy</h1>
    <br>
    <h3>Gestión de Mesas - Click para tomar pedido</h3>
</div>

<div class="mesas-container">
    <div class="columna">
    <div class="mesa" id="mesa1">
            <figure>
                <a href="mesero_kennedy.php?mesa=1">
                    <img src="../IMG/Icons/Mesa.svg" alt="Mesa" width="100" height="100">
                </a>
            </figure>
            <div class="mesa-info">
                <h2>Mesa 1</h2>
                <p id="estado-mesa-1">Estado: Disponible</p>
                <p>Productos:</p>
                <ul>

                </ul>
                <p>Cuenta: $0.00</p>
                <button onclick="cambiarEstado(1)" class="disponible">Disponible</button>
            </div>
        </div>
        <div class="mesa" id="mesa2">
            <figure>
                <a href="mesero_kennedy.php?mesa=1">
                    <img src="../IMG/Icons/Mesa.svg" alt="Mesa" width="100" height="100">
                </a>
            </figure>
            <div class="mesa-info">
                <h2>Mesa 2</h2>
                <p id="estado-mesa-2">Estado: Disponible</p>
                <p>Productos:</p>
                <ul>

                </ul>
                <p>Cuenta: $0.00</p>
                <button onclick="cambiarEstado(2)" class="disponible">Disponible</button>
            </div>
        </div>
    </div>
    <div class="columna">
    <div class="mesa" id="mesa3">
            <figure>
                <a href="mesero_kennedy.php?mesa=3">
                    <img src="../IMG/Icons/Mesa.svg" alt="Mesa" width="100" height="100">
                </a>
            </figure>
            <div class="mesa-info">
                <h2>Mesa 3</h2>
                <p id="estado-mesa-3">Estado: Disponible</p>
                <p>Productos:</p>
                <ul>

                </ul>
                <p>Cuenta: $0.00</p>
                <button onclick="cambiarEstado(3)" class="disponible">Disponible</button>
            </div>
        </div>
        <div class="mesa" id="mesa4">
            <figure>
                <a href="mesero_kennedy.php?mesa=4">
                    <img src="../IMG/Icons/Mesa.svg" alt="Mesa" width="100" height="100">
                </a>
            </figure>
            <div class="mesa-info">
                <h2>Mesa 4</h2>
                <p id="estado-mesa-4">Estado: Disponible</p>
                <p>Productos:</p>
                <ul>

                </ul>
                <p>Cuenta: $0.00</p>
                <button onclick="cambiarEstado(4)" class="disponible">Disponible</button>
            </div>
        </div>
    </div>
    <div class="columna">
    <div class="mesa" id="mesa5">
            <figure>
                <a href="mesero_kennedy.php?mesa=5">
                    <img src="../IMG/Icons/Mesa.svg" alt="Mesa" width="100" height="100">
                </a>
            </figure>
            <div class="mesa-info">
                <h2>Mesa 5</h2>
                <p id="estado-mesa-5">Estado: Disponible</p>
                <p>Productos:</p>
                <ul>

                </ul>
                <p>Cuenta: $0.00</p>
                <button onclick="cambiarEstado(5)" class="disponible">Disponible</button>
            </div>
        </div>
        <div class="mesa" id="mesa6">
            <figure>
                <a href="mesero_kennedy.php?mesa=6">
                    <img src="../IMG/Icons/Mesa.svg" alt="Mesa" width="100" height="100">
                </a>
            </figure>
            <div class="mesa-info">
                <h2>Mesa 6</h2>
                <p id="estado-mesa-6">Estado: Disponible</p>
                <p>Productos:</p>
                <ul>

                </ul>
                <p>Cuenta: $0.00</p>
                <button onclick="cambiarEstado(6)" class="disponible">Disponible</button>
            </div>
        </div>
    </div>
</div>
<button onclick="cerrarSesion()" class="boton-cerrar-sesion">Cerrar Sesión</button>
<script>
    function cambiarEstado(numeroMesa) {
        var estadoMesa = document.getElementById('estado-mesa-' + numeroMesa);
        var botonEstado = document.querySelector('#mesa' + numeroMesa + ' button');

        // Cambiar el estado de la mesa
        if (estadoMesa.textContent.includes('Disponible')) {
            estadoMesa.textContent = 'Estado: Ocupada';
            botonEstado.textContent = 'Ocupada';
            botonEstado.className = 'ocupada'; 
        } else {
            estadoMesa.textContent = 'Estado: Disponible';
            botonEstado.textContent = 'Disponible';
            botonEstado.className = 'disponible'; 
        }
    }

    function cerrarSesion() {
        window.location.href = "Home.php";
    }
</script>
</body>
</html>

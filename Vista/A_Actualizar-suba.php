<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <link rel="stylesheet" href="../CSS/A_Actualizar-inventario.css">
</head>
<body>
    <div class="contenedor">
        <h1 class="titulo">Actualizar Producto</h1>
        <h2>Sede Suba</h2>
        <br>
        <form id="formulario-actualizar-producto" enctype="multipart/form-data" action="../Controlador/A_actualizarProductoS.php" method="POST">
            <div class="grupo-formulario">
                <label for="nombre-producto">Nombre del Producto</label>
                <input type="text" id="nombre-producto" name="nombre-producto" placeholder="Nombre del producto">
            </div>
            <div class="grupo-formulario">
                <label for="precio-producto">Precio del Producto</label>
                <input type="number" id="precio-producto" name="precio-producto" placeholder="Precio del producto">
            </div>
            <div class="grupo-formulario">
                <label for="descripcion-producto">Descripción del Producto</label>
                <textarea id="descripcion-producto" name="descripcion-producto" rows="3" placeholder="Descripción del producto"></textarea>
            </div>
            <div class="grupo-formulario">
                <label for="cantidad-producto">Cantidad del Producto</label>
                <input type="number" id="cantidad-producto" name="cantidad-producto" placeholder="Cantidad del producto">
            </div>
            <input type="hidden" id="id-producto" name="id-producto" value="">
            <button type="submit" class="boton">Actualizar Producto</button>
            <a href="A_Inventario-suba.php" class="boton">Cancelar</a>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const idProducto = urlParams.get('id');

            if (idProducto) {
                fetch(`../Controlador/A_ObtenerProductoS.php?id=${idProducto}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('id-producto').value = data.idProductoS;
                        document.getElementById('nombre-producto').value = data.productoS;
                        document.getElementById('precio-producto').value = data.precioS;
                        document.getElementById('descripcion-producto').value = data.descripcionS;
                        document.getElementById('cantidad-producto').value = data.cantidadS;
                    })
                    .catch(error => console.error('Error al obtener el producto:', error));
            }
        });

        document.getElementById('formulario-actualizar-producto').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            fetch(this.action, {
                method: this.method,
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data); 
                window.location.href = "A_Inventario-suba.php"; 
            })
            .catch(error => console.error('Error al actualizar el producto:', error));
        });
    </script>
</body>
</html>

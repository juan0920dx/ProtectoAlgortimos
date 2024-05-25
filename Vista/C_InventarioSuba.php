<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingresar Productos</title>
  <link rel="stylesheet" href="../CSS/C_Inventario.css">
</head>
<body>
<div class="contenedor">
    <div class="contenido">
        <h1>Ingreso de Productos</h1>
        <br>
        <h3>Cajero Suba</h3>
        <br>
        <div class="inventario">
            <ul>
                <?php
                include("../Controlador/conexion.php");
                $sql = "SELECT * FROM inventariosuba";
                $resultado = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<li>" . $row['productoS'] . " - Cantidad: " . $row['cantidadS'] . "</li>";
                }
                mysqli_close($conexion);
                ?>
            </ul>
        </div>
        <form id="ingreso-producto" action="#" method="POST">
            <div class="formulario">
                <div class="imagen-producto">
                    <img id="imagen" src="../IMG/Icons/inventario.svg" alt="Imagen del producto">
                </div>
                <br>
                <label for="producto">Producto:</label>
                <select id="producto" name="producto">
                    <option value="" disabled selected>Selecciona un Producto</option>
                    <?php
                    include("../Controlador/conexion.php");
                    $sql = "SELECT * FROM inventariosuba";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='" . $row['idProductoS'] . "' data-imagen='" . $row['imagenS'] . "'>" . $row['productoS'] . "</option>";
                    }
                    mysqli_close($conexion);
                    ?>
                </select>
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" min="1" required>
                <div class="botones">
                    <button type="button" id="actualizar-cantidad">Actualizar</button>
                    <button type="button" class="boton-volver" onclick="window.location.href='cajero_suba.php'">Volver</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    //Script que se encarga de cargar la imagen cuando se seleccione el producto perteneciente a dicha imagen
    var productoSelect = document.getElementById("producto");
    var imagenProducto = document.getElementById("imagen");

    productoSelect.addEventListener("change", function() {
      var selectedOption = this.options[this.selectedIndex];
      var imagenUrl = selectedOption.getAttribute("data-imagen");
      imagenProducto.src = imagenUrl;
    });

    // Evento que funciona cuando le damos al boton actualizar
    document.getElementById("actualizar-cantidad").addEventListener("click", function() {
        var productoId = document.getElementById("producto").value;
        var cantidad = document.getElementById("cantidad").value;
      
        // Peticion AJAX para actualizar los datos
        fetch("../Controlador/C_ActualizarS.php?productoId=" + encodeURIComponent(productoId) + "&cantidad=" + encodeURIComponent(cantidad))
            .then(response => {
                if (response.ok) {
                    alert("Datos actualizados");
                    location.reload();
                } else {
                    alert("Error al actualizar los datos");
                }
            });
    });
</script>
</body>
</html>

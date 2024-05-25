<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/HomeMesero.css">
  <title>Mesero Bosa</title>
</head>
<body>
  <div class="contenedor">
    <div class="encabezado">
      <h1>Hacer pedido</h1>
    </div>
    <div class="contenido">
      <div class="formulario-pedido">
        <h2>Perfil mesero Bosa</h2>
        <form>
          <div class="grupo-formulario">
            <label for="productos">Productos Disponibles</label>
            <select id="productos" name="productos" size="10" required>
              <?php
                include("../Controlador/conexion.php");
                $sql = "SELECT * FROM inventariobosa";
                $resultado = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_assoc($resultado)) {
                  echo "<option value='" . $row['idProductoB'] . "' data-stock='" . $row['cantidadB'] . 
                  "' data-precio='" . $row['precioB'] . "' data-descripcion='" . $row['descripcionB'] . 
                  "' data-nombre='" . $row['productoB'] . "'>" . $row['productoB'] . " | $ " . $row['precioB'] . 
                  " | " . $row['cantidadB'] . " | " . $row['descripcionB'] . "</option>";
                }
                mysqli_close($conexion);
              ?>
            </select>
          </div>
          <div class="grupo-formulario">
            <label for="cantidad">Cantidad </label>
            <input type="number" id="cantidad" name="cantidad" min="1" required>
          </div>
          <div class="grupo-formulario">
            <button type="button" class="boton-dalwe" id="agregar-al-pedido">Añadir al pedido</button>
            <button type="button" class="boton-dalwe" id="separar-pedido">Separar pedido</button>
            <button type="button" class="boton-dalwe" id="cancelar-pedido">Cancelar pedido</button>
          </div>
          <div class="grupo-formulario">
            <label for="resumen-pedido">Resumen de pedido:</label>
            <ul id="resumen-pedido-lista"></ul>
          </div>
        </form>
      </div>
    </div>
    <a href="Bar_Bosa.php" class="boton-dalwe" id="volver">Volver</a>
  </div>

<script>
const selectProductos = document.getElementById("productos");
const cantidadInput = document.getElementById("cantidad");
const resumenPedidoLista = document.getElementById("resumen-pedido-lista");
const agregarAlPedidoBtn = document.getElementById("agregar-al-pedido");
const productosSeleccionados = {};

const agregarPedido = (productoId, cantidad, precio, nombreProducto, descripcion) => {
    const costoTotal = parseFloat(precio) * parseInt(cantidad);
    productosSeleccionados[productoId] = { cantidad: cantidad, precio: precio, nombreProducto: nombreProducto, descripcion: descripcion }; 
    const listItem = document.createElement('li');
    listItem.textContent = `${nombreProducto} | $ ${costoTotal.toFixed(2)} | ${cantidad}x | ${descripcion}`; 
    resumenPedidoLista.appendChild(listItem);
    cantidadInput.value = '';
    agregarAlPedidoBtn.disabled = true;
};


const actualizarListaProductos = () => {
    for (const option of selectProductos.options) {
        const stock = parseInt(option.dataset.stock);
        const productoId = option.value;
        const descripcion = option.getAttribute('data-descripcion');
        const nombreProducto = option.getAttribute('data-nombre');
        option.disabled = productosSeleccionados[productoId] && productosSeleccionados[productoId].cantidad >= stock;
        option.innerHTML = `${nombreProducto} | $ ${option.dataset.precio} | ${option.dataset.stock} | ${descripcion}`; // Actualizar la presentación del option
    }
    agregarAlPedidoBtn.disabled = false;
};

agregarAlPedidoBtn.addEventListener("click", () => {
    const cantidad = cantidadInput.value;
    const productoId = selectProductos.value;
    const productoSeleccionado = selectProductos.selectedOptions[0];
    const precio = productoSeleccionado.getAttribute('data-precio');
    const nombreProducto = productoSeleccionado.getAttribute('data-nombre');
    const descripcion = productoSeleccionado.getAttribute('data-descripcion');

    if (!cantidad || (productosSeleccionados[productoId] && productosSeleccionados[productoId].cantidad >= parseInt(cantidad))) {
        alert(!cantidad ? "Debe ingresar una cantidad para añadir el producto" : "Este producto ya fue seleccionado");
        return;
    }
    agregarPedido(productoId, cantidad, precio, nombreProducto, descripcion);
    actualizarListaProductos();
});

document.getElementById("separar-pedido").addEventListener("click", () => {
    if (resumenPedidoLista.children.length === 0) {
        alert("Debes agregar por lo menos un producto");
        return;
    }

    const productosResumen = [];
    resumenPedidoLista.querySelectorAll("li").forEach(item => {
        const textoItem = item.textContent;
        const [nombreProducto, costoTotal, cantidad, descripcion] = textoItem.split(" | ");
        productosResumen.push({ nombreProducto: nombreProducto.trim(), costoTotal: parseFloat(costoTotal.split("$")[1].trim()), cantidad: parseInt(cantidad), descripcion: descripcion.trim() });
    });

    fetch("../Controlador/M_PedidoB.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(productosResumen) 
    })
    .then(response => response.ok ? (location.reload(), alert("Pedido generado")) : alert("Error al separar el pedido"));

    fetch("../Controlador/M_ActualizarB.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(productosSeleccionados)
    })
    .then(response => response.ok ? console.log("Cantidad actualizada en inventario") : alert("Error al actualizar la cantidad en inventario"));
});



document.getElementById("cancelar-pedido").addEventListener("click", () => location.reload());

actualizarListaProductos();
</script>
</body>
</html>
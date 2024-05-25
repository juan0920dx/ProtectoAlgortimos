<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/HomeMesero.css">
  <title>Mesero Kennedy</title>
</head>
<body>
  <div class="contenedor">
    <div class="encabezado">
      <h1>Hacer pedido</h1>
    </div>
    <div class="contenido">
      <div class="formulario-pedido">
        <h2>Perfil mesero Kennedy</h2>
        <form>
          <div class="grupo-formulario">
            <label for="productos">Productos Disponibles</label>
            <select id="productos" name="productos" size="10" required>
              <?php
                include("../Controlador/conexion.php");
                $sql = "SELECT * FROM inventariokennedy";
                $resultado = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_assoc($resultado)) {
                  echo "<option value='" . $row['idProductoK'] . "' data-stock='" . $row['cantidadK'] . 
                  "' data-precio='" . $row['precioK'] . "' data-descripcion='" . $row['descripcionK'] . 
                  "'>" . $row['productoK'] . " | $ " . $row['precioK'] . 
                  " | " . $row['cantidadK'] . " | " . $row['descripcionK'] . "</option>";
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
          </div>
          <div class="grupo-formulario">
            <label for="resumen-pedido">Resumen de pedido:</label>
            <textarea id="resumen-pedido" rows="4" cols="50" readonly></textarea>
          </div>
          <div class="grupo-formulario">
            <button type="button" class="boton-dalwe" id="separar-pedido">Separar pedido</button>
          </div>
          <div class="grupo-formulario">
            <button type="button" class="boton-dalwe" id="cancelar-pedido">Cancelar pedido</button>
          </div>
        </form>
      </div>
    </div>
    <a href="Bar_Kennedy.php" class="boton-dalwe" id="volver">Volver</a>
  </div>

  <script>
  // Obtiene referencia al elemento select con id "productos"
  const selectProductos = document.getElementById("productos");
  // Obtiene referencia al elemento input con id "cantidad"
  const cantidadInput = document.getElementById("cantidad");
  // Obtiene referencia al elemento textarea con id "resumen-pedido"
  const resumenPedido = document.getElementById("resumen-pedido");
  // Obtiene referencia al botón con id "agregar-al-pedido"
  const agregarAlPedidoBtn = document.getElementById("agregar-al-pedido");
  // Objeto para almacenar los productos seleccionados
  const productosSeleccionados = {};

  // Función para agregar un pedido al resumen
  function agregarPedido(productoId, cantidad, productoSeleccionado) {
    // Verifica si el producto ya está en la lista de pedidos
    if (productosSeleccionados[productoId]) {
      // Si existe, incrementa la cantidad
      productosSeleccionados[productoId].cantidad += parseInt(cantidad);
    } else {
      // Si no existe, lo agrega al objeto de productos seleccionados
      productosSeleccionados[productoId] = { cantidad: parseInt(cantidad), descripcion: productoSeleccionado };
    }
    // Actualiza el resumen del pedido mostrando la cantidad y descripción del producto
    resumenPedido.value += `${cantidad}x ${productoSeleccionado}\n`;
    // Reinicia el valor del campo de cantidad
    cantidadInput.value = '';
    // Deshabilita el botón de agregar al pedido
    agregarAlPedidoBtn.disabled = true;
  }

  // Función para actualizar la lista de productos disponibles
  function actualizarListaProductos() {
    // Itera sobre las opciones del select
    for (const option of selectProductos.options) {
      // Obtiene el stock y el ID del producto de cada opción
      const stock = parseInt(option.dataset.stock);
      const productoId = option.value;
      // Deshabilita la opción si la cantidad seleccionada es mayor o igual al stock
      option.disabled = productosSeleccionados[productoId] && productosSeleccionados[productoId].cantidad >= stock;
    }
    // Habilita el botón de agregar al pedido
    agregarAlPedidoBtn.disabled = false;
  }

  // Evento de clic en el botón "Agregar al Pedido"
  agregarAlPedidoBtn.addEventListener("click", function() {
    // Obtiene la cantidad, ID del producto y descripción del producto seleccionado
    const cantidad = cantidadInput.value;
    const productoId = selectProductos.value;
    const productoSeleccionado = selectProductos.selectedOptions[0].innerText;
    // Verifica si la cantidad es válida y si el producto ya fue seleccionado
    if (!cantidad || (productosSeleccionados[productoId] && productosSeleccionados[productoId].cantidad >= parseInt(cantidad))) {
      alert(!cantidad ? "Debe ingresar una cantidad para añadir el producto" : "Este producto ya fue seleccionado");
      return;
    }
    // Agrega el pedido y actualiza la lista de productos
    agregarPedido(productoId, cantidad, productoSeleccionado);
    actualizarListaProductos();
  });

  // Evento de clic en el botón "Separar Pedido"
  document.getElementById("separar-pedido").addEventListener("click", function() {
    // Realiza una solicitud POST al servidor con los productos seleccionados
    fetch("../Controlador/M_ActualizarK.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(productosSeleccionados)
    })
    .then(response => {
      // Verifica si la respuesta es exitosa y muestra un mensaje
      if (response.ok) {
        location.reload();
        alert("Pedido generado");
      } else {
        alert("Error al separar el pedido");
      }
    });
  });

  // Evento de clic en el botón "Cancelar Pedido"
  document.getElementById("cancelar-pedido").addEventListener("click", function() {
    // Recarga la página para cancelar el pedido
    location.reload();
  });

  // Actualiza la lista de productos al cargar la página
  actualizarListaProductos();
</script>


</body>
</html>

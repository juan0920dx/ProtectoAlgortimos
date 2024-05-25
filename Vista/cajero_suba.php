<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cajero Bosa</title>
  <link rel="stylesheet" href="../CSS/HomeCajero.css">
</head>
<body>
  <div class="contenedor">
    <div class="contenido">
      <header>
        <h2>Bienvenido cajero</h2>
        <br>
        <h3>Sede Suba</h3>
      </header>
      <main>
        <section class="seccion-mesa">
          <h3>Seleccionar Mesa</h3>
          <select id="mesa" name="mesa">
            <option value="" disabled selected>Seleccione una mesa</option>
            <option value="1">Mesa 1</option>
            <option value="2">Mesa 2</option>
            <option value="3">Mesa 3</option>
          </select>
        </section>
        <section class="seccion-pedido">
          <h3>Detalle del Pedido</h3>
          <div class="tabla-wrapper">
            <table id="pedido">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                </tr>
              </thead>
              <tbody>
                <!-- mostrar tabla base de datos -->
              </tbody>
            </table>
          </div>
          <p id="total">Total: $0.00</p>
        </section>
        <section class="seccion-pago">
          <h3>Realizar Pago</h3>
          <label for="metodo-pago">Seleccione método de pago:</label>
          <select id="metodo-pago" name="metodo-pago">
            <option value="" disabled selected>Medio de pago</option>
            <option value="efectivo">Efectivo</option>
            <option value="tarjeta">Tarjeta</option>
          </select>
          <div id="efectivo" class="metodo-pago">
            <label for="monto-efectivo">Monto cancelado:</label>
            <input type="number" id="monto-efectivo" name="monto-efectivo" step="0.01" min="0" required>
          </div>
          <button type="submit" class="boton-cobrar">Cobrar</button>
        </section>
      </main>
      <div class="Botones">
        <a href="Home.php" class="boton-cerrar-sesion">Cerrar sesión</a>
        <a href="C_InventarioSuba.php" class="boton-ingreso-productos">Ingreso de productos</a>
      </div>
    </div>
  </div>
</body>
</html>

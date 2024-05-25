<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cajero Bosa</title>
  <link rel="stylesheet" href="../CSS/HomeCajero.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div class="contenedor">
    <div class="contenido">
      <header>
        <h2>Bienvenido cajero</h2>
        <br>
        <h3>Sede Bosa</h3>
      </header>
      <main>
        <section class="seccion-mesa">
          <h3>Seleccionar Mesa</h3>
          <select id="mesa" name="mesa">
            <option value="" selected>Seleccione una mesa</option>
            <option value="1">Mesa 1</option>
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
                <?php
                    include("../Controlador/conexion.php");
                    $sql = "SELECT nombre_producto, cantidad, costo_total FROM resumen_pedido";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr class='consulta-mesa-1' style='display: none;'>";
                        echo "<td>" . $row['nombre_producto'] . "</td>";
                        echo "<td>" . $row['cantidad'] . "</td>";
                        echo "<td>" . $row['costo_total'] . "</td>";
                        echo "</tr>";
                    }
                    $sqlTotal = "SELECT SUM(costo_total) AS total FROM resumen_pedido";
                    $resultadoTotal = mysqli_query($conexion, $sqlTotal);
                    $rowTotal = mysqli_fetch_assoc($resultadoTotal);
                    $totalCuenta = $rowTotal['total'];
                    mysqli_close($conexion);
                ?>
              </tbody>
            </table>
          </div>
          <p class="consulta-mesa-1" style="display: none;">Cuenta: $<?php echo number_format($totalCuenta); ?></p>
        </section>
        <section class="seccion-pago">
          <h3>Realizar Pago</h3>
          <label for="metodo-pago">Seleccione método de pago:</label>
          <select id="metodo-pago" name="metodo-pago">
            <option value="" selected>Medio de pago</option>
            <option value="efectivo">Efectivo</option>
            <option value="tarjeta">Tarjeta</option>
          </select>
          <div id="efectivo" class="metodo-pago">
            <label for="monto-efectivo">Monto Efectivo / Cuotas</label>
            <input type="number" id="monto-efectivo" name="monto-efectivo" step="0.01" min="0" required>
          </div>
          <button type="button" class="boton-cobrar">Cobrar</button>
        </section>
      </main>
      <div class="Botones">
        <a href="Home.php" class="boton-cerrar-sesion">Cerrar sesión</a>
        <a href="C_InventarioBosa.php" class="boton-ingreso-productos">Ingreso de productos</a>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#mesa').change(function() {
        var mesaSeleccionada = $(this).val();
        if (mesaSeleccionada === '1') {
          $('.consulta-mesa-1').show(); 
        } else {
          $('.consulta-mesa-1').hide(); 
        }
      });

      $('.boton-cobrar').click(function() {
        var metodoPago = $('#metodo-pago').val();
        var montoEfectivo = $('#monto-efectivo').val();
        if ($('#mesa').val() === '') {
          alert('Debe seleccionar una mesa');
          return false;
        } else if (metodoPago === '') {
          alert('Escoja un medio de pago');
          return false;
        } else if (metodoPago === 'efectivo' && montoEfectivo === '') {
          alert('Ingrese una suma de dinero');
          return false;
        } else if (metodoPago === 'tarjeta' && montoEfectivo === '') {
          alert('Ingrese un numero de cuotas');
          return false;
        } else if (metodoPago === 'efectivo' && parseFloat(montoEfectivo) < parseFloat(<?php echo $totalCuenta; ?>)) {
          alert('El valor ingresado es insuficiente');
          return false;
        } else {
          var diferencia = parseFloat(montoEfectivo) - parseFloat(<?php echo $totalCuenta; ?>);
          if (diferencia > 0) {
            alert('Las vueltas son: $' + diferencia.toFixed(2));
          } else {
            alert('Transacción exitosa');
          }
          window.location.reload(); 
        }
      });
    });
  </script>
</body>
</html>

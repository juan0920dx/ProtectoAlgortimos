<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visualizar Inventario</title>
  <link rel="stylesheet" href="../CSS/A_InventarioSedes.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../JS/FuncionesAdmin.js"></script>
</head>
<body>
  <div class="contenedor-negro">
    <div class="container">
      <h1>Tabla de productos</h1>
      <h2>Sede Bosa</h2>
      
      <div class="tabla-scrollable">
        <table class="productos" id="tablaProductoBosa">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre Producto</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Descripción</th>
              <th>Imagen</th>
              <th>Eliminar</th>
              <th>Actualizar</th>
            </tr>
          </thead>
          <tbody>
          
          </tbody>
        </table>
      </div>

      <div class="botones">
        <button type="button" class="insertar" onclick="window.location.href='A_Insert-bosa.php'">Insertar</button>
        <button type="button" class="volver" onclick="window.location.href='administrador.php'">Volver</button>
      </div>
    </div>
  </div>
</body>
</html>

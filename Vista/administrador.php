<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil Administrador</title>
  <link rel="stylesheet" href="../CSS/HomeAdmin.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../JS/FuncionesAdmin.js"></script>
</head>
<body>
  <div class="container">
    <h1>Perfil Administrador</h1>
    <div id="bienvenida" class="text-center">
      <p>Bienvenido administrador, por favor selecciona una opción para continuar.</p>
    </div>
    <br>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="#productos" onclick="mostrarTab('#productos')">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#reportes" onclick="mostrarTab('#reportes')">Reportes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#usuarios" onclick="mostrarTab('#usuarios')">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#sedes" onclick="mostrarTab('#sedes')">Sedes</a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane" id="productos">
        <div class="contenido-seccion">
          <h2>Productos</h2>
          <br>
          <a href="A_Inventario-suba.php" class="boton">Sede Suba</a>
          <a href="A_Inventario-Kennedy.php" class="boton">Sede Kennedy</a>
          <a href="A_Inventario-bosa.php" class="boton">Sede Bosa</a>
        </div>
      </div>
      <div class="tab-pane" id="reportes">
        <h2>Reportes de ventas</h2>
        <div class="tabla-container">
          <form action="/reportes" method="post">
            <label for="fecha_inicio">Fecha inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio">
            <label for="fecha_fin">Fecha fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin">
            <label for="sede">Sede:</label>
            <select id="sede" name="sede">
              <option value="" disabled selected>Selecciona una sede</option>
              <option value="sede1">Suba</option>
              <option value="sede2">Bosa</option>
              <option value="sede3">Kennedy</option>
              <option value="sede4">Todas las sedes</option>
            </select>
            <br>
            <button type="submit">Generar reporte</button>
          </form>
        </div>
      </div>
      <div class="tab-pane" id="usuarios">
        <h2>Usuarios</h2>
        <div class="tabla-container">
          <table class="table" id="tablaUsuarios">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Sede</th>
                <th>Estado</th>
                <th>Habilitar</th>
                <th>Deshabilitar</th>
                <th>Actualizar</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane" id="sedes">
        <h2>Sedes</h2>
        <div class="tabla-container">
          <table class="table" id="tablaSedes">
            <thead>
              <tr>
                <th>Nombre Sede</th>
                <th>Direccion Sede</th>
                <th>Telefono Sede</th>
                <th>Acceso</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="cerrar-sesion-container">
      <a href="Home.php" class="boton-cerrar-sesion">Cerrar sesión</a>
    </div>
  </div>
  <script src="../JS/FuncionesAdmin.js"></script>
</body>
</html>
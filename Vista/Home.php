<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bar</title>
  <link rel="stylesheet" href="../CSS/Home.css">

</head>
<body>
  <div class="Contenedor">

    <figure>
        <img class="iconoBar" src="../IMG/Icons/Icono bar.svg" alt="bar">
      </figure>

      <H2>Bienvenidos</H2>

      <br>

    <div class="Login">
      
      <form action="../Controlador/validacion.php" method="post">

        <input type="text" id="usuario" name="usuario" placeholder="Inserte su usuario" required maxlength="50">
      
        <input type="password" id="contrasena" name="contrasena" placeholder="Inserte su contraseña" required maxlength="50">

        <button type="submit">Iniciar Sesión</button>
      </form>
    </div>
  </div>


</body>
</html>

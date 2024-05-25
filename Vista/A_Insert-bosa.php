<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Productos </title>
    <link rel="stylesheet" href="../CSS/A_Insert-Inventarios.css">
</head>
<body>
    <div class="contenedor">
        <h1 class="titulo">Agregar Productos</h1>
        <h2>Sede Bosa</h2>
        <br>
        <form id="formulario-producto" enctype="multipart/form-data" action="../Controlador/A_insertarProductoB.php" method="POST">
        <div class="grupo-formulario">
                <label for="nombre-producto">Agregar Nombre producto</label>
                <textarea id="nombre-producto" name="nombre-producto" rows="1" placeholder="Ingrese nombre del producto"></textarea>
            </div>
            <div class="grupo-formulario">
                <label for="precio-producto">Agregar Precio producto</label>
                <input type="number" id="precio-producto" name="precio-producto" placeholder="Ingrese precio del producto">
            </div>
            <div class="grupo-formulario">
                <label for="descripcion-producto">Agregar Descripción producto</label>
                <textarea id="descripcion-producto" name="descripcion-producto" rows="3" placeholder="Ingrese descripción del producto"></textarea>
            </div>
            <div class="grupo-formulario">
                <label for="cantidad-producto">Agregar Cantidad del producto</label>
                <input type="number" id="cantidad-producto" name="cantidad-producto" placeholder="Ingrese la cantidad del producto">
            </div>
            <div class="grupo-formulario">
                <label for="imagen-producto">Agregar Imagen del producto</label>
                <input type="file" id="imagen-producto" name="imagen-producto" accept="image/*">
            </div>
            <button type="submit" class="boton">Agregar Producto</button>
            <a href="A_Inventario-bosa.php" class="boton">Volver</a>
        </form>
    </div>
</body>
</html>

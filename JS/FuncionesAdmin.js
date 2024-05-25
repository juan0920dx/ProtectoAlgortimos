$(document).ready(function() {
  // Función para cambiar entre pestañas
  $('.nav-link').click(function(event) {
    event.preventDefault(); 
    var tabId = $(this).attr('href'); 
    $('.tab-pane').removeClass('active show'); 
    $(tabId).addClass('active show'); 
    $('#bienvenida').hide(); 
  });

  //Obtener usuario
  $.ajax({
    url: '../Controlador/A_consultaUsuarios.php',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
        $('#tablaUsuarios tbody').empty();
        data.forEach(function(usuario) {
            $('#tablaUsuarios tbody').append(`<tr>
                <td>${usuario.nombreCajero || usuario.nombreMesero}</td>
                <td>${usuario.correoCajero || usuario.correoMesero}</td>
                <td>${usuario.telefonoCajero || usuario.telefonoMesero}</td>
                <td>${usuario.nombreSede}</td>
                <td>${usuario.estado}</td>
                <td>
                  <button class="activar-btn btn btn-danger" data-id="${usuario.estado}">Activar</button>
                </td>
                <td>
                  <button class="desactivar-btn btn btn-secondary" data-id="${usuario.estado}">Desactivar</button>
                </td>
                <td>
                    <button class="btn btn-success actualizar-usuario-btn" data-id="${usuario.id}">Actualizar</button>
                </td>
            </tr>`);
        });
    },
    error: function(xhr, status, error) {
        console.error(error);
    }
});

  // Evento de clic para el botón "Actualizar" de usuario
  $(document).on('click', '.actualizar-usuario-btn', function() {
    var usuarioId = $(this).data('id');
    // Aquí puedes hacer lo que necesites con el ID del usuario seleccionado para actualizarlo, por ejemplo, redirigir a otra página para la actualización
    window.location.href = 'A_actualizarUsuario.php?id=' + usuarioId;
  });

  // Obtener Sedes
    $.ajax({
      url: '../Controlador/A_consultaSede.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        $('#tablaSedes tbody').empty();
        data.forEach(function(sede) {
          $('#tablaSedes tbody').append(`<tr>
            <td>${sede.nombreSede}</td>
            <td>${sede.direccionSede}</td>
            <td>${sede.telefonoSede}</td>
            <td><button class="btn btn-success ingresar-sede" data-url="${sede.url}">Ingresar</button></td>
          </tr>`);
        });
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });

     // Manejar clics en el botón "Ingresar" de las sedes
    $(document).on('click', '.ingresar-sede', function() {
      var url = $(this).data('url');
      window.location.href = url;
    });

// Productos Bosa
$.ajax({
  url: '../Controlador/A_consultaProductosB.php',
  type: 'GET',
  dataType: 'json',
  success: function(data) {
      $('#tablaProductoBosa tbody').empty();
      data.forEach(function(producto) {
          $('#tablaProductoBosa tbody').append(`<tr>
              <td>${producto.idProductoB}</td>
              <td>${producto.productoB}</td>
              <td>${producto.PrecioB}</td>
              <td>${producto.cantidadB}</td>
              <td>${producto.descripcionB}</td>
              <td><img src="${producto.imagenB}" alt="${producto.productoB}" style="width:30px;"></td>
              <td><button class="btn btn-danger btn-eliminar-producto" data-id="${producto.idProductoB}" data-sede="Bosa" data-url="../Controlador/A_EliminarProductosB.php">Eliminar</button></td>
              <td><button class="btn btn-success btn-actualizar-producto" data-id="${producto.idProductoB}" data-sede="Bosa" data-url="../Vista/A_Actualizar-bosa.php">Actualizar</button></td>
          </tr>`);
      });
  },
  error: function(xhr, status, error) {
      console.error(error);
  }
});

$(document).on('click', '.btn-actualizar-producto', function() {
  var idProducto = $(this).data('id');
  var url = $(this).data('url');
  window.location.href = `${url}?id=${idProducto}`;
});


// Productos Kennedy
$.ajax({
  url: '../Controlador/A_consultaProductosK.php',
  type: 'GET',
  dataType: 'json',
  success: function(data) {
      $('#tablaProductoKennedy tbody').empty();
      data.forEach(function(producto) {
          $('#tablaProductoKennedy tbody').append(`<tr>
              <td>${producto.idProductoK}</td>
              <td>${producto.productoK}</td>
              <td>${producto.PrecioK}</td>
              <td>${producto.cantidadK}</td>
              <td>${producto.descripcionK}</td>
              <td><img src="${producto.imagenK}" alt="${producto.productoK}" style="width:30px;"></td>
              <td><button class="btn btn-danger btn-eliminar-producto" data-id="${producto.idProductoK}" data-sede="Kennedy" data-url="../Controlador/A_EliminarProductosK.php">Eliminar</button></td>
              <td><button class="btn btn-success btn-actualizar-producto" data-id="${producto.idProductoK}" data-sede="Kennedy" data-url="../Vista/A_Actualizar-kennedy.php">Actualizar</button></td>
          </tr>`);
      });
  },
  error: function(xhr, status, error) {
      console.error(error);
  }
});

$(document).on('click', '.btn-actualizar-producto', function() {
  var idProducto = $(this).data('id');
  var url = $(this).data('url');
  window.location.href = `${url}?id=${idProducto}`;
});

// Productos Suba
$.ajax({
  url: '../Controlador/A_consultaProductosS.php',
  type: 'GET',
  dataType: 'json',
  success: function(data) {
      $('#tablaProductoSuba tbody').empty();
      data.forEach(function(producto) {
          $('#tablaProductoSuba tbody').append(`<tr>
              <td>${producto.idProductoS}</td>
              <td>${producto.productoS}</td>
              <td>${producto.precioS}</td>
              <td>${producto.cantidadS}</td>
              <td>${producto.descripcionS}</td>
              <td><img src="${producto.imagenS}" alt="${producto.productoS}" style="width:30px;"></td>
              <td><button class="btn btn-danger btn-eliminar-producto" data-id="${producto.idProductoS}" data-sede="Suba" data-url="../Controlador/A_EliminarProductosS.php">Eliminar</button></td>
              <td><button class="btn btn-success btn-actualizar-producto" data-id="${producto.idProductoS}" data-sede="Suba" data-url="../Vista/A_Actualizar-suba.php">Actualizar</button></td>
          </tr>`);
      });
  },
  error: function(xhr, status, error) {
      console.error(error);
  }
});

$(document).on('click', '.btn-actualizar-producto', function() {
  var idProducto = $(this).data('id');
  var url = $(this).data('url');
  window.location.href = `${url}?id=${idProducto}`;
});

  $(document).ready(function() {
    // Evento de clic para el botón "Eliminar" de un producto
    $(document).on('click', '.btn-eliminar-producto', function() {
        var idProducto = $(this).data('id');
        var sede = $(this).data('sede');
        var url = $(this).data('url');

        // Realizar la solicitud AJAX para eliminar el producto
        $.ajax({
            url: url,
            type: 'POST',
            data: { idProducto: idProducto },
            success: function(response) {
                alert(response); 
                location.reload(); 
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
});






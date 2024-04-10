//funcion para realizar el eliminado de los productos pasando como parametro su ID
function eliminarProducto(idProducto, rolUsuario) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "Si eliminas este Producto ya no lo podrá recuperar.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminarlo",
  }).then((result) => {
    if (result.isConfirmed) {
      if(rolUsuario != 3){
        //pasamos los datos a otra funcion para manejar las respuesta del servidor.
        eliminarUsuario(idProducto);
      }else{
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'No tienes privilegios!'
        });
      }
    }
  });
}

function eliminarUsuario(idProducto) {
  //solicitud Ajax para eliminar el producto
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Respuesta del servidor
      var respuesta = xhr.responseText;
      if (respuesta == "success") {
        //Notificación de éxito
        Swal.fire(
          "Eliminado!",
          "El elemento ha sido eliminado.",
          "success"
        ).then(() => {
          location.reload();
        });
      } else {
        //Notificación de error
        Swal.fire(
          "Error",
          "Ha ocurrido un error al intentar eliminar el elemento.",
          "error"
        );
      }
    }
  };
  xhr.open("POST", "./eliminarProducto.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("idProducto=" + idProducto);
}
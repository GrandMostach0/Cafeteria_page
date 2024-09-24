//funcion para realizar el eliminado de los usuarios pasando como parametro su ID
function eliminarBanner(idBanner, rolUsuario) {
    Swal.fire({
    title: "¿Estás seguro?",
    text: "Si eliminas este Elemento ya no lo podrá recuperar.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminarlo",
  }).then((result) => {
    if (result.isConfirmed) {
      if(rolUsuario != 3){
        //pasamos los datos a otra funcion para manejar las respuesta del servidor.
        eliminarUsuario(idBanner);
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

function eliminarUsuario(idBanner) {
  //solicitud Ajax para eliminar el usuario
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
  xhr.open("POST", "./eliminarBanner.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("idBanner=" + idBanner);
}
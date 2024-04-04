//MODAL PARA MOSTRAR LOS PRODUCTOS SELECCIONADOS DENTRO DEL INDEX.PHP
function openModal(categoria, title, description, price, uri) {
  resetearContador();
  var modal = document.getElementById("myModal");
  var modalCategory = document.getElementById("modal_categoria");
  var modalTitle = document.getElementById("modal_title");
  var modalDescription = document.getElementById("modal_description");
  var modalPrice = document.getElementById("modal_price");
  var modalImage = document.getElementById("modal_image");

  modalCategory.textContent = categoria;
  modalTitle.textContent = title;
  modalDescription.textContent = description;
  var precioEntero = parseInt(price);
  modalPrice.textContent = "Precio Unitario: " + precioEntero;

  modalImage.src = uri;

  modal.style.display = "block";
}

function openModalUserAdd() {
  clearModalInputs();
  var modal = document.getElementById("myModal");
  modal_userID.textContent = "";
  modal.style.display = "block";
}

//MODAL PARA MOSTAR LOS DATOS DEL USUARIO
function openModalUser(nombre, apellido, correo, contrasenia, rol, id_user) {
  clearModalInputs();

  var modal = document.getElementById("myModal");
  var modal_nombre = document.getElementById("modal_nombre");
  var modal_apellido = document.getElementById("modal_apellido");
  var modal_correo = document.getElementById("modal_correo");
  var modal_contrasena = document.getElementById("modal_contrasenia");
  var modal_rol = document.getElementById("modal_rol");
  var modal_userID = document.getElementById("modal_userID");

  modal_nombre.value += nombre;
  modal_apellido.value += apellido;
  modal_correo.value += correo;
  modal_contrasena.value += contrasenia;
  modal_userID.textContent = id_user;

  // Establecer el valor seleccionado del elemento <select> modal_rol
  modal_rol.value = rol;

  modal.style.display = "block";
}

//FUNCION PARA GUARDAR LOS CAMBIOS DE EDICION
function guardarCambios() {
  // Obtener los nuevos valores del modal y almacenarlos en variables locales
  var nombre = document.getElementById("modal_nombre").value;
  var apellido = document.getElementById("modal_apellido").value;
  var correo = document.getElementById("modal_correo").value;
  var contrasenia = document.getElementById("modal_contrasenia").value;
  var rol = document.getElementById("modal_rol").value;
  var id_user = document.getElementById("modal_userID").textContent;

  console.log("ID:" + id_user);
  if(id_user === undefined || id_user === null || id_user.trim() === ''){
    console.log("entro aqui en para agregar nuevo usuario");
      window.location.href = 
      "./usuarioAccions/agregarUsuario.php?nombre=" +
      encodeURIComponent(nombre) + 
      "&apellido=" +
      encodeURIComponent(apellido) +
      "&correo=" +
      encodeURIComponent(correo) +
      "&contrasenia=" +
      encodeURIComponent(contrasenia) +
      "&rol=" +
      encodeURIComponent(rol);
  }else{
    // Redirigir a editarUsuario.php con los datos del usuario
    window.location.href =
      "./usuarioAccions/editarUsuario.php?id_user=" +
      encodeURIComponent(id_user) +
      "&nombre=" +
      encodeURIComponent(nombre) +
      "&apellido=" +
      encodeURIComponent(apellido) +
      "&correo=" +
      encodeURIComponent(correo) +
      "&contrasenia=" +
      encodeURIComponent(contrasenia) +
      "&rol=" +
      encodeURIComponent(rol);
  }
}

//Modal de los producto sin mostrar datos
function openModalProductAdd(){
  clearModalInputs();
  var modal = document.getElementById("myModal");
  modal.style.display = "block";
}

//Modal para los productos
function openModalProduct(UriImg, Producto, Description, Price, Offert, Category){
  clearModalInputs();

  var modal = document.getElementById("myModal");
  var modalImgName = document.getElementById("modal_producto_img_name");
  var modalImgFile = document.getElementById("modal_producto_img_file");
  var modalProductoName = document.getElementById("modal_producto_name");
  var modalProductoDescription = document.getElementById("modal_producto_description");
  var modalProductoPrice = document.getElementById("modal_producto_price");
  var modalProductoOffert = document.getElementById("modal_producto_offert");
  var modalProductoPriceSale = document.getElementById("modal_producto_price_final");
  var modalProductoCategory = document.getElementById("modal_producto_category");

  const partesRuta = UriImg.split('/');
  const ImgName = partesRuta[partesRuta.length - 1];
  modalImgName.textContent = ImgName;
  modalProductoName.value += Producto;
  modalProductoDescription.value += Description;
  modalProductoPrice.value += Price;
  modalProductoOffert.value += Offert;
  var precioBruto = Math.round(Price * (Offert / 100));
  var precionFinal = Price - precioBruto;
  modalProductoPriceSale.textContent = "$" + precionFinal;
  modalProductoCategory.value += Category;

  modal.style.display = "block";
}

function actualizarPrecioFinal() {
  // Obtener los valores de los campos de entrada de precio y oferta
  var precio = parseFloat(document.getElementById("modal_producto_price").value);
  var descuento = parseFloat(document.getElementById("modal_producto_offert").value);

  if(precio < 0 && Offert < 0){
    precio = 0;
    descuento = 0;
  }

  // Calcular el precio final
  var precioFinal = Math.round(precio * (1 - descuento / 100));

  // Actualizar el contenido de la etiqueta de precio final
  if(precioFinal < 0 ){
    document.getElementById("modal_producto_price_final").textContent = "$0";
  }else{
    document.getElementById("modal_producto_price_final").textContent = "$" + precioFinal;
  }
}

function guardarCambiosProducto() {
    var formData = new FormData(); // Crea un objeto FormData

    // Obtiene los valores de los campos del modal
    var modalImgFile = document.getElementById("modal_producto_img_file").files[0];
    var modalProductoName = document.getElementById("modal_producto_name").value;
    var modalProductoDescription = document.getElementById("modal_producto_description").value;
    var modalProductoPrice = document.getElementById("modal_producto_price").value;
    var modalProductoOffert = document.getElementById("modal_producto_offert").value;
    var modalProductoCategory = document.getElementById("modal_producto_category").value;

    // Agrega los valores al objeto FormData
    formData.append('imagen', modalImgFile);
    formData.append('nombreProducto', modalProductoName);
    formData.append('descripcionProducto', modalProductoDescription);
    formData.append('ofertaProducto', modalProductoOffert);
    formData.append('precioProducto', modalProductoPrice);
    formData.append('categoriaProducto', modalProductoCategory);

    // Crea una solicitud XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Define la función de respuesta
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // El servidor ha procesado la solicitud correctamente
                console.log("mangos con chamoy " + xhr.responseText); // Puedes manejar la respuesta aquí
                // Puedes redirigir o realizar otras acciones según lo necesites
            } else {
                // Error en la solicitud
                console.error('Hubo un error en la solicitud.');
            }
        }
    };

    // Abre la conexión y envía la solicitud al servidor
    xhr.open('POST', 'agregarProducto.php', true);
    xhr.send(formData); // Envía el objeto FormData
}



/* MODAL PARA LA PORTADA */
function openModalBanners(){
  var modal = document.getElementById('myModal');
  modal.style.display = "block";
}

//Funcion para resetear los valores de los inputs
function clearModalInputs() {
  var modal = document.getElementById("myModal");
  var inputs = modal.querySelectorAll(
    'input[type="text"], input[type="email"], input[type="password"], input[type="number"],textarea'
  );

  inputs.forEach(function (input) {
    input.value = "";
  });
}

//Funcion para cerrar el modal
function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

//Funcion para Resetear Contador
function resetearContador() {
  var cantidadElement = document.getElementById("cantidad");
  cantidadElement.textContent = "1"; // Reiniciar contador a cero
}

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
  var modal_productoID = document.getElementById("modal_productID");
  modal_productoID.value = "";
  modal.style.display = "block";
}

//Modal para los productos
function openModalProduct(UriImg, Producto, Description, Price, Offert, Category, id_product){
  clearModalInputs();
  var modal = document.getElementById("myModal");
  var modalImage = document.getElementById("imagen");
  var modalImgName = document.getElementById("modal_producto_img_name");
  var modalImgFile = document.getElementById("modal_producto_img_file");
  var modalProductoName = document.getElementById("modal_producto_name");
  var modalProductoDescription = document.getElementById("modal_producto_description");
  var modalProductoPrice = document.getElementById("modal_producto_price");
  var modalProductoOffert = document.getElementById("modal_producto_offert");
  var modalProductoPriceSale = document.getElementById("modal_producto_price_final");
  var modalProductoCategory = document.getElementById("modal_producto_category");
  var modal_productoID = document.getElementById("modal_productID");

  //parte para mostrar solo el nombre de la imagen del producto
  const partesRuta = UriImg.split('/');
  const ImgName = partesRuta[partesRuta.length - 1];
  modalImgName.textContent = ImgName;
  //muestra de la imagen aqui
  const ImgNamePreview = '../../assets/images/' + ImgName;
  modalImage.src = ImgNamePreview;
  modal_productoID.value = id_product;

  //muestra el precio Nombre del producto
  modalProductoName.value += Producto;
  //muestra la descripcion del producto
  modalProductoDescription.value += Description;
  //muestra el precio del producto
  modalProductoPrice.value += Price;
  //muestra la oferta del producto
  modalProductoOffert.value += Offert;

  //Parte para mostrar el precio del producto de venta con el descuento ya hecho
  var precioBruto = Math.round(Price * (Offert / 100));
  var precionFinal = Price - precioBruto;
  modalProductoPriceSale.textContent = "$" + precionFinal;
  //muestra la categoria en la que esta
  console.log("categoria: " + Category);
  console.log(modalProductoCategory);
  modalProductoCategory.value = Category;

  modal.style.display = "block";
}

function openModalBannersAdd(){
  clearModalInputs();
  var modal = document.getElementById("myModal");
  var modalBannerId = document.getElementById("modal_BannerID");
  modalBannerId.value = "";
  modal.style.display = "block";
}

//BANNERS
function openModalBanners(UrlImg, title, description, id_banner){
  clearModalInputs();
  var modal = document.getElementById("myModal");
  var modalBannerImg = document.getElementById("modal_banner_img");
  var modalBannerImgName = document.getElementById("modal_banner_img_name");
  var modalBannerImgFile = document.getElementById("modal_banner_img_file");
  var modalBannerTitle = document.getElementById("modal_banner_title");
  var modalBannerDescription = document.getElementById("modal_banner_description");
  var modalBannerId = document.getElementById("modal_BannerID");

  //src/assets/images/banners/bannerMarque3.png
  const partesRuta = UrlImg.split('/');
  const ImgName = partesRuta[partesRuta.length - 1];
  modalBannerImgName.textContent = ImgName;
  modalBannerId.value = id_banner;

  const ImgNamePreview = '../../assets/images/banners/' + ImgName;
  console.log(ImgNamePreview);
  modalBannerImg= ImgNamePreview;

  modalBannerTitle.value += title;
  modalBannerDescription.value += description;

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

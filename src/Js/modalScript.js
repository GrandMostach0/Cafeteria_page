function openModal(categoria, title, description, price, uri){
    resetearContador();
    var modal = document.getElementById('myModal');
    var modalCategory = document.getElementById('modal_categoria');
    var modalTitle = document.getElementById('modal_title');
    var modalDescription = document.getElementById('modal_description');
    var modalPrice = document.getElementById('modal_price');
    var modalImage = document.getElementById('modal_image');

    modalCategory.textContent = categoria;
    modalTitle.textContent = title;
    modalDescription.textContent = description;
    var precioEntero = parseInt(price);
    modalPrice.textContent = "Precio Unitario: " + precioEntero;

    modalImage.src = uri;

    modal.style.display = "block";
}

//Modal para los usuarios
function openModalUser(nombre, apellido, correo, contrasenia, rol){
    
    clearModalInputs();
    
    var modal = document.getElementById('myModal');
    var modal_nombre = document.getElementById('modal_nombre');
    var modal_apellido = document.getElementById('modal_apellido');
    var modal_correo = document.getElementById('modal_correo');
    var modal_contrasena = document.getElementById('modal_contrasenia');
    var modal_rol = document.getElementById('modal_rol');

    modal_nombre.value += nombre;
    modal_apellido.value += apellido;
    modal_correo.value += correo;
    modal_contrasena.value += contrasenia;
    
     // Establecer el valor seleccionado del elemento <select> modal_rol
    modal_rol.value = rol;

    console.log(rol);

    modal.style.display = "block";
}

//Modal para los productos
function openModalProduct(){
    var modal = document.getElementById('myModal');
    var modal_title = document.getElementById('modal_title');
    var modal_description = document.getElementById('modal_description');
    var modal_price = document.getElementById('modal_price');
    var modal_descuento = document.getElementById('modal_descuento');
    var modal_categoria = document.getElementById('modal_categoria');
    var modal_image = document.getElementById('modal_image');

    modal.style.display = "block";
}


//Funcion para resetear los valores de los inputs
function clearModalInputs() {
    var modal = document.getElementById('myModal');
    var inputs = modal.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');
    
    inputs.forEach(function(input) {
        input.value = '';
    });
}

//Funcion para cerrar el modal
function closeModal(){
    var modal = document.getElementById('myModal');
    modal.style.display = "none";
}

//Funcion para Resetear Contador
function resetearContador() {
    var cantidadElement = document.getElementById('cantidad');
    cantidadElement.textContent = '1'; // Reiniciar contador a cero
}
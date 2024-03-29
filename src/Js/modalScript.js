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

function openModal(){
    var modal = document.getElementById('myModal');

    modal.style.display = "block";
}

function closeModal(){
    var modal = document.getElementById('myModal');
    modal.style.display = "none";
}

function resetearContador() {
    var cantidadElement = document.getElementById('cantidad');
    cantidadElement.textContent = '1'; // Reiniciar contador a cero
}
function openModal(producto){
    var modal = document.getElementById('myModal');
    var modalTitle = document.getElementById('modal_title');
    var modalDescription = document.getElementById('modal_description');
    var modalPrice = document.getElementById('modal_price');

    modal.style.display = "block";
}

function closeModal(){
    var modal = document.getElementById('myModal');
    modal.style.display = "none";
}
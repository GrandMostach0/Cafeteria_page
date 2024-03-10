function filtrarProductos(categoria, elementoClic) {
    var cards = document.querySelectorAll('.cards-productos');
    var opcionesMenu = document.querySelectorAll('.opcion-menu');

    cards.forEach(function (card) {
        var categoriaProducto = card.getAttribute('data-categoria').toLowerCase();
        var visible = (categoria === 'todos' || categoria === categoriaProducto);
        card.style.display = visible ? 'block' : 'none';
    });

    opcionesMenu.forEach(function (opcion) {
        opcion.classList.remove('selected');
    });

    elementoClic.classList.add('selected');
}



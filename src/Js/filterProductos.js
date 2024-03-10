function filtrarProductos(categoria) {
        // Obtén todos los elementos de tarjetas de productos
        var cards = document.querySelectorAll('.cards-productos');

        // Itera sobre cada tarjeta y muestra/oculta según la categoría seleccionada
        cards.forEach(function (card) {
            var categoriaProducto = card.getAttribute('data-categoria').toLowerCase();
            var visible = (categoria === 'todos' || categoria === categoriaProducto);
            card.style.display = visible ? 'block' : 'none';
        });
    }
function filtrarProductos(categoria, link) {
  var cards = document.querySelectorAll(".cards-productos");
  var menuLinks = document.querySelectorAll(".menu-productos a");

  // Remover la clase active-option de todos los enlaces del menú
  menuLinks.forEach(function (menuLink) {
    menuLink.classList.remove("active-option");
  });

  // Agregar la clase active-option al enlace seleccionado
  link.classList.add("active-option");

  // Filtrar productos como lo hiciste antes
  cards.forEach(function (card) {
    var categoriaProducto = card.getAttribute("data-categoria").toLowerCase();
    var visible = categoria === "todos" || categoria === categoriaProducto;
    card.style.display = visible ? "block" : "none";
  });
}

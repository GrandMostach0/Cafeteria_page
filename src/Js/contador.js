function inicializarContador() {
    // Obtener elementos
    var btnRestar = document.getElementById('restar');
    var btnSumar = document.getElementById('sumar');
    var cantidadElement = document.getElementById('cantidad');

    // Inicializar
    var cantidad = 1;

    function restablecer(){
        cantidad = 1;
    }

    //actualizar la cantidad
    function actualizarCantidad() {
        cantidadElement.textContent = cantidad;
    }

    // Event para el botón de restar
    btnRestar.addEventListener('click', function() {
        if (cantidad > 0) {
            cantidad--;
            actualizarCantidad();
        }
        console.log('Actualizado');
    });

    // Event para el botón de sumar
    btnSumar.addEventListener('click', function() {
        cantidad++;
        actualizarCantidad();
    });

    // Inicializar la cantidad la página
    actualizarCantidad();
}

// Evento que se dispara cuando el DOM se carga completamente
document.addEventListener('DOMContentLoaded', function () {
    inicializarContador();
});
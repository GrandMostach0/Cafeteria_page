document.addEventListener("DOMContentLoaded", function () {
    var menuLinks = document.querySelectorAll('.menu-options a');

    menuLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            var targetId = this.getAttribute('href').substring(1);
            var targetElement = document.getElementById(targetId);

            // Obtener la posición del elemento y ajustar el desplazamiento
            var offset = 100; // Cambia este valor según lo que necesites
            var elementPosition = targetElement.getBoundingClientRect().top + window.scrollY;
            var offsetPosition = elementPosition - offset; // Restar el desplazamiento deseado

            // Realizar el desplazamiento suave
            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var menuLinks = document.querySelectorAll('.menu-options a');

    menuLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            var targetId = this.getAttribute('href').substring(1);
            var targetElement = document.getElementById(targetId);

            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'error',
        title: 'Credenciales inválidas',
        text: 'Las credenciales proporcionadas no son válidas',
        confirmButtonText: 'Aceptar'
    }).then(() => {
        // Redirigir al usuario después de cerrar la notificación
        window.location.href = 'pages/LogIn.php';
    });
});
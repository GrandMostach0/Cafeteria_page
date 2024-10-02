<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlaceAndDelirios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--Libreria de las alertas-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="./src/styles/carritoCompras.css">

    <script src="src/Js/smooth-Scroll.js"></script>
    <script src="src/Js/filterProductos.js"></script>

</head>
<body>

    <!--Seccion de menu-->
    <?php
        require './src/conexion.php';
        include './src/components/navBar.php';
        include './src/components/carritoSeccion.php'
    ?>
    
    <!--Banner de Inicio-->
    <main class="container-banner">
        <img class="logo_banner" src="src/assets/images/bannerCafe.png" alt="">
        <div class="container-banner-text">
            <h1 class="title container-banner-title">Toda nuestra tradición hasta tu hogar</h1>
            <p class="parrafos">¡La <strong>calidad que te ha enamorado</strong> ahora puedes disfrutarla en donde estés!</p>
            <a class="btn-a" href="#productos">Disfrutar Ahora</a>
        </div>
    </main>

    <!--Secciones de las cartas de presentacion/slider-->
    <?php 
        include 'src/components/SwipperBanners.php';
    ?>

    <!--Secion de los productos-->
    <div id="productos" class="container-productos">
        <h2 class="titleProductos"><strong style="color: rgb(188, 177, 163);">Weekend</strong> productos especiales</h2>
        <p class="subtitle">
            Checa nuestros productos diarios especiales que puedes comprar con el <strong>¡¡%20 de Descuento!!</strong>
        </p>

        <div class="menu-productos">
            <a href="#" onclick="filtrarProductos(event, 'todos', this)" class="opcion-menu">Todos</a>
            <a href="#" onclick="filtrarProductos(event, 'bebidas', this)" class="opcion-menu">Bebidas</a>
            <a href="#" onclick="filtrarProductos(event, 'cafes', this)" class="opcion-menu">Cafés</a>
            <a href="#" onclick="filtrarProductos(event, 'chocolate', this)" class="opcion-menu">Chocolate</a>
            <a href="#" onclick="filtrarProductos(event, 'frapes', this)" class="opcion-menu">Frapés</a>
            <a href="#" onclick="filtrarProductos(event, 'pasteleria', this)" class="opcion-menu">Pastelería</a>
        </div>

        <div class="container-cards-productos">

        <?php 
            $productos = "SELECT productos.*, producto_categorias.category_name AS producto_categoria FROM productos INNER JOIN producto_categorias ON producto_category = producto_categorias.category_id;";
            $resultado = mysqli_query($conectar, $productos);

            while ($row = mysqli_fetch_assoc($resultado)) {
                $offerta = $row['producto_offert'];
                $offerta = $offerta / 100;
                $priceOffert = $row['producto_price'] * $offerta;
                $priceTotal = round($row['producto_price'] - $priceOffert);
        ?>

            <div class="cards-productos" data-categoria="<?php echo $row['producto_categoria']; ?>"
            onclick="openModal(
                '<?php echo $row['producto_categoria']; ?>',
                '<?php echo $row['producto_title']; ?>',
                '<?php echo $row['producto_description']; ?>',
                '<?php echo $priceTotal; ?>',
                '<?php echo $row['producto_url']; ?>')">
                <div class="card-productos-img">
                    <img loading="lazy" src="<?php echo $row['producto_url']; ?>" alt="imagenProducto">
                    <p class="offert">% <?php echo $row['producto_offert']?></p>
                </div>
                <div class="card-productos-text">
                    <p class="title-producto">
                        <?php echo $row['producto_title']?>
                    </p>
                    <p class="price-producto">
                        <span class="price-producto-minus">$<?php echo $row['producto_price']?></span>
                        <?php
                            echo '$' . $priceTotal;
                        ?>
                    </p>
                    <div class="card-producto-description">
                        <p class="description-producto">
                        <p><strong>Descripcion:</strong></p>
                        <?php echo $row['producto_description']; ?>
                        </p>
                    </div>
                    <div class="options-producto">
                        <button onclick="incrementarCantidad()" class="agregar-carrito">
                            Agregar al carrito +
                        </button>
                    </div>
                </div>
            </div>

            <?php
                //liberando los datos
                }
                mysqli_free_result($resultado);
            ?>

            <!----Modal para mostrar el carrito---->
            <?php 
                include 'src/components/modalProducto.php';
            ?>
        </div>
    </div>
    
    <!--Seccion de Acerca de nosotros-->
    <div id="nosotros" class="container-aboutUs">
        <?php 
            include 'src/components/AboutUs.php';
        ?>
    </div>

    <!--Seccion de la ubicacion-->
    <div id="ubicacion" class="container-Ubicacion">
        <?php
            include 'src/components/ubicacion.php';
        ?>
    </div>
    
    <!--Separador del container del horario-->
    <div id="horario" class="container-horario horario" style="text-align: center;">
        <h2 class="titleProductos" style="font-weight: bold;">Horario de Atención</h2>
        <br>
        <p class="subParrafo">
            De Lunes a Domingo Entregas de 8:00 am a 9:00 pm (Pedidos fuera de horario se tomarán para el día siguiente).
        </p>
    </div>

    <!--Footer de la pagina-->
    <?php 
    include './src/components/footer.php';
    ?>

    <!--Secciones de las scripts necesarias como por ejemplo el del swiper-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="src/Js/script.js"></script>
    <script src="./src/Js/contador.js"></script>

    <!----Script seleccionar por defecto un opcion del menu---->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var opcionTodos = document.querySelector('.opcion-menu.selected');
            if (!opcionTodos) {
                var opcionTodos = document.querySelector('.opcion-menu');
                opcionTodos.classList.add('selected');
            }
        });
    </script>

    <!---Script para mostrar la alerta agregado --->
    <script>
        // Obtener todos los botones "Agregar al carrito"
        var botonesAgregar = document.querySelectorAll('.agregarCarrito');

        // Agregar un evento click a cada botón
        botonesAgregar.forEach(function(boton) {
            boton.addEventListener('click', function() {
                // Mostrar una notificación de SweetAlert2 cuando se hace clic en el botón
                Swal.fire({
                    icon: 'success',
                    title: 'Producto Agregado',
                    text: 'El producto ha sido agregado al carrito',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if(result.isConfirmed){
                        closeModal();
                    }
                });
            });
        });
    </script>
    
    <!--Script para mostrar el modal---->
    <script src="src/Js/modalScript.js"></script>

</body>
</html>
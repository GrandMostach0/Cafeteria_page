<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="index.css">

</head>
<body>

    <!--Seccion de menu-->
    <?php
        include './src/components/navBar.php';
    ?>
    
    <!--Banner de Inicio-->
    <main class="container-banner">
        <img class="logo_banner" src="src/assets/images/bannerCafe.png" alt="">
        <div class="container-banner-text">
            <h1 class="title container-banner-title">Toda nuestra tradición hasta tu hogar</h1>
            <p class="parrafos">¡La <strong>calidad que te ha enamorado</strong> ahora puedes disfrutarla en donde estés!</p>
            <a class="btn-a" href="">Disfrutar Ahora</a>
        </div>
    </main>

    <!--Secciones de las cartas de presentacion/slider-->
    <div class="swiper mySwiper container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="src/assets/images/bannerMarque1.png" alt="img1">
                <div class="swiper-text">
                    <h2>Nuestra Especialidad la chocolateria</h2>
                    <p>En <strong>Placer & Delorio</strong> tenemos el propósito de rescatar las tradiciones yucatecas a través de las bebidas de chocolates así como las variadades
                    de produtos que nos ofrece el árbol de cacao.</p>
                </div>
            </div>

            <div class="swiper-slide">
                <img src="src/assets/images/bannerMarque2.png" alt="img1">
                <div class="swiper-text">
                    <h2>Nuestra Especialidad la chocolateria</h2>
                    <p>En <strong>Placer & Delorio</strong> tenemos el propósito de rescatar las tradiciones yucatecas a través de
                        las bebidas de chocolates así como las variadades
                        de produtos que nos ofrece el árbol de cacao.</p>
                </div>
            </div>

            <div class="swiper-slide">
                <img src="src/assets/images/bannerMarque3.png" alt="img1">
                <div class="swiper-text">
                    <h2>Nuestra Especialidad la chocolateria</h2>
                    <p>En <strong>Placer & Delorio</strong> tenemos el propósito de rescatar las tradiciones yucatecas a través de
                        las bebidas de chocolates así como las variadades
                        de produtos que nos ofrece el árbol de cacao.</p>
                </div>
            </div>

            <div class="swiper-slide">
                <img src="src/assets/images/bannerMarque1.png" alt="img1">
                <div class="swiper-text">
                    <h2>Nuestra Especialidad la chocolateria</h2>
                    <p>En <strong>Placer & Delorio</strong> tenemos el propósito de rescatar las tradiciones yucatecas a través de
                        las bebidas de chocolates así como las variadades
                        de produtos que nos ofrece el árbol de cacao.</p>
                </div>
            </div>
            
            <div class="swiper-slide">
                <img src="src/assets/images/bannerMarque2.png" alt="img1">
                <div class="swiper-text">
                    <h2>Nuestra Especialidad la chocolateria</h2>
                    <p>En <strong>Placer & Delorio</strong> tenemos el propósito de rescatar las tradiciones yucatecas a través de
                        las bebidas de chocolates así como las variadades
                        de produtos que nos ofrece el árbol de cacao.</p>
                </div>
            </div>
            
            <div class="swiper-slide">
                <img src="src/assets/images/bannerMarque3.png" alt="img1">
                <div class="swiper-text">
                    <h2>Nuestra Especialidad la chocolateria</h2>
                    <p>En <strong>Placer & Delorio</strong> tenemos el propósito de rescatar las tradiciones yucatecas a través de
                        las bebidas de chocolates así como las variadades
                        de produtos que nos ofrece el árbol de cacao.</p>
                </div>
            </div>

        </div>
    </div>

    <!--Secion de los productos-->
    <div id="productos" class="container-productos">
        <h2 class="titleProductos"><strong style="color: rgb(188, 177, 163);">Weekend</strong> productos especiales</h2>
        <p class="subtitle">
            Checa nuestros productos diarios especiales que puedes comprar con el <strong>¡¡%20 de Descuento!!</strong>
        </p>

        <div class="menu-productos">
            <a href="">Bebidas</a>
            <a href="">Cafes</a>
            <a href="">Chocolate</a>
            <a href="">Frapes</a>
            <a href="">Pasteleria</a>
        </div>

        <div class="container-cards-productos">
            <div class="cards-productos">
                <div class="card-productos-img">
                    <img src="src/assets/images/cafe1.png" alt="imagenProducto">
                    <p class="offert">%20</p>
                </div>
                <div class="card-productos-text">
                    <p class="title-producto">Miele CM6 Thermal Carafe</p>
                    <p class="price-producto">
                        <span class="price-producto-minus">$34</span>
                        $12
                    </p>
                    <p class="description-producto">
                        Cacao puro mezclado con especias (canela, romero, anavís, clavo, pimienta, chile, vanilla...)
                    </p>
                    <div class="options-producto">
                        <p>Agregar al carrito +</p>
                        <img class="svgCorazon" src="src/assets/icons/HeartIcon.svg" alt="HeartIcon">
                    </div>
                </div>
            </div>

            <div class="cards-productos">
                <div class="card-productos-img">
                    <img src="src/assets/images/cafe1.png" alt="imagenProducto">
                    <p class="offert">%20</p>
                </div>
                <div class="card-productos-text">
                    <p class="title-producto">Miele CM6 Thermal Carafe</p>
                    <p class="price-producto">
                        <span class="price-producto-minus">$34</span>
                        $12
                    </p>
                    <p class="description-producto">
                        Cacao puro mezclado con especias (canela, romero, anavís, clavo, pimienta, chile, vanilla...)
                    </p>
                    <div class="options-producto">
                        <p>Agregar al carrito +</p>
                        <img src="src/assets/icons/HeartIcon.svg" alt="HeartIcon">
                    </div>
                </div>
            </div>

            <div class="cards-productos">
                <div class="card-productos-img">
                    <img src="src/assets/images/cafe1.png" alt="imagenProducto">
                    <p class="offert">%20</p>
                </div>
                <div class="card-productos-text">
                    <p class="title-producto">Miele CM6 Thermal Carafe</p>
                    <p class="price-producto">
                        <span class="price-producto-minus">$34</span>
                        $12
                    </p>
                    <p class="description-producto">
                        Cacao puro mezclado con especias (canela, romero, anavís, clavo, pimienta, chile, vanilla...)
                    </p>
                    <div class="options-producto">
                        <p>Agregar al carrito +</p>
                        <img class="iconHeart" src="src/assets/icons/HeartIcon.svg" alt="HeartIcon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--Seccion de Acerca de nosotros-->
    <div id="nosotros" class="container-aboutUs">
        <h2 class="titleProductos" style="font-weight: bold;">Acerca de Nosotros</h2>
        <div class="about">
            <div class="about-text">
                <h2>Acerca de Placer & Delirio</h2>
                <br>
                <p>La historia de nuestras recetas está íntimamente ligada a la historia de la península de Yucatán. Todo comenzó en
                    1848,
                    cuando en plena guerra de castas muchas familias del interior del estado fueron llegando a la ciudad de Mérida
                    huyendo
                    para salvar sus vidas.</p>
                <br>
                <p>La población de la ciudad creció desmedidamente y los alimentos comenzaron a escasear, la panadería y repostería
                    tuvo un
                    gran impacto por la falta de insumos, los ingredientes de origen europeo se iban cambiando por los que se
                    producían en
                    Yucatán como la pepita de calabaza, harina de ramón, el cacahuate, miel, la canela del cuyo, cacao, etc. dando
                    origen a
                    una nueva repostería como nunca antes se había preparado.</p>
                <br>
                <p>Ahora nos enorgullece como yucatecos poder traer de vuelta estas recetas que llenaron de placer y delirio a los
                    yucatecos del siglo XIX, sabores que nuestras generaciones no conocen pero que estamos reviviendo con la más
                    grandiosa
                    aventura de gastronomía histórica y artesanal de nuestra península.</p>
            </div>
            <img src="src/assets/images/guerra_uno_480x480.webp" alt="guerra uno">
        </div>
        <!--Incrustacion del video -->
        <br>
        <div class="vide-separador">
            <iframe class="videoStyles" src="https://www.youtube.com/embed/df3JeXVWYWA" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
    </div>

    <!--Seccion de la ubicacion-->
    <div id="ubicacion" class="container-Ubicacion">
        <h2 class="titleProductos" style="font-weight: bold;">Ubicación</h2>
        <br>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.570219003467!2d-89.63340292512652!3d20.96976778980286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f5673dc3de206bd%3A0x82c2a803a8e7da7d!2sPlacer%20%26%20Delirio!5e0!3m2!1ses-419!2smx!4v1686072020422!5m2!1ses-419!2smx"
            allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="mapStyles">
        </iframe>
        <br>
        <p style="font-style: italic;">C. 59 572, entre 72 Y 74, Parque Santiago, Centro, 97000 Mérida, Yuc.</p>
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

    <!--Secciones de las scripts necesarias por cierto-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="src/Js/script.js"></script>
</body>
</html>
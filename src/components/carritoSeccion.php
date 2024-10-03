<!----Contenedor del carrito---->
<div id="cart">
    <button class="close-cart-count" onclick="toggleCart()">
        &#x2190; Seguir Comprando
    </button>
    <br>
    <h2>Carrito: </h2>
    <ul id="cart-items"></ul>
    <div class="total">
        <hr>
        Total: $<span id="cart-total">0.00</span>
        <br>
        <button onclick="finalizarCompra()">FINALIZAR COMPRA</button>
    </div>
</div>

<script>
    // Variables globales
    let cart = [];
    let cartTotal = 0;
    let cartCount = 0;

    // Función para alternar el carrito
    function toggleCart() {
        const cartElement = document.getElementById('cart');
        const overlay = document.getElementById('cart-overlay');
        cartElement.classList.toggle('active');
        overlay.classList.toggle('active');
    }

    // Función para agregar productos al carrito
    function addToCart(id, nombre, precioTotal, descripcion, cantidad) {
        // Verifica si el producto ya está en el carrito
        const itemExistente = cart.find(item => item.id === id);

        if (itemExistente) {
            // Si el producto ya existe, solo incrementa la cantidad
            itemExistente.cantidad += cantidad;
            cartTotal += precioTotal * cantidad;
            cartCount += cantidad;
        } else {
            // Si es un nuevo producto, lo agrega al carrito
            cart.push({ id, nombre, precioTotal, descripcion, cantidad });
            cartTotal += precioTotal * cantidad;
            cartCount += cantidad;
        }

        // Actualizar la interfaz
        document.getElementById('cart-count').textContent = cartCount;
        document.getElementById('cart-total').textContent = cartTotal.toFixed(2);
        renderCartItems();
    }

    // Función para actualizar la cantidad de productos y eliminar si es necesario
    function updateCartItem(id, increment) {
        cart = cart.filter(item => {
            if (item.id === id) {
                const nuevaCantidad = item.cantidad + increment;
                if (nuevaCantidad > 0) {
                    item.cantidad = nuevaCantidad;
                    cartTotal += item.precioTotal * increment;
                    cartCount += increment;
                    return true; // Mantener el producto en el carrito
                } else {
                    // Si la cantidad es 0 o menor, eliminar el producto
                    cartTotal -= item.precioTotal * item.cantidad;
                    cartCount -= item.cantidad;
                    return false; // Eliminar el producto del carrito
                }
            }
            return true; // Mantener los otros productos
        });

        // Actualizar la interfaz
        document.getElementById('cart-count').textContent = cartCount;
        document.getElementById('cart-total').textContent = cartTotal.toFixed(2);
        renderCartItems();
    }

    // Renderizar los productos en el carrito
    function renderCartItems() {
        const cartItems = document.getElementById('cart-items');
        cartItems.innerHTML = ''; // Limpiar antes de renderizar

        cart.forEach(item => {
            const li = document.createElement('li');
            li.classList.add('item-container');
            const divDescripcion = document.createElement('div');
            divDescripcion.classList.add('item-container-informatio', 'container-descripcion');
            const pNombre = document.createElement('p');
            const pPrecio = document.createElement('p');

            const divCantidad = document.createElement('div');

            divCantidad.classList.add('item-container-informatio', 'container-cantidad');
            const pCantidad = document.createElement('p');
            const btnMas = document.createElement('button');
            const btnMenos = document.createElement('button');

            btnMas.classList.add('btn-cantidad');
            btnMenos.classList.add('btn-cantidad');
            pNombre.classList.add('font-bold');
            pCantidad.classList.add('font-bold');

            pNombre.textContent = `${item.nombre}`;
            pPrecio.textContent = `$${item.precioTotal.toFixed(2)}`;
            pCantidad.textContent = `${item.cantidad}`;
            btnMas.textContent = "+";
            btnMenos.textContent = "-";

            // Añadir funcionalidad a los botones de sumar y restar
            btnMas.addEventListener('click', function () {
                updateCartItem(item.id, 1); // Sumar 1 al producto
            });

            btnMenos.addEventListener('click', function () {
                updateCartItem(item.id, -1); // Restar 1 al producto, eliminar si llega a 0
            });

            cartItems.appendChild(li);

            li.appendChild(divDescripcion);
            li.appendChild(divCantidad);

            divDescripcion.appendChild(pNombre);
            divDescripcion.appendChild(pPrecio);

            divCantidad.appendChild(btnMenos);
            divCantidad.appendChild(pCantidad);
            divCantidad.appendChild(btnMas);
        });
    }

    function finalizarCompra(){
        localStorage.removeItem('carrito');
    }
</script>
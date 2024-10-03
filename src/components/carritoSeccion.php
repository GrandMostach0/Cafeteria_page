
<!----Contenedor del carrito---->
<div id="cart">
    <button class="close-cart-count" onclick="toggleCart()">
        &#x2190; Seguir Comprando
    </button>
    <br>
    <h2>Tu carrito</h2>
    <ul id="cart-items"></ul>
    <div class="total">
        Total: $<span id="cart-total">0.00</span>
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
        // Agregar producto al carrito
        cart.push({id, nombre, precioTotal, descripcion, cantidad});
        cartTotal += precioTotal;
        cartCount += cantidad;

        //Actualizar la interfaz
        document.getElementById('cart-count').textContent = cartCount;
        document.getElementById('cart-total').textContent = cartTotal.toFixed(2);
        renderCartItems();
    }

    // Renderizar los productos en el carrito
    function renderCartItems() {
        const cartItems = document.getElementById('cart-items');
        cartItems.innerHTML = ''; // Limpiar antes de renderizar

        cart.forEach(item => {
            const li =document.createElement('li');
            li.classList.add('item-container');
            li.textContent = `${item.cantidad}x ${item.nombre} - ${item.precioTotal.toFixed(2)} - ${item.descripcion}`;
            cartItems.appendChild(li);
        });
    }
</script>

<!----Contenedor del carrito---->
<div id="cart">
    <button class="close-cart-count" onclick="toggleCart()">
        &#x2190;
    </button>
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

    // Ejemplo de agregar productos al carrito (puedes adaptar esto para que funcione con productos reales)
    function addToCart(id, name, price) {
        // Agregar producto al carrito
        cart.push({ id, name, price });
        cartTotal += price;
        cartCount += 1;

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
            li.textContent = `${item.name} - $${item.price.toFixed(2)}`;
            cartItems.appendChild(li);
        });
    }

    // Ejemplo para agregar un producto al carrito (puedes llamarlo desde botones en tu tienda)
    addToCart(1, 'Producto 1', 10.99);
    addToCart(2, 'Producto 2', 15.49);
    addToCart(2, 'Producto 3', 20.49);
</script>
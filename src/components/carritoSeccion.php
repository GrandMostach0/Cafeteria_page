
<!----Contenedor del carrito---->
<div id="cart">
    <button class="close-cart-count" onclick="toggleCart()">
        &#x2190; Seguir Comprando
    </button>
    <br>
    <h2>Tu carrito</h2>
    <ul id="cart-items">
        <div class="item-description">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut itaque quaerat, ullam tempore ut odio reprehenderit architecto quidem error provident commodi ad, voluptatum necessitatibus similique consectetur magnam nesciunt alias veniam?</p>
        </div>
        <div class="img">
            <img src="" alt="Imagen aqui">
        </div>
    </ul>
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
            li.textContent = `${item.cantidad}x ${item.name} - $${item.totalPrice.toFixed(2)} - ${item.descripcion}`;
            cartItems.appendChild(li);
        });
    }

    // Ejemplo para agregar un producto al carrito (puedes llamarlo desde botones en tu tienda)
    addToCart(1, 'Producto 1', 10.99, "descripcion");
    addToCart(2, 'Producto 2', 15.49, "descripcion");
    addToCart(2, 'Producto 3', 20.49, "descripcion");
    addToCart(3, 'Producto 4', 20.45, "descripcion");
</script>
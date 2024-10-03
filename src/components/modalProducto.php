<div id="myModal" class="modal">
    <div class="modal_content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3 id="modal_categoria">Categoria</h3>
        <div class="modal_content_text">
            <div class="contenidoProducto">
                <h2 id="modal_title">Titulo Producto</h2>
                <div class="modal_cantidad">
                    <p id="cantidad_producto" style="color: #b9a586">Cantidad</p>
                    <div class="contador">
                        <button class="buttonContador" id="restar">-</button>
                        <span id="cantidad">0</span>
                        <button class="buttonContador" id="sumar">+</button>
                    </div>
                </div>
                <p style="color: white" id="modal_price">Precio</p>
                <button class="agregarCarrito">Agregar al carrito ++</button>
                <p style="color: white"><strong>Descripcion</strong></p>
                <p id="modal_description">Descripcion</p>
            </div>
            <div class="imagenProducto">
                <img id="modal_image" src="" alt="Producto de la imagen">
            </div>
        </div>
    </div>
</div>
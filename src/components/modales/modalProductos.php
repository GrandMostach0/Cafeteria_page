<div id="myModal" class="modal">
    <div class="modal_content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3 class="title-modal">Informacion del <strong>Producto</strong></h3>
        <div class="informacion-img">
            <div class="informacion-img-container">
                <img id="imagen" src="../../assets/images/bebida1.png" alt="Imagen Aqui">
            </div>
            <div class="informacion-img-text">
                <p class="title-content">Nombre Imagen:</p>
                <p id="modal_producto_img_name">SIN DATOS</p>
                <br>
                <p class="title-content">Cambiar Imagen:</p>
                <input id="modal_producto_img_file" type="file">
            </div>
        </div>
        <div class="informacion">
            <div class="informacion-contenido-group">
                <label for="Producto">Nombre Producto:</label>
                <input id="modal_producto_name" type="text" placeholder="Nombre Producto" name="Proucto">
            </div>
            <div class="informacion-contenido-group">
                <p class="title-content">Descipcion:</p>
                <textarea placeholder="Descripcion del producto" name="descripcion"
                    id="modal_producto_description"></textarea>
            </div>
            <div class="informacion-contenido-group group-price">
                <!----Precio del producto ----->
                <div class="contenido-price">
                    <p class="title-content">Precio: </p>
                    <input id="modal_producto_price" class="content-content" type="number" placeholder="$10"
                        oninput="actualizarPrecioFinal()">
                </div>

                <!----Precio del producto con descuento ----->
                <div class="contenido-price">
                    <p class="title-content">Descuento: </p>
                    <input id="modal_producto_offert" class="content-content" type="number" placeholder="20%"
                        oninput="actualizarPrecioFinal()">
                </div>

                <!---- Precio final de venta ----->
                <div class="contenido-price">
                    <p class="title-content" style="text-align: center;">Precio Final: </p>
                    <p id="modal_producto_price_final" style="text-align: center;" class="content-content">$100</p>
                </div>
            </div>
            <div class="informacion-contenido-group">
                <label for="Rol">Categoria:</label>
                <select name="Rol" id="modal_producto_category">
                    <option value="0">Seleccione</option>
                    <option value="1">Bebidas</option>
                    <option value="2">Cafes</option>
                    <option value="3">Chocolate</option>
                    <option value="4">Frapes</option>
                    <option value="5">Pasteleria</option>
                </select>
            </div>
        </div>
        <div class="informacion-botones">
            <button class="btn-Agregar" onclick="#">Guardar</button>
            <button class="btn-Eliminar" onclick="closeModal()">Cancelar</button>
        </div>
    </div>
</div>
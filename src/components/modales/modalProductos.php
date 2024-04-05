<div id="myModal" class="modal">
    <div class="modal_content">
        <form id="productForm" action="agregarProducto.php" method="POST" enctype="multipart/form-data">
             <span class="close" onclick="closeModal()">&times;</span>
            <h3 class="title-modal">Informacion del <strong>Producto</strong></h3>
            <div class="informacion-img">
                <input type="hidden" id="modal_productID" name="idProducto">
                <div class="informacion-img-container">
                    <img id="imagen" src="../../assets/images/bebida1.png" alt="Imagen Aqui">
                </div>
                <div class="informacion-img-text">
                    <p class="title-content">Nombre Imagen:</p>
                    <p id="modal_producto_img_name">SIN DATOS</p>
                    <br>
                    <p class="title-content">Cambiar Imagen:</p>
                    <input name="modal_producto_img_file" id="modal_producto_img_file" type="file">
                </div>
            </div>
            <div class="informacion">
                <div class="informacion-contenido-group">
                    <label for="Producto">Nombre Producto:</label>
                    <input id="modal_producto_name" type="text" placeholder="Nombre Producto" name="nombreProducto">
                </div>
                <div class="informacion-contenido-group">
                    <p class="title-content">Descipcion:</p>
                    <textarea placeholder="Descripcion del producto" name="descripcionProducto" id="modal_producto_description"></textarea>
                </div>
                <div class="informacion-contenido-group group-price">
                    <div class="contenido-price">
                        <p class="title-content">Precio: </p>
                        <input id="modal_producto_price" class="content-content" type="number" placeholder="$10" name="precioProducto" oninput="actualizarPrecioFinal()">
                    </div>
                    <div class="contenido-price">
                        <p class="title-content">Descuento: </p>
                        <input id="modal_producto_offert" class="content-content" type="number" placeholder="20%" name="ofertaProducto" oninput="actualizarPrecioFinal()">
                    </div>
                    <div class="contenido-price">
                        <p class="title-content" style="text-align: center;">Precio Final: </p>
                        <p id="modal_producto_price_final" style="text-align: center;" class="content-content">$0</p>
                    </div>
                </div>
                <div class="informacion-contenido-group">
                    <label for="Rol">Categoria:</label>
                    <select name="categoriaProducto" id="modal_producto_category">
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
                <button type="submit" class="btn-Agregar">Guardar</button>
                <button type="button" class="btn-Eliminar" onclick="closeModal()">Cancelar</button>
            </div>
        </form>
    </div>
</div>
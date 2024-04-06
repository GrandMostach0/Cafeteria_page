<div id="myModal" class="modal">
    <div class="modal_content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3 class="title-modal">Informacion <strong>Banners</strong></h3>
        <div class="banner_container">
            <div class="banner_container_Img">
                <input type="hidden" id="modal_bannerID" name="bannerID">
                <img id="modal_banner_img" src="../../assets/images/bebida1.png" alt="Imagen Aqui">

                <p class="title-content">Nombre Imagen:</p>
                <p id="modal_banner_img_name">Bebida1.png</p>
                <br>
                <p class="title-content">Cambiar Imagen:</p>
                <input id="modal_banner_img_file" type="file">
            </div>
            <div class="informacion-contenido-group banner_container_text">
                <p class="title-content">Titulo Banner:</p>
                <input type="text" id="modal_banner_title">
                <p class="title-content">Descripcion Banner:</p>
                <textarea class="textDescripcion" name="modal_banner_description"
                    id="modal_banner_description"></textarea>
            </div>
        </div>
        <div class="informacion-botones">
            <button class="btn-Agregar" onclick="guardarCambios()">Guardar</button>
            <button class="btn-Eliminar" onclick="closeModal()">Cancelar</button>
        </div>
    </div>
</div>
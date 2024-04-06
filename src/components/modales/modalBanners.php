<div id="myModal" class="modal">
    <div class="modal_content">
        <form id="BannerForm" action="agregarBanner.php" method="POST" enctype="multipart/form-data">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3 class="title-modal">Informacion <strong>Banners</strong></h3>
            <div class="banner_container">
                <input type="hidden" id="modal_BannerID" name="bannerId">
                <div class="banner_container_Img">
                    <img id="modal_banner_img" src="../../assets/images/bebida1.png" alt="Imagen Aqui">

                    <p class="title-content">Nombre Imagen:</p>
                    <p id="modal_banner_img_name">Bebida1.png</p>
                    <br>
                    <p class="title-content">Cambiar Imagen:</p>
                    <input name="modal_banner_img_file" id="modal_banner_img_file" type="file">
                </div>
                <div class="informacion-contenido-group banner_container_text">
                    <p class="title-content">Titulo Banner:</p>
                    <input type="text" name="banner_title" id="modal_banner_title" placeholder="Banner" required>
                    <p class="title-content">Descripcion Banner:</p>
                    <textarea class="textDescripcion" name="banner_description"
                        id="modal_banner_description" placeholder="Text..." required></textarea>
                </div>
            </div>
            <div class="informacion-botones">
                <button type="submit" class="btn-Agregar">Guardar</button>
                <button type="button" class="btn-Eliminar" onclick="closeModal()">Cancelar</button>
            </div>
        </form>
    </div>
</div>
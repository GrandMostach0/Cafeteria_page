<div id="myModal" class="modal">
    <div class="modal_content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3 class="title-modal">Informacion del <strong>Usuario</strong></h3>
        <div class="informacion">
            <p id="modal_userID"></p>
            <div class="informacion-contenido-group">
                <label for="Nombre">Nombre:</label>
                <input id="modal_nombre" type="text" placeholder="Nombre..." name="Nombre" required>
            </div>
            <div class="informacion-contenido-group">
                <label for="Apellido">Apellido:</label>
                <input id="modal_apellido" type="text" placeholder="Apellido..." name="Apellido" required>
            </div>
            <div class="informacion-contenido-group">
                <label for="Correo">Correo electrónico:</label>
                <input id="modal_correo" type="email" placeholder="correo@gmail.com" name="Correo" required>
            </div>
            <div class="informacion-contenido-group">
                <label for="contrasenia">Contraseña:</label>
                <input id="modal_contrasenia" type="password" placeholder="password..." name="contrasenia" required>
            </div>
            <div class="informacion-contenido-group">
                <label for="Rol">Rol:</label>
                <select name="Rol" id="modal_rol">
                    <option value="0">Seleccione</option>
                    <option value="1">Usuario</option>
                    <option value="2">Administrador</option>
                    <option value="3">Invitado</option>
                </select>
            </div>
        </div>
        <div class="informacion-botones">
            <button class="btn-Agregar" onclick="guardarCambios()">Guardar</button>
            <button class="btn-Eliminar" onclick="closeModal()">Cancelar</button>
        </div>
    </div>
</div>
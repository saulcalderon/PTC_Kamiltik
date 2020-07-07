<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar facturas');
?>
<div class="padd-15">
    <div class="row">
        <!-- Formulario de búsqueda -->
        <form method="post" id="search-form">
            <div class="input-field col s6 m4">
                <i class="material-icons prefix">search</i>
                <input id="search" type="text" name="search" />
                <label for="search">Buscador</label>
            </div>
            <div class="input-field col s6 m4">
                <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Buscar"><i class="material-icons">check_circle</i></button>
            </div>
        </form>
        <div class="input-field center-align col s12 m4">
            <!-- Enlace para abrir caja de dialogo (modal) al momento de crear un nuevo registro -->
            <a href="#" onclick="openCreateModal()" class="btn waves-effect indigo tooltipped" data-tooltip="Crear"><i class="material-icons">add_circle</i></a>
        </div>
    </div>

    <table class="highlight padd-15 pagination responsive-table">
        <thead>
            <tr>
                <th>CONTACTO</th>
                <th>EMPRESA</th>
                <th>TELÉFONO</th>
                <th>DEPARTAMENTO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody class="black-text" id="tbody-rows">
        </tbody>
    </table>

    <div class="col-md-12 center text-center">
        <span class="left" id="total_reg"></span>
        <ul class="pagination pager" id="myPager"></ul>
    </div>

    <div id="save-modal" class="modal">
        <div class="modal-content">
            <h4 id="modal-title" class="center-align"></h4>
            <!-- Formulario para crear o actualizar un registro -->
            <form method="post" id="save-form">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input class="hide" type="text" id="id_proveedor" name="id_proveedor" />
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">note_add</i>
                        <input id="nombre_contacto" type="text" name="nombre_contacto" class="validate" required />
                        <label for="nombre_contacto">Nombre</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">note_add</i>
                        <input id="nombre_empresa" type="text" name="nombre_empresa" class="validate" required />
                        <label for="nombre_empresa">Empresa</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">note_add</i>
                        <input id="telefono" type="tel" name="telefono" class="validate" pattern="[0-9]{8}" maxlength="8" required />
                        <label for="telefono">Teléfono</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <select id="departamento" name="departamento">
                        </select>
                        <label>Departamento</label>
                    </div>
                </div>
                <div class="row center-align">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
Dashboard::footerTemplate('proveedores.js');
?>
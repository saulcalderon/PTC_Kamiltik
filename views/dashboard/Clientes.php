<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar clientes');
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
    <!-- Tabla de lectura -->
    <div class="col l8">
        <table class="highlight padd-15 pagination responsive-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th> 
                    <th>Acción</th>
                </tr>
            </thead>

            <tbody class="black-text" id="tbody-rows">

            </tbody>
        </table>
        <div class="col-md-12 center text-center">
            <span class="left" id="total_reg"></span>
            <ul class="pagination pager" id="myPager"></ul>
        </div>
    </div>

    <!-- Componente Modal para mostrar una caja de dialogo -->
    <div id="save-modal" class="modal">
        <div class="modal-content">
            <h4 id="modal-title" class="center-align"></h4>
            <!-- Formulario para crear o actualizar un registro -->
            <form method="post" id="save-form">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input class="hide" type="text" id="id_cliente" name="id_cliente" />
                <div class="row">
                    <!-- Nombre -->
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="nombre" type="text" name="nombre" maxlength="25" class="validate" required />
                        <label for="nombre">Nombres</label>
                    </div>
                    <!-- Apellidos -->
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="apellido" type="text" name="apellido" maxlength="25" class="validate" required />
                        <label for="apellido">Apellidos</label>
                    </div>
                    <!-- Correo -->
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">email</i>
                        <input id="correo" type="email" name="correo" class="validate" required />
                        <label for="correo">Correo</label>
                    </div>
                    <!-- Fecha nacimiento -->
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">calendar_today</i>
                        <input id="fecha" type="date" name="fecha" class="validate"/>
                        <label for="fecha">Nacimiento</label>
                    </div>
                <div class="row center-align">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                </div>
            </form>
        </div>
    </div>

    <?php
    Dashboard::footerTemplate('clientes.js');
    ?>
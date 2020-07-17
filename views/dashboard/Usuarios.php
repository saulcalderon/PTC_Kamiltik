<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar usuarios');
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
    <div class="col l8">
        <table class="highlight pagination responsive-table">
            <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
            <thead>
                <tr>
                    <th>APELLIDOS</th>
                    <th>NOMBRES</th>
                    <th>CORREO</th>
                    <th>TELEFONO</th>
                    <!--<th>CARGO</th>-->
                    <th>ESTADO</th>
                    <th>ACCIÓN</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla para mostrar un registro por fila -->
            <tbody id="tbody-rows">
            </tbody>
        </table>
        <div class="col-md-12 center text-center">
            <span class="left" id="total_reg"></span>
            <ul class="pagination pager" id="myPager"></ul>
        </div>
    </div>
</div>

<!-- Tabla para mostrar los registros existentes -->

<!-- Componente Modal para mostrar una caja de dialogo -->
<div id="save-modal" class="modal">
    <div class="modal-content">
        <h4 id="modal-title" class="center-align"></h4>
        <!-- Formulario para crear o actualizar un registro -->
        <form method="post" id="save-form">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="text" id="id_usuario" name="id_usuario" />
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="nombre" type="text" name="nombre" class="validate" required />
                    <label for="nombre">Nombres</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="apellido" type="text" name="apellido" class="validate" required />
                    <label for="apellido">Apellidos</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input id="correo" type="email" name="correo" class="validate" required />
                    <label for="correo">Correo</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">phone</i>
                    <input id="telefono" type="text" name="telefono" class="validate" required />
                    <label for="telefono">Telefono</label>
                </div>
                <div class="input-filed col s12 m6">
                    <p>
                        <div class="switch">
                            <span>Estado:</span>
                            <label>
                                <i class="material-icons">visibility_off</i>
                                <input id="estado" type="checkbox" name="estado" checked />
                                <span class="lever"></span>
                                <i class="material-icons">visibility</i>
                            </label>
                        </div>
                    </p>
                </div>
                <div class="input-field col s12 m6">
                        <i class="material-icons prefix">time</i>
                        <input id="fecha" type="date" name="fecha" class="validate"/>
                        <label for="fecha">Nacimiento</label>
                    </div>
                <div class="s12 m12">
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">security</i>
                    <input id="clave_usuario" type="password" name="clave_usuario" class="validate" required />
                    <label for="clave_usuario">Clave</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">security</i>
                    <input id="confirmar_clave" type="password" name="confirmar_clave" class="validate" required />
                    <label for="confirmar_clave">Confirmar clave</label>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>

<?php
Dashboard::footerTemplate('usuarios.js');
?>
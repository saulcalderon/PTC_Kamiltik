<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar noticias');
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
                <th>ID</th>
                <!--<th>IMAGEN</th>-->
                <th>TÍTULO</th>
                <th>CONTENIDO</th>
                <th>FECHA</th>
                <th>ESTADO</th>
                <th>ACCIÓN</th>
                <!--<th><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Agregar Producto" href="#modal2"><i class="material-icons green-text text- accent-4">add_box</i></a></th>
                <th><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Buscar" href="#modal3"><i class="material-icons white-text text- accent-4">search</i></a></th>-->
            </tr>
        </thead>

        <tbody id="tbody-rows" class="black-text">
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
            <form method="post" id="save-form" enctype="multipart/form-data">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input class="hide" type="text" id="id_noticia" name="id_noticia" />
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">note_add</i>
                        <input id="titulo" type="text" name="titulo" class="validate" required />
                        <label for="titulo">Título</label>
                    </div>
                    <!--
              	<div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect tooltipped" data-tooltip="Seleccione una imagen de al menos 500x500">
                        <span><i class="material-icons">image</i></span>
                        <input id="archivo_producto" type="file" name="archivo_producto" accept=".gif, .jpg, .png"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path validate" placeholder="Formatos aceptados: gif, jpg y png"/>
                    </div>
                </div>
                -->
                    <div class="input-field col s12 m12">
                        <i class="material-icons prefix">description</i>
                        <input id="contenido" type="text" name="contenido" class="validate" required />
                        <label for="contenido">Contenido Noticia</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">time</i>
                        <input id="fecha" type="date" name="fecha" class="validate"/>
                        <label for="fecha">Fecha de registro</label>
                    </div>
                    <div class="col s12 m6">
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
Dashboard::footerTemplate('noticias.js');
?>
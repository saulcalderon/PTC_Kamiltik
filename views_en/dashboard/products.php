<?php
require_once('../../core/helpers/dashboard_en.php');
Dashboard::headerTemplate('Manage products');
?>
<div class="padd-15">
    <div class="row">
        <!-- Formulario de búsqueda -->
        <form method="post" id="search-form">
            <div class="input-field col s6 m4">
                <i class="material-icons prefix">search</i>
                <input id="search" type="text" name="search" />
                <label for="search">Search</label>
            </div>
            <div class="input-field col s6 m4">
                <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Search"><i class="material-icons">check_circle</i></button>
            </div>
        </form>
        <div class="input-field center-align col s12 m4">
            <!-- Enlace para abrir caja de dialogo (modal) al momento de crear un nuevo registro -->
            <a href="#" onclick="openCreateModal()" class="btn waves-effect indigo tooltipped" data-tooltip="Create"><i class="material-icons">add_circle</i></a>
        </div>
    </div>
    <table class="highlight padd-15 pagination responsive-table">
        <thead>
            <tr>
                <th>ID</th>
                <!--<th>IMAGEN</th>-->
                <th>NAME</th>
                <th>STOCK</th>
                <th>DESCRIPTION</th>
                <th>PRICE (US$)</th>
                <th>CATEGORY</th>
                <th>STATE</th>
                <th>ACTION</th>
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
                <input class="hide" type="text" id="id_producto" name="id_producto" >
                <div class="row">
                    <!-- Campos para ingresar y modificar producto -->
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">category</i>
                        <input id="nombre_producto" type="text" name="nombre_producto" class="validate" maxlength="50" required />
                        <label for="nombre_producto">Name</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">monetization_on</i>
                        <input id="precio_producto" type="number" name="precio_producto" class="validate" max="999.99" min="0.01" step="any" required />
                        <label for="precio_producto">Price (US$)</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">format_list_numbered</i>
                        <input id="existencias_producto" type="number" name="existencias_producto" class="validate" min="1" step="any" required />
                        <label for="existencias_producto">Stock</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">today</i>                 
                        <input disabled id="fecha" type="text" name="fecha">
                        <label for="fecha">Registration date</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">description</i>                   
                        <input id="descripcion_producto" type="text" name="descripcion_producto" class="validate" required />
                        <label for="descripcion_producto">Description</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">local_mall</i>
                        <select id="tipo_producto" name="tipo_producto">
                        </select>
                        <label>Product type</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">store_mall_directory</i>
                        <select id="nombre_sucursal" name="nombre_sucursal">
                        </select>
                        <label>Branch office</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">shopping_basket</i>
                        <select id="estado_producto" name="estado_producto">
                        </select>
                        <label>Product status</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">shopping_basket</i>
                        <select id="estado_distribucion" name="estado_distribucion">
                        </select>
                        <label>Distribution status</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">local_shipping</i>
                        <select id="nombre_proveedor" name="nombre_proveedor">
                        </select>
                        <label>Provider name</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">note_add</i>
                        <select id="documento_compra" name="documento_compra">
                        </select>
                        <label>Purchase document</label>
                    </div>
                    <!-- Imagen -->
                    <div class="file-field input-field col s12 m6">
                        <div class="btn waves-effect tooltipped" data-tooltip="Seleccione una imagen de al menos 500x500">
                            <span><i class="material-icons">image</i></span>
                            <input id="archivo_producto" type="file" name="archivo_producto" accept=".gif, .jpg, .png"/>
                        </div>
                        <div class="file-path-wrapper">
                            <input type="text" class="file-path validate" placeholder="Formatos aceptados: gif, jpg y png"/>
                        </div>
                    </div>
                
                <!-- Botones para aceptar o cancelar -->
                <div class="row center-align col s12 m12">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancel"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Save"><i class="material-icons">save</i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
Dashboard::footerTemplate('products.js');
?>
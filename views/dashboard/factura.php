<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar facturas');
?>
<!-- Contenido principal de factura -->
<div class="padd-15">
    <div class="row">
        <!-- Formulario de búsqueda -->
        <form method="post" id="search-form">
            <div class="input-field col s6 m4">
                <i class="material-icons prefix">search</i>
                <input id="fecha" type="date" name="fecha" class="validate" required />
                <label for="fecha">Buscar por fecha</label>
            </div>
            <div class="input-field col s6 m1">
                <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Buscar"><i class="material-icons">check_circle</i></button>
            </div>

        </form>
        <div class="input-field col s6 m1">
            <a href="" class="btn waves-effect blue tooltipped" data-tooltip="Recargar"><i class="material-icons">refresh</i></a>
        </div>
    </div>
    <!-- Contenedor para crear una factura a partir de una mesa -->
    <div class="card padd-15">
        <h5 class="m-10">Elija una mesa</h5>
        <!-- Formulario con botones para determinar la mesa -->
        <form action="detalle.php" id="factura-mesa">
            <div id="botones-mesa   " class="row">
                <button type="submit" name="boton" value="1" class="btn btn-d waves-effect green mesa tooltipped" data-tooltip="Mesa disponible"><i class="material-icons">local_dining</i>1</button>
                <button type="submit" name="boton" value="2" class="btn btn-d waves-effect green mesa tooltipped" data-tooltip="Mesa disponible"><i class="material-icons">local_dining</i>2</button>
                <button type="submit" name="boton" value="3" class="btn btn-d waves-effect green mesa tooltipped" data-tooltip="Mesa disponible"><i class="material-icons">local_dining</i>3</button>
                <button type="submit" name="boton" value="4" class="btn btn-d waves-effect green mesa tooltipped" data-tooltip="Mesa disponible"><i class="material-icons">local_dining</i>4</button>
                <button type="submit" name="boton" value="5" class="btn btn-d waves-effect green mesa tooltipped" data-tooltip="Mesa disponible"><i class="material-icons">local_dining</i>5</button>
            </div>
        </form>
    </div>
    <table class="highlight padd-15 pagination responsive-table">
        <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
        <thead>
            <tr>
                <th>FECHA</th>
                <th>USUARIO</th>
                <th>MESA</th>
                <th>ESTADO</th>
                <th>ENTREGADO</th>
                <th>CAMBIO</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla para mostrar un registro por fila -->
        <tbody id="tbody-rows">
        </tbody>
    </table>
    <!-- Apartado de paginación -->
    <div class="col-md-12 center text-center">
        <span class="left" id="total_reg"></span>
        <ul class="pagination pager" id="myPager"></ul>
    </div>

</div>
<!-- Modal para el detalle modal -->
<div id="detalle-modal" class="modal">
    <div class="modal-content padd-15">
        <h4 id="modal-title-2" class="center-align padd-15"></h4>
        <table class="highlight padd-15">
            <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>PRECIO UNITARIO</th>
                    <th>CANTIDAD</th>
                    <th>TIPO</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla para mostrar un registro por fila -->
            <tbody id="tbody-details">
            </tbody>
        </table>
        <h5 class="margin-10 center"><span class="blue-text text-darken-2">Total: $</span><span id="total-factura"></span></h5>
    </div>
</div>
<!-- Fin del contenido principal -->
<?php
Dashboard::footerTemplate('factura.js');
?>
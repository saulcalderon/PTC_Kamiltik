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
        <a href="detalle.php" class="btn-large waves-effect green tooltipped" data-tooltip="Nueva factura"><i class="material-icons"></i>Agregar factura</a>
        <!-- <a href="#" onclick="openBill()" class="btn waves-effect grey tooltipped" data-tooltip="Nueva factura"><i class="material-icons">cancel</i></a> -->
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
    <div class="col-md-12 center text-center">
        <span class="left" id="total_reg"></span>
        <ul class="pagination pager" id="myPager"></ul>
    </div>

</div>
<div id="detalle-modal" class="modal">
    <div class="modal-content">
        <h4 id="modal-title-2" class="center-align"></h4>
        <table class="highlight padd-15">
            <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>PRECIO_UNITARIO</th>
                    <th>CANTIDAD</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla para mostrar un registro por fila -->
            <tbody id="tbody-details">
            </tbody>
        </table>
    </div>
</div>


<?php
Dashboard::footerTemplate('factura2.js');
?>
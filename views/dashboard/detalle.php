<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar noticias');
?>
<div class="padd-15">

    <div class="nav-wrapper">
        <div class="col s12 green-text">
            <a href="factura2.php" class="breadcrumb black-text">Facturas</a>
            <a href="" class="breadcrumb black-text">Crear factura</a>

        </div>
    </div>

    <div class="row margin-0">
        <!-- <div class="col s12 m3">
            <h5>N° factura</h5>
            <h6>2</h6>
            <h5>Fecha</h5>
            <h6>22/07/2020</h6>
            <h5>Sucursal</h5>
            <h6>Palo Alto</h6>
            <h5>Usuario</h5>
            <h6>Saúl Calderón</h6>
        </div> -->
        <!-- <div class="col s12 m3">
            <div class="card padd-15">
                <div class="row">
                    <div class="col s6">
                        <img src="../../resources/img/commerce/notebook-1.png" alt="" width="100">
                    </div>
                    <div class="col s6">
                        <h5>x1</h5>
                    </div>
                    <div class="col s12">
                        <h6>Café Late premmium</h6>
                        <h6><strong>Tamaño : </strong> Grande</h6>
                        <h6><strong>Sabor : </strong> Chocolate</h6>
                        <h5>$3.40 c/u</h5>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col s12 m3">
            <div class="card padd-15">
                <div class="row center">
                    <h6 class="margin-10">Total: $<span id="total-factura"></span></h6>
                    <h6  id="cambio" class="margin-10">Cambio: $</h6>
                    <form action="" method="post">
                        <div class="input-field col s12">
                            <input id="entregado" name="entregado" type="text" maxlength="8" class="validate" placeholder="Ej: $12.00" required>
                            <label for="entregado">Entregado por cliente</label>
                        </div>
                        

                          
                        
                    </form>
                    <a href="#" class="margin-10 block waves-effect waves-light btn-large" onclick="actionBill('finalizar')" data-tooltip="Finalizar factura"><i class="material-icons left">assignment_turned_in</i>Finalizar Factura</a>
                    <a href="#" class="margin-10 block waves-effect waves-light btn-large" onclick="actionBill('pendiente')" data-tooltip="Factura pendiente"><i class="material-icons left">assignment_return</i>Pendiente</a>
                    <a href="#" class="margin-10 block waves-effect waves-light btn-large" onclick="actionBill('eliminar')" data-tooltip="Eliminar factura"><i class="material-icons left">assignment_late</i>Eliminar Factura</a>

                </div>
            </div>
        </div>
        <div class="col s12 m9">
            <!-- <a class="waves-effect waves-light btn-large block">Agregar productos</a> -->
            <!-- <a href="#" onclick="createBill(1)" >Holaaaa</a> -->
            <div class="card padd-15">
                <h5>Elija un producto</h5>
                <form action="" method="" id="addProduct">
                    <div class="row">
                        <input type="hidden" id="id_factura" name="id_factura">
                        <input type="hidden" id="mesa_form" name="mesa_form">
                        <div class="input-field col s6">
                            <input id="buscar-producto" name="buscar-producto" autocomplete="off" type="text" class="validate-search autocomplete">
                            <label for="buscar-producto">Producto</label>
                            <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                        </div>
                        <div class="input-field col s2">
                            <input id="cantidad-producto" name="cantidad-producto" type="number" class="validate" value="1" min="1">
                            <label for="cantidad-producto">Cantidad</label>
                        </div>
                        <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                    </div>
                </form>

            </div>
            <div id="tab">
                <table class="highlight">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-details"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="update-modal" class="modal">
    <div class="modal-content">
        <h4 id="content" class="center"></h4>
        <div class="container">
            <form method="post" id="updateForm">
                <input class="hide" type="text" id="id_detalle" name="id_detalle">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" min="1" name="cantidad" id="cantidad">
                    </div>
                    <div class="input-field col s12 m6">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
            <h6 id="nombre-producto" class="center"></h6>
            <h6 id="precio-unitario" class="center"></h6>
            <h6 id="tipo-producto" class="center"></h6>
        </div>
    </div>
</div>
<?php
Dashboard::footerTemplate('detalle.js');
?>
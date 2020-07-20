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
        <div class="col s12 m3">
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
        </div>
        <div class="col s12 m9">
            <!-- <a class="waves-effect waves-light btn-large block">Agregar productos</a> -->
            <div class="card padd-15">
                <h5>Elija una mesa</h5>
                <form action="" method="" id="">
                    <div class="row">
                        <button type="" class="btn btn-d waves-effect green mesa"><i class="material-icons">local_dining</i>1</button>
                        <button type="" class="btn btn-d waves-effect green mesa"><i class="material-icons">local_dining</i>2</button>
                        <button type="" class="btn btn-d waves-effect green mesa"><i class="material-icons">local_dining</i>3</button>
                        <button type="" class="btn btn-d waves-effect green mesa"><i class="material-icons">local_dining</i>4</button>
                        <button type="" class="btn btn-d waves-effect green mesa"><i class="material-icons">local_dining</i>5</button>
                    </div>
                </form>
            </div>
            <div class="card padd-15">
                <h5>Elija un producto</h5>
                <form action="" method="" id="addProduct">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="buscar-producto" name="buscar-producto" autocomplete="off" type="text" class="validate-search autocomplete ">
                            <label for="buscar-producto">Producto</label>
                            <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                        </div>
                        <div class="input-field col s2">
                            <input id="cantidad-producto" name="cantidad-producto" type="number" class="validate autocomplete">
                            <label for="cantidad-producto">Cantidad</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="mesa" type="number" name="mesa" class="validate autocomplete">
                            <label for="mesa">Mesa</label>
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
<?php
Dashboard::footerTemplate('detalle.js');
?>
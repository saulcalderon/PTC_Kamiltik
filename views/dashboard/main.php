<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Inicio');
?>
<div class="row padd-15">
        <div class="small-box bg-red">
            <a href="#" onclick="" class="small-box-footer" class="animsition-link">Graficos Parametrizados <i class="fa fa-arrow-circle-right"></i></a>
        </div>    
</div>
<div class="row padd-15">
    <div class="col l4 s6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <p>Ingresos por mes</p>
                
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" onclick="openCreateModal()" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col l4 s6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <p>Lo mas comprado</p>
                
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" onclick="openCreateModal()" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col l4 s6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <p>Graficos de algo</p>
                
            </div>
            <div class="icon">
                <i class="ion ion-email"></i>
            </div>
            <a href="#" onclick="openCreateModal()" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col l6 s6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <p>Graficos</p>
                
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" onclick="openCreateModal()" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col l6 s12">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <p>Graficos</p>
                
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" onclick="openCreateModal()" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<!--comienzo delas graficas-->
<div class="row">
    <div class="col s6 m12 l6">
        <div class="card">
            <div class="card-content">
                <canvas id="chart" ></canvas>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col s6 m12 l6">
        <div class="card">
            <div class="card-content">
                <canvas id="chart4" ></canvas>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row padd-15">
    <div class="col s6 m12 l6">
        <!-- small box -->
        <div class="row">
            <div class="col s12 m">
                <div class="card">
                    <div class="card-content">
                    <canvas id="chart1" ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- final de la tarjeta -->
    <div class="col s6 m12 l6">
        <!-- small box -->
        <div class="row">
            <div class="col s12 m">
                <div class="card">
                    <div class="card-content">
                    <canvas id="chart2" ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row padd-15">
    <div class="col s6 m12 l6">
        <!-- small box -->
        <div class="row">
            <div class="col s12 m">
                <div class="card">
                    <div class="card-content">
                    <canvas id="chart5" ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <label for="nombre_producto">Nombre</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">monetization_on</i>
                        <input id="precio_producto" type="number" name="precio_producto" class="validate" max="999.99" min="0.01" step="any" required />
                        <label for="precio_producto">Precio (US$)</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">format_list_numbered</i>
                        <input id="existencias_producto" type="number" name="existencias_producto" class="validate" min="1" step="any" required />
                        <label for="existencias_producto">Existencias</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">today</i>                 
                        <input disabled id="fecha" type="text" name="fecha">
                        <label for="fecha">Fecha Registro</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">description</i>                   
                        <input id="descripcion_producto" type="text" name="descripcion_producto" class="validate" required />
                        <label for="descripcion_producto">Descripción</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">local_mall</i>
                        <select id="tipo_producto" name="tipo_producto">
                        </select>
                        <label>Tipo producto</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">store_mall_directory</i>
                        <select id="nombre_sucursal" name="nombre_sucursal">
                        </select>
                        <label>Sucursal</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">shopping_basket</i>
                        <select id="estado_producto" name="estado_producto">
                        </select>
                        <label>Estado del producto</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">shopping_basket</i>
                        <select id="estado_distribucion" name="estado_distribucion">
                        </select>
                        <label>Estado distribución</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">local_shipping</i>
                        <select id="nombre_proveedor" name="nombre_proveedor">
                        </select>
                        <label>Nombre proveedor</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <i class="material-icons prefix">note_add</i>
                        <select id="documento_compra" name="documento_compra">
                        </select>
                        <label>Documento compra</label>
                    </div> 
                
                <!-- Botones para aceptar o cancelar -->
                <div class="row center-align col s12 m12">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                </div>
            </form>
        </div>
    </div>
<!-- <div class="row">
    <div class="col s12 m12 l3">
        <div class="card horizontal gradient-45deg-light-red-red gradient-shadow">
            <div class="card horizontal waves-effect waves-block waves-light">
                <img class="activator" src="../../resources/img/dashboard/img12-1.jpg" height="100" width="100">
            </div>
            <div class="card-content">
                <div class="card-content activator white-text">Ingresos: $41,500</div>
                <p><a href="Encargados2.html"><button class="btn gradient-45deg-red-pink">Actualizar</button></a></p>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l3">
        <div class="card horizontal gradient-45deg-light-red-red gradient-shadow">
            <div class="card horizontal waves-effect waves-block waves-light">
                <img class="activator" src="../../resources/img/dashboard/img12-1.jpg" height="100" width="100">
            </div>
            <div class="card-content">
                <div class="card-content white-text">Usuarios: 12</div>
                <p><a href="Encargados2.html"><button class="btn gradient-45deg-red-pink">Actualizar</button></a></p>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l3">
        <div class="card horizontal gradient-45deg-light-red-red gradient-shadow">
            <div class="card horizontal waves-effect waves-block waves-light">
                <img class="activator" src="../../resources/img/dashboard/img12-1.jpg" height="100" width="100">
            </div>
            <div class="card-content">
                <div class="card-content activator white-text">Clientes: 16,000</div>
                <p><a href="Encargados2.html"><button class="btn gradient-45deg-red-pink">Actualizar</button></a></p>
            </div>
        </div>
    </div>

</div> -->

<?php
Dashboard::footerTemplate('main.js');
?>
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
                <p class="center">Ganacias por mes</p>
                
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" onclick="openCreateModal()" class="small-box-footer" class="animsition-link">Generar por fecha <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col l4 s6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <p class="center">Precios por productos</p>
                
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" onclick="openCreateModal1()" class="small-box-footer" class="animsition-link">Generar por precio <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col l4 s6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <p class="center">Cantidad de productos por categoria</p>
                
            </div>
            <div class="icon">
                <i class="ion ion-email"></i>
            </div>
            <a href="#" onclick="openCreateModal2()" class="small-box-footer" class="animsition-link">Generar por categoria <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="#" onclick="openCreateModal()" class="small-box-footer" class="animsition-link">Generar por fecha <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="#" onclick="openCreateModal()" class="small-box-footer" class="animsition-link">Generar por fecha <i class="fa fa-arrow-circle-right"></i></a>
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
    <div class="col s12 m12 l12">
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

<div class="row padd-15">
    <div class="col s12 m12 l12">
        <!-- small box -->
        <div class="row">
            <div class="col s12 m">
                <div class="card">
                    <div class="card-content">
                    <canvas id="chart8"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="save-modal" class="modal">
        <div class="modal-content">
            <h4 id="modal-title" class="center-align"></h4>
            <!-- Formulario para generar un grafico parametrizado -->
            <form method="post" id="save-form" enctype="multipart/form-data">
                <!-- Campo oculto para asignar el id del registro al momento de modificar 
                <input class="hide" type="text" id="" name="">-->
                    <!-- Campos para generar el grafico -->
                <div class="row">
                    <div class="input-field col s12 m6 ">
                        <select id="mes1">
                        <option value="" disabled selected>Escoge un mes</option>
                        <?php
                        $months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                        for ($i=0; $i<count($months) ; $i++) { 
                            echo '<option value="'.($i).'">'.$months[$i].'</option>';
                        }
                        ?>
                        </select>
                        <label>Materialize Select</label>
                    </div>
                    <div class="input-field col s12 m6 ">
                        <select id="mes2">
                        <option value="" disabled selected>Escoge un mes</option>
                        <?php
                        $months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                        for ($i=0; $i<count($months) ; $i++) { 
                            echo '<option value="'.($i).'">'.$months[$i].'</option>';
                        }
                        ?>
                        </select>
                        <label>Materialize Select</label>
                    </div>
                </div>
                <!-- Botones para aceptar o cancelar -->
                <div class="row center-align col s12 m12">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Guardar"><i class="material-icons">check</i></button>
                </div>
            <canvas id="chart6"></canvas>
        </form> 
    </div>
</div>


<div id="save-modal1" class="modal">
        <div class="modal-content">
            <h4 id="modal-title" class="center-align"></h4>
            <!-- Formulario para generar un grafico parametrizado -->
            <form method="post" id="save-form1" enctype="multipart/form-data">
                <!-- Campo oculto para asignar el id del registro al momento de modificar 
                <input class="hide" type="text" id="" name="">-->
                    <!-- Campos para generar el grafico -->
                <div class="row">
                    
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">monetization_on</i>
                        <input id="precio1" type="number" name="precio1" class="validate" max="50.00" min="0.01" step="any" required />
                        <label for="precio_producto1">Precio mas bajo</label>
                    </div>
                    
                    
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">monetization_on</i>
                        <input id="precio2" type="number" name="precio2" class="validate" max="50.00" min="0.01" step="any" required />
                        <label for="precio_producto2">Precio mas alto</label>
                    </div>
                    
                </div>
                <!-- Botones para aceptar o cancelar -->
                <div class="row center-align col s12 m12">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Guardar"><i class="material-icons">check</i></button>
                </div>
            <canvas id="chart7"></canvas>
        </form> 
    </div>
</div>

<div id="save-modal2" class="modal">
        <div class="modal-content">
            <h4 id="modal-title" class="center-align"></h4>
            <!-- Formulario para generar un grafico parametrizado -->
            <form method="post" id="save-form2" enctype="multipart/form-data">
                <!-- Campo oculto para asignar el id del registro al momento de modificar 
                <input class="hide" type="text" id="" name="">-->
                    <!-- Campos para generar el grafico -->
                <div class="row">
                    
                <div class="input-field col s12 m6 ">
                        <select id="cat">
                        <option value="" disabled selected>Escoge un mes</option>
                        <?php
                        $cat = ['Bebidas frias sin cafe', 'Bebidas Calientes sin café','Bebidas Frías con Espresso', 'Bebidas Calientes con Espresso', 'Postres', 'Libre de Azucar', 'Delivery The Coffe Cup', 'Para llevar' ];
                        for ($i=0; $i<count($cat) ; $i++) { 
                            echo '<option value="'.($i).'">'.$cat[$i].'</option>';
                        }
                        ?>
                        </select>
                        <label>Materialize Select</label>
                    </div>
                    
                    
                </div>
                <!-- Botones para aceptar o cancelar -->
                <div class="row center-align col s12 m12">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Guardar"><i class="material-icons">check</i></button>
                </div>
            <canvas id=""></canvas>
        </form> 
    </div>
</div>


<?php
Dashboard::footerTemplate('main.js');
?>
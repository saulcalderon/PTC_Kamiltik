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
            <!-- Formulario para generar un grafico parametrizado -->
            <form method="post" id="save-form" enctype="multipart/form-data">
                <!-- Campo oculto para asignar el id del registro al momento de modificar 
                <input class="hide" type="text" id="" name="" >
                <div class="row">-->
                    <!-- Campos para generar el grafico -->

                    <div class="input-field ">
                        <i class="material-icons prefix">today</i>
                        <input id="fecha" type="date" name="fecha" class="validate"/>
                        <label for="fecha">Fecha de inicio</label>
                    </div>
                    <div class="input-field ">
                        <i class="material-icons prefix">today</i>
                        <input id="fecha" type="date" name="fecha" class="validate"/>
                        <label for="fecha">Fecha de fin</label>
                    </div>
                <!-- Botones para aceptar o cancelar -->
                <div class="row center-align col s12 m12">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Guardar"><i class="material-icons">check</i></button>
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
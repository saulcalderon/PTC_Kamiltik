<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar facturas');
?>
<div class="row padd-15">
    <div class="col l3 s6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>420</h3>
                <p>Accounts</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col l3 s6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>69</h3>
                <p>New Toons</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col l3 s6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>36</h3>
                <p>Support Emails</p>
            </div>
            <div class="icon">
                <i class="ion ion-email"></i>
            </div>
            <a href="#" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col l3 s6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>1337</h3>
                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
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
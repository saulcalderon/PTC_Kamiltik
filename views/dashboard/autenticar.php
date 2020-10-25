<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Bienvenido');
?>

<div class="container">
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card darken-1">
                <div class="card-content">
                    <h4 class="center">Verificar inicio de sesión</h4>
                    <p class="center">Se ha detectado un inicio de sesión, por favor aceptar o denegar esta solicitud.</p>
                    <div class="row padd-15">
                        <!-- Formulario para iniciar sesión -->
                        <div class="col s12">
                            <a id="accepted" class="waves-effect waves-light btn-large block m-15">Aceptar inicio de sesión</a>
                        </div>
                        <div class="col s12">
                            <a id="denied" class="waves-effect waves-light btn-large block m-15">Denegar inicio de sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
Dashboard::footerTemplate('autenticar.js');
?>
<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Bienvenido');
?>

<div class="container">
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card darken-1">
                <div class="card-content">
                    <h4 class="center">Inicio de Sesión</h4>
                    <div class="row">
                        <!-- Formulario para iniciar sesión -->
                        <form method="post" id="sesion-form">
                            <div class="input-field col s12 m10 offset-m1 m-15">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="alias" type="text" name="alias" class="validate" required />
                                <label for="alias">Correo Electrónico</label>
                            </div>
                            <div class="input-field col s12 m10 offset-m1 m-15">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="clave" type="password" name="clave" class="validate" required />
                                <label for="clave">Clave</label>
                            </div>
                            <div class="col s12 center-align m-15">
                                <button type="submit" class="btn waves-effect rose-m tooltipped" data-tooltip="Iniciar sesión">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="../commerce/index.php" class="black-text">
        <h5 class="center m-0"><i class="material-icons">arrow_back</i> Volver al sitio principal </h5>
    </a>
</div>

<?php
Dashboard::footerTemplate('index.js');
?>
<?php
require_once('../../core/helpers/dashboard_en.php');
Dashboard::headerTemplate('Welcome');
?>

<div class="container">
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card darken-1">
                <div class="card-content">
                    <h4 class="center">Login</h4>
                    <div class="row">
                        <!-- Formulario para iniciar sesión -->
                        <form method="post" id="sesion-form">
                            <div class="input-field col s12 m10 offset-m1 m-15">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="alias" type="text" name="alias" class="validate" required />
                                <label for="alias">Email</label>
                            </div>
                            <div class="input-field col s12 m10 offset-m1 m-15">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="clave" type="password" name="clave" class="validate" required />
                                <label for="clave">Password</label>
                            </div>
                            <div class="col s12 center-align m-15">
                                <button type="submit" class="btn waves-effect rose-m tooltipped" data-tooltip="Log in">Log in</button>
                            </div>
                            <div class="col s12 center-align m-15">
                                <a href="../../views/dashboard/index.php">Español</a>                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="../commerce/index.php" class="black-text">
        <h5 class="center m-0"><i class="material-icons">arrow_back</i> Back to main site </h5>
    </a>
</div>

<?php
Dashboard::footerTemplate('index.js');
?>
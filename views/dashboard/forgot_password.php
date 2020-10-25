<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Bienvenido');
?>

<div class="container">
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card darken-1">
                <div class="card-content">
                    <h4 class="center">Restaurar contraseña</h4>
                    <div class="row">
                        <!-- Formulario para iniciar sesión -->
                        <form method="post" id="nueva_clave_form" autocomplete="off">
                            <div class="input-field col s12 m10 offset-m1 m-15">
                                <i class="material-icons prefix">security</i>
                                <input id="nueva_clave" type="password" name="nueva_clave" class="validate" required />
                                <label for="nueva_clave">Nueva contraseña</label>
                            </div>
                            <div class="input-field col s12 m10 offset-m1 m-15">
                                <i class="material-icons prefix">security</i>
                                <input id="nueva_clave_2" type="password" name="nueva_clave_2" class="validate" required />
                                <label for="nueva_clave_2">Confirmar nueva contraseña</label>
                            </div>
                            <div class="col s12 center-align m-15">
                                <button type="submit" class="btn waves-effect rose-m tooltipped">Actualizar contraseña</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
Dashboard::footerTemplate('forgot_password.js');
?>
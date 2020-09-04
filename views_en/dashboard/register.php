<?php
require_once('../../core/helpers/dashboard_en.php');
Dashboard::headerTemplate('Primer uso');
?>

<!-- Formulario para registrar al primer usuario del dashboard -->
<div class="container">
    <form method="post" id="register-form">
        <div class="row">
            <div class="input-field col s12 m6">
                <i class="material-icons prefix">person</i>
                <input id="nombres" type="text" name="nombres" class="validate" required />
                <label for="nombres">Names</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons prefix">person</i>
                <input id="apellidos" type="text" name="apellidos" class="validate" required />
                <label for="apellidos">Surname</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons prefix">email</i>
                <input id="correo" type="email" name="correo" class="validate" required />
                <label for="correo">Email</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons prefix">phone</i>
                <input id="telefono" type="text" name="telefono" class="validate" required />
                <label for="telefono">1234-1234</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons prefix">security</i>
                <input id="clave1" type="password" name="clave1" class="validate" required />
                <label for="clave1">Password</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons prefix">security</i>
                <input id="clave2" type="password" name="clave2" class="validate" required />
                <label for="clave2">Confirm password</label>
            </div>
        </div>
        <div class="row center-align">
            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Register"><i class="material-icons">send</i></button>
        </div>
    </form>
</div>

<?php
Dashboard::footerTemplate('register.js');
?>
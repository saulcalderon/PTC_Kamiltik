<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<section>
    <div class="cabecera center">
        <h1 class="margin-0 padd-10 white-text">Noticias</h1>
    </div>
    <div class="container margin-10"> 
        <div class="row"> 
            <div class="col s12 m4">
                <a href="quienes-somos.php">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/commerce/leyla.png">
                            <div class="valign-wrapper fondo-negro">
                                <span class="card-title static center">Historia The Coffe Cup</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/commerce/donacion.png">
                        <div class="valign-wrapper fondo-negro">
                            <span class="card-title static center">Donaciones</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/commerce/participacion.png">
                        <div class="valign-wrapper fondo-negro">
                            <span class="card-title static center">Participaciones y eventos</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/commerce/sucursales.png">
                        <div class="valign-wrapper fondo-negro">
                            <span class="card-title static center">Sucursales</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
Commerce::FooterTemplate();
?>
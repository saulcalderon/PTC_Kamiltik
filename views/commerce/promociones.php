<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<!-- Contenido -->
<section>
    <div class="cabecera center">
        <h1 class="margin-0 padd-10 white-text">Promociones</h1>
    </div>
    <!-- Cards con información al hacer click -->
    <div class="container margin-10">
        <div class="row">
            <div class="col s12 m6 l4">
                <div class="card borde">
                    <div class="card-image waves-effect waves-block waves-light borde">
                        <img class="activator" src="../../resources/img/commerce/chocolatoso.png">
                        <span class="card-title borde activator ">Trío Chocolatoso</span>
                    </div>
                    <div class="card-reveal color">
                        <span class="card-title color">Trío Chocolatoso<i class="salir material-icons right">close</i></span>
                        <p class="Tema">Descripción:</p>
                        <p class="Parrafo">Con mucha emoción te compartimos la promoción de esta semana en #TheCoffeeCup. Recuerda que cada semana tenemos diferentes promociones para seguir celebrando El Mes Del Café 100% Salvadoreño.</p>
                        <p class="Tema">Inicio de la promoción:</p>
                        <p class="Parrafo">Lunes 14/11/2019</p>
                        <p class="Tema">Fin de la promoción:</p>
                        <p class="Parrafo">Miércoles 16/11/2019</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card borde">
                    <div class="card-image waves-effect waves-block waves-light borde">
                        <img class="activator" src="../../resources/img/commerce/frozen.png">
                        <span class="card-title borde activator ">2 Frozen Cappuccinos de 12oz por $5.00</span>
                    </div>
                    <div class="card-reveal color">
                        <span class="card-title color">2 Frozen Cappuccinos de 12oz por $5.00<i class="salir material-icons right">close</i></span>
                        <p class="Tema">Descripción:</p>
                        <p class="Parrafo">Con mucha emoción te compartimos la promoción de esta semana en #TheCoffeeCup. Recuerda que cada semana tenemos diferentes promociones para seguir celebrando El Mes Del Café 100% Salvadoreño.</p>
                        <p class="Tema">Inicio de la promoción:</p>
                        <p class="Parrafo">Lunes 14/11/2019</p>
                        <p class="Tema">Fin de la promoción:</p>
                        <p class="Parrafo">Miércoles 16/11/2019</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card borde">
                    <div class="card-image waves-effect waves-block waves-light borde">
                        <img class="activator" src="../../resources/img/commerce/togo.png">
                        <span class="card-title borde activator ">The Coffee Cup "TO GO"</span>
                    </div>
                    <div class="card-reveal color">
                        <span class="card-title color">The Coffee Cup "TO GO"<i class="salir material-icons right">close</i></span>
                        <p class="Tema">Descripción:</p>
                        <p class="Parrafo">Si tienes poco tiempo o estas demasiado ocupado (a), llamános y en 10 minutos puedes pasar retirando 
                            tu café favorito en tu The Coffee Cup más cercano. Válido únicamente en Masferrer (2219-6167), Paseo (2219-6583) y 
                            Galerías (2219-6590).</p>
                        <p class="Tema">Inicio de la promoción:</p>
                        <p class="Parrafo">Lunes 14/11/2019</p>
                        <p class="Tema">Fin de la promoción:</p>
                        <p class="Parrafo">Miércoles 16/11/2019</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Final de promociones -->
<?php
Commerce::FooterTemplate();
?>
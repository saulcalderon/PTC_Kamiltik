<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
</header>
<main>
<!-- Contenido principal -->
    <!-- Sección del Slider -->
    <section>
        <div class="slider">
            <!-- Diapositivas -->
            <ul class="slides">
                <li>
                    <img class="" src="../../resources/img/commerce/portada1.jpg">
                </li>
                <li>
                    <img class="" src="../../resources/img/commerce/portada2.jpg">
                </li>
            </ul>
        </div>
    </section>
    <!-- Finalización Sección del Slider -->
    <!-- Sección del menú -->
    <section>
        <div class="container">
            <h1>Nuestro productos</h1>
            <div class="row">
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/commerce/producto1.jpg">
                            <div class="valign-wrapper fondo-negro">
                                <span class="card-title static center">Bebidas frías sin café</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/commerce/producto2.jpg">
                            <div class="valign-wrapper fondo-negro">
                                <span class="card-title static center">Bebidas calientes con Espresso</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/commerce/producto3.jpg">
                            <div class="valign-wrapper fondo-negro">
                                <span class="card-title static center">Bebidas frías con Espresso</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/commerce/producto4.jpg">
                            <div class="valign-wrapper fondo-negro">
                                <span class="card-title static center">Bebidas calientes sin café</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/commerce/producto5.jpg">
                            <div class="valign-wrapper fondo-negro">
                                <span class="card-title static center">Delicorner</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/commerce/producto6.jpg">
                            <div class="valign-wrapper fondo-negro">
                                <span class="card-title static center">Postres</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/commerce/producto7.jpg">
                            <div class="valign-wrapper fondo-negro">
                                <span class="card-title static center">Sugar free</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/commerce/producto8.png">
                            <div class="valign-wrapper fondo-negro">
                                <span class="card-title static center">Delivery <br> The Coffee Cup</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/img/commerce/producto9.jpg">
                            <div class="valign-wrapper fondo-negro">
                                <span class="card-title static center">Para llevar</span>
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
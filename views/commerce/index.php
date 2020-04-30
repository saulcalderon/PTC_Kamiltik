<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal del documento -->
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

<!--  Sección de buscar sucursal -->
<section>
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l4">
                <h3 class="ftf-medium">Buscar Sucursales</h3>
                <div class="row">
                    <!-- Formulario para buscar en el mapa -->
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="Buscar" id="first_name" type="text" class="validate">
                                <label for="first_name" class="ftf-medium">Buscar por dirección</label>
                                <i class="material-icons prefix">search</i>
                            </div>
                        </div>
                        <h3 class="ftf-medium">Filtrar</h3>
                        <div class="row">
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Seleccionar departamento</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                                <label class="ftf-medium">Departamento</label>
                            </div>
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Seleccionar ciudad</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                                <label class="ftf-medium">Ciudad</label>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- Mapa insertado -->
            <div class="col s12 m6 l8">
                <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d62237.33342078321!2d-89.2301246406994!3d13.69568990658237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sthe%20coffee%20cup!5e0!3m2!1ses-419!2ssv!4v1588112624559!5m2!1ses-419!2ssv" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- Final de la sección buscar sucursal-->

<!-- Inicio de la sección nuestro secreto-->
<section>
    <div class="fondo-rojo">
        <div class="container">
            <div class="row">
                <div class="col s12 m6">
                    <h3 class="white-text ftf-medium">Nuestro secreto</h3>
                    <p class="white-text parrafo">Estamos comprometidos a crear grandes <br> experiencias con nuestros clientes, en un <br>
                        ambiente agradable, con el mejor servicio <br> y calidad.</p>
                </div>
                <div class="col s12 m6">
                    <video class="responsive-video" controls>
                        <source src="../../resources/img/commerce/video.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Final de la sección nuestro secreto-->

<!-- Inicio de la sección nuestros proyectos-->
<section>
    <h3 class="center ftf-medium">Nuestros proyectos</h3>
    <div class="swiper-container proyectos">
        <!-- Slider para los proyectos -->
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/commerce/coffeecard.jpg">
                        <div class="valign-wrapper fondo-negro">
                            <span class="card-title">The Coffee Cup Card</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/commerce/alianzas.jpg">
                        <div class="valign-wrapper fondo-negro">
                            <span class="card-title">Alianzas</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/commerce/responsabilidad.jpg">
                        <div class="valign-wrapper fondo-negro">
                            <span class="card-title">RSE</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/commerce/curiosidades.jpg">
                        <div class="valign-wrapper fondo-negro">
                            <span class="card-title">Curiosidades del café</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Controles -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>
<!-- Final de la sección nuestros proyectos-->

<?php
Commerce::FooterTemplate();
?>
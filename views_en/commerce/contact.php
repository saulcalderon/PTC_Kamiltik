<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal del documento -->

<!-- Apartado tema -->
<div class="cabecera center">
    <h1 class="margin-0 padd-10 white-text">Contact</h1>
</div>

<!-- Apartado tabs -->
<ul id="tabs-swipe-demo" class="tabs center">
    <li class="tab col s3"><a href="#test-swipe-1">Help us to improve</a></li>
    <li class="tab col s3"><a href="#test-swipe-2">Acquire a franchise</a></li>
    <li class="tab col s3"><a href="#test-swipe-3">Other services</a></li>
</ul>   

<!-- Apartado primera parte (Ayudanós a mejorar) -->
<div id="test-swipe-1">
    <div class="row">
        <div class="col l12 AAM"></div>
        <div class="container col l6 s12 contacto">
            <div class="col l2"></div>
            <div class="col l8">
                <img src="../../resources/img/commerce/imagen.png" class="responsive-img contacto">
            </div>
            <div class="col l2"></div>
        </div>
        <div class="col s2"></div>
        <div class="container col l6 s8 inputs AAM">
            <div class="input-field col s12 l7">
                <input placeholder="kamaltik@mail.com" id="first_name" type="text" class="validate">
                <label for="first_name">Email</label>
            </div>
            <div class="input-field col s12 l7">
                <select>
                    <option value="" disabled selected>Reason...</option>
                    <option value="1">Service</option>
                    <option value="2">Quality</option>
                    <option value="3">Complaint</option>
                </select>
                <label>Select the reason of contact</label>
            </div>
            <div class="input-field col s12 l7">
                <input id="input_text" placeholder="Write your message here" type="text" data-length="10">
                <label for="input_text">Message</label>
                <a class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>Send message</a>
            </div>
        </div>
        <div class="col s2"></div>
    </div>
</div>

<!-- Apartado adquiere una franquicia -->
<div id="test-swipe-2">
    <div class="row">
        <div class="col l6 s12">
            <div class="col l12 franquiciaimagen"></div>
            <div class="col l2 s2"></div>
            <div class="col l8 s8">
                <img src="../../resources/img/commerce/franquicia.jpg" class="responsive-img">
            </div>
            <div class="col l2 s2"></div>
        </div>
        <div class="col l6 s12">
        <div class="col l12 franquicia"></div>
            <div class="col s1"></div>
            <div class="card col 16 s10">
                <div class="card-content">
                    <span class="card-title">Start a franchise</span>
                    <p>One way to start your business is through The Coffee Cup franchise. A franchise is a successful business model. With the franchise system you have advice from the first day, a comprehensive training of 3 months, where you are taught the operation and provide full support during and after the opening. We train the entire franchise team, baristas, junior, supervisors and store managers, ensuring that the products and service are standardized in all The Coffee Cups in the region: thecoffeecup@qualitygrains</p>
                </div>
            </div>
            <div class="col s1"></div>
        </div>
    </div>
</div>

<!-- Apartado otros servicios -->
<div id="test-swipe-3">
<div class="row">
        <div class="col l6 s12">
            <div class="col l12 OSimagen"></div>
            <div class="col l2 s2"></div>
            <div class="col l8 s8">
                <img src="../../resources/img/commerce/boda.jpg" class="responsive-img">
            </div>
            <div class="col l2 s2"></div>
        </div>
        <div class="col l6 s12">
        <div class="col l12 OS"></div>
            <div class="col s1"></div>
            <div class="card col 16 s10">
                <div class="card-content">
                    <span class="card-title">An unforgettable experience</span>
                    <p>An unforgettable event deserves the best 100% Salvadorian flavor. The Coffee Cup, we invite you to request more information at: thecoffeecup</p>
                </div>
            </div>
            <div class="col s1"></div>
        </div>
    </div>
</div>
<?php
Commerce::FooterTemplate();
?>
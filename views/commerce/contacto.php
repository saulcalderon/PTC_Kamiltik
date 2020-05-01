<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal del documento -->
<div class="cabecera center">
    <h1 class="margin-0 padd-10 white-text">Contacto</h1>
</div>
<ul id="tabs-swipe-demo" class="tabs center">
    <li class="tab col s3"><a href="#test-swipe-1">Ayúdanos a mejorar</a></li>
    <li class="tab col s3"><a href="#test-swipe-2">Adquiere un franquicia</a></li>
    <li class="tab col s3"><a href="#test-swipe-3">Otros servicios</a></li>
</ul>

<!-- Primera parte (Ayudanós a mejorar) -->
<div id="test-swipe-1">
    <div class="row">
        <div class="col s6 contacto">
            <img src="../../resources/img/commerce/imagen.png" class="responsive-img contacto right">
        </div>
        <div class="col s6 inputs">
            <div class="input-field col s7">
                <input placeholder="kamaltik@mail.com" id="first_name" type="text" class="validate">
                <label for="first_name">Correo electronico</label>
            </div>
            <div class="input-field col s7">
                <select>
                    <option value="" disabled selected>Motivo...</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <label>Seelcciona el motivo de contacto</label>
            </div>
            <div class="input-field col s7">
                <input id="input_text" placeholder="Escribe tu mensaje aquí" type="text" data-length="10">
                <label for="input_text">Mesaje</label>
                <a class="waves-effect waves-light btn"><i class="material-icons right">play_arrow</i>Enviar mensaje</a>
            </div>
        </div>
    </div>
</div>

<!-- Adquiere una franquicia -->
<div id="test-swipe-2" class="franquicia">
    <div class="row">
        <div class="col s6 franquicia">
            <img src="../../resources/img/commerce/franquicia.jpg" class="responsive-img right franquicia">
        </div>
        <div class="col s6">
            <div class="card franquicia">
                <div class="card-content">
                    <span class="card-title franquicia">Emprende una franquicia</span>
                    <p>Una forma de iniciar tu emprendimiento es a través de una franquicia The Coffee Cup. Una franquicia es un modelo de negocio de éxito. Con el sistema de franquicia se cuenta con asesoramiento desde el primer día, una capacitación integral de 3 meses, donde se le enseña la operación y se le brinda un apoyo completo durante y después de la apertura. Entrenamos a todo el equipo de franquicias, baristas, junior, supervisores y encargas de tiendas, garantizando que los productos y el servicio sean estandarizado en todos los The Coffee Cup de la región.Emprendedor si deseas obtener más detalles sobre las franquicias The Coffee Cup, te invitamos a solicitar más información a: thecoffeecup@qualitygrains.com.sv</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Otros servicios -->
<div id="test-swipe-3" class="OS">
    <div class="row">
        <div class="col s6 OS">
            <img src="../../resources/img/commerce/boda.jpg" class="responsive-img right OS">
        </div>
        <div class="col s6">
            <div class="card OS">
                <div class="card-content">
                    <span class="card-title OS">Una experiencia inolvidable</span>
                    <p>Un evento inolvidable merece el mejor sabor 100% salvadoreño. The Coffee Cup, te invitamos a solicitar más información a: thecoffeecup@qualitygrains.com.sv</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
Commerce::FooterTemplate();
?>
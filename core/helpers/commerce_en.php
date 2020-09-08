<?php

/**
 *
 */
class Commerce
{

    public static function headerTemplate()
    {
        print('<!DOCTYPE html>
    <html lang="es">
    <head>
        <!-- Se especifica la codificación de caracteres para el documento -->
        <meta charset="utf-8">
        <!-- Se indica al navegador que la página web está optimizada para dispositivos móviles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Título del documento -->
        <title>Kamiltik | Home page</title>
        <!-- Importación de archivos CSS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="icon" href="../../resources/img/logo_coffee_cup_mini.ico">
        <link rel="stylesheet" href="../../resources/css/swiper.css">
        <link rel="stylesheet" href="../../resources/css/materialize.css">
        <link rel="stylesheet" href="../../resources/css/commerce.css">
        <!-- Llamada a un archivo tipo icono -->
        <!--<link rel="shortcut icon" href="" type="image/x-icon">--> 
    </head>
    <body>
        <!-- Encabezado del documento -->
        <header>
            <!-- Barra de Navegación -->
            <div class="navbar-fixed">
                <nav class="nav-primario">
                    <div class="nav-wrapper">
                        <!-- Logo -->
                        <a href="index.php" class=" brand-logo center">
                            <img src="../../resources/img/commerce/Logo.png" width="220" height="60" alt="" class="">
                        </a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <!-- Enlaces del menú -->
                        <div class= "container">
                            <ul class="left hide-on-med-and-down">
                                <li><a href="menu.php" class="menu-text">Menu</a></li>
                                <li><a href="sucursales.php" class="menu-text">Branch offices</a></li>
                                <li><a href="promociones.php" class="menu-text">Promotions</a></li>
                            </ul>
                            <ul class="right hide-on-med-and-down">
                                <li>
                                    <!--<form action="" class="form-buscar">
                                        <input type="text" name="" id="" placeholder="Search">
                                        <a href=""><i class="material-icons">search</i></a>
                                    </form>-->
                                    <form>
                                        <div class="input-field ">
                                          <input id="search" type="search" placeholder="Search" required>
                                          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                          <i class="material-icons">close</i>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div> 
                </nav>
            </div>
            <!-- Navegación en pantallas medianas y pequeñas -->
            <ul class="sidenav" id="mobile-demo">
                <li><a class="sidenav-close" href=""><i class="material-icons right">close</i></a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="sucursales.php">Branch offices</a></li>
                <li><a href="promociones.php">Promotions</a></li>
                <li><div class="divider"></div></li>
                <li><a href="#modal1" class="modal-trigger">Register as a customer</a></li>
                <li><a href="index.php">Find nearest branch</a></li>
                <li><a href="noticias.php">News</a></li>
                <li><a href="contacto.php">Contact us</a></li>
            </ul>
            
            <!-- Final de la Barra de Navegación -->

            <!--  Barra de Navegación Secundario -->
            <nav class="nav-secundario hide-on-med-and-down">
                <div class="nav-wrapper">
                    <ul>
                        <li><a href="#modal1" class="texto-nav-secundario modal-trigger"><i class="material-icons">group</i>Register as a customer</a></li>
                        <li><a href="index.php" class="texto-nav-secundario"><i class="material-icons">domain</i>Find nearest branch</a></li>
                        <li><a href="noticias.php" class="texto-nav-secundario"><i class="material-icons">chrome_reader_mode
                        </i>News</a></li>
                        <li><a href="contacto.php" class="texto-nav-secundario"><i class="material-icons">message</i>Contact us</a></li>
                    </ul>
                </div>
            </nav>
            <!-- Final de la Barra de Navegación secundaria-->
            <!-- Estructura del modal -->
            <div id="modal1" class="modal modal-cliente">
                <div class="cabecera padd-10">
                    <h6 class="margin-0">Personal information</h6>
                </div>
                <div class="modal-content">
                    <div class="row margin-0">
                        <div class="col s12 m4 hide-on-med-and-down">
                            <div class="card">
                                <div class="card-image">
                                    <img src="../../resources/img/commerce/notebook-1.png">
                                    <div class="valign-wrapper fondo-negro">
                                        <span class="card-title">Be part of The Coffee Cup</span>
                                    </div>
                                </div>
                            </div>     
                        </div>
                        <!-- Formulario para registro de cliente -->
                        <div class="col s12 l8 ">
                            <div class="row">
                                <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <input id="nombre" type="text" class="validate">
                                            <label for="nombre">Name</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input id="fecha" type="date" class="validate">
                                                <label for="fecha">Birth</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input id="apellido" type="text" class="validate">
                                            <label for="apellido">Last name</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <select>
                                                <option value="" disabled selected>Select product</option>
                                                    <option value="1">Option 1</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                </select>
                                            <label for="">Favorite product</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input id="email" type="email" class="validate">
                                                <label for="email">Email</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <select>
                                                <option value="" disabled selected>Select product</option>
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 2</option>
                                                <option value="3">Option 3</option>
                                            </select>
                                            <label for="">Favorite product</label>
                                        </div>
                                        <div class="col s12">
                                            <p class="center">
                                            <label>
                                                <input type="checkbox" />
                                                <span>I accept the terms and conditions</span>
                                            </label>
                                            </p> 
                                        </div>
                                        <div class="col s12 center">
                                            <button class="btn waves-effect waves-light" type="submit" name="action">Sign up</button>   
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    <main>');
    }

    public static function footerTemplate()
    {
        print('
    </main>
    <!-- Pie de página -->
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col s12 m4 center">
                    <h5 class="white-text ftf-medium">Address</h5>
                    <i class="material-icons small">directions_car</i>
                    <p>Km 13 1/2, Autopista <br> Comalapa, San Marcos</p>
                </div>
                <div class="col s12 m4 center">
                    <h5 class="white-text ftf-medium">Contact us</h5>
                    <div class="flex">
                        <i class="material-icons small margin-5">phone</i>
                        <p class="margin-5">+503 2507-1300</p>
                    </div>
                    <div class="flex">
                        <i class="material-icons small margin-5">email</i>
                        <p class="margin-5">info@qualitygrains.com.sv</p>
                    </div>
                </div>
                <div class="col s12 m4 center">
                    <h5 class="white-text ftf-medium">Redes Sociales</h5>
                    <a href="https://www.facebook.com/thecoffeecupsv/"><img class="margin-5" src="../../resources/img/commerce/facebook.png" alt=""></a>
                    <a href="https://twitter.com/thecoffeecup_sv/"><img class="margin-5" src="../../resources/img/commerce/twitter.png" alt=""></a>
                    <a href="https://www.instagram.com/thecoffeecup_sv/"><img class="margin-5" src="../../resources/img/commerce/instagram.png" alt=""></a>
                    <p>The Coffee Cup Sv</p>
                </div>
            </div>
        </div>
        <!-- Barra del copyrigth -->
        <div class="footer-copyright sub">
            <div class="container">
            © 2020 Derechos reservados por The Coffee Cup
            <a class="grey-text text-lighten-4 right" href="#!">Terms and Conditions</a>
            </div>
        </div>
    </footer>
        <!-- Importación de archivos JavaScript al final del documento para una carga optimizada -->
        <script src="../../resources/js/materialize.js" type="text/javascript"></script>
        <script src="../../resources/js/swiper.js" type="text/javascript" ></script> 
        <script src="../../resources/js/commerce.js" type="text/javascript"></script>
    </body>
    </html>');
    }
}

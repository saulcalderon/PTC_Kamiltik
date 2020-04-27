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
        <title>Kamiltik | </title>
        <!-- Importación de archivos CSS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link rel="stylesheet" href="../../resources/css/materialize.css">
        <link rel="stylesheet" href="../../resources/css/style.css">
        <!-- Llamada a un archivo tipo icono -->
        <link rel="shortcut icon" href="" type="image/x-icon"> 
    </head>
    <body>
        <!-- Encabezado del documento -->
        <header>
            <!-- Barra de Navegación -->
            <div class="navbar-fixed">
                <nav>
                    <div class="nav-wrapper">
                        <a href="index.php" class="logo-cuzcatlan brand-logo margin-logo">
                            <img src="../../resources/img/commerce/Logo.png" width="220" height="60" alt="" class="">
                        </a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <div class="container margin-left">
                            <ul class="left hide-on-med-and-down">
                                <li><a href="products.php" class="menu-text">Productos</a></li>
                                <li><a href="news.php" class="menu-text">Noticias</a></li>
                                <li><a href="contact.php" class="menu-text">Contáctanos</a></li>
                            </ul>
                            <ul class="right hide-on-med-and-down">
                                <li><a href="" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">shopping_cart</i></a></li>
                                <li><h5>|</h5></li>
                                <li><a href="sign_in.php" class="menu-text">Iniciar sesión</a></li>
                                <li><a href="sign_up.php" class="menu-text">Registrarse</a></li>
                            </ul>
                        </div>
                    </div> 
                </nav>
            </div>
            <!-- Navegación lateral responsive -->
            <ul class="sidenav" id="mobile-demo">
                <li>
                    <div class="row">
                        <div class="col s12 margin center-align">
                            <h4 class="logo-cuzcatlan">Cuzcatlán</h5>
                        </div>
                    </div>
                </li>
                <li><a href="sign_in.php" class="menu-text">Iniciar sesión</a></li>
                <li><a href="sign_up.php" class="menu-text">Registrarse</a></li>
                <li><a href="shopping_cart.php" class="menu-text">Mi carrito</a></li>
                <li><a href="products.php" class="menu-text">Productos</a></li>
                <li><a href="news.php" class="menu-text">Noticias</a></li>
                <li><a href="contact.php" class="menu-text">Contáctanos</a></li>
            </ul>
            <!-- Navegación lateral del carrito -->
            <ul id="slide-out" class="sidenav carrito"> 
                <li>
                    <div class="container gen">
                        <div class="row">
                            <div class="col s8">
                                <h5 class="margin">Carrito de compra</h5>
                            </div>
                            <div class="col s4 margin center-align">
                                <a href=""><i class="material-icons right">close</i></a>
                            </div>
                        </div>
                    </div>
                </li>               
                <li><div class="divider"></div></li>
                <li>
                    <div class="container gen">
                        <table class="highlight responsive-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>    
                            <tbody>
                                <tr>
                                    <td><img src="../../resources/img/commerce/productos/artesanias-casa-la-abuela-2.jpg" alt="" width="80" height="50"></td>
                                    <td>Pintura de madera con montañas</td>
                                    <td><input id="number" type="number" value="1"></td>
                                    <td><h6>$12</h6></td>
                                </tr>
                                <tr>
                                    <td><img src="../../resources/img/commerce/productos/artesanias-casa-la-abuela-2.jpg" alt="" width="80" height="50"></td>
                                    <td>Pintura de madera con montañas</td>
                                    <td><input id="number" type="number" value="1"></td>
                                    <td><h6>$12</h6></td>
                                </tr>
                                <tr>
                                    <td><img src="../../resources/img/commerce/productos/artesanias-casa-la-abuela-2.jpg" alt="" width="80" height="50"></td>
                                    <td>Pintura de madera con montañas</td>
                                    <td><input id="number" type="number" value="1"></td>
                                    <td><h6>$12</h6></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </li>
                <li>
                    <a class="waves-effect waves-light btn-small" href="shopping_cart.php">Ver todo</a>
                </li>
            </ul>
        </header>');
  }

  public static function footerTemplate(){
    print(' 
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Síguenos en nuestras redes sociales</h5>
                        <div class="row margin">
                            <div class="col s12 m6 center-align">
                                <a href="https://www.facebook.com/">
                                    <img src="../../resources/img/commerce/iconos/facebook.png" alt="Facebook">
                                    <p class="white-text">Tienda Cuzcatlán</p>
                                </a>
                            </div>
                            <div class="col s12 m6 center-align">
                                <a href="https://www.instagram.com/">
                                    <img src="../../resources/img/commerce/iconos/instagram.png" alt="Instagram" >
                                    <p class="white-text">@cuzcatlán.sv</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Menú inferior</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="about_us.php">¿Quiénes somos?</a></li>
                            <li><a class="grey-text text-lighten-3" href="shopping_cart.php">Carrito</a></li>
                            <li><a class="grey-text text-lighten-3" href="my_account.php">Mi cuenta</a></li>
                            <li><a class="grey-text text-lighten-3" href="payment.php">Completar transacción</a></li>
                            <li><a class="grey-text text-lighten-3" href="restore_password.php">Restablecer contraseña</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                © 2020 Derechos reservados por Cuzcatlán
                <a class="grey-text text-lighten-4 right" href="#!">Términos y condiciones</a>
                </div>
            </div>
        </footer>
            <!-- Importación de archivos JavaScript al final del documento para una carga optimizada -->
            <script src="../../resources/js/jquery-3.4.1.js" type="text/javascript"></script>
            <script src="../../resources/js/materialize.js" type="text/javascript"></script>
            <script src="../../resources/js/swiper.js" type="text/javascript" ></script> 
            <script src="../../resources/js/commerce.js" type="text/javascript"></script>
            </body>
        </html>');
  }
}


 ?>

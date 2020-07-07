<?php

/**
 *
 */
class Commerce2
{

    public static function headerTemplate()
    {
        //Se activa o reanuda una sesión
        session_start();

        //Se imprime el encabezado del documento
        print('<!DOCTYPE html>
    <html lang="es">
    <head>
        <!-- Se especifica la codificación de caracteres para el documento -->
        <meta charset="utf-8">
        <!-- Se indica al navegador que la página web está optimizada para dispositivos móviles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Título del documento -->
        <title>Cuzcatlán | </title>
        <!-- Importación de archivos CSS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../resources/css/materialize.css">
        <link rel="stylesheet" href="../../resources/css/swiper.css">
        <link rel="stylesheet" href="../../resources/css/style-swiper.css">
        <link rel="stylesheet" href="../../resources/css/style.css">
        <!-- Llamada a un archivo tipo icono -->
        <link rel="shortcut icon" href="" type="image/x-icon"> 
    </head>
    <body>
    ');
        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de cliente para mostrar el menú de opciones, de lo contrario se muestra otro menú.
        if (isset($_SESSION['id_cliente'])) {
            // Se verifica si la página web actual es diferente a login.php y register.php, de lo contrario se direcciona a index.php
            if ($filename != 'login.php' && $filename != 'registrarse.php') {
                self::modals();
                print('
                <header>
                <!-- Barra de Navegación -->
                <div class="navbar-fixed">
                    <nav>
                        <div class="nav-wrapper">
                            <a href="index.php" class="logo-cuzcatlan brand-logo margin-logo">Cuzcatlán</a>
                            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                            <div class="container margin-left">
                                <ul class="left hide-on-med-and-down">
                                    <li><a href="productos.php" class="menu-text">Productos</a></li>
                                    <li><a href="noticias.php" class="menu-text">Noticias</a></li>
                                    <li><a href="contacto.php" class="menu-text">Contáctanos</a></li>
                                </ul>
                                <ul class="right hide-on-med-and-down">
                                
                                    <li><h5>|</h5></li>
                                    <li><a href="#" onclick="openModalProfile()" ><i class="material-icons left">account_circle</i>Mi usuario</a></li>
                                    <li><a href="carrito.php"><i class="material-icons left">shopping_cart</i>Carrito</a></li>
                                    <li><a href="#" onclick="logOut()"><i class="material-icons left">close</i>Cerrar sesión</a></li>
                                </ul>
                            </div>
                        </div> 
                    </nav>
                </div>
                </header>
                <main>
            ');
            } else {
                header('location: index.php');
            }
        } else {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ($filename != 'carrito.php') {
                print('
                <header>
                <!-- Barra de Navegación -->
                <div class="navbar-fixed">
                    <nav>
                        <div class="nav-wrapper">
                            <a href="index.php" class="logo-cuzcatlan brand-logo margin-logo">Cuzcatlán</a>
                            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                            <div class="container margin-left">
                                <ul class="left hide-on-med-and-down">
                                    <li><a href="productos.php" class="menu-text">Productos</a></li>
                                    <li><a href="noticias.php" class="menu-text">Noticias</a></li>
                                    <li><a href="contacto.php" class="menu-text">Contáctanos</a></li>
                                </ul>
                                <ul class="right hide-on-med-and-down">
                                    <li><a href="" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">shopping_cart</i></a></li>
                                    <li><h5>|</h5></li>
                                    <li><a href="iniciar_sesion.php" class="menu-text">Iniciar sesión</a></li>
                                    <li><a href="crear_cuenta.php" class="menu-text">Registrarse</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>               
                <li><div class="divider"></div></li>
                
            </ul>
        </header>');
            } else {
                header('location: login.php');
            }
        }
    }

    public static function footerTemplate($controller)
    {
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
            <script src="../../resources/js/swiper.js" type="text/javascript"></script>
            <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
            <script type="text/javascript" src="../../core/helpers/components.js"></script>
            <script src="../../resources/js/commerce.js" type="text/javascript"></script>
            <script type="text/javascript" src="../../core/controllers/commerce/carrito.js"></script> 
            <script type="text/javascript" src="../../core/controllers/commerce/account.js"></script> 
            <script type="text/javascript" src="../../core/controllers/commerce/' . $controller . '"></script> 
            </body>
        </html>');
    }

    /*
    *   Método para imprimir las cajas de dialogo (modals) de editar pefil y cambiar contraseña.
    */
    private static function modals()
    {
        // Se imprime el código HTML de las cajas de dialogo (modals).
        print('

            <!-- Componente Modal para mostrar el formulario de cambiar contraseña -->
            <div id="password-modal" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">Cambiar contraseña</h4>
                    <form method="post" id="password-form">
                        <div class="row center-align">
                            <label>CLAVE ACTUAL</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_actual_1" type="password" name="clave_actual_1" class="validate" required/>
                                <label for="clave_actual_1">Clave</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_actual_2" type="password" name="clave_actual_2" class="validate" required/>
                                <label for="clave_actual_2">Confirmar clave</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <label>CLAVE NUEVA</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate" required/>
                                <label for="clave_nueva_1">Clave</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate" required/>
                                <label for="clave_nueva_2">Confirmar clave</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="profile-modal" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">Editar perfil</h4>
                    <form method="post" id="profile-form" class="col s12">
                    <!-- Campo oculto para asignar el token del reCAPTCHA -->
                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response"/>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">account_box</i>
                                <input type="text" id="nombres_cliente" name="nombres_cliente" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" class="validate" required/>
                                <label for="nombres_cliente">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">account_box</i>
                                <input type="text" id="apellidos_cliente" name="apellidos_cliente" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" class="validate" required/>
                                <label for="apellidos_cliente">Apellidos</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">email</i>
                                <input type="email" id="correo_cliente" name="correo_cliente" maxlength="100" class="validate" required/>
                                <label for="correo_cliente">Correo electrónico</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">phone</i>
                                <input type="text" id="telefono_cliente" name="telefono_cliente" placeholder="0000-0000" class="validate" required/>
                                <label for="telefono_cliente">Teléfono</label>
                            </div>
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">cake</i>
                                <input type="date" id="nacimiento_cliente" name="nacimiento_cliente" class="validate" required/>
                                <label for="nacimiento_cliente">Nacimiento</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">place</i>
                                <input type="text" id="direccion_cliente" name="direccion_cliente" maxlength="200" class="validate" required/>
                                <label for="direccion_cliente">Dirección</label>
                            </div>
                            <a href="#" onclick="openModalPasswords()" ><i class="material-icons left">security</i>Quiero cambiar mi contraseña</a>
                        </div>
                        <div class="row">
                            <div class="col s12 center-align">      
                                <button class="btn waves-effect grey tooltipped modal-close btn-large"  data-tooltip="Cancelar" >Cancelar<i class="material-icons right">cancel</i></button>
                                <button type="submit" class="btn waves-effect waves-light btn-large cuzcatlan-color"  data-tooltip="modificar" id="modificar" name="modificar" >Modificar mi cuenta<i class="material-icons right">send</i></button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>


        ');
    }
}

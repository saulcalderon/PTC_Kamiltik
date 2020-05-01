<?php
/**
*	Clase para definir la plantilla de las páginas web del sitio privado.
*/
class Dashboard
{
    public static function headerTemplate($title,$title2)
    {
        ini_set('date.timezone', 'America/El_Salvador');
        print('
        <!DOCTYPE html>
        <html lang="en">
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>The Coffe Cup | '.$title.'</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="../../resources/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="../../resources/css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="../../resources/css/style.min.css" rel="stylesheet">
        
        <link href="../../resources/css/style.css" rel="stylesheet" type="text/css">
        
        <head>
        
        
          <!-- Navbar -->
          <nav class="navbar fixed-top navbar-expand-lg navbar-light danger-color scrolling-navbar">
            <div class="container-fluid">
        
              <!-- Users Guides -->
              <a class="navbar-nav waves-effect mr-4" href="#">
                <strong class="white-text">
                  <p class="h3">'.$title2.'</p>
                </strong>
              </a>
        
              <!-- Collapse and Toggler -->
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
        
              <!-- Links (Website and Name and user type) -->
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
                <!-- Left side -->
                <ul class="navbar-nav mr-auto">
                  <!--con el atriburo active se qeuda seleccionado-->
                  <li class="nav-item ">
                    <a class="nav-link waves-effect white-text" href="#">Ir al sitio público</a>
                    <!-- <span class="sr-only">(current)</span>-->
                  </li>
                </ul>
        
                <!-- Right side -->
                <ul class="navbar-nav nav-flex-icons">
                  <li class="nav-item mr-3">
                    <div>
                      <a href="#" class="white-text h5">Nombre</a>
                    </div>
                    <div>
                      <a href="#" class="white-text h5">Cargo</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#"><img
                        src="https://icons-for-free.com/iconfiles/png/512/headset+male+man+support+user+young+icon-1320196267025138334.png"
                        alt="" width="60px" height="60" class=""></a>
                  </li>
                  <li class="nav-item ml-4">
                    <a href="index.html" class="nav-link waves-effect white-text">
                      <i class="fas fa-sign-out-alt"></i>
                    </a>
                  </li>
                </ul>
              </div>
        
            </div>
          </nav>
        </head>
        
        
        <body class="grey lighten-3">
        
        
          <!--Main Navigation-->
          <header>
        
            <!-- Sidebar -->
            <div class="sidebar-fixed position-fixed fondo">
        
              <!--Logo-->
              <div class="logo-wrapper waves-effect waves-light py-4 my-1">
                <a href="#"><img src="http://www.thecoffeecup.com.sv/img/logo/logo_nav.png" class="img-fluid flex-center"></a>
              </div>
        
              <!-- Sidebar -->
        
              <div class="list-group list-group-flush py-3">
                <a href="dashboard.php" class="list-group-item waves-effect mb-2 active">
                  <i class="fas fa-chart-pie mr-3"></i>Dashboard
                </a>
                <a href="facturacion.php" class="list-group-item waves-effect mb-2 fondo white-text">
                  <i class="fas fa-money-bill-alt mr-3"></i>Facturación</a>
                <a href="Productos.php" class="list-group-item waves-effect mb-2 fondo white-text">
                  <i class="fas fa-coffee mr-3"></i>Productos</a>
                <a href="Sucursales.php" class="list-group-item waves-effect mb-2 fondo white-text">
                  <i class="fas fa-map mr-3"></i>Sucursales</a>
                <a href="Proveedores.php" class="list-group-item waves-effect mb-2 fondo white-text">
                  <i class="fas fa-shopping-cart mr-3"></i>Proveedores</a>
                <a href="Entradas.php" class="list-group-item waves-effect mb-2 fondo white-text">
                  <i class="fas fa-newspaper mr-3"></i>Entradas</a>
                <a href="Clientes.php" class="list-group-item waves-effect mb-2 fondo white-text">
                  <i class="fas fa-users mr-3"></i>Clientes</a> 
                <a href="Usuarios.php" class="list-group-item waves-effect mb-2 fondo white-text">
                  <i class="fas fa-user mr-3"></i>Usuarios</a>
              </div>
        
            </div>
        
          </header>
        ');

    }

    public static function footerTemplate($fixed)
    {
        print('
        <!--Footer-->
        <footer class="page-footer text-center font-small rgba-black-strong mt-4 wow fadeIn '.$fixed.'">
      
        <!--Copyright-->
        <div class="footer-copyright py-3">
          <a href="#" target="_blank"> 2020 Copyright © The Coffe Cup</a>
        </div>
        <!--/.Copyright-->
      
      
      
     
      
      <!-- JQuery -->
      <script type="text/javascript" src="../../resources/Js/jquery-3.4.1.min.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="../../resources/Js/popper.min.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="../../resources/Js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="../../resources/Js/mdb.min.js"></script>
      <!-- Initializations -->
      <script type="text/javascript" src="../../resources/Js/dashboard.js"></script>

          </footer> 
        </body>
      </html>
        ');
    }

    private function modals()
    {
        print('
            <div id="profile-modal" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">Editar perfil</h4>
                    <form method="post" id="profile-form">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="nombres_perfil" type="text" name="nombres_perfil" class="validate" required/>
                                <label for="nombres_perfil">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="apellidos_perfil" type="text" name="apellidos_perfil" class="validate" required/>
                                <label for="apellidos_perfil">Apellidos</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">email</i>
                                <input id="correo_perfil" type="email" name="correo_perfil" class="validate" required/>
                                <label for="correo_perfil">Correo</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person_pin</i>
                                <input id="alias_perfil" type="text" name="alias_perfil" class="validate" required/>
                                <label for="alias_perfil">Alias</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                        </div>
                    </form>
                </div>
            </div>

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
        ');
    }
}
?>

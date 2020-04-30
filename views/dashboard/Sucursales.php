<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Sucursales','Sucursales');
?>
  

<!--Main layout-->
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
        </h4>

        <form class="d-flex justify-content-center">
          <!-- Default input -->

          <input type="search" placeholder="Que estas buscando" aria-label="Search" class="form-control">
          <button class="btn btn-dark btn-sm my-0 p" type="submit">
            <i class="fas fa-search"></i>
          </button>

        </form>

      </div>

    </div>

    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-center">

          <form class="d-flex justify-content-center">
            <!-- Default input -->
            <div class="table">
              <table class="table-responsive">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Inauguracion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Loma Linda</td>
                    <td>Vainilla,Fresa,Chocolate</td>
                    <td>imagen</td>
                    <td>12/03/2020</td>
                    <td>3333-333</td>
                    <td>2257-7777</td>
                    <td>Disponible</td>

                    <td> 
                      <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm"></a>
                      <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">
                      <!--encabezado del modal-->  
                      <div class="modal-dialog" role="document">
                        <div class="modal-content p-4">
                          <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Estado del pedido</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <!--contenido del modal-->

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                            </div>
                            <select class="browser-default custom-select" id="inputGroupSelect01">
                              <option selected>Escoge...</option>
                              <option value="1">Empleado</option>
                              <option value="2">Gerente</option>
                              <option value="3">Motorista</option>
                            </select>
                          </div>
                            <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
                          </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    </a>
                  </td>
                  <!--termina el modal-->
                    <td>
                       <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a>
                      <div class="modal fade" id="modalContactForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">
                      <!--encabezado del modal-->  
                      <div class="modal-dialog"  role="document">
                        <div class="modal-content p-4">
                          <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Seguro de lo que haces?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <!--contenido del modal-->
                          <div class="md-form input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text md-addon" id="material-addon1"></span>
                            </div>
                            <p><h3>Esta seguro que desea desactivar este dato?</h3></p>
                          </div> 
                        <div class="modal-footer d-flex justify-content-center">
                          <button class="btn blue-gradient">Desactivar <i class="fas fa-paper-plane-o ml-1"></i></button>
                        </div>
                      </div>
                         
                      </div>
                      </div>
                    </a></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Loma Linda</td>
                    <td>Vainilla,Fresa,Chocolate</td>
                    <td>imagen</td>
                    <td>12/03/2020</td>
                    <td>3333-333</td>
                    <td>2257-7777</td>
                    <td>Disponible</td>
                    <td>
                       <!--boton para mostrar el modal-->
                       <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">

                      
                     </a>
                    </td>
                    <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Loma Linda</td>
                    <td>Vainilla,Fresa,Chocolate</td>
                    <td>imagen</td>
                    <td>12/03/2020</td>
                    <td>3333-333</td>
                    <td>2257-7777</td>
                    <td>Disponible</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                      </td>
                    <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></a></td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Loma Linda</td>
                    <td>Vainilla,Fresa,Chocolate</td>
                    <td>imagen</td>
                    <td>12/03/2020</td>
                    <td>3333-333</td>
                    <td>2257-7777</td>
                    <td>Disponible</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm"></a>
                  </td>
                    <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Loma Linda</td>
                    <td>Vainilla,Fresa,Chocolate</td>
                    <td>imagen</td>
                    <td>12/03/2020</td>
                    <td>3333-333</td>
                    <td>2257-7777</td>
                    <td>Disponible</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">

                    </a></td>
                    <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Loma Linda</td>
                    <td>Vainilla,Fresa,Chocolate</td>
                    <td>imagen</td>
                    <td>12/03/2020</td>
                    <td>3333-333</td>
                    <td>2257-7777</td>
                    <td>Disponible</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                     
                    </a></td>
                    <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Loma Linda</td>
                    <td>Vainilla,Fresa,Chocolate</td>
                    <td>imagen</td>
                    <td>12/03/2020</td>
                    <td>3333-333</td>
                    <td>2257-7777</td>
                    <td>Disponible</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                      
                    </a></td>
                    <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </form>

        </div>

      </div>
      <div>
        <nav aria-label="Page navigation example" >
          <ul class="pagination pg-blue">
            <li class="page-item"><a class="page-link">Previous</a></li>
            <li class="page-item"><a class="page-link">1</a></li>
            <li class="page-item"><a class="page-link">2</a></li>
            <li class="page-item"><a class="page-link">3</a></li>
            <li class="page-item"><a class="page-link">Next</a></li>
          </ul>
        </nav>
        </div>

  </main>
  <!--Main layout-->

  <?php
Dashboard::footerTemplate('fixed-bottom');
?>
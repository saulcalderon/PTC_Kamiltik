<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Productos','Productos');
?>
  
  <!--Main Navigation-->

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
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Fecha registro</th>
                    <th scope="col">Sucursal</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Desactivar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Cafe Latte sin espresso</td>
                    <td>Vainilla,fresa,cochocolate</td>
                    <td>$12</td>
                    <td>Imagen</td>
                    <td>12/03/2020</td>
                    <td>Altos la Escalon</td>
                    <td>Disponible</td>
                    <td> 
                      <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm"></a>
                      <div class="modal fade justify-content-center" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">
                      <!--encabezado del modal-->  
                      <div class="modal-dialog" role="document">
                        <div class="modal-content p-4">
                          <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <!--contenido del modal-->
                          <div class="md-form input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text md-addon" id="material-addon1"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre del producto" aria-label="Username" aria-describedby="material-addon1">
                          </div>

                            <!-- Material input -->
                            <div class="md-form">
                              <input type="number" id="numberExample" class="form-control">
                              <label for="numberExample">Coloque la existencia</label>
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                              </div>
                              <select class="browser-default custom-select" id="inputGroupSelect01">
                                <option selected>Descuentos...</option>
                                <option value="1">10%</option>
                                <option value="2">20%</option>
                                <option value="3">30%</option>
                                <option value="4">40%</option>
                                <option value="5">50%</option>
                                <option value="6">60%</option>
                                <option value="7">70%</option>
                                <option value="8">80%</option>
                                <option value="9">90%</option>
                              </select>

                              <div class="md-form input-group mb-3">
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <label for="numberExample">Precio C/U</label>
                                <div class="input-group-append">
                                  <span class="input-group-text md-addon"></span>
                                </div>
                              </div>
                          
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                                </div>
                                <select class="browser-default custom-select" id="inputGroupSelect01">
                                  <option selected>Estado...</option>
                                  <option value="1">En Stock</option>
                                  <option value="2">Pocas Unidades</option>
                                  <option value="3">Agotado</option>
                                </select>
                              </div>
                          <hr>
                                              
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                            </div>
                            <select class="browser-default custom-select" id="inputGroupSelect01">
                              <option selected>Tipo de Producto...</option>
                              <option value="1">Biciletas</option>
                              <option value="2">Caminadoras</option>
                              <option value="3">PESAS</option>
                            </select>
                          </div>
                            <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-unique ">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
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
                    </a>
                  </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Cafe Latte sin espresso</td>
                    <td>Vainilla,fresa,cochocolate</td>
                    <td>$12</td>
                    <td>Imagen</td>
                    <td>12/03/2020</td>
                    <td>Altos la Escalon</td>
                    <td>Disponible</td>

                    <td>
                       <!--boton para mostrar el modal-->
                       <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                       <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                       aria-hidden="true">
                      
                     </a>
                    </td>
                    <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Cafe Latte sin espresso</td>
                    <td>Vainilla,fresa,cochocolate</td>
                    <td>$12</td>
                    <td>Imagen</td>
                    <td>12/03/2020</td>
                    <td>Altos la Escalon</td>
                    <td>Disponible</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                    </a></td>
                    <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Cafe Latte sin espresso</td>
                    <td>Vainilla,fresa,cochocolate</td>
                    <td>$12</td>
                    <td>Imagen</td>
                    <td>12/03/2020</td>
                    <td>Altos la Escalon</td>
                    <td>Disponible</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                    </a></td>
                    <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Cafe Latte sin espresso</td>
                    <td>Vainilla,fresa,cochocolate</td>
                    <td>$12</td>
                    <td>Imagen</td>
                    <td>12/03/2020</td>
                    <td>Altos la Escalon</td>
                    <td>Disponible</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                    </a></td>
                    <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Cafe Latte sin espresso</td>
                    <td>Vainilla,fresa,cochocolate</td>
                    <td>$12</td>
                    <td>Imagen</td>
                    <td>12/03/2020</td>
                    <td>Altos la Escalon</td>
                    <td>Disponible</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                    </a></td>
                    <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Cafe Latte sin espresso</td>
                    <td>Vainilla,fresa,cochocolate</td>
                    <td>$12</td>
                    <td>Imagen</td>
                    <td>12/03/2020</td>
                    <td>Altos la Escalon</td>
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




<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Clientes','Clientes');
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
          <button type="button" class="btn btn-success btn-lg my-0 p" data-toggle="modal" data-target="#btnagregar">Agregar Clientes</button>
            <div class="modal fade" id="btnagregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">

                            <!--contenido del modal-->
                            <div class="modal-dialog modal-lg"  role="document">
                              <div class="modal-content p-4">
                                <div class="modal-header text-center">
                                  <h4 class="modal-title w-100 font-weight-bold">Agregar clientes</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <!--contenido del modal-->
                                <section class="mb-4">
                              <div class="row">
                                  <!--Grid column-->
                                  <div class="col-md-12 mb-md-0 mb-8">
                                      <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                          <!--Grid row-->
                                          <div class="row">

                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Nombre</label>
                                                  </div>
                                              </div>
                                              <!--Grid column-->

                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="email" name="email" class="form-control">
                                                      <label for="email" class="">Fecha de nacimiento</label>
                                                  </div>
                                              </div>

                                          </div>

                                            <!--Grid row-->
                                              <div class="row">
                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Apellido</label>
                                                  </div>
                                              </div>
                                              <!--Grid column-->

                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                  <div class="input-group mb-3">
                                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                                      <option selected>Producto favorito</option>
                                                      <option value="1">Cafe caliente</option>
                                                      <option value="2">Cafe frio</option>
                                                      <option value="2">Postre</option>
                                                    </select>
                                                  </div>
                                                  </div>
                                              </div>

                                              </div>
                                              <!--Grid row-->
                                              <div class="row">
                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Correo</label>
                                                  </div>
                                              </div>
                                              <!--Grid column-->

                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                  <div class="input-group mb-3">
                                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                                      <option selected>Sucursal favorita</option>
                                                      <option value="1">Sucursal 1</option>
                                                      <option value="2">Sucursal 2</option>
                                                      <option value="3">Sucursal 3</option>
                                                      <option value="4">Sucursal 4</option>
                                                    </select>
                                                  </div>
                                                  </div>
                                              </div>

                                              </div>
                                      </form>

                                  </div>

                              </div>

                            </section>
                                  <div class="modal-footer d-flex justify-content-center">
                                  <button class="btn btn-unique">Agregar cliente<i class="fas fa-paper-plane-o ml-1"></i></button>
                                </div>
                                </div>
    
                              </div>
                            </div>
                          </a>
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
                      <th scope="col">Apellido</th>
                      <th scope="col">Correo</th>
                      <th scope="col">Fecha de nacimiento</th>
                      <th scope="col">Producto Favorito</th>
                      <th scope="col">Sucursal Favorita</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Josue</td>
                      <td>Edgardo</td>
                      <td>Chuzjr@outlook.com</td>
                      <td>05/05/2001</td>
                      <td>Cafe</td>
                      <td>Escalon</td>
                      <td> 
                        <!--boton para mostrar el modal-->
                        <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm"></a>
                        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">

                            <!--contenido del modal-->
                            <div class="modal-dialog modal-lg"  role="document">
                              <div class="modal-content p-4">
                                <div class="modal-header text-center">
                                  <h4 class="modal-title w-100 font-weight-bold">Modificacion de clientes</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <!--contenido del modal-->
                                <section class="mb-4">
                              <div class="row">
                                  <!--Grid column-->
                                  <div class="col-md-12 mb-md-0 mb-8">
                                      <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                          <!--Grid row-->
                                          <div class="row">

                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Nombre</label>
                                                  </div>
                                              </div>
                                              <!--Grid column-->

                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="email" name="email" class="form-control">
                                                      <label for="email" class="">Fecha de nacimiento</label>
                                                  </div>
                                              </div>

                                          </div>

                                            <!--Grid row-->
                                              <div class="row">
                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Apellido</label>
                                                  </div>
                                              </div>
                                              <!--Grid column-->

                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                  <div class="input-group mb-3">
                                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                                      <option selected>Producto favorito</option>
                                                      <option value="1">Cafe caliente</option>
                                                      <option value="2">Cafe frio</option>
                                                      <option value="2">Postre</option>
                                                    </select>
                                                  </div>
                                                  </div>
                                              </div>

                                              </div>
                                              <!--Grid row-->
                                              <div class="row">
                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Correo</label>
                                                  </div>
                                              </div>
                                              <!--Grid column-->

                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                  <div class="input-group mb-3">
                                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                                      <option selected>Sucursal favorita</option>
                                                      <option value="1">Sucursal 1</option>
                                                      <option value="2">Sucursal 2</option>
                                                      <option value="3">Sucursal 3</option>
                                                      <option value="4">Sucursal 4</option>
                                                    </select>
                                                  </div>
                                                  </div>
                                              </div>

                                              </div>
                                      </form>

                                  </div>

                              </div>

                            </section>
                                  <div class="modal-footer d-flex justify-content-center">
                                  <button class="btn btn-unique">Modificar Cliente <i class="fas fa-paper-plane-o ml-1"></i></button>
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
                        <div class="modal-dialog modal-lg"  role="document">
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
                      <td>Josue</td>
                      <td>Edgardo</td>
                      <td>Chuzjr@outlook.com</td>
                      <td>05/05/2001</td>
                      <td>Cafe</td>
                      <td>Escalon</td>

                      <td>
                         <!--boton para mostrar el modal-->
                         <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm"></a>
                      </td>
                      <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Josue</td>
                      <td>Edgardo</td>
                      <td>Chuzjr@outlook.com</td>
                      <td>05/05/2001</td>
                      <td>Cafe</td>
                      <td>Escalon</td>

                      <td> <!--boton para mostrar el modal-->
                        <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm">
                        </a></td>
                      <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Josue</td>
                      <td>Edgardo</td>
                      <td>Chuzjr@outlook.com</td>
                      <td>05/05/2001</td>
                      <td>Cafe</td>
                      <td>Escalon</td>

                      <td> <!--boton para mostrar el modal-->
                        <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm"></a></td>
                      <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>Josue</td>
                      <td>Edgardo</td>
                      <td>Chuzjr@outlook.com</td>
                      <td>05/05/2001</td>
                      <td>Cafe</td>
                      <td>Escalon</td>

                      <td> <!--boton para mostrar el modal-->
                        <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm">
                        </td>
                      <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                    </tr>
                    <tr>
                      <th scope="row">6</th>
                      <td>Josue</td>
                      <td>Edgardo</td>
                      <td>Chuzjr@outlook.com</td>
                      <td>05/05/2001</td>
                      <td>Cafe</td>
                      <td>Escalon</td>

                      <td> <!--boton para mostrar el modal-->
                        <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm"> 
                      </a></td>
                      <td><a href="" class="btn-floating btn-sm btn-danger fas fa-minus" data-toggle="modal" data-target="#modalContactForm1"></a></td>
                    </tr>
                    <tr>
                      <th scope="row">7</th>
                      <td>Josue</td>
                      <td>Edgardo</td>
                      <td>Chuzjr@outlook.com</td>
                      <td>05/05/2001</td>
                      <td>Cafe</td>
                      <td>Escalon</td>

                      <td> <!--boton para mostrar el modal-->
                        <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm">
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
Dashboard::footerTemplate('pt-4');
?>

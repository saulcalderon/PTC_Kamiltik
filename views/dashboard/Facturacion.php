<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Facturacion','Facturacion');
?>
</head>





<body class="grey lighten-3">


  <!--Main Navigation-->
  <header>


  </header>
  
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
                    <th scope="col">Fecha </th>
                    <th scope="col">Sucursal</th>
                    <th scope="col">Usuario </th>
                    <th scope="col">Producto</th>
                    <th scope="col">Entregado</th>
                    <th scope="col">Cambio</th>
                    <th scope="col">Total</th>
                    <th scope="col">boton 1</th>
                    <th scope="col">boton 2</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td scope="row">05/05/2020</td>
                    <td scope="row">Loma linda</td>
                    <td scope="row">Saul Caldoneron</td>
                    <td scope="row">25</td>
                    <th scope="row">$12</th>
                    <th scope="row">$20</th>
                    <th scope="row">$20</th>
                    <td> 
                      <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm"></a>
                      <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                          <hr>
                          <form>
                            <!-- Grid row -->
                            <div class="row">
                              <!-- Grid column -->
                              <div class="col">
                                <!-- Material input -->
                                <div class="md-form mt-0">
                                  <input type="text" class="form-control" placeholder="First name">
                                </div>
                              </div>
                              <!-- Grid column -->
                          
                              <!-- Grid column -->
                              <div class="col">
                                <!-- Material input -->
                                <div class="md-form mt-0">
                                  <input type="text" class="form-control" placeholder="Last name">
                                </div>
                              </div>
                              <!-- Grid column -->
                            </div>
                            <!-- Grid row -->
                          </form>

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                            </div>
                            <select class="browser-default custom-select" id="inputGroupSelect01">
                              <option selected>Tipo de estados...</option>
                              <option value="1">en proceso</option>
                              <option value="2">por comenzar</option>
                              <option value="3">finalizado</option>
                            </select>
                          </div>

                          <div class="md-form input-group mb-3">
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <label for="numberExample">Precio C/U</label>
                            <div class="input-group-append">
                              <span class="input-group-text md-addon"></span>
                            </div>
                          </div>

                          </div>
                          <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </a>
                  </td>
                  <!--Boton para desactivar los datos-->
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
                    <td scope="row">05/05/2020</td>
                    <td scope="row">Loma linda</td>
                    <td scope="row">Saul Caldoneron</td>
                    <td scope="row">25</td>
                    <th scope="row">$12</th>
                    <th scope="row">$20</th>
                    <th scope="row">$20</th>
                    <td>
                       <!--boton para mostrar el modal-->
                       <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                     </a>
                    </td>
                    <td><a class="btn-floating btn-sm btn-danger "><i class="fas fa-minus"></i></a></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td scope="row">05/05/2020</td>
                    <td scope="row">Loma linda</td>
                    <td scope="row">Saul Caldoneron</td>
                    <td scope="row">25</td>
                    <th scope="row">$12</th>
                    <th scope="row">$20</th>
                    <th scope="row">$20</th>
                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                      <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">
                      <!--encabezado del modal-->  
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <!--contenido del modal-->
                          <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                              <i class="fas fa-user prefix grey-text"></i>
                              <input type="text" id="form34" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="form34">Your name</label>
                            </div>
                    
                            <div class="md-form mb-5">
                              <i class="fas fa-envelope prefix grey-text"></i>
                              <input type="email" id="form29" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="form29">Your email</label>
                            </div>
                    
                            <div class="md-form mb-5">
                              <i class="fas fa-tag prefix grey-text"></i>
                              <input type="text" id="form32" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="form32">Subject</label>
                            </div>
                    
                            <div class="md-form">
                              <i class="fas fa-pencil prefix grey-text"></i>
                              <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                              <label data-error="wrong" data-success="right" for="form8">Your message</label>
                            </div>
                    
                          </div>
                          <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </a></td>
                    <td><a class="btn-floating btn-sm btn-danger "><i class="fas fa-minus"></i></a></td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td scope="row">05/05/2020</td>
                    <td scope="row">Loma linda</td>
                    <td scope="row">Saul Caldoneron</td>
                    <td scope="row">25</td>
                    <th scope="row">$12</th>
                    <th scope="row">$20</th>
                    <th scope="row">$20</th>
                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                      <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">

                    </a></td>
                    <td><a class="btn-floating btn-sm btn-danger"><i class="fas fa-minus"></i></a></td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td scope="row">05/05/2020</td>
                    <td scope="row">Loma linda</td>
                    <td scope="row">Saul Caldoneron</td>
                    <td scope="row">25</td>
                    <th scope="row">$12</th>
                    <th scope="row">$20</th>
                    <th scope="row">$20</th>
                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                      <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">
                      <!--encabezado del modal-->  
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <!--contenido del modal-->
                          <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                              <i class="fas fa-user prefix grey-text"></i>
                              <input type="text" id="form34" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="form34">Your name</label>
                            </div>
                    
                            <div class="md-form mb-5">
                              <i class="fas fa-envelope prefix grey-text"></i>
                              <input type="email" id="form29" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="form29">Your email</label>
                            </div>
                    
                            <div class="md-form mb-5">
                              <i class="fas fa-tag prefix grey-text"></i>
                              <input type="text" id="form32" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="form32">Subject</label>
                            </div>
                    
                            <div class="md-form">
                              <i class="fas fa-pencil prefix grey-text"></i>
                              <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                              <label data-error="wrong" data-success="right" for="form8">Your message</label>
                            </div>
                    
                          </div>
                          <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </a></td>
                    <td><a class="btn-floating btn-sm btn-danger "><i class="fas fa-minus"></i></a></td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td scope="row">05/05/2020</td>
                    <td scope="row">Loma linda</td>
                    <td scope="row">Saul Caldoneron</td>
                    <td scope="row">25</td>
                    <th scope="row">$12</th>
                    <th scope="row">$20</th>
                    <th scope="row">$20</th>
                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                      <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">
                      <!--encabezado del modal-->  
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <!--contenido del modal-->
                          <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                              <i class="fas fa-user prefix grey-text"></i>
                              <input type="text" id="form34" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="form34">Your name</label>
                            </div>
                    
                            <div class="md-form mb-5">
                              <i class="fas fa-envelope prefix grey-text"></i>
                              <input type="email" id="form29" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="form29">Your email</label>
                            </div>
                    
                            <div class="md-form mb-5">
                              <i class="fas fa-tag prefix grey-text"></i>
                              <input type="text" id="form32" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="form32">Subject</label>
                            </div>
                    
                            <div class="md-form">
                              <i class="fas fa-pencil prefix grey-text"></i>
                              <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                              <label data-error="wrong" data-success="right" for="form8">Your message</label>
                            </div>
                    
                          </div>
                          <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </a></td>
                    <td><a class="btn-floating btn-sm btn-danger "><i class="fas fa-minus"></i></a></td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td scope="row">05/05/2020</td>
                    <td scope="row">Loma linda</td>
                    <td scope="row">Saul Caldoneron</td>
                    <td scope="row">25</td>
                    <th scope="row">$12</th>
                    <th scope="row">$20</th>
                    <th scope="row">$20</th>
                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-plus" data-toggle="modal" data-target="#modalContactForm">
                      <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">
                      <!--encabezado del modal-->  
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <!--contenido del modal-->
                          <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                              <i class="fas fa-user prefix grey-text"></i>
                              <input type="text" id="form34" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="form34">Your name</label>
                            </div>
                    
                            <div class="md-form mb-5">
                              <i class="fas fa-envelope prefix grey-text"></i>
                              <input type="email" id="form29" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="form29">Your email</label>
                            </div>
                    
                            <div class="md-form mb-5">
                              <i class="fas fa-tag prefix grey-text"></i>
                              <input type="text" id="form32" class="form-control validate">
                              <label data-error="wrong" data-success="right" for="form32">Subject</label>
                            </div>
                    
                            <div class="md-form">
                              <i class="fas fa-pencil prefix grey-text"></i>
                              <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                              <label data-error="wrong" data-success="right" for="form8">Your message</label>
                            </div>
                    
                          </div>
                          <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </a></td>
                    <td><a class="btn-floating btn-sm btn-danger "><i class="fas fa-minus"></i></a></td>
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

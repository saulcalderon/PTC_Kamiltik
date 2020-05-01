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
			<button type="button" class="btn btn-success btn-lg my-0 p" data-toggle="modal" data-target="#btnagregar">Agregar producto</button>
			<div class="modal fade justify-content-center" id="btnagregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">
                      <!--encabezado del modal-->  
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content p-4">
                          <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Agregar Productos</h4>
                            
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
                                              <div class="col-md-4">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Nombre del producto</label>
                                                  </div>
                                              </div>
                                              <!--Grid column-->

                                              <!--Grid column-->
                                              <div class="col-md-4">
											  <div class="md-form mb-0">
                                                  <div class="input-group mb-3">
                                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                                      <option selected>Sucursal</option>
                                                      <option value="1">Disponible</option>
                                                      <option value="2">Inactivo</option>
                                                    </select>
                                                  </div>
                                                  </div>
                                              	</div>
                                      <div class="col-md-4">
                                        <div class="md-form mb-0">
                                          <div class="input-group mb-3">
                                            <select class="browser-default custom-select" id="inputGroupSelect01">
                                            <option selected>Proveedor</option>
                                            <option value="1">Disponible</option>
                                            <option value="2">Inactivo</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                          </div>

                                            <!--Grid row-->
                                              <div class="row">
                                              <!--Grid column-->
                                              <div class="col-md-4">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Descrpcion</label>
                                                  </div>
                                              </div>
											                  	<div class="col-md-4">
                                                  <div class="md-form mb-0">
                                                  <div class="input-group mb-3">
                                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                                      <option selected>Estado del producto</option>
                                                      <option value="1">Administrador</option>
                                                      <option value="2">Gerente</option>
                                                    </select>
                                                  </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-4">
                                                  <div class="md-form mb-0">
                                                  <div class="input-group mb-3">
                                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                                      <option selected>Estado de distribucion</option>
                                                      <option value="1">Administrador</option>
                                                      <option value="2">Gerente</option>
                                                    </select>
                                                  </div>
                                                  </div>
											                         </div>

                                              </div>
                                              
                                              <div class="row">
                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Precio</label>
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                  <div class="input-group mb-3">
                                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                                      <option selected>Categoria</option>
                                                      <option value="1">Administrador</option>
                                                      <option value="2">Gerente</option>
                                                    </select>
                                                  </div>
                                                </div>
                                            </div>
                                              

                                              </div>


                                          <!--Grid row-->
                                          <div class="row">
										  
											                      <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                	<div class="input-group">
                                                    	<div class="custom-file">
                                                      		<input type="file" class="custom-file-input" id="inputGroupFile01"
                                                     		 aria-describedby="inputGroupFileAddon01">
                                                    	  	<label class="custom-file-label" for="inputGroupFile01">Imagen</label>
                                                    	</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                	<div class="input-group">
                                                    	<div class="custom-file">
                                                      		<input type="file" class="custom-file-input" id="inputGroupFile02"
                                                     		 aria-describedby="inputGroupFileAddon01">
                                                    	  	<label class="custom-file-label" for="inputGroupFile02">Imagen</label>
                                                    	</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-12">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Cantidad</label>
                                                  </div>
                                              </div>
											</div>

											
                                      </form>

                                  </div>

                              </div>

                            </section>


                              <div class="modal-footer d-flex justify-content-center">
                              <button class="btn btn-unique">Agregar producto<i class="fas fa-paper-plane-o ml-1"></i></button>
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
                    <th scope="col">Descripcion</th>
					<th scope="col">Precio</th>
					<th scope="col">imagen</th>
                    <th scope="col">Fecha registro</th>
                    <th scope="col">Sucursal</th>
					<th scope="col">Estado</th>
					<th scope="col">Cantidad</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
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
					<td>20</td>
                    <td> 
                      <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm"></a>
                      <div class="modal fade justify-content-center" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">
                      <!--encabezado del modal-->  
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content p-4">
                          <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Modificar Productos</h4>
                            
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
                                              <div class="col-md-4">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Nombre del producto</label>
                                                  </div>
                                              </div>
                                              <!--Grid column-->

                                              <!--Grid column-->
                                              <div class="col-md-4">
											  <div class="md-form mb-0">
                                                  <div class="input-group mb-3">
                                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                                      <option selected>Sucursal</option>
                                                      <option value="1">Disponible</option>
                                                      <option value="2">Inactivo</option>
                                                    </select>
                                                  </div>
                                                  </div>
                                              	</div>
												<div class="col-md-4">
													<div class="md-form mb-0">
														<div class="input-group mb-3">
															<select class="browser-default custom-select" id="inputGroupSelect01">
															<option selected>Proveedor</option>
															<option value="1">Disponible</option>
															<option value="2">Inactivo</option>
															</select>
														</div>
													</div>
												</div>
                                          </div>

                                            <!--Grid row-->
                                              <div class="row">
                                              <!--Grid column-->
                                              <div class="col-md-4">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Descrpcion</label>
                                                  </div>
                                              </div>
												<div class="col-md-4">
                                                  <div class="md-form mb-0">
                                                  <div class="input-group mb-3">
                                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                                      <option selected>Estado del producto</option>
                                                      <option value="1">Administrador</option>
                                                      <option value="2">Gerente</option>
                                                    </select>
                                                  </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-4">
                                                  <div class="md-form mb-0">
                                                  <div class="input-group mb-3">
                                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                                      <option selected>Estado de distribucion</option>
                                                      <option value="1">Administrador</option>
                                                      <option value="2">Gerente</option>
                                                    </select>
                                                  </div>
                                                  </div>
											  </div>

                                              </div>
                                              
                                              <div class="row">
                                              <!--Grid column-->
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Precio</label>
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="md-form mb-0">
                                                  <div class="input-group mb-3">
                                                    <select class="browser-default custom-select" id="inputGroupSelect01">
                                                      <option selected>Categoria</option>
                                                      <option value="1">Administrador</option>
                                                      <option value="2">Gerente</option>
                                                    </select>
                                                  </div>
												  </div>
											</div>
                                              

                                              </div>


                                          <!--Grid row-->
                                          <div class="row">
										  
											<div class="col-md-6">
                                                <div class="md-form mb-0">
                                                	<div class="input-group">
                                                    	<div class="custom-file">
                                                      		<input type="file" class="custom-file-input" id="inputGroupFile01"
                                                     		 aria-describedby="inputGroupFileAddon01">
                                                    	  	<label class="custom-file-label" for="inputGroupFile01">Imagen</label>
                                                    	</div>
                                                    </div>
                                                </div>
											</div>
											<div class="col-md-6">
                                                <div class="md-form mb-0">
                                                	<div class="input-group">
                                                    	<div class="custom-file">
                                                      		<input type="file" class="custom-file-input" id="inputGroupFile02"
                                                     		 aria-describedby="inputGroupFileAddon01">
                                                    	  	<label class="custom-file-label" for="inputGroupFile02">Imagen</label>
                                                    	</div>
                                                    </div>
                                                </div>
                                            </div>
											</div>
											<div class="row">
											<div class="col-md-12">
                                                  <div class="md-form mb-0">
                                                      <input type="text" id="name" name="name" class="form-control">
                                                      <label for="name" class="">Precio</label>
                                                  </div>
                                              </div>
											</div>	  
											
                                      </form>

                                  </div>

                              </div>

                            </section>


                              <div class="modal-footer d-flex justify-content-center">
                              <button class="btn btn-unique">Modificar productos<i class="fas fa-paper-plane-o ml-1"></i></button>
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
                      <div class="modal-dialog "  role="document">
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
					<td>20</td>

                    <td>
                       <!--boton para mostrar el modal-->
                       <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm"> 
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
					<td>20</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm">
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
					<td>20</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm">
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
					<td>20</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm">
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
					<td>20</td>

                    <td> <!--boton para mostrar el modal-->
                      <a href="" class="btn-floating btn-sm btn-success fas fa-pen" data-toggle="modal" data-target="#modalContactForm">
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
					<td>20</td>

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




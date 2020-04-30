<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Dashboard','Dashboard');
?>
<!--Main Navigation-->

<!--Main layout-->
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">
        <div>
          <a class="navbar-brand blue-text">Bienvenido/@</a>
        </div>

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
    <!-- Heading -->


    <!--barras-->
    <div class="row wow fadeIn">

      <!--Grid column-->
      <div class="col-md-9 mb-4">

        <!--Card-->
        <div class="card">

          <!--Card content-->
          <div class="card-body">

            <canvas id="myChart">lineas</canvas>

          </div>

        </div>
        <!--/.Card-->

      </div>


      <!--Grid column-->
      <div class="col-md-3 mb-5">

        <!--Card-->
        <div class="card m-4">

          <!-- Card header -->
          <div class="card-header text-center">
            Pie chart
          </div>

          <!--Card content-->
          <div class="card-body">

            <canvas id="pieChart"></canvas>

          </div>

        </div>
        <!--/.Card-->


        <!--Card content-->


      </div>
      <!--/.Card-->


    </div>

  </div>
  <!--Grid column-->

  </div>
  <!--Grid row-->


  <!--/.Card-->

  </div>
  <!--Grid column-->

  </div>


  <!--Grid row-->
  <div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-6 mb-4">

      <!--tarjeta-->
      <div class="card">

        <!--contenido de la tarjeta-->
        <div class="card-body">

          <!-- table  -->
          <table class="table table-hover">
            <!-- encabezado -->
            <thead class="blue-grey lighten-4">
              <tr>
                <th>#</th>
                <th>Lorem</th>
                <th>Ipsum</th>
                <th>Dolor</th>
              </tr>
            </thead>
            <!-- Table head -->

            <!-- Table body -->
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Cell 4</td>
                <td>Cell 5</td>
                <td>Cell 6</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Cell 7</td>
                <td>Cell 8</td>
                <td>Cell 9</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Cell 7</td>
                <td>Cell 8</td>
                <td>Cell 9</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Cell 7</td>
                <td>Cell 8</td>
                <td>Cell 9</td>
              </tr>
            </tbody>
            <!-- Table body -->
          </table>
          <!-- Table  -->

        </div>

      </div>
      <!--/.Card-->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-6 mb-4">

      <!--Card-->
      <div class="card">

        <!--Card content-->
        <div class="card-body">

          <!-- Table  -->
          <table class="table table-hover">
            <!-- Table head -->
            <thead class="blue lighten-4">
              <tr>
                <th>#</th>
                <th>Lorem</th>
                <th>Ipsum</th>
                <th>Dolor</th>
              </tr>
            </thead>
            <!-- Table head -->

            <!-- Table body -->
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Cell 4</td>
                <td>Cell 5</td>
                <td>Cell 6</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Cell 7</td>
                <td>Cell 8</td>
                <td>Cell 9</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Cell 7</td>
                <td>Cell 8</td>
                <td>Cell 9</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Cell 7</td>
                <td>Cell 8</td>
                <td>Cell 9</td>
              </tr>
            </tbody>
            <!-- Table body -->
          </table>
          <!-- Table  -->

        </div>

      </div>
      <!--/.Card-->

    </div>
    <!--Grid column-->

  </div>

</main>
<!--Main layout-->
<?php
Dashboard::footerTemplate('pt-4');
?>
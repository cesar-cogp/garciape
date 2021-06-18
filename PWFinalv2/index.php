<?php include('php/index_log.php') ?>


<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido - Accesorios Treviño</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <style>     
    .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    }

    @media (min-width: 768px) {
    .bd-placeholder-img-lg {
    font-size: 3.5rem;
      }
    }
    </style>


    <!-- Custom styles for this template -->
    <?php if(!empty($user)) : ?>
    
    <link href="css/dashboard.css" rel="stylesheet"> 

    <?php else: ?>

      <link href="css/index.css" rel="stylesheet">

    <?php endif;  ?>

  </head>
  <body class="d-flex h-100 bg-dark">

    <?php if(!empty($user)) : ?>

      <div class="container-fluid bg-dark">
        <div class="row">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 text-white border-bottom">
            <h1 class="h2">¡Bienvenido, <?= $user['usuario'] ?>! Esto es el Dashboard de Accesorios Treviño</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
                <a type="button" class="btn btn-sm btn-outline-secondary" href="php/logout.php">Cerrar sesión</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
              <!-- MESSAGES -->

              <?php if (isset($_SESSION['message'])) { ?>
              <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                  <?= $_SESSION['message']?>
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php $_SESSION['message'] = null;} ?>

              <!-- Formulario para agregar mercancia -->
              <h5 class="card-header text-white">Agregar mercancia</h5>
              <div class="card card-body card-sm text-center text-dark bg-dark" style="top: 2.5rem;">
                  <form action="php/save_merch.php" method="POST">
                      <div class="form-group">
                          <input type="text" name="tipo" class="form-control text-white bg-transparent" placeholder="Tipo de accesorio" autofocus>
                      </div>
                      <div class="form-group">
                          <input type="text" name="marca" class="form-control text-white bg-transparent " placeholder="Marca a la que pertenece" >
                      </div>
                      <div class="form-group">
                          <input type="text" name="modelo" class="form-control text-white bg-transparent" placeholder="Modelo que le corresponde" >
                      </div>
                      <div class="form-group">
                          <textarea name="descripcion" rows="2" class="form-control text-white text-white bg-transparent" placeholder="Descripcion del accesorio"></textarea>
                      </div>
                      <div class="form-group">
                          <input type="number" name="cantidad" class="form-control text-white bg-transparent" placeholder="Cantidad en existencia" >
                      </div>
                      <div class="form-group">
                          <input type="number" name="costo_unitario" class="form-control text-white bg-transparent" placeholder="Precio de compra (unitario)" >
                      </div>
                      <div class="form-group">
                          <input type="number" name="precio_unitario" class="form-control text-white bg-transparent" placeholder="Precio de venta (unitario)" >
                      </div>
                      <div class="form-group">
                          <input type="text" name="estatus" class="form-control text-white bg-transparent" placeholder="¿En existencia?" >
                      </div>
                      <input type="submit" name="save_merch" class="btn btn-success btn-block " value="Guardar accesorio">
                  </form>
              </div>
          </div>
          <div class="col-md-8 text-white">
              <h2>Mercancia</h2>
              <div class="table-responsive">
                  <table class="table table-dark table-striped table-sm">
                      <thead>
                          <tr>
                              <th>Codigo</th>
                              <th>Tipo</th>
                              <th>Marca</th>
                              <th>Modelo</th>
                              <th>Descripcion</th>
                              <th>Cantidad</th>
                              <th>Costo Uni</th>
                              <th>Precio Uni</th>
                              <th>Estatus</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>

                          <?php
                          $query = "select * from mercancia";
                          $statement = $conn->prepare($query);
                          $statement -> setFetchMode(PDO::FETCH_ASSOC);
                          if($statement->execute()){
                              while($row = $statement->fetch()){ ?>
                          <tr>
                              <td><?php echo $row['codigo']; ?></td>
                              <td><?php echo $row['tipo']; ?></td>
                              <td><?php echo $row['marca']; ?></td>
                              <td><?php echo $row['modelo']; ?></td>
                              <td><?php echo $row['descripcion']; ?></td>
                              <td><?php echo $row['cantidad']; ?></td>
                              <td><?php echo $row['costo_unitario']; ?></td>
                              <td><?php echo $row['precio_unitario']; ?></td>
                              <td><?php echo $row['estatus']; ?></td>
                              <td>
                              <a href="php/edit_merch.php?codigo=<?php echo $row['codigo']?>" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-marker"></i>
                              </a>
                              </td>
                          </tr>
                          <?php } }?>
                      </tbody>
                  </table>
              </div>
          </div>
          <!-- <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">¡Bienvenido, <?= $user['usuario'] ?>! Esto es el Dashboard de Accesorios Treviño</h1>
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                  <a type="button" class="btn btn-sm btn-outline-secondary" href="php/logout.php">Cerrar sesión</a>
                </div>
              </div>
            </div>

            <h2>Section title</h2>
            <div class="table-responsive">
              <table class="table table-dark table-striped table-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1,001</td>
                    <td>random</td>
                    <td>data</td>
                    <td>placeholder</td>
                    <td>text</td>
                  </tr>
                  <tr>
                    <td>1,002</td>
                    <td>placeholder</td>
                    <td>irrelevant</td>
                    <td>visual</td>
                    <td>layout</td>
                  </tr>
                  <tr>
                    <td>1,003</td>
                    <td>data</td>
                    <td>rich</td>
                    <td>dashboard</td>
                    <td>tabular</td>
                  </tr>
                  <tr>
                    <td>1,003</td>
                    <td>information</td>
                    <td>placeholder</td>
                    <td>illustrative</td>
                    <td>data</td>
                  </tr>
                  <tr>
                    <td>1,004</td>
                    <td>text</td>
                    <td>random</td>
                    <td>layout</td>
                    <td>dashboard</td>
                  </tr>
                  <tr>
                    <td>1,005</td>
                    <td>dashboard</td>
                    <td>irrelevant</td>
                    <td>text</td>
                    <td>placeholder</td>
                  </tr>
                  <tr>
                    <td>1,006</td>
                    <td>dashboard</td>
                    <td>illustrative</td>
                    <td>rich</td>
                    <td>data</td>
                  </tr>
                  <tr>
                    <td>1,007</td>
                    <td>placeholder</td>
                    <td>tabular</td>
                    <td>information</td>
                    <td>irrelevant</td>
                  </tr>
                  <tr>
                    <td>1,008</td>
                    <td>random</td>
                    <td>data</td>
                    <td>placeholder</td>
                    <td>text</td>
                  </tr>
                  <tr>
                    <td>1,009</td>
                    <td>placeholder</td>
                    <td>irrelevant</td>
                    <td>visual</td>
                    <td>layout</td>
                  </tr>
                  <tr>
                    <td>1,010</td>
                    <td>data</td>
                    <td>rich</td>
                    <td>dashboard</td>
                    <td>tabular</td>
                  </tr>
                  <tr>
                    <td>1,011</td>
                    <td>information</td>
                    <td>placeholder</td>
                    <td>illustrative</td>
                    <td>data</td>
                  </tr>
                  <tr>
                    <td>1,012</td>
                    <td>text</td>
                    <td>placeholder</td>
                    <td>layout</td>
                    <td>dashboard</td>
                  </tr>
                  <tr>
                    <td>1,013</td>
                    <td>dashboard</td>
                    <td>irrelevant</td>
                    <td>text</td>
                    <td>visual</td>
                  </tr>
                  <tr>
                    <td>1,014</td>
                    <td>dashboard</td>
                    <td>illustrative</td>
                    <td>rich</td>
                    <td>data</td>
                  </tr>
                  <tr>
                    <td>1,015</td>
                    <td>random</td>
                    <td>tabular</td>
                    <td>information</td>
                    <td>text</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </main> -->
        </div>
      </div>

    <?php else: ?>
    
    <div class="index container-fluid text-center text-white bg-dark">
      <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
          <h3 class="float-md-start mb-0">Accesorios Treviño</h3>
          <div>
            <nav class="nav nav-masthead justify-content-center float-md-end">
              <a class="nav-link active" aria-current="page" href="#">Principal</a>
              <a class="nav-link" href="#">Soporte</a>
              <a class="nav-link" href="#">Acerca de</a>
            </nav>
          </div>
        </header>

        <main class="px-3">
          <h1>¡Bienvenido a Accesorios Treviño!</h1>
          <blockquote class="blockquote">El lugar donde encontraras todo tipo de accesorios para celular</blockquote>

          <p class="lead">
            <a href="signin.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Inicia sesión</a>
            <a href="signup.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Registrate</a>
          </p>
        </main>
        <footer class="mt-auto text-white-50">
          <p>Derechos reservados 2021 - Accesorios Treviño. Powered by <a href="#" class="text-white">GarpeDevelopment</a>.</p>
        </footer>
      </div>
    </div>
    <?php endif;  ?>

      <!-- Bootstrap Scripts -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  </body>
</html>
<?php  include('php/signup.php') ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrarse - Accesorios Treviño</title>

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
        <link href="css/signup.css" rel="stylesheet">
    </head>
    <body class="d-flex h-100 text-white bg-dark">

        <?php if(!empty($message)) : ?>
            <?= $message ?>
        <?php endif; ?>

        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <img class="d-block mx-auto mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                    <h2>Nuevo usuario</h2>
                    <p class="lead">Nos alegra que te registres con nosotros. Al registrarse con nosotros tendras la posibilidad de realizar pedidos de mercancia. Además de otros beneficios.</p>
                </div>

                <div class="row justify-content-md-center">
                    <div class="col-md-10 col-lg-8">
                      <form action="php/signup.php" method="POST" class="needs-validation" novalidate>
                        <div class="row g-3">
              
                          <div class="col-12">
                            <label for="username" class="form-label">Usuario</label>
                            <div class="input-group has-validation">
                              <span class="input-group-text">@</span>
                              <input type="text" name="user" class="form-control" id="username" placeholder="Usuario" required>
                            <div class="invalid-feedback">
                                El usuario es requerido.
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Ingrese contraseña" value="" required>
                            <div class="invalid-feedback">
                              La contraseña requerida.
                            </div>
                          </div>
              
                          <div class="col-sm-6">
                            <label for="re-password" class="form-label">Confirme su contraseña</label>
                            <input type="password" name="re-password" class="form-control" id="re-password" placeholder="Confirme contraseña" value="" required>
                            <div class="invalid-feedback">
                              Confirme su contraseña requerida.
                            </div>
                          </div>

                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Completar registro</button>
                        <div>
                            <a type="button" href="signin.php" class="btn btn-link">Ya tengo una cuenta. quiero inciar sesión</a>
                        </div>        
                      </form>
                    </div>
                </div>
            </main>

            <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2021 Accesorios Treviño</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.php">Inicio</a></li>
            <li class="list-inline-item"><a href="#">Privacidad</a></li>
            <li class="list-inline-item"><a href="#">Terminos y Condiciones</a></li>
            <li class="list-inline-item"><a href="#">Soporte</a></li>
            </ul>
            </footer>
        </div>


        <!-- Scrips Boostrap 5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="js/form-validation.js"></script>


    </body>
</html>
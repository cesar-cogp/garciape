<?php  include('php/login.php') ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar sesión - Accesorios Treviño</title>

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
        <link href="css/signin.css" rel="stylesheet">
    </head>
    <body class="text-center text-white d-flex bg-dark">
    
        <?php if(!empty($message)) : ?>
            <?= $message ?>
        <?php endif; ?>
    

        <main class="form-signin">
            <form action="php/login.php" method="POST" class="needs-validation" novalidate>
                <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Vamos, Inicia sesión</h1>

                <div class="form-floating text-dark">
                    <input type="username" name="user" class="form-control" id="floatingInput" placeholder="Ingrese su usuario o correo electronico" required>
                    <div class="invalid-feedback">
                        El usuario o correo electronico es requerido.
                    </div>
                    <label for="floatingInput">Usuario o correo electronico</label>
                </div>

                <div class="form-floating text-dark">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Ingrese su contraseña" required>
                    <div class="invalid-feedback">
                        La contraseña es requerida.
                    </div>
                    <label for="floatingPassword">Contraseña</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
            </form>
            <div>
                <a type="button" href="signup.php" class="btn btn-link">No tengo cuenta, quiero crear una</a>
            </div>
            <p class="text-muted">&copy; 2021 - Accesorios Treviño</p>

        </main>


        <!-- Scrips Boostrap 5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="js/form-validation.js"></script>


    </body>
</html>
<?php

    require 'cn.php';

    if(isset($_SESSION['user_id'])){
        $records = $conn->prepare('SELECT * FROM usuarios WHERE id_usr=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;
        if(count($results)>0){
            $user = $results;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Accesorios Treviño</title>
    
    <!-- Splash Screen -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Architects+Daughter|Roboto&subset=latin,devanagari'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>

    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/index.css">

    
</head>
<body class="welcome">
    <?php require 'partials/header.php'; ?>

    <?php if(!empty($user)) : ?>

        <main class="valign-wrapper">
        <span class="container grey-text text-lighten-1 ">

        <h1 class="title grey-text text-lighten-3">¡Bienvenido, <?= $user['usuario'] ?>!</h1>
        <p class="flow-text">Has iniciado sesión correctamente. Puedes cerrar sesion dando <a href="logout.php">click aquí.</a></p>
        <blockquote class="flow-text">Tus permisos como administrador hacen que puedas modificar los registros de la tabla.</blockquote>
        
        </span>
        </main>


        <div class="container-fluid">

            <div class="row">
                <div class="col-md-4">
                <!-- MESSAGES -->

                <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php $_SESSION['message'] = null;} ?>

                <!-- ADD TASK FORM -->
                <div class="card card-body">
                    <form action="save_merch.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="tipo" class="form-control" placeholder="Tipo de accesorio" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="marca" class="form-control" placeholder="Marca a la que pertenece" >
                    </div>
                    <div class="form-group">
                        <input type="text" name="modelo" class="form-control" placeholder="Modelo que le corresponde" >
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion del accesorio"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" name="cantidad" class="form-control" placeholder="Cantidad en existencia" >
                    </div>
                    <div class="form-group">
                        <input type="number" name="costo_unitario" class="form-control" placeholder="Precio de compra (unitario)" >
                    </div>
                    <div class="form-group">
                        <input type="number" name="precio_unitario" class="form-control" placeholder="Precio de venta (unitario)" >
                    </div>
                    <div class="form-group">
                        <input type="text" name="estatus" class="form-control" placeholder="¿En existencia?" >
                    </div>
                    <input type="submit" name="save_merch" class="btn btn-success btn-block" value="Guardar accesorio">
                    </form>
                </div>
                </div>
                <div class="col-md-8">
                    <div class="table-responsive">
                    <table class="table table-dark table-hover">
                    <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Costo unitario</th>
                        <th>Precio unitario</th>
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
                        <a href="edit_merch.php?codigo=<?php echo $row['codigo']?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>
                        <a href="delete_merch.php?codigo=<?php echo $row['codigo']?>" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                        </td>
                    </tr>
                    <?php } }?>
                    </tbody>
                </table>


                    </div>
            </div>
            </div>
                        </div>


    <?php else: ?>

    <main class="valign-wrapper">
        <span class="container grey-text text-lighten-1 ">

        <p class="flow-text">¡Bienvenido a</p>
        <h1 class="title grey-text text-lighten-3">Accesorios Treviño!</h1>

        <blockquote class="flow-text">El lugar donde encontraras todo tipo de accesorios para celular</blockquote>

        <p class="flow-text">Inicia sesion o registrate con nosotros para poder ver nuestro inventario actual de mercancia.</p>

        <div class="center-align">
            <a class="btn btn-primary" href="login.php" role="button">Iniciar sesion</a>
            <a class="btn btn-primary" href="signup.php" role="button">Crear una cuenta</a>
        </div>
        
        </span>
    </main>

    <footer class="page-footer deep-purple darken-3">
        <div class="footer-copyright deep-purple darken-4">
        <div class="container">
            <time datetime="{{ site.time | date: '%Y' }}">&copy; 2021 Pecina</time>
        </div>
        </div>
    </footer>

    <!-- <h1>Inicia sesion o registrate</h1>
    <a href="login.php">Incia sesion</a> o
    <a href="signup.php">Registrate</a> -->
    <?php endif;  ?>

    <!-- BOOTSTRAP 5 SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script></body>
</html>
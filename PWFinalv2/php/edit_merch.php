<?php

include("cn.php");

$tipo = '';
$marca= '';
$modelo= '';
$descripcion= '';
$cantidad= '';
$costo_unit= '';
$precio_unit= '';
$estatus= '';

if  (isset($_GET['codigo'])) {
    $id = $_GET['codigo'];
    $sql = "select * from mercancia where codigo=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $tipo = $row['tipo'];
        $marca = $row['marca'];
        $modelo = $row['modelo'];
        $descripcion = $row['descripcion'];
        $cantidad = $row['cantidad'];
        $costo_unit = $row['costo_unitario'];
        $precio_unit = $row['precio_unitario'];
        $estatus = $row['estatus'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['codigo'];
  $tipo= $_POST['tipo'];
  $marca= $_POST['marca'];
  $modelo= $_POST['modelo'];
  $descripcion= $_POST['descripcion'];
  $cantidad= $_POST['cantidad'];
  $costo_unit= $_POST['costo_unitario'];
  $precio_unit= $_POST['precio_unitario'];
  $estatus= $_POST['estatus'];
  $sql = "update mercancia set tipo='$tipo', marca='$marca', modelo='$modelo', descripcion='$descripcion', cantidad='$cantidad', costo_unitario='$costo_unit', precio_unitario='$precio_unit', estatus='$estatus' where codigo=$id";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $_SESSION['message'] = 'Accesorio actualizado con exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: /garciape/PWFinalv2');
}

?>
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
    </head>
    <body class="container-fluid bg-dark">
        <div class="container ">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-body card-sm text-center text-dark bg-dark" style="top: 10rem;">
                        <form action="edit_merch.php?codigo=<?php echo $_GET['codigo']; ?>" method="POST">
                            <div class="form-group">
                                <input type="text" name="tipo" class="form-control text-white bg-transparent" value="<?php echo $tipo; ?>" placeholder="Tipo de accesorio" >
                            </div>
                            <div class="form-group">
                                <input type="text" name="marca" class="form-control text-white bg-transparent" value="<?php echo $marca; ?>" placeholder="Marca a la que pertenece" >
                            </div>
                            <div class="form-group">
                                <input type="text" name="modelo" class="form-control text-white bg-transparent" value="<?php echo $modelo; ?>" placeholder="Modelo que le corresponde" >
                            </div>
                            <div class="form-group">
                                <textarea name="descripcion" rows="2" class="form-control text-white bg-transparent"  placeholder="Descripcion del accesorio"><?php echo $descripcion; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="number" name="cantidad" class="form-control text-white bg-transparent" value="<?php echo $cantidad; ?>" placeholder="Cantidad en existencia" >
                            </div>
                            <div class="form-group">
                                <input type="number" name="costo_unitario" class="form-control text-white bg-transparent" value="<?php echo $costo_unit; ?>" placeholder="Precio de compra (unitario)" >
                            </div>
                            <div class="form-group">
                                <input type="number" name="precio_unitario" class="form-control text-white bg-transparent" value="<?php echo $precio_unit; ?>" placeholder="Precio de venta (unitario)" >
                            </div>
                            <div class="form-group">
                                <input type="text" name="estatus" class="form-control text-white bg-transparent" value="<?php echo $estatus; ?>" placeholder="¿En existencia?" >
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success btn-block" name="update">Actualizar</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#borrar_merch">Eliminar</button>

                            </div>
                        </form>
                    </div>                
                </div>
                <div class="modal fade" id="borrar_merch" tabindex="-1" aria-labelledby="borrar_merchLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="borrar_merchLabel">ELIMINAR MERCANCIA</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Estas seguro que deseas borrar el siguiente articulo?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="delete_merch.php?codigo=<?php echo $_GET['codigo']; ?>" type="button" class="btn btn-danger">Borrar</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- BOOTSTRAP 4 SCRIPTS -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

</html>
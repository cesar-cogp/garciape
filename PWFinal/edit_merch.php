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
  header('Location: index.php');
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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Architects+Daughter|Roboto&subset=latin,devanagari'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/index.css">

</head>
<body>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card card-body">
        <form action="edit_merch.php?codigo=<?php echo $_GET['codigo']; ?>" method="POST">
        <div class="form-group">
            <input type="text" name="tipo" class="form-control" value="<?php echo $tipo; ?>" placeholder="Tipo de accesorio" >
        </div>
        <div class="form-group">
            <input type="text" name="marca" class="form-control" value="<?php echo $marca; ?>" placeholder="Marca a la que pertenece" >
        </div>
        <div class="form-group">
            <input type="text" name="modelo" class="form-control" value="<?php echo $modelo; ?>" placeholder="Modelo que le corresponde" >
        </div>
        <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control"  placeholder="Descripcion del accesorio"><?php echo $descripcion; ?></textarea>
        </div>
        <div class="form-group">
            <input type="number" name="cantidad" class="form-control" value="<?php echo $cantidad; ?>" placeholder="Cantidad en existencia" >
        </div>
        <div class="form-group">
            <input type="number" name="costo_unitario" class="form-control" value="<?php echo $costo_unit; ?>" placeholder="Precio de compra (unitario)" >
        </div>
        <div class="form-group">
            <input type="number" name="precio_unitario" class="form-control" value="<?php echo $precio_unit; ?>" placeholder="Precio de venta (unitario)" >
        </div>
        <div class="form-group">
            <input type="text" name="estatus" class="form-control" value="<?php echo $estatus; ?>" placeholder="¿En existencia?" >
        </div>
        <button class="btn-success" name="update">Actualizar</button>
      </form>
      </div>
    </div>
  </div>
</div>
    <!-- BOOTSTRAP 4 SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
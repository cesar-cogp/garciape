<?php
    session_start();

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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <?php require 'partials/header.php'; ?>

    <?php if(!empty($user)) : ?>
        <br>Bienvenido. <?= $user['usuario']?>
        <br>Has iniciado sesion correctamente. 
        <a href="logout.php">Cerrar Sesion</a>

    <?php else: ?>
    <h1>Inicia sesion o registrate</h1>
    <a href="login.php">Incia sesion</a> o
    <a href="signup.php">Registrate</a>
    <?php endif;  ?>
</body>
</html>
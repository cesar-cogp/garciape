<?php
    session_start();

    if(isset($_SESSION['user_id'])){
        header('Location: /garciape/Parcial3/LoginBD');
    }
    require 'cn.php';
    if(!empty($_POST['user']) && !empty($_POST['password'])){
        $records = $conn->prepare('SELECT * FROM usuarios WHERE usuario=:user');
        $records->bindParam(':user',$_POST['user']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if(count($results) > 0 && password_verify($_POST['password'], $results['contrasena'])){
            $_SESSION['user_id'] = $results['id_usr'];
            header('Location: /garciape/Parcial3/LoginBD');
        }
        else{
            $message = "La credenciales son erroneas. Confirme sus datos";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>

    <h1>Inicio de sesion</h1>
    <span>o <a href="signup.php">Registrate</a></span>
    <form action="login.php" method="post">
        <input type="text" name="user" placeholder="Ingresa tu usuario">
        <input type="password" name="password" placeholder="Ingresa tu contraseña">
        <input type="submit" value="Ingresar">
        </form>
</body>
</html>
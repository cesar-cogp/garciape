<?php 
    require 'cn.php';

    if(!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
        $sql = 'INSERT INTO usuarios (usuario, contrasena) VALUES (:user, :pwd)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user', $_POST['user']);
        $password =  password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':pwd',$password);

        if($stmt->execute()){
            $message = 'Se ha creado el usuario correctamente.';
        }
        else{
            $message = 'Ha ocurrido un error. Compruebe mas tarde.';
        }
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <?php require 'partials/header.php'; ?>

    <?php if(!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>

    <h1>Registrate</h1>
    <span>o <a href="login.php">Inicia Sesion</a></span>
    <form action="signup.php" method="post">
        <input type="text" name="user" placeholder="Ingresa tu usuario">
        <input type="password" name="password" placeholder="Ingresa tu contraseña">
        <input type="password" name="confirm_password" placeholder="Confirma tu contraseña">
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>
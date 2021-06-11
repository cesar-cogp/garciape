<?php 
    require 'cn.php';

    if(!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['re_password'])){
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

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Splash Screen -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Architects+Daughter|Roboto&subset=latin,devanagari'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">


</head>
<body>
    <?php require 'partials/header.php'; ?>

    <?php if(!empty($message)): ?>
        <?= $message ?>
    <?php endif; ?>

    <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Crear nueva cuenta</h2>
                        <form action="signup.php" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="user" id="user" placeholder="Ingrese un nombre de usuario"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Ingrese una contraseña"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_password" id="re_password" placeholder="Confirma tu contraseña"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Crear cuenta"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a type="button" href="login.php" class="btn btn-outline-secondary">Ya tengo una cuenta</a>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>
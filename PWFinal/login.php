<?php
    require 'cn.php';

    if(isset($_SESSION['user_id'])){
        header('Location: /garciape/PWFinal');
    }

    if(!empty($_POST['user']) && !empty($_POST['password'])){
        $records = $conn->prepare('SELECT * FROM usuarios WHERE usuario=:user');
        $records->bindParam(':user',$_POST['user']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if(count($results) > 0 && password_verify($_POST['password'], $results['contrasena'])){
            $_SESSION['user_id'] = $results['id_usr']; 
            header('Location: /garciape/PWFinal');
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
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)) : ?>
        <?= $message ?>
    <?php endif; ?>

    <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a type="button" href="signup.php" class="btn btn-outline-secondary">No tengo cuenta, quiero crear una</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Iniciar sesión</h2>
                        <form action="login.php" method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="user" id="user" placeholder="Ingrese su usuario."/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Ingrese su contraseña."/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" data-toggle="modal" data-target="#exampleModal" id="signin" class="form-submit" value="Iniciar Sesión"/>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </section>
</body>
</html>
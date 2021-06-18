<?php
    require 'cn.php';

    if(isset($_SESSION['user_id'])){
        header('Location: /garciape/PWFinalv2');
    }

    if(!empty($_POST['user']) && !empty($_POST['password'])){
        $records = $conn->prepare('select * from usuarios where usuario=:user');
        $records->bindParam(':user',$_POST['user']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if(count($results) > 0 && password_verify($_POST['password'], $results['contrasena'])){
            $_SESSION['user_id'] = $results['id_usr']; 
            header('Location: /garciape/PWFinalv2');
        }
        else{
            $message = "La credenciales son erroneas. Confirme sus datos";
            header('Location: /garciape/PWFinalv2/signin.php');
        }

    }

?>
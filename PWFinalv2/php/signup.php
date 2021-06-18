<?php 
    require 'cn.php';

    if(!empty($_POST['user']) && ($_POST['password'] == $_POST['re-password'])){
        $sql = 'INSERT INTO usuarios (usuario, contrasena) VALUES (:user, :pwd)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user', $_POST['user']);
        $password =  password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':pwd',$password);

        if($stmt->execute()){
            $message = 'Se ha creado el usuario correctamente.';
            header('Location: /garciape/PWFinalv2/signin.php');
        }
        else{
            $message = 'Ha ocurrido un error. Compruebe mas tarde.';
        }
    }
    
?>
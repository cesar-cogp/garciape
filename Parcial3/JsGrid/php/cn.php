<?php
    $host='localhost:3308';
    $database='garciape';
    $username='root';
    $password='';
    
    try {
        $con = new PDO("mysql:host=$host;dbname=$database",$username,$password);
    } catch(PDOException $pe) {
        die("No se ha podido establecer conexion con $database :".$pe->getMessage());
    }

    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
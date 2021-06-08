<?php
    $host='localhost:3308';
    $dbname='garciape';
    $username='root';
    $password='';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    } catch(PDOException $pe) {
        die("No se ha podido establecer conexion con $database :".$pe->getMessage());
    }

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>
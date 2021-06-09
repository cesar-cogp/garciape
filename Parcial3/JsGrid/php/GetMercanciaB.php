<?php

$host='localhost:3308';
$database='garciape';
$username='root';
$password='';


try {
    $con = new PDO("mysql:host=$host;dbname=$database",$username,$password);
} catch(PDOException $pe) {
    $row['resultado'] = '1';
    $row['informacion'] = 'Error DB';
    $row['mensaje'] = 'Error de conexión a la base de datos';
    $row['detalle'] = $pe->getMessage();
}

$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

try {
    $query = "select * from mercancia";
    $stmt = $con -> prepare($query);
    $stmt -> execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    $row['resultado'] = '0';
    $row['informacion'] = 'OK';
    $row['mensaje'] = 'Se leyeron datos';
    $row['detalle'] = $resultado;

} catch(PDOException $e) {
    $row['resultado'] = '2';
    $row['informacion'] = 'Error DB';
    $row['mensaje'] = 'Error de consulta a la base de datos';
    $row['detalle'] = $e->getMessage();
}

echo json_encode($row);
?>
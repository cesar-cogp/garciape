<?php

include('cn.php');

if (isset($_POST['save_merch'])) {
    $sql = "insert into mercancia(tipo, marca, modelo, descripcion, cantidad, costo_unitario, precio_unitario, estatus) VALUES (:tipo, :marca, :modelo, :descripcion, :cantidad, :costo_unitario, :precio_unitario, :estatus)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tipo', $_POST['tipo']);
    $stmt->bindParam(':marca',$_POST['marca']);
    $stmt->bindParam(':modelo',$_POST['modelo']);
    $stmt->bindParam(':descripcion',$_POST['descripcion']);
    $stmt->bindParam(':cantidad',$_POST['cantidad']);
    $stmt->bindParam(':costo_unitario',$_POST['costo_unitario']);
    $stmt->bindParam(':precio_unitario',$_POST['precio_unitario']);
    $stmt->bindParam(':estatus',$_POST['estatus']);
    
    if($stmt->execute()) {
        $_SESSION['message'] = 'El accesorio se ha guardado con exito.';
        $_SESSION['message_type'] = 'success';
        header('Location:' . getenv('HTTP_REFERER'));
    } else {
        die("La consulta falló");
    }
}

?>
<?php

include("cn.php");

if(isset($_GET['codigo'])) {
    $id = $_GET['codigo'];
    $query = "delete from mercancia where codigo = $id";
    $stmt = $conn->prepare($query);

    if($stmt->execute()) {
        $_SESSION['message'] = 'El accesorio fue removido con exito.';
        $_SESSION['message_type'] = 'danger';
        header('Location: index.php');
    } else {
        die("La consulta falló");
    }
}

?>
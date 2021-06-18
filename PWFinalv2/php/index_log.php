<?php

    require 'cn.php';

    if(isset($_SESSION['user_id'])){
        $records = $conn->prepare('select * from usuarios where id_usr=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;
        if(count($results)>0){
            $user = $results;
        }
    }
?>
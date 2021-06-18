<?php

    include('cn.php');

    try{
        $query = "select * from mercancia";
        $statement = $con->prepare($query);
        $statement -> setFetchMode(PDO::FETCH_ASSOC);
        $data = array();

        if($statement->execute()){
        // Ciclo PDO que sera en encargado de guardar los registros de la BD
            while($row = $statement->fetch())
                {
                    $data[] = $row;
                    //var_dump($row);
                }

            echo json_encode($data);
        }
    }catch(PDOException $pe){
        die("Ocurrio un error en la consulta.".$pe->getMessage());
    }
?>
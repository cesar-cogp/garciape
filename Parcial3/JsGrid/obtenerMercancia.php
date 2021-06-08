<?php
    try{
        include('cn.php');
        $query = "SELECT * FROM mercancia";
        $statement = $conn->prepare($query);

        if($statement->execute()){
            $row = $statement->fetchall(PDO::FETCH_ASSOC);
            
        } else{
            $row = "Ocurrio un error";
        }
        
    }catch(PDOException $pe){
        die("Ocurrio un error en la consulta.".$pe->getMessage());
    }
    echo json_encode($row);
?>
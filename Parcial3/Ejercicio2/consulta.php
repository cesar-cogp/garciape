<?php
    include('cn.php');

    try{
        $query = "SELECT * FROM mercancia";
        $statement = $conn->prepare($query);
        $statement -> setFetchMode(PDO::FETCH_ASSOC);
        $data = array();

        if($statement->execute()){
        // Ciclo PDO que sera en encargado de mostrar los registros de la BD
            while($row = $statement->fetch())
                {
                    //$data[] = $row;
                    printf("<pre>Codigo: ".$row["codigo"]."<br>");
                    printf("Tipo: ".$row["tipo"]."<br>");
                    printf("Marca: ".$row["marca"]."<br>");
                    printf("Modelo: ".$row["modelo"]."<br>");
                    printf("Descripcion: ".$row["descripcion"]."<br>");
                    printf("Cantidad: ".$row["cantidad"]."<br>");
                    printf("Costo Unitario: ".$row["costo_unitario"]."<br>");
                    printf("Precio Unitario: ".$row["precio_unitario"]."<br>");
                    printf("Estatus: ".$row["estatus"]."</pre><br>");
                }

            echo json_encode($data);
        }
    }catch(PDOException $pe){
        die("Ocurrio un error en la consulta.".$pe->getMessage());
    }

?>
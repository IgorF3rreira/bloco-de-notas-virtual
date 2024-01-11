<?php

include_once 'conexao.php';

if(isset($_POST['submit'])){
    $notas = $_POST['notas'];

    if(empty($notas)){
        echo '<script> alert("Escreva uma nota para adicionar"); 
                        history.go(-1);
        
        </script>';
        
    }else{

        $sql = "INSERT INTO notas (notas) VALUES (:notas)";

        try{
            $query = $bd->prepare($sql);
            $query->bindValue(':notas', $notas, PDO::PARAM_STR);
            $query->execute();

            //RECUPERAR O ULTIMO ID GERADO
            $ultimo = $bd->lastInsertId() ;
          
            header('Location: index.php');


          

        }catch(PDOException $e ){
            echo $e->getMessage();
        }
    }
}
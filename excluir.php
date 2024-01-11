<?php
include_once 'conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
$sql = 'DELETE notas FROM notas WHERE id = :id';
try{
    $query = $bd->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    // $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

    header('Location: index.php');

}catch(PDOException $e){
    echo $e->getMessage();
}
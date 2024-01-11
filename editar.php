<?php
include_once 'conexao.php';
include_once 'cabecalho.php';

echo'
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"    crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#editar").modal("show");
    });
</script>
';



$id = isset($_GET['id']) ? $_GET['id'] : null;
$sql = 'SELECT * FROM notas WHERE id = :id';
try {

    $query = $bd->prepare($sql);
    $query->execute(array(':id' => $id));
    $resultadoN = $query->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo $e->getMessage();
}

if(isset($_POST['submit'])){
  $notas = $_POST['notas'];

    if(empty($notas)){
      echo '<script> alert("Escreva uma nota para adicionar"); 
                      history.go(-1);
      
      </script>';
      
  }else{
    
    $alt = 'UPDATE notas SET notas = ? WHERE id = ?';

    try{
      $query = $bd->prepare($alt);
      $query->bindParam('1', $notas);
      $query->bindParam('2',$id );
      $query->execute();
   
        header('Location: index.php');
  

  }catch(PDOException $e){
    echo $e->getMessage();
  }
}

}




?>

<!-- Modal -->
<div action="editar.php" class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR NOTA</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
      <form  method="POST" enctype="multipart/form-data" name="form1" id="form1" >

      <?php foreach ($resultadoN as $resN){
      echo '  <textarea style="text-indent:10px;" name="notas" id="notas" cols="30" rows="10">' .$resN['notas']. '</textarea>';
      }
      ?>
      </div>
      <div class="modal-footer">
         <a class="btn btn-primary primary" href="index.php"> Cancelar </a> 
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Adicionar</button>
        </form>
      </div>
    </div>
  </div>
</div>



<main>

<div>

    <h2>Suas notas:</h2>

    <?php 

$sql = 'SELECT * FROM notas';
try {
  $query = $bd->prepare($sql);
  $query->execute();
  $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo $e->getMessage();
}

    if ($query->rowCount() <= 0 ){
      echo ' ';
    }else{
        //ALIMENTAR A TABELA QUANDO ACHAR
        foreach ($resultado as $res) {

    echo '  <textarea style="text-indent:10px;" disabled name="notas" id="notas" cols="30" rows="10">' .$res['notas']. '</textarea>';

    echo '  <div class="container text-center d-inline-block fs-5 ">';

    echo '  <p class="d-inline-block p-2" style="font-size:18px;"> <i class="fa-solid fa-pen-to-square"></i> <a href="editar.php?id='.$res['id']. '"  >  editar</p> </a> ';

    echo '  <p class="d-inline-block p-2" style="font-size:18px;" > <i class="fa-solid fa-trash"></i> <a href="excluir.php">   excluir</p>  </a>';
    echo '  </div>';
        }
      }
    ?>

  
</div>

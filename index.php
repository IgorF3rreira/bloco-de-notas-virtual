<?PHP 
    include_once 'conexao.php';
    include_once 'cabecalho.php';
   

    
    $sql = 'SELECT * FROM notas';
    try {
      $query = $bd->prepare($sql);
      $query->execute();
      $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      echo $e->getMessage();
  }
    
?>




<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NOTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="addNota.php" method="POST" enctype="multipart/form-data" name="form1" id="form1">
       <textarea style="text-indent:10px;" name="notas" id="notas" cols="30" rows="10"></textarea>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Adicionar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="botaoAdd">
    <!-- Botão para acionar modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalExemplo">
  Adicionar notas
</button>

</div>

<main>

<div>

    <h2>Suas notas:</h2>

    <?php 

    if ($query->rowCount() <= 0 ){
      echo ' ';
    }else{
        //ALIMENTAR A TABELA QUANDO ACHAR
        foreach ($resultado as $res) {

    echo '  <textarea style="text-indent:10px;" disabled name="notas" id="notas" cols="30" rows="10">' .$res['notas']. '</textarea>';

    echo '  <div class="container text-center d-inline-block fs-5 ">';

    echo '  <p class="d-inline-block p-2" style="font-size:18px;"> <i class="fa-solid fa-pen-to-square"></i> <a href="editar.php?id='.$res['id']. '"  >  editar</p> </a> ';

    echo '  <p class="d-inline-block p-2" style="font-size:18px;" > <i class="fa-solid fa-trash"></i> <a href="excluir.php?id='.$res['id'].'">   excluir</p>  </a>';
    echo '  </div>';
        }
      }
    ?>

  
</div>


<?php
    include_once 'rodape.php';
?>
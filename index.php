<?PHP 
    include_once 'cabecalho.php';
?>



<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <textarea name="" id="" cols="30" rows="10"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
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


<div>

    <h2>Suas notas:</h2>

    <textarea disabled name="" id="" cols="30" rows="10">sfsf</textarea>
    <div id="funcoes">
        <p> <i class="fa-solid fa-pen-to-square"></i> editar</p>
        <p>  <i class="fa-solid fa-trash"></i> excluir</p>
    </div>

</div>


<?php
    include_once 'rodape.php';
?>
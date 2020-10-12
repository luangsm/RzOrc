  <?php
    include_once '../../model/session.php';
    include_once "../../model/clientinfo.php";
    include_once "check1.php";
?>
<div class="card mt-3">
  <div class="card-body">
    <input type="text" class="form-control" id="search" placeholder="Pesquisar">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Agente</th>
            <th scope="col">Data da viagem</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Ultima modificação</th>
            <th scope="col">Editar</th>
            <th scope="col">Apagar</th>
            <th scope="col">Orçamento</th>
            </tr>
        </thead>
        <tbody id="table">
          <?php
            clientInfo::tableClient();
          ?>
        </tbody>
    </table>
  </div>
</div>
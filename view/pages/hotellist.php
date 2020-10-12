<?php
    include_once './../../model/session.php';
    include_once "./../../model/hotel.php";
    include_once "../../model/city.php";
    include_once "check1.php";

    $array = City::getAll();
    foreach($array as $a){
      echo "<h5>" . City::getbyId($a) . "</h5>";
?>
<div class="card mt-3">
  <div class="card-body">
    <table class="table">
        <thead>
            <tr>
            <th scope="col" width="10%">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Estrelas</th>
            <th scope="col">Conteúdo</th>
            <th scope="col">Editar</th>
            <th scope="col">Apagar</th>
            </tr>
        </thead>
        <tbody>
          <?php
            Hotel::tableHotel($a);
          ?>
        </tbody>
    </table>
  </div>
</div>
</br>
<?php
}
?>
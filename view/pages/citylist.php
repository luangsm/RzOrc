<?php
    include_once '../../model/session.php';
    include_once "../../model/city.php";
    include_once "check1.php";
?>
    <?php 
        $array = "Argentina;Brasil;Chile;Costa Rica;Estados Unidos;Maldivas;República Dominicana";
        $array = explode(";", $array);
        foreach($array as $a){
          echo "<h5>$a</h5>";
    ?>
    <div class="card mt-3">
  <div class="card-body">
    <table class="table">
        <thead>
            <tr>
            <th scope="col" width="10%">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Editar</th>
            <th scope="col">Apagar</th>
            </tr>
        </thead>
        <tbody>
          <?php
            City::tableCity($a);
          ?>
        </tbody>
    </table>
    </div>
    </div>
    </br>
  <?php
        }
  ?>

<script>
$(".citycad").click( function() {
    var id = $(this).data("id");
    $.post("pages/citycad.php", {id: id});
    $("#jumbotron").load("pages/citycad.php");
});
</script>
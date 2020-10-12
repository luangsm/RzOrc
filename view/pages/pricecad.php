<?php
    include_once '../../model/session.php';
    include_once "template.php";
    include_once "template2.php";
    include_once "check1.php";
?>
<div class="card mt-3">
  <div class="card-body">
    <form id="price" method="post" action="../controller/price.php">
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $check = Price::checkPrice($id);
                $city = Roteiro::getbyId($id, "city");
                $chd = clientInfo::getbyId($id, "chd");
                $city = explode("|", $city);
                if($check == 1){
                  Template::inputHidden("id", "$id");
                  echo "<div class=\"row\">";
                  echo "<div class=\"col-12\">";
                  echo "<h4>Opção 1</h4></br>";
                  echo "</div>";
                  foreach($city as $ct){
                    echo "<div class=\"col\">";
                    $hot = "hotel1[]";
                    $size = "size1[]";
                    $cat = "cat1[]";
                    Template2::FormSelectHotelCity("$hot", "Hotel que será usado em <b>" . City::getbyId($ct) . "</b>", 5, $ct);
                    Template::inputTextV2("$size", "Configuração do(s) quarto(s)", "Ex. Single, Duplo, Triplo ou Quádruplo", "form-control", 0, "");
                    Template::inputTextV2("$cat", "Categoria do(s) quarto(s)", "Standard, Luxo, Superior, Vista piscina, etc", "form-control", 0, "");
                    echo "</div>"; 
                  }
                  echo "</div>";
                  Template::inputNumber("adt[]", "Preço por adulto", "form-control", 0.01, 0, "");
                  if($chd > 0){
                    Template::inputNumber("chd[]", "Preço por criança", "form-control", 0.01, 0, "");
                  }
                  Template::inputNumber("tax", "Taxa de embarque", "form-control", 0.01, 0, "");
                  Template::buttonCollapse("show1", "Nova opção de pagamento");
                  echo "<div id=\"show1\" class=\"collapse\"></br>";
                  echo "<div class=\"row\">";
                  echo "<div class=\"col-12\">";
                  echo "<h4>Opção 2</h4></br>";
                  echo "</div>";
                  foreach($city as $ct){
                    echo "<div class=\"col\">";
                    $hot = "hotel2[]";
                    $size = "size2[]";
                    $cat = "cat2[]";
                    Template2::FormSelectHotelCity("$hot", "Hotel que será usado em <b>" . City::getbyId($ct) . "</b>", 5, $ct);
                    Template::inputTextV2("$size", "Configuração do(s) quarto(s)", "Ex. Single, Duplo, Triplo ou Quádruplo", "form-control", 0, "");
                    Template::inputTextV2("$cat", "Categoria do(s) quarto(s)", "Standard, Luxo, Superior, Vista piscina, etc", "form-control", 0, "");
                    echo "</div>"; 
                  }
                  echo "</div>";
                  Template::inputNumber("adt[]", "Preço por adulto", "form-control", 0.01, 0, "");
                  if($chd > 0){
                    Template::inputNumber("chd[]", "Preço por criança", "form-control", 0.01, 0, "");
                  }
                  Template::buttonCollapse("show2", "Nova opção de pagamento");
                  echo "</div>";
                  echo "<div id=\"show2\" class=\"collapse\"></br>";
                  echo "<div class=\"row\">";
                  echo "<div class=\"col-12\">";
                  echo "<h4>Opção 3</h4></br>";
                  echo "</div>";
                  foreach($city as $ct){
                    echo "<div class=\"col\">";
                    $hot = "hotel3[]";
                    $size = "size3[]";
                    $cat = "cat3[]";
                    Template2::FormSelectHotelCity("$hot", "Hotel que será usado em <b>" . City::getbyId($ct) . "</b>", 5, $ct);
                    Template::inputTextV2("$size", "Configuração do(s) quarto(s)", "Ex. Single, Duplo, Triplo ou Quádruplo", "form-control", 0, "");
                    Template::inputTextV2("$cat", "Categoria do(s) quarto(s)", "Standard, Luxo, Superior, Vista piscina, etc", "form-control", 0, "");
                    echo "</div>"; 
                  }
                  echo "</div>";
                  Template::inputNumber("adt[]", "Preço por adulto", "form-control", 0.01, 0, "");
                  if($chd > 0){
                    Template::inputNumber("chd[]", "Preço por criança", "form-control", 0.01, 0, "");
                  }
                  echo "</div>";
                }
                else{
                  $hotel = Price::arraybyId($id, "hotel");
                  $idp = Price::arraybyId($id, "id");
                  $room = Price::arraybyId($id, "room");
                  $cat = Price::arraybyId($id, "cat");
                  $price = Price::arraybyId($id, "price");
                  if(isset($price[2])){
                    $r3 = explode(";", @$room[2]);
                    $c3 = explode(";", @$cat[2]);
                    $p3 = explode(";", @$price[2]);
                    $h3 = explode(";", @$hotel[2]);
                  }
                  if(isset($price[1])){
                    $r2 = explode(";", @$room[1]);
                    $c2 = explode(";", @$cat[1]);
                    $p2 = explode(";", @$price[1]);
                    $h2 = explode(";", @$hotel[1]);
                  }
                  $h1 = explode(";", $hotel[0]);
                  $r1 = explode(";", $room[0]);
                  $c1 = explode(";", $cat[0]);
                  $p1 = explode(";", $price[0]);
                  Template::inputHidden("id", "$id");
                  echo "<div class=\"row\">";
                  echo "<div class=\"col-12\">";
                  echo "<h4>Opção 1</h4></br>";
                  echo "</div>";
                  Template::inputHidden("idp[]", "$idp[0]");
                  $count = 0;
                  foreach($city as $ct){
                    echo "<div class=\"col\">";
                    $hot = "hotel1[]";
                    $size = "size1[]";
                    $cat = "cat1[]";
                    Template2::FormSelectedHotelCity("$hot", "Hotel que será usado em <b>" . City::getbyId($ct) ."</b>", 5, $ct, $h1[$count]);
                    Template::inputText("$size", "Configuração do(s) quarto(s)", "form-control", 1, "{$r1[$count]}");
                    Template::inputText("$cat", "Categoria do(s) quarto(s)", "form-control", 1, "{$c1[$count]}");
                    $count++;
                    echo "</div>"; 
                  }
                  echo "</div>";
                  $p = 1;
                  Template::inputNumber("adt[]", "Preço por adulto", "form-control", 0.01, 1, "{$p1[0]}");
                  if($chd > 0){
                    $p = 2;
                    if(isset($p1[1])){
                      Template::inputNumber("chd[]", "Preço por criança", "form-control", 0.01, 1, "{$p1[1]}");
                    }
                    else{
                      Template::inputNumber("chd[]", "Preço por criança", "form-control", 0.01, 0, "");
                    } 
                  }
                  if(isset($p1[$p])){
                    Template::inputNumber("tax", "Taxa de embarque", "form-control", 0.01, 1, "{$p1[$p]}");
                  }
                  else{
                    Template::inputNumber("tax", "Taxa de embarque", "form-control", 0.01, 0, "");
                  }
                  Template::buttonCollapse("show1", "Nova opção de pagamento");
                  echo "<div id=\"show1\" class=\"collapse\"></br>";
                  echo "<div class=\"row\">";
                  echo "<div class=\"col-12\">";
                  echo "<h4>Opção 2</h4></br>";
                  echo "</div>";
                  if(isset($idp[1])){
                    Template::inputHidden("idp[]", "$idp[1]");
                  }
                  if(isset($p2)){
                    $count = 0;
                    foreach($city as $ct){
                      echo "<div class=\"col\">";
                      $hot = "hotel2[]";
                      $size = "size2[]";
                      $cat = "cat2[]";
                      Template2::FormSelectedHotelCity("$hot", "Hotel que será usado em <b>" . City::getbyId($ct) ."</b>", 5, $ct, $h2[$count]);
                      Template::inputText("$size", "Configuração do(s) quarto(s)", "form-control", 1, "{$r2[$count]}");
                      Template::inputText("$cat", "Categoria do(s) quarto(s)", "form-control", 1, "{$c2[$count]}");
                      $count++;
                      echo "</div>"; 
                    }
                    echo "</div>";
                    Template::inputNumber("adt[]", "Preço por adulto", "form-control", 0.01, 1, "{$p2[0]}");
                    if($chd > 0){
                      if(isset($p2[1])){
                        Template::inputNumber("chd[]", "Preço por criança", "form-control", 0.01, 1, "{$p2[1]}");
                      }
                      else{
                        Template::inputNumber("chd[]", "Preço por criança", "form-control", 0.01, 0, "");
                      }
                    }
                  }
                  else{
                    $count = 0;
                    foreach($city as $ct){
                      echo "<div class=\"col\">";
                      $hot = "hotel2[]";
                      $size = "size2[]";
                      $cat = "cat2[]";
                      Template2::FormSelectHotelCity("$hot", "Hotel que será usado em <b>" . City::getbyId($ct) . "</b>", 5, $ct);
                      Template::inputTextV2("$size", "Configuração do(s) quarto(s)", "Ex. Single, Duplo, Triplo ou Quádruplo", "form-control", 0, "");
                      Template::inputTextV2("$cat", "Categoria do(s) quarto(s)", "Standard, Luxo, Superior, Vista piscina, etc", "form-control", 0, "");
                      echo "</div>"; 
                    }
                    echo "</div>";
                    Template::inputNumber("adt[]", "Preço por adulto", "form-control", 0.01, 0, "");
                    if($chd > 0){
                      Template::inputNumber("chd[]", "Preço por criança", "form-control", 0.01, 0, "");
                    }                      
                  }
                  Template::buttonCollapse("show2", "Nova opção de pagamento");
                  echo "</div>";
                  echo "<div id=\"show2\" class=\"collapse\"></br>";
                  echo "<div class=\"row\">";
                  echo "<div class=\"col-12\">";
                  echo "<h4>Opção 3</h4></br>";
                  echo "</div>";
                  if(isset($idp[2])){
                    Template::inputHidden("idp[]", "$idp[2]");
                  }
                  if(isset($p3)){
                    $count = 0;
                    foreach($city as $ct){
                      echo "<div class=\"col\">";
                      $hot = "hotel3[]";
                      $size = "size3[]";
                      $cat = "cat3[]";
                      Template2::FormSelectedHotelCity("$hot", "Hotel que será usado em <b>" . City::getbyId($ct) ."</b>", 5, $ct, $h3[$count]);
                      Template::inputText("$size", "Configuração do(s) quarto(s)", "form-control", 1, "{$r3[$count]}");
                      Template::inputText("$cat", "Categoria do(s) quarto(s)", "form-control", 1, "{$c3[$count]}");
                      $count++;
                      echo "</div>";
                    }
                    echo "</div>";
                    Template::inputNumber("adt[]", "Preço por adulto", "form-control", 0.01, 1, "{$p3[0]}");
                    if($chd > 0){
                      if(isset($p3[1])){
                        Template::inputNumber("chd[]", "Preço por criança", "form-control", 0.01, 1, "{$p3[1]}");
                      }
                      else{
                        Template::inputNumber("chd[]", "Preço por criança", "form-control", 0.01, 0, "");
                      }
                    } 
                  }
                  else{
                    foreach($city as $ct){
                      echo "<div class=\"col\">";
                      $hot = "hotel3[]";
                      $size = "size3[]";
                      $cat = "cat3[]";
                      Template2::FormSelectHotelCity("$hot", "Hotel que será usado em <b>" . City::getbyId($ct) . "</b>", 5, $ct);
                      Template::inputTextV2("$size", "Configuração do(s) quarto(s)", "Ex. Single, Duplo, Triplo ou Quádruplo", "form-control", 0, "");
                      Template::inputTextV2("$cat", "Categoria do(s) quarto(s)", "Standard, Luxo, Superior, Vista piscina, etc", "form-control", 0, "");
                      echo "</div>"; 
                    }
                    echo "</div>";
                    Template::inputNumber("adt[]", "Preço por adulto", "form-control", 0.01, 0, "");
                    if($chd > 0){
                      Template::inputNumber("chd[]", "Preço por criança", "form-control", 0.01, 0, "");
                    }
                  }
                  echo "</div>";
                }
            }
        ?>
        <button type="submit" class="btn btn-primary">Avançar</button>
    </form>
  </div>
</div>
<script>
$(document).ready(function(){

});
</script>
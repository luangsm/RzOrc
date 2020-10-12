<?php
    include_once '../../model/session.php';
    include_once "template.php";
    include_once "template2.php";
    include_once "check1.php";
?>
<div class="card mt-3">
  <div class="card-body">
    <form id="day" method="post" action="../controller/day.php">
        <?php
            echo "<h4>Roteiro: Defina o day by day</h4></br>";
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $check = Day::check($id);
                $city = Roteiro::getbyId($id, "city");
                $in = Roteiro::getbyId($id, "in");
                $out = Roteiro::getbyId($id, "out");
                $city = explode("|", $city);
                $in = explode("|", $in);
                $out = explode("|", $out);
                if($check == 1){
                  Template::inputHidden("id", "$id");
                  $count = 0;
                  while(isset($city[$count])){
                    $arr = Day::getDays($in[$count], $out[$count]);
                    $ctn = City::getbyId($city[$count]);
                    $nu = 2;
                    foreach($arr as $a){
                      $ar = Day::inverteData($a);
                      if($nu % 2 == 0){
                        echo "<div class=\"row\"><div class=\"col\">";
                      }
                      else{
                        echo "</div><div class=\"col\">";
                      }
                      Template::inputHidden("data[]", "$a");
                      echo "<h4>Dia {$ar} - Em {$ctn}</h4>";
                      Template2::FormSelectTourCity("tour1[]", "Selecione o passeio:", 5, "Selecione aqui", $city[$count]);
                      Template2::FormCheckbox("sug1[]", "Marque para sugerir este passeio", 6, $a, 0);
                      Template2::FormSelectTourCity("tour2[]", "Selecione o passeio:", 5, "Selecione aqui", $city[$count]);
                      Template2::FormCheckbox("sug2[]", "Marque para sugerir este passeio", 6, $a, 0);
                      Template2::FormTextArea("text[]", "Introdução aos passeios", 5, "Esta mensagem aparecerá antes do passeio / atividade selecionado. Utilize caso queira adicionar alguma introdução ao serviço.", 5, "");
                      if($nu % 2 != 0){
                        echo "</div></div></br>";
                      }
                      $nu++;
                    }
                    $count++;
                  }
                  
                }
                else{
                  Template::inputHidden("id", "$id");
                  $count = 0;
                  while(isset($city[$count])){
                    $arr = Day::getDays($in[$count], $out[$count]);
                    $ctn = City::getbyId($city[$count]);
                    $nu = 2;
                    foreach($arr as $a){
                      $ar = Day::inverteData($a);
                      $tour = Day::getbyId($id, "tour", $a);
                      $text = Day::getbyId($id, "text", $a);
                      $idday = Day::getbyId($id, "id", $a);
                      $tour = explode(";", $tour);
                      $sug1 = 0;
                      $sug2 = 0;
                      if(strpos(@$tour[0], "s")){
                        $sug1 = 1;
                        $tour[0] = str_replace("s", "", $tour[0]);
                      }
                      if(strpos(@$tour[1], "s")){
                        $sug2 = 1;
                        $tour[1] = str_replace("s", "", $tour[1]);
                      }
                      if($nu % 2 == 0){
                        echo "<div class=\"row\"><div class=\"col\">";
                      }
                      else{
                        echo "</div><div class=\"col\">";
                      }
                      Template::inputHidden("data[]", "$a");
                      echo "<h4>Dia {$ar} - Em {$ctn}</h4>";
                      Template2::FormSelectedTourCity("tour1[]", "Selecione o passeio", 5, "Selecione aqui", $city[$count], $tour[0]);
                      if($sug1 == 1){
                        Template2::FormCheckbox("sug1[]", "Marque para sugerir este passeio", 6, $a, 1);
                      }
                      else{
                        Template2::FormCheckbox("sug1[]", "Marque para sugerir este passeio", 6, $a, 0);  
                      }
                      Template2::FormSelectedTourCity("tour2[]", "Selecione o passeio", 5, "Selecione aqui", $city[$count], $tour[1]);
                      if($sug2 == 1){
                        Template2::FormCheckbox("sug2[]", "Marque para sugerir este passeio", 6, $a, 1);
                      }
                      else{
                        Template2::FormCheckbox("sug2[]", "Marque para sugerir este passeio", 6, $a, 0);
                      }
                      Template2::FormTextArea("text[]", "Introdução aos passeios", 5, "Esta mensagem aparecerá antes do passeio / atividade selecionado. Utilize caso queira adicionar alguma introdução ao serviço.", 5, "$text");
                      Template::inputHidden("idday[]", "$idday");
                      if($nu % 2 != 0){
                        echo "</div></div></br>";
                      }
                      $nu++;
                    }
                    $count++;
                  }
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
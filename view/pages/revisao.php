<?php
    include_once '../../model/session.php';
    include_once "template.php";
    include_once "template2.php";
    include_once "check1.php";
?>
<div class="card mt-3">
  <div class="card-body">
    <form id="price" method="post" action="../controller/revisao.php">
      <?php
          if (!isset($_SESSION)) session_start();
          $id = $_GET["id"];
          $check = Review::check($id);
          $type = clientInfo::getbyId($id, "type");
          $agent = clientInfo::getbyId($id, "agent");
          $user = Users::getbyId($agent, "name");
          $tel = Profile::getbyId($agent, "tel");
          $whats = Profile::getbyId($agent, "whats");
          $nameb = clientInfo::getbyId($id, "name");
          $adt = clientInfo::getbyId($id, "adt");
          $chd = clientInfo::getbyId($id, "chd");
          $city = Roteiro::getbyId($id, "city");
          $tour = Day::getArraybyId($id, "tour");
          $day = Day::getArraybyId($id, "day");
          $idday = Day::getArraybyId($id, "id");
          $text = Day::getArraybyId($id, "text");
          $in = Roteiro::getbyId($id, "in");
          $out = Roteiro::getbyId($id, "out");
          $path = Tour::getPath($id, 5);
          $hotel = Price::getArraybyId($id, "hotel");
          $room = Price::getArraybyId($id, "room");
          $cat = Price::getArraybyId($id, "cat");
          $price = Price::getArraybyId($id, "price");

          if($check == 0){
            Template::inputHidden("id", $id);
            Template::OrcHeader($type);
            echo "<h4 class=\"text-danger text-center\">Página de Revisão</h4>";
            Template::AgentInfo($user, "", $tel, $whats);
            Template::Infos($city, $in, $out, $nameb, $adt, $chd, "");
            Template::Serviço($city, $in, $out, $tour);
            Template::Aereo($path);
            Template::Dayby($day, $tour, $text, $adt, $chd, $idday);
            Template::Valores($hotel, $room, $cat, $price, $chd);
          }
          else{
            Template::inputHidden("id", $id);
            $intro = Review::getbyId($id, "intro");
            $titulo = Review::getbyId($id, "titulo");
            $yes = Review::getbyId($id, "yes");
            $no = Review::getbyId($id, "no");
            $rsug = Review::getbyId($id, "sug");
            $radt = Review::getbyId($id, "adt");
            $rchd = Review::getbyId($id, "chd");
            $fam = Review::getbyId($id, "fam");
            $name = Review::getbyId($id, "name");
            $pay = Review::getbyId($id, "pay");
            Template::OrcHeader($type);
            echo "<h4 class=\"text-danger text-center\">Página de Revisão</h4>";
            Template::AgentInfo($user, "$intro", $tel, $whats);
            Template::Infos($city, $in, $out, $nameb, $adt, $chd, "$titulo");
            Template::ServiçoUpdate($city, $in, $out, $tour, $yes, $no);
            Template::Aereo($path);
            Template::DaybyUpdate($day, $tour, $text, $adt, $chd, $idday, $rsug, $radt, $rchd);
            Template::ValoresUpdate($hotel, $room, $cat, $price, $chd, $fam, $name, $pay);
          }
          
          echo "<button type=\"submit\" class=\"btn btn-primary\" formaction=\"../controller/revisao2.php\">Visualizar Orçamento</button>";
      ?>
      <button type="submit" class="btn btn-primary" >Enviar e visualizar</button>
    </form>
  </div>
</div>
<?php 
    include_once '../model/session.php';
    include_once '../model/city.php';
    include_once '../model/tour.php';
    include_once '../model/contenttr.php';
    include_once '../model/contentht.php';
    include_once '../model/hotel.php';
    include_once '../model/clientinfo.php';
    include_once '../model/roteiro.php';
    include_once '../model/day.php';
    include_once '../model/price.php';
    include_once '../model/profile.php';
    include_once '../model/users.php';
    include_once '../model/review.php';
    include_once '../view/pages/template.php';
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
    $(document).ready(function() {
        $('img').on('click', function() {
            $("#showImg").empty();
            var image = $(this).attr("src");
            $("#showImg").append("<img class='img-responsive img-fluid' src='" + image + "' />")
        })
    }); 
    </script>
  </head>

    <body>
        <main role="main">
        <div class="jumbotron">
            <div class="row justify-content-center" id="jumbotron">
            <div class="col-12 col-lg-10" id="jumbotron">
                <?php
                    $id = $_GET["id"];
                    $type = clientInfo::getbyId($id, "type");
                    $cambio = clientInfo::getbyId($id, "cambio");
                    $setor = clientInfo::getbyId($id, "setor");
                    $titulo = Review::getbyId($id, "titulo");
                    $agent = clientInfo::getbyId($id, "agent");
                    $tel = Profile::getbyId($agent, "tel");
                    $whats = Profile::getbyId($agent, "whats");
                    $user = Profile::getbyId($agent, "name");
                    $email = Profile::getbyId($agent, "email");
                    $clt1 = Profile::getbyId($agent, "clt1");
                    $clt2 = Profile::getbyId($agent, "clt2");
                    $intro = Review::getbyId($id, "intro");
                    $name = clientInfo::getbyId($id, "name");
                    $adt = clientInfo::getbyId($id, "adt");
                    $chd = clientInfo::getbyId($id, "chd");
                    $crr = clientInfo::getbyId($id, "crr");
                    $city = Roteiro::getbyId($id, "city");
                    $in = Roteiro::getbyId($id, "in");
                    $out = Roteiro::getbyId($id, "out");
                    $yes = Review::getbyId($id, "yes");
                    $no = Review::getbyId($id, "no");
                    $tour = Day::getArraybyId($id, "tour");
                    $rsug = Review::getbyId($id, "sug");
                    $radt = Review::getbyId($id, "adt");
                    $day = Day::getArraybyId($id, "day");
                    $idday = Day::getArraybyId($id, "id");
                    $rchd = Review::getbyId($id, "chd");
                    $text = Day::getArraybyId($id, "text");
                    $path = Tour::getPath($id, 5);
                    $hotel = Price::getArraybyId($id, "hotel");
                    $room = Price::getArraybyId($id, "room");
                    $cat = Price::getArraybyId($id, "cat");
                    $price = Price::getArraybyId($id, "price");
                    $fam = Review::getbyId($id, "fam");
                    $nameb = Review::getbyId($id, "name");
                    $pay = Review::getbyId($id, "pay");
                    Template::Header($type, $titulo);
                    Template::Geral($city, $in, $out, $name, $adt, $chd, $titulo, $intro);
                    Template::Introduçao($user, $tel, $whats, $agent, $email);
                    Template::Serviços($city, $in, $out, $tour, $yes, $no);
                    Template::Aereo($path);
                    Template::DaybyDay($day, $tour, $text, $adt, $chd, $idday, $rsug, $radt, $rchd, $cambio, $crr);
                    Template::ValoresFinal($hotel, $room, $cat, $price, $chd, $fam, $nameb, $pay, $adt, $whats, $cambio, $crr);
                    Template::Depoimento($agent, $clt1, $clt2, $setor, $whats);
                ?>
            </div>
            </div>
        </div>
        <div class="modal fade modal-xl" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body" id="showImg">
                    <!-- here we create the image dynamically -->
                    </div>
                </div>
            
            </div>
        </div>

        </main> 
        <script type="text/javascript" src="paste.js"></script>
    </body>
</html>

<?php 
    include_once '../model/session.php';
    include_once '../model/users.php';
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
    include_once '../model/review.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>       
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Rz Turismo Central</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/">
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d8f8fb4d52.js" crossorigin="anonymous"></script>
        <link href="main.css" rel="stylesheet">
    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <?php
                $lvl = 1;  
                if (isset($_SESSION['UserId'])) {
                    $name = $_SESSION['UserName'];
                    echo "<a class=\"navbar-brand\" href=\"#\" id=\"profile\">{$name}</a>";
                    echo "<a class=\"navbar-brand\" href=\"./pages/logout.php\">Sair</a>";
                    echo "<a class=\"navbar-brand\" href=\"../view\">Orçamentos</a>";
                    echo "<a class=\"navbar-brand\" id=\"new\" href=\"#\">Novo</a>";
                }
                else{
                    echo "<a class=\"navbar-brand\" href=\"#\">Convidado</a>";
                }
            ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastros e Listas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" id="citycad" href="#">Cadastrar Cidade</a>
                        <a class="dropdown-item" id="tourcad" href="./?class=1">Cadastrar Passeio</a>
                        <a class="dropdown-item" id="contenttrcad" href="./?class=4">Cadastrar Conteudo do Passeio</a>
                        <a class="dropdown-item" id="hotelcad" href="./?class=2">Cadastrar Hotel</a>
                        <a class="dropdown-item" id="contenthtcad" href="./?class=5">Cadastrar Conteudo do Hotel</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="citylist" href="#">Lista de Cidades</a>
                        <a class="dropdown-item" id="tourlist" href="#">Lista de Passeios</a>
                        <a class="dropdown-item" id="hotellist" href="#">Lista de Hoteis</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main">
        <div class="jumbotron">
            <div class="container" id="jumbotron">
                <?php
                    $lvl = 1;  
                    if (!isset($_SESSION['UserId']) OR ($_SESSION['UserLevel'] <$lvl)) {
                        session_destroy();
                        include 'pages/login.php';
                    }
                    else{
                        if(isset($_GET['class'])){
                            $class = @$_GET['class'];
                            if($class == 0){
                                include 'pages/citycad.php';
                            }
                            elseif($class == 1){
                                include 'pages/tourcad.php';
                            }
                            elseif($class == 2){
                                include 'pages/hotelcad.php';
                            }
                            elseif($class == 3){
                                include 'pages/clientcad.php';
                            }
                            elseif($class == 4){
                                include 'pages/contenttrcad.php';
                            }
                            elseif($class == 5){
                                include 'pages/contenthtcad.php';
                            }
                            elseif($class == 20){
                                include 'pages/roteirocad.php';
                            }
                            elseif($class == 21){
                                include 'pages/daycad.php';
                            }
                            elseif($class == 22){
                                include 'pages/pricecad.php';
                            }
                            elseif($class == 23){
                                include 'pages/revisao.php';
                            }
                        }
                        else{
                            include 'pages/clientlist.php';
                        }
                    }
                ?>
            </div>
        </div>

        </main> 

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        </script>
        <script type="text/javascript" src="paste.js"></script>
        <script type="text/javascript" src="jquery.js"></script>
    </body>
</html>

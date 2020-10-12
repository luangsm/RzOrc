<?php
    include_once "../model/tour.php";

    if(isset($_POST["tourcity"]) && isset($_POST["tourname"]) && isset($_POST["tourserv"]) && isset($_POST["ticket"])){
        $city = $_POST["tourcity"];
        $name = $_POST["tourname"];
        $serv = $_POST["tourserv"];
        $ticket = $_POST["ticket"];

        if(isset($_POST["id"])){
            $c = new Tour($name, $serv, $city, $ticket);
            $id = $_POST["id"];
            $c->updateTour($id);
            header("Location: ../view/");
        }
        else{
            $c = new Tour($name, $serv, $city, $ticket);
            $bol = $c->checkTour();
            if ($bol == "0"){
                $c->createTour();
            }
        }
        

        /*
        // Contador para puxar multiplas fotos de multiplos inputs
        $count = 0;

        while(isset($_POST["data{$count}"])){ //Enquanto existir input preenchido ira entrar
            $pic = $_POST["data{$count}"];// Busca data
            $pic = str_replace('data:image/png;base64,', '', $pic);// Extrai BASE64 format image
            $pic = str_replace(' ', '+', $pic);// limpa string de espaços
            $data = base64_decode($pic);// decoda BASE64 para salvar no banco
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
            $uniq = substr(str_shuffle($str_result),0, 25);// Id único gerado pra imagem
            $path = "../view/img/{$uniq}.png";// Path do local da imagem    
            file_put_contents($path, $data); // salva no servidor
            $idp = $c->getId(); // pega id da classe 
            $c->savePics($idp, "0", $path);// salva imagem 
            $count++;
        }
        */
    }
?>
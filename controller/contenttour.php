<?php
    include_once "../model/contenttr.php";

    if(isset($_POST["tourid"]) && isset($_POST["tourintro"]) && isset($_POST["tourbody"])){

        $tour = $_POST["tourid"];
        $intro = $_POST["tourintro"];
        $body = $_POST["tourbody"];

        if(isset($_POST["id"])){
            $id = $_POST["id"];
            $c = new contentTour($tour, $intro, $body);
            $c->updateTourContent($id);
            $idp = $id;
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
                $c->savePics($idp, "10", $path);// salva imagem 
                $count++;
            }
        }
        else{
            $c = new contentTour($tour, $intro, $body);
            $c->createTourContent();
            $idp = $c->getId();
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
                $c->savePics($idp, "10", $path);// salva imagem 
                $count++;
            }
        }

    }
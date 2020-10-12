<?php
    include_once "../model/roteiro.php";

    if((isset($_POST["id"])) && (isset($_POST["city"])) && (isset($_POST["in"])) && (isset($_POST["out"]))){

        $id = $_POST["id"];
        $city = $_POST["city"];
        $in = $_POST["in"];
        $out = $_POST["out"];
        $ct = implode("|", $city);
        $inn = implode("|", $in);
        $ou = implode("|", $out);
        if($ct[0] === "|"){
            header("Location: ../view/?id={$id}&class=20");
        }
        else{
            if(isset($_POST["edit"])){
                $c = new Roteiro($id, $ct, $inn, $ou);
                $c->updateRoteiro($id);
                $id = $c->getId();
                $pathi = Roteiro::getPath($id, 5);
                if(isset($_POST["data0"])){
                    $pic = $_POST["data0"];// Busca data
                    $pic = str_replace('data:image/png;base64,', '', $pic);// Extrai BASE64 format image
                    $pic = str_replace(' ', '+', $pic);// limpa string de espaços
                    $data = base64_decode($pic);// decoda BASE64 para salvar no banco
                    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
                    $uniq = substr(str_shuffle($str_result),0, 25);// Id único gerado pra imagem
                    $path = "../view/img/{$uniq}.png";// Path do local da imagem    
                    file_put_contents($path, $data); // salva no servidor
                    if($pathi !== null){
                        $c->updatePics($id, "5", $path);// salva imagem
                    }
                    else{
                        $c->savePics($id, "5", $path);// salva imagem 
                    }   
                }
                header("Location: ../view/?id={$id}&class=21");
            }
            else{
                $c = new Roteiro($id, $ct, $inn, $ou);
                $c->createRoteiro();
                $id = $c->getId();
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
                    $c->savePics($id, "5", $path);// salva imagem 
                    $count++;
                }
                header("Location: ../view/?id={$id}&class=21");
            }
        }
    }
?>
<?php
    include_once "../model/profile.php";

    $tel = $_POST["tel"];
    $whats = $_POST["wht"];
    $tt1 = $_POST["tt1"];
    $tt2 = $_POST["tt2"];
    $fname = $_POST["fname"];
    $eml = $_POST["eml"];
    $clt1 = $_POST["clt1"];
    $clt2 = $_POST["clt2"];
    if (!isset($_SESSION)) session_start();
    
    $id = $_SESSION['UserId'];
    $c = new Profile($id, $tel, $whats, $tt1, $tt2, $fname, $eml, $clt1, $clt2);
    $check = $c->check($id);
    if($check == 0){
        $c->createProfile();
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
            $c->savePics($idp, "20", $path);// salva imagem 
            $count++;
        }
        echo '<script>window.location.href="../view"</script>';
    }
    else{
        $c->updateProfile($id);
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
            $c->savePics($idp, "20", $path);// salva imagem 
            $count++;
        }
        echo '<script>window.location.href="../view"</script>';
    }

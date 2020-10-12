<?php
    include_once "../model/clientinfo.php";

    if (!isset($_SESSION)) session_start();

    $agent = $_SESSION["UserId"];

    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["adt"]) && isset($_POST["chd"]) && isset($_POST["clt"]) && isset($_POST["city"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $adt = $_POST["adt"];
        $chd = $_POST["chd"];
        $clt = $_POST["clt"];
        $city = $_POST["city"];
        $setor = $_POST["setor"];
        $cb = $_POST["cb"];
        $crr = $_POST["crr"];

        if(isset($_POST["id"])){
            $id = $_POST["id"];
            $c = new clientInfo($agent, $name, $email, $adt, $chd, $clt, $city, $setor, $cb, $crr);
            $c->timestamp();
            $c->updateClient($id);
        }
        else{
            $c = new clientInfo($agent, $name, $email, $adt, $chd, $clt, $city, $setor, $cb, $crr);
            $c->timestamp();
            $c->createClient();
            $id = $c->getId();
            header("Location: ../view/?id={$id}&class=20");
        }
    }
?>
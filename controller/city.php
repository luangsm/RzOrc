<?php
    include_once "../model/city.php";

    if(isset($_POST["cityname"])){
        $city = $_POST["cityname"];
        $pais = $_POST["pais"];

        if(isset($_POST["id"])){
            $c = new City($city, $pais);
            $id = $_POST["id"];
            $c->updateCity($id);
            header("Location: ../view/");
        }
        else{
            $c = new City($city, $pais);
            $bol = $c->checkCity();
            if ($bol == "0"){
                $c->createCity();  
            }
        }
    }
?>
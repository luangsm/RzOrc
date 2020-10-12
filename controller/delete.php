<?php
    include_once "../model/city.php";
    include_once "../model/tour.php";
    include_once "../model/hotel.php";
    include_once "../model/clientinfo.php";
    
    $class = $_GET["class"];
    if($class == 0){
        $id = $_GET["id"];
        City::deleteCity($id);
        echo "<script>window.location.href = \"../view\"</script>";
    }
    elseif($class == 1){
        $id = $_GET["id"];
        Tour::deleteTour($id);
        echo "<script>window.location.href = \"../view\"</script>";
    }
    elseif($class == 2){
        $id = $_GET["id"];
        Hotel::deleteHotel($id);
        echo "<script>window.location.href = \"../view\"</script>";
    }
    elseif($class == 3){
        $id = $_GET["id"];
        clientInfo::deleteClient($id);
        echo "<script>window.location.href = \"../view\"</script>";
    }
    elseif($class == 4){
        $id = $_GET["id"];
        $idp = $_GET["idp"];
        Tour::deleteImg($idp);
        echo "<script>window.location.href = \"../view/?id={$id}&class=4\"</script>";
    }
    elseif($class == 5){
        $id = $_GET["id"];
        $idp = $_GET["idp"];
        Tour::deleteImg($idp);
        echo "<script>window.location.href = \"../view/?id={$id}&class=5\"</script>";
    }
    elseif($class == 6){
        $id = $_GET["id"];
        $idp = $_GET["idp"];
        Tour::deleteImg($idp);
        echo "<script>window.location.href = \"../view/\"</script>";
    }
?>
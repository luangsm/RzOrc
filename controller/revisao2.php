<?php
    include_once "../model/review.php";
    include_once '../model/profile.php';
    include_once '../model/clientinfo.php';
    $id = $_POST["id"];
    $agent = clientInfo::getbyId($id, "agent");
    $user = Profile::getbyId($agent, "name");

    $check = Review::check($id);
    if($check == 0){
        Review::createReview($id);
    }
    $intro = $_POST["intro"];
    Review::updateReview($id, "intro", $intro);
    //$titulo = $_POST["titulo"];
    //Review::updateReview($id, "titulo", $titulo);
    $count = 0;
    $ct = 0;
    while($count < 4){
        $y = "ch" . $count;
        if(isset($_POST["$y"])){
            $yes[$ct] = $_POST["$y"];
            $ct++;
        }
        $count++;
    }
    $yes = implode(";", $yes);
    if($yes !== null){
        Review::updateReview($id, "yes", $yes);
    }
    else{
        Review::updateReview($id, "yes", null);
    }
    $count = 9;
    $ct = 0;
    while($count > 5){
        $n = "ch" . $count;
        if(isset($_POST["$n"])){
            $no[$ct] = $_POST["$n"];
            $ct++;
        }
        $count--;
    }
    $no = implode(";", $no);
    if($no !== null){
        Review::updateReview($id, "no", $no);
    }
    else{
        Review::updateReview($id, "no", null);
    }
    
    if(isset($_POST["fam0"])){
        $fam[0] = "1";
    }
    if(isset($_POST["fam1"])){
        $fam[1] = "2";
    }
    if(isset($_POST["fam2"])){
        $fam[2] = "3";
    }
    $fam = implode(";", $fam);
    if($fam !== null){
        Review::updateReview($id, "fam", $fam);
    }
    else{
        Review::updateReview($id, "fam", null);
    }
    if(isset($_POST["sug"])){
        $sug = $_POST["sug"];
        $sug = implode(";", $sug);
        Review::updateReview($id, "sug", $sug);
    }
    else{
        Review::updateReview($id, "sug", null);
    }
    if(isset($_POST["adt"])){
        $adt = $_POST["adt"];
        $adt = implode(";", $adt);
        Review::updateReview($id, "adt", $adt);
    }
    else{
        Review::updateReview($id, "adt", null);
    }
    if(isset($_POST["chd"])){
        $chd = $_POST["chd"];
        $chd = implode(";", $chd);
        Review::updateReview($id, "chd", $chd);
    }
    else{
        Review::updateReview($id, "chd", null);
    }
    if(isset($_POST["name"])){
        $name = $_POST["name"];
        $name = implode(";", $name);
        Review::updateReview($id, "name", $name);
    }
    else{
        Review::updateReview($id, "name", null);
    }
    if(isset($_POST["pay"])){
        $pay = $_POST["pay"];
        $pay = implode(";", $pay);
        Review::updateReview($id, "pay", $pay);
    }
    else{
        Review::updateReview($id, "pay", null);
    }
 

    echo '<script>window.location.href="../view/orcamento.php?id='. $id .'"</script>';

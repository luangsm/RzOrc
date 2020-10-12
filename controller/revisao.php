<?php
    include_once "../model/review.php";
    include_once '../model/profile.php';
    include_once '../model/clientinfo.php';
    $id = $_POST["id"];
    $agent = clientInfo::getbyId($id, "agent");
    $user = Profile::getbyId($agent, "name");
    $ml = clientInfo::getbyId($id, "email");
    $mla = Profile::getbyId($agent, "email");
    if(strpos($ml, ";") !== false){
        $ml = explode(";", $ml);
        $rbr = 1;
    } else{
        $rbr = 0;
    }

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

    function sanitize_my_email($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    if($rbr == 1){
        foreach($ml as $m){
            $to_email = '' .$m. '';
            $subject = 'Orçamento RZ Turismo';
            $message = 'Orçamento enviado pela RZ Turismo.</br>Montado pelo agente ' .$user. '.</br><a href="https://sistema.rzturismo.com.br/view/orcamento.php?id='. $id .'">Clique aqui para ver seu orçamento</a>';
            $headers = 'From: ' .$mla. '';
            $secure_check = sanitize_my_email($to_email);
            if ($secure_check == false) {
            } else { //send email 
                mail($to_email, $subject, $message, $headers);
                echo "envio";
                echo $to_email;
                echo $headers;
            }
        }    
    }
    else{
        $to = "$ml";
        $subject = "Orçamento RZ Turismo";

        $message = "
        <html>
        <head>
        <title>Orçamento enviado pela RZ Turismo</title>
        </head>
        <body>
        <p>Montado pelo agente $user.</br><a href=\"https://sistema.rzturismo.com.br/view/orcamento.php?id=$id\">Clique aqui para ver seu orçamento</a></p>
        </body>
        </html>
        ";

        // It is mandatory to set the content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers. From is required, rest other headers are optional
        $headers .= 'From: ' .$mla. '' . "\r\n";
        $headers .= 'Cc: ' . "\r\n";

        $secure_check = sanitize_my_email($to);
        if ($secure_check == false) {
        } else { //send email 
            mail($to, $subject, $message, $headers);
            echo "envio";
        }
    }   

    echo '<script>window.location.href="../view/orcamento.php?id='. $id .'"</script>';

<?php
    include_once '../model/session.php';
    include_once "../model/users.php";
    if(isset($_POST["username"]) && isset($_POST["pass"])){
        $name = $_POST["username"];
        $pass = $_POST["pass"];

        $c = new Users($name, $pass);
        $c->startLogin();
    }    
?>
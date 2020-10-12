<?php
    include_once "../model/day.php";

    if (!isset($_SESSION)) session_start();

    if(isset($_POST["id"]) && isset($_POST["data"]) && isset($_POST["tour1"]) && isset($_POST["tour2"])&& isset($_POST["text"])){
        $id = $_POST["id"];
        $data = $_POST["data"];
        $tour1 = $_POST["tour1"];
        $tour2 = $_POST["tour2"];
        $text = $_POST["text"];
        if(!isset($_POST["idday"])){
            $count = 0;
            while(isset($data[$count])){
                $dt = @$data[$count];
                $txt = @$text[$count];
                $tr1 = @$tour1[$count];
                $tr2 = @$tour2[$count];
                if(isset($_POST["sug1"])){
                    $sg1 = $_POST["sug1"];
                    foreach($sg1 as $sg){
                        if($sg == $dt){
                            $tr1 = $tr1 . "s";
                        }
                    }
                }
                if(isset($_POST["sug2"])){
                    $sg1 = $_POST["sug2"];
                    foreach($sg1 as $sg){
                        if($sg == $dt){
                            $tr2 = $tr2 . "s";
                        }
                    }
                }
                $trl = $tr1 . ";" . $tr2;
                $c = new Day($id, $dt, $txt, $trl);
                $c->createDay();
                $count++;
            }
            header("Location: ../view/?id={$id}&class=22");
        }
        else{
            $count = 0;
            $idday = $_POST["idday"];
            while(isset($data[$count])){
                $idd = @$idday[$count];
                $dt = @$data[$count];
                $txt = @$text[$count];
                $tr1 = @$tour1[$count];
                $tr2 = @$tour2[$count];
                if(isset($_POST["sug1"])){
                    $sg1 = $_POST["sug1"];
                    foreach($sg1 as $sg){
                        if($sg == $dt){
                            $tr1 = $tr1 . "s";
                        }
                    }
                }
                if(isset($_POST["sug2"])){
                    $sg1 = $_POST["sug2"];
                    foreach($sg1 as $sg){
                        if($sg == $dt){
                            $tr2 = $tr2 . "s";
                        }
                    }
                }
                $trl = $tr1 . ";" . $tr2;
                $c = new Day($id, $dt, $txt, $trl);
                $c->updateDay($idd);
                $count++;
            }
            header("Location: ../view/?id={$id}&class=22");
        }
    }        

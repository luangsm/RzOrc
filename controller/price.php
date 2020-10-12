<?php
    include_once "../model/price.php";

    if(isset($_POST["adt"])){
        $count = 1;
        $cou = 0;
        $adt = ($_POST["adt"]);
        $tax = ($_POST["tax"]);
        $id = ($_POST["id"]);
        $hot = "hotel" . $count;
        if(isset($_POST["idp"])){
            $idp = ($_POST["idp"]);
            while(isset($_POST["$hot"])){
                $hot = "hotel" . $count;
                $size = "size" . $count;
                $cat = "cat" . $count;
                $hotel = @$_POST["$hot"];
                $size = @$_POST["$size"];
                $cat = @$_POST["$cat"];
                if($hotel != null){
                    $ht = implode(";", $hotel);
                    $rm = implode(";", $size);
                    $ct = implode(";", $cat);
                    $ad = $adt[$cou];
                    if(isset($_POST["chd"])){
                        $chd = $_POST["chd"];
                        $ch = $chd[$cou];
                        if($cou == 0){
                            $price = $ad . ";" . $ch . ";" . $tax;
                        }
                        else{
                            $price = $ad . ";" . $ch;
                        }
                    }
                    else{
                        if($cou == 0){
                            $price = $ad . ";" . $tax;
                        }
                        else{
                            $price = $ad;
                        }
                    }
                    if($adt[$cou] != null){
                        $c = new Price($id, $ht, $rm, $ct, $price);
                        if(isset($idp[$cou])){
                            $c->updatePrice($idp[$cou]);
                        }
                        else{
                            $c->createPrice(); 
                        }
                    }
                    else{
                        $c = new Price($id, $ht, $rm, $ct, $price);
                        if(isset($idp[$cou])){
                            $c->deletePrice($idp[$cou]);
                        }
                    }
                }
                $count++;
                $cou++;
            }
            echo '<script>window.location.href="../view/?id='. $id .'&class=23"</script>';
        }
        else{
            while(isset($_POST["$hot"])){
                $hot = "hotel" . $count;
                $size = "size" . $count;
                $cat = "cat" . $count;
                $hotel = @$_POST["$hot"];
                $size = @$_POST["$size"];
                $cat = @$_POST["$cat"];
                if($hotel != null){
                    $ht = implode(";", $hotel);
                    $rm = implode(";", $size);
                    $ct = implode(";", $cat);
                    $ad = $adt[$cou];
                    if(isset($_POST["chd"])){
                        $chd = $_POST["chd"];
                        $ch = $chd[$cou];
                        if($cou == 0){
                            $price = $ad . ";" . $ch . ";" . $tax;
                        }
                        else{
                            $price = $ad . ";" . $ch;
                        }
                    }
                    else{
                        if($cou == 0){
                            $price = $ad . ";" . $tax;
                        }
                        else{
                            $price = $ad;
                        }
                    }
                    if($adt[$cou] != null){
                        $c = new Price($id, $ht, $rm, $ct, $price);
                        $c->createPrice();
                    }
                }
                $count++;
                $cou++;
            }
            echo '<script>window.location.replace("../view/?id='. $id .'&class=23");</script>';
        }
    }

<?php
    include_once "../model/hotel.php";

    if(isset($_POST["hotelcity"]) && isset($_POST["hotelstars"]) && isset($_POST["hotelname"])){
        $city = $_POST["hotelcity"];
        $stars = $_POST["hotelstars"];
        $name = $_POST["hotelname"];

        if(isset($_POST["id"])){
            $id = $_POST["id"];
            $c = new Hotel($name, $stars, $city);
            $c->updateHotel($id);
            header("Location: ../view/");
        }
        else{
            $c = new Hotel($name, $stars, $city);
            $bol = $c->checkHotel();
            if ($bol == "0"){
                $c->createHotel();
            }
        }
        

        
        /*$count = 0;
        while(isset($_POST["data{$count}"])){
            $pic = $_POST["data{$count}"];
            $pic = str_replace('data:image/png;base64,', '', $pic);
            $pic = str_replace(' ', '+', $pic);
            $data = base64_decode($pic);
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
            $uniq = substr(str_shuffle($str_result),0, 25);
            $path = "../view/img/{$uniq}.png";
            file_put_contents($path, $data);
            $idp = $c->getId();
            $c->savePics($idp, "1", $path);
            $count++;
        }
        $(function(){
            var p = 0;
            $('.demo-textarea').on('focus', function(){
                var isFocused = $(this).hasClass('pastable-focus');
                console && console.log('[textarea] focus event fired! ' + (isFocused ? 'fake onfocus' : 'real onfocus'));
            }).pastableTextarea().on('blur', function(){
                var isFocused = $(this).hasClass('pastable-focus');
                console && console.log('[textarea] blur event fired! ' + (isFocused ? 'fake onblur' : 'real onblur'));
            });
            $('.demo').on('pasteImage', function(ev, data){
                var blobUrl = URL.createObjectURL(data.blob);
                $('<div class="result"><img src="' + data.dataURL +'" ><input class="d-none" id="data" value="' + data.dataURL + '" name="data' + p + '"></div>').insertAfter(this);
                p = p + 1;
            }).on('pasteImageError', function(ev, data){
                alert('Oops: ' + data.message);
                if(data.url){
                alert('But we got its url anyway:' + data.url)
                }
            }).on('pasteText', function(ev, data){
                $('<div class="result"></div>').text('text: "' + data.text + '"').insertAfter(this);
            });
        });
        */
    }
?>
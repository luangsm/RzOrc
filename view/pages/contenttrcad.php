<?php
    include_once '../../model/session.php';
    include_once "template.php";
    include_once "check1.php";
?>
<div class="card mt-3">
  <div class="card-body">
    <form id="contenttrform">
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $intro = contentTour::getbyId($id, 'intro');
                $body = contentTour::getbyId($id, 'body');
                $idc = contentTour::getbyId($id, 'id');
                if($idc !== null){
                    Template::inputHidden("id", "$idc");
                }
                $array = Tour::getImgArray($idc, 10, "path");
                if($array != null){
                    $idp = Tour::getImgArray($idc, 10, "id");
                    echo "<div class=\"row\">";
                    $count = 0;
                    foreach($array as $ar){
                        echo "<div class=\"col\">";
                        Template::Image($ar);
                        echo "<a href=\"../controller/delete.php?id={$id}&class=4&idp={$idp["$count"]}\">Deletar</a>";
                        echo "</div>";
                        $count++;
                    }
                    echo "</div>";
                }
                Template::selectedTour("tourid", "Passeio deste conteúdo", $id);
                Template::inputTextarea("tourintro", "Introdução do passeio", 8, "{$intro}");
                Template::inputTextarea("tourbody", "Mais informações do passeio", 16, "{$body}"); 
                Template::inputImage("img", "Fotos do passeio");  
            }
            else{
                Template::selectTour("tourid", "Passeio deste conteúdo");
                Template::inputTextarea("tourintro", "Introdução do passeio", 8, "");
                Template::inputTextarea("tourbody", "Mais informações do passeio", 16, "");
                Template::inputImage("img", "Fotos do passeio");
            }
        ?>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
</div>
<script>
$(document).ready(function(){ 
    $('#tourid').selectpicker('refresh');
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
    $(function () {
        $('#contenttrform').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/contenttour.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./");
                }
            });
        });
    }); 
});
</script>
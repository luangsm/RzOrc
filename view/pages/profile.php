<?php
    include_once '../../model/session.php';
    include_once "template.php";
    include_once "check1.php";
    include_once '../../model/profile.php';
?>
<div class="card mt-3">
  <div class="card-body">
    <form action="../controller/profile.php" method="post">
        <?php
            if (!isset($_SESSION)) session_start();
        
            $id = $_SESSION['UserId'];
            $check = Profile::check($id);

            if($check == 1){
                $idp = Profile::getbyId($id, "id");
                $tel = Profile::getbyId($id, "tel");
                $wht = Profile::getbyId($id, "whats");
                $tt1 = Profile::getbyId($id, "tt1");
                $tt2 = Profile::getbyId($id, "tt2");
                $eml = Profile::getbyId($id, "email");
                $fname = Profile::getbyId($id, "name");
                $clt1 = Profile::getbyId($id, "clt1");
                $clt2 = Profile::getbyId($id, "clt2");
                Template::inputText("fname", "Nome do agente", "form-control", 1, "$fname");
                Template::inputText("eml", "Email do agente", "form-control", 1, "$eml");
                Template::inputNumber("tel", "Telefone para contato", "form-control", 1, 1, "$tel");
                Template::inputNumber("wht", "Whatsapp para contato", "form-control", 1, 1, "$wht");
                Template::inputText("clt1", "Nome do cliente", "form-control", 1, "$clt1");
                Template::inputTextarea("tt1", "Primeiro depoimento", 8, "$tt1");
                Template::inputText("clt2", "Nome do cliente", "form-control", 1, "$clt2");
                Template::inputTextarea("tt2", "Segundo depoimento", 8, "$tt2");
                $array = Tour::getImgArray($idp, 20, "path");
                if($array != null){
                    $idp = Tour::getImgArray($idp, 20, "id");
                    echo "<div class=\"row\">";
                    $count = 0;
                    foreach($array as $ar){
                        echo "<div class=\"col\">";
                        Template::Image($ar);
                        echo "<a href=\"../controller/delete.php?class=6&idp={$idp["$count"]}\">Deletar</a>";
                        echo "</div>";
                        $count++;
                    }
                    echo "</div>";
                }
                Template::inputImage("foto", "Cole as imagens do depoimento aqui, e em seguida a imagem do agente");
            }
            else{
                Template::inputText("fname", "Nome do agente", "form-control", 1, 0, "");
                Template::inputText("eml", "Email do agente", "form-control", 1, 0, "");
                Template::inputNumber("tel", "Telefone para contato", "form-control", 1, 0, "");
                Template::inputNumber("wht", "Whatsapp para contato", "form-control", 1, 0, "");
                Template::inputText("clt1", "Nome do cliente", "form-control", 1, 0, "");
                Template::inputTextarea("tt1", "Primeiro depoimento", 8, "");
                Template::inputText("clt2", "Nome do cliente", "form-control", 1, 0, "");
                Template::inputTextarea("tt2", "Segundo depoimento", 8, "");
                Template::inputImage("foto", "Cole as imagens do depoimento aqui, e em seguida a imagem do agente");
            }
        ?>
        <button type="submit" class="btn btn-primary">Avançar</button>
    </form>
  </div>
</div>
<script>
$(document).ready(function(){ 
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
        $('#profile').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/profile.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./");
                }
            });
        });
    }); 
});
</script>
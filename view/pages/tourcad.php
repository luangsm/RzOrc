<?php
    include_once '../../model/session.php';
    include_once "template.php";
    include_once "check1.php";
?>
<div class="card mt-3">
  <div class="card-body">
    <form id="tourform">
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $name = Tour::getbyId($id, "name");
                $city = Tour::getbyId($id, "idCity");
                $service = Tour::getbyId($id, "service");
                $ticket = Tour::getbyId($id, "ticket");
                Template::inputHidden("id", "$id");
                Template::selectedCity("tourcity", "Cidade do Passeio", $city);
                Template::inputText("tourname", "Nome do passeio", "form-control", 1, "$name");
                Template::inputText("tourserv", "Serviço do passeio", "form-control", 1, "$service");
                Template::inputRadioInlineChecked("Referente a ingressos:", 3, "Possui e está incluso;Possui, mas não está incluso;Não possui", "sim;não;off", "ticket", $ticket);
            }
            else{
                Template::selectCity("tourcity", "Cidade do Passeio");
                Template::inputText("tourname", "Nome do passeio", "form-control", 0, "");
                Template::inputText("tourserv", "Serviço do passeio", "form-control", 0, "");
                Template::inputRadioInline("Referente a ingressos:", 3, "Possui e está incluso;Possui, mas não está incluso;Não possui", "sim;não;off", "ticket");
            }
        ?>
        <button type="submit" class="btn btn-primary">Salvar</button>
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
    $('#tourcity').selectpicker('refresh');   
    $(function () {
        $('#tourform').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/tour.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./");
                }
            });
        });
    }); 
});
</script>
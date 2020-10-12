<?php
    include_once '../../model/session.php';
    include_once "template.php";
    include_once "template2.php";
    include_once "check1.php";
?>
<div class="card mt-3">
  <div class="card-body">
    <form id="roteiro" method="post" action="../controller/roteiro.php">
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $check = Roteiro::check($id);
                if($check == 1){
                  Template::inputHidden("id", "$id");
                  Template2::FormImage("img", "Copie e cole o aéreo aqui", 5);
                  $city = clientInfo::getbyId($id, "city");
                  $count = 0;
                  while($count < $city){
                    Template2::FormSelectCity("city[]", "Cidade do roteiro", 5, "Selecione a cidade");
                    echo "<div class=\"row\"><div class=\"col\">";
                    Template2::FormDateEmpty("in[]", "Data da chegada", 6, "form-control");
                    echo "</div><div class=\"col\">";
                    Template2::FormDateEmpty("out[]", "Data da saída", 6, "form-control");
                    echo "</div></div>";
                    $count++;
                  }
                }
                else{
                  $city = Roteiro::getbyId($id, "city");
                  $in = Roteiro::getbyId($id, "in");
                  $out = Roteiro::getbyId($id, "out");
                  $city = explode("|", $city);
                  $in = explode("|", $in);
                  $out = explode("|", $out);
                  Template::inputHidden("id", "$id");
                  Template2::ShowImage("$id", 5, "Aéreo atual do orçamento, para substituir este cole o novo aéreo na área específica, caso queira manter ignore o aéreo", 5);
                  Template2::FormImage("img", "Copie e cole o aéreo aqui", 5);
                  Template::inputHidden("edit", "lala");
                  $num = clientInfo::getbyId($id, "city");
                  $count = 0;
                  while($count < $num){
                    Template2::FormSelectedCity("city[]", "Cidade do roteiro", 5, "Selecione a cidade", $city[$count]);
                    echo "<div class=\"row\"><div class=\"col\">";
                    Template2::FormDate("in[]", "Data da chegada", 6, "form-control", $in[$count]);
                    echo "</div><div class=\"col\">";
                    Template2::FormDate("out[]", "Data da chegada", 6, "form-control", $out[$count]);
                    echo "</div></div>";
                    $count++;
                  }
                }
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
});
</script>
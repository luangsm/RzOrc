<?php
    include_once '../../model/session.php';
    include_once "template.php";
    include_once "template2.php";
    include_once "check1.php";
?>
<div class="card mt-3">
  <div class="card-body">
    <form id="cityform">
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $name = City::getbyId($id);
                $pais = City::getbyIdd($id);
                Template::inputHidden("id", "$id");
                Template::inputText("cityname", "Nome da cidade", "form-control", 1, "$name");
                if($pais !== null){
                    Template2::FormSelected("pais", 5, "Selecione o país do passeio", "Argentina;Brasil;Chile;Costa Rica;Estados Unidos;Maldivas;República Dominicana", "Selecione aqui", "Argentina;Brasil;Chile;Costa Rica;Estados Unidos;Maldivas;República Dominicana", 7, $pais);
                }
                else{
                    Template2::FormSelectEmpty("pais", 5, "Selecione o país do passeio", "Argentina;Brasil;Chile;Costa Rica;Estados Unidos;Maldivas;República Dominicana", "Selecione aqui", "Argentina;Brasil;Chile;Costa Rica;Estados Unidos;Maldivas;República Dominicana", 7);
                }
                
            }
            else{
                Template::inputText("cityname", "Nome da cidade", "form-control", 0, "");
                Template2::FormSelectEmpty("pais", 5, "Selecione o país do passeio", "Argentina;Brasil;Chile;Costa Rica;Estados Unidos;Maldivas;República Dominicana", "Selecione aqui", "Argentina;Brasil;Chile;Costa Rica;Estados Unidos;Maldivas;República Dominicana", 7);
            }
        ?>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
</div>
<script>
$(document).ready(function(){    
    $(function () {
        $('#cityform').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/city.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./");
                }
            });
        });
    }); 
});
</script>
<script>
$(document).ready(function(){
    $('#pais').selectpicker('refresh');     
});
</script>
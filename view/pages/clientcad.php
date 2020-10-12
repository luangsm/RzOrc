<?php
    include_once '../../model/session.php';
    include_once "template.php";
    include_once "template2.php";
    include_once "check1.php";
?>
<div class="card mt-3">
  <div class="card-body">
    <form id="client" <?php if(!isset($_GET["id"])){ echo "method=\"post\" action=\"../controller/client.php\"";} ?>>
        <?php
            $perfis = "Viagem com amigos jovens durante o verão;Viagem com amigos, 4 amigos adultos e jovens durante o inverno;Viagem de casal, casal jovem durante o verão;Viagem de casal, casal jovem e explorador durante o verão;Viagem em família, pai e filho durante o verão;Viagem sozinho e aventureiro inverno e verão;Viagem em família, com mais de um filho, durante o inverno;Viagem com amigos, em grupo, durante o inverno;Viagem sozinho inverno e verão;Viagem de casal mais velho";
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $name = clientInfo::getbyId($id, "name");
                $email = clientInfo::getbyId($id, "email");
                $adt = clientInfo::getbyId($id, "adt");
                $chd = clientInfo::getbyId($id, "chd");
                $type = clientInfo::getbyId($id, "type");
                $city = clientInfo::getbyId($id, "city");
                $setor = clientInfo::getbyId($id, "setor");
                $cambio = clientInfo::getbyId($id, "cambio");
                $crr = clientInfo::getbyId($id, "crr");
                Template::inputHidden("id", "$id");
                Template2::FormText("name", "Nome do(s) cliente(s)", 5, "form-control", "$name", "Nome do(s) cliente(s) - Mais de um cliente, separe por ponto e vírgula (;)");
                Template2::FormText("email", "Email do(s) cliente(s)", 5, "form-control", "$email", "Email do(s) cliente(s) - Mais de um email, separe por ponto e vírgula (;)");
                Template2::FormNumber("cb", "Câmbio do dia", 5, "form-control", 0.01, "$cambio", "Câmbio do dia");
                Template2::FormNumber("adt", "Adultos", 5, "form-control", 1, "$adt", "Quantidade de adultos");
                Template2::FormNumber("chd", "Crianças", 5, "form-control", 1, "$chd", "Quantidade de crianças");
                Template2::FormNumber("city", "Quantas cidades serão visitadas no roteiro", 5, "form-control", 1, "$city", "Quantidade de cidades que havera pernoite");
                Template2::FormSelected("clt", 5, "Selecione o perfil do(s) viajante(s)", "$perfis", "Selecione aqui", "0;1;2;3;4;5;6;7;8;9", 10, $type);
                Template2::FormSelected("setor", 5, "Selecione o setor da empresa", "Patagonia Trips;RZ Turismo;Surf Trips;Snow Trips", "Selecione aqui", "0;1;2;3;4", 4, $setor);
                Template2::FormSelected("crr", 5, "Selecione a moeda para conversão e exibição final", "Real;Dólar", "Selecione aqui", "0;1;", 2, $crr);
            }
            else{
                Template2::FormTextEmpty("name", "Nome do(s) cliente(s)", 5, "form-control", "Nome do(s) cliente(s) - Mais de um cliente, separe por ponto e vírgula (;)");
                Template2::FormTextEmpty("email", "Email do(s) cliente(s)", 5, "form-control", "Email do(s) cliente(s) - Mais de um email, separe por ponto e vírgula (;)");
                Template2::FormNumberEmpty("cb", "Câmbio do dia", 5, "form-control", 0.01, "Câmbio do dia");
                Template2::FormNumberEmpty("adt", "Adultos", 5, "form-control", 1, "Quantidade de adultos");
                Template2::FormNumberEmpty("chd", "Crianças", 5, "form-control", 1, "Quantidade de crianças");
                Template2::FormNumberEmpty("city", "Quantidade de cidades que haverá pernoite", 5, "form-control", 1, "Quantidade de cidades que havera pernoite");
                Template2::FormSelectEmpty("clt", 5, "Selecione o perfil do(s) viajante(s):", "$perfis", "Selecione aqui", "0;1;2;3;4;5;6;7;8;9", 10);
                Template2::FormSelectEmpty("setor", 5, "Selecione o setor da empresa:", "Patagonia Trips;RZ Turismo;Surf Trips;Snow Trips", "Selecione aqui", "0;1;2;3", 4);
                Template2::FormSelectEmpty("crr", 5, "Selecione a moeda para conversão e exibição final:", "Real;Dólar", "Selecione aqui", "0;1", 2);
            }
        ?>
        <button type="submit" class="btn btn-primary">Avançar</button>
    </form>
  </div>
</div>
<script>
$(document).ready(function(){
    $('#clt').selectpicker('refresh');     
});
$(document).ready(function(){
    $('#setor').selectpicker('refresh');     
});
$(document).ready(function(){
    $('#crr').selectpicker('refresh');     
});
</script>
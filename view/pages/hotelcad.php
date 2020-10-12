<?php
    include_once '../../model/session.php';
    include_once "template.php";
    include_once "check1.php";
?>
<div class="card mt-3">
  <div class="card-body">
    <form id="hotelform">
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $city = Hotel::getbyId($id, "idCity");
                $name = Hotel::getbyId($id, "name");
                $stars = Hotel::getbyId($id, "stars");
                Template::inputHidden("id", "$id");
                Template::selectedCity("hotelcity", "Cidade do hotel", $city);
                Template::inputText("hotelname", "Nome do hotel", "form-control", 1, $name);
                Template::inputNumber("hotelstars", "Número de estrelas do hotel", "form-control", "0.1", 1, $stars);
            }
            else{
                Template::selectCity("hotelcity", "Cidade do hotel");
                Template::inputText("hotelname", "Nome do hotel", "form-control", 0, "");
                Template::inputNumber("hotelstars", "Número de estrelas do hotel", "form-control", "0.1", 0, "");
            }
        ?>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
</div>
<script>
$(document).ready(function(){ 
    $('#hotelcity').selectpicker('refresh');
    $(function () {
        $('#hotelform').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/hotel.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./");
                }
            });
        });
    }); 
});
</script>
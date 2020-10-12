<?php
    include_once "template.php";
?>
<div class="card mt-3">
  <div class="card-body">
    <form id="login">
        <?php
            Template::inputText("username", "Usuário", "form-control", 0, "");
            Template::inputPass("pass", "Senha", "form-control");
        ?>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
  </div>
</div>
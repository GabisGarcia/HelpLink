<?php
    $this->extend('header');

    $this->section('title');

        echo "Cadastro";

    $this->endSection();

    $this->section('content');
?>

<center>
<body>

<div class="container">
  
<form  action="<?= base_url('UsuarioController/adicionar') ?>" method="post" class="form">
    <p id="heading">Cadastre-se</p>
    <!--nome-->
    <div class="field">
    <img src="https://cdn2.iconfinder.com/data/icons/user-interface-169/32/about-512.png"  height="25" width="25">
      <input autocomplete="off" placeholder="Username" class="input-field" name="NOME" id="NOME" type="text">
    </div>
    <!--email-->
    <div class="field">
    <img src="https://cdn2.iconfinder.com/data/icons/boxicons-regular-vol-1/24/bx-at-512.png" alt="email" height="25" width="25">
      <input autocomplete="off" placeholder="E-mail" class="input-field" name="EMAIL" id="EMAIL" type="text">
    </div>
    <!--telefone-->
    <div class="field">
    <img src="https://cdn1.iconfinder.com/data/icons/modern-universal/32/icon-03-256.png" alt="telefone" height="25" width="25">
      <input autocomplete="off" placeholder="Telefone" class="input-field" name="TELEFONE" id="TELEFONE" type="text">
    </div>
    <!--descricao-->
    <div class="field">
    <img src="https://cdn0.iconfinder.com/data/icons/free-daily-icon-set/512/Task-256.png" alt="desc"  height="25" width="25" >
      <input autocomplete="off" placeholder="Descrição" class="input-field" name="DESCRICAO_USER" id="DESCRICAO_USER" type="text">
    </div>
    <!--senha-->
    <div class="field">
    <img src="https://cdn0.iconfinder.com/data/icons/essentials-4/1710/lock-256.png" alt="senha"height="25" width="25" >
      <input placeholder="Password" class="input-field" name="SENHA" id="SENHA" type="password">
    </div>
  
    <div class="btn">
    <button class="button2">Entrar</button>
    <button class="button3" type="button">Esqueci a senha</button>
    </div>

</form>

  <button class="button1" type="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Já tem uma conta? Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

</div>
<?php
    $this->endSection();
?>



</body>
</html>
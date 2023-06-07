<?php

$session = session();
  if ($session->get('user') != null) {
    $location = 'Location: '.base_url('/');
    header($location);
    exit;
  }


$this->extend('header');

$this->section('title');

$this->endSection();

$this->section('content');

?>

<center>


    <div class="container">
        <form action="<?= base_url('UsuarioController/login') ?>" method="post" class="form">
            <div class="titulo">
                <img src="<?= base_url('') ?>/img/foto_login.png" alt="Cadastre-se">
            </div>
            <!--email-->
            <div class="field">
                <img src="https://cdn2.iconfinder.com/data/icons/boxicons-regular-vol-1/24/bx-at-512.png" alt="email" height="25" width="25">
                <input autocomplete="off" placeholder="E-mail" class="input-field" name="EMAIL" id="EMAIL" type="text">
            </div>

            <!--senha-->
            <div class="field">
                <img src="https://cdn0.iconfinder.com/data/icons/essentials-4/1710/lock-256.png" alt="senha" height="25" width="25">
                <input placeholder="Password" class="input-field" name="SENHA" id="SENHA" type="password">
            </div>

            <div class="btn">
                <button class="button2">Entrar</button>
                <button class="button3" type="button">Esqueci a senha</button>
            </div>
        </form>

        <a href="<?= base_url('cadastro') ?>"><button class="button1" type="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Não tem uma conta?
        Cadastre-se&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>

    </div>
</center>
<?php

$this->endSection();

?>
<?php

$session = session();
if ($session->get('user') !== null) {
  $location = 'Location: ' . base_url('/login');
  header($location);
  exit;
}

$this->extend('header');

$this->section('title');

echo "Cadastro";

$this->endSection();

$this->section('content');
?>



<div class="container">

  <form action="<?= base_url('UsuarioController/adicionar') ?>" method="post" class="form">
    <div class="titulo">
      <img src="<?= base_url('') ?>/img/foto_cadastro.png" alt="Cadastre-se">
    </div>
    <!--nome-->
    <div class="field">
      <img src="https://cdn2.iconfinder.com/data/icons/user-interface-169/32/about-512.png" height="25" width="25">
      <input autocomplete="off" required placeholder="Nome" class="input-field" name="NOME" id="NOME" type="text">
    </div>
    <!--email-->
    <p style="display:none;" class="email-error validate-error">Digite um E-mail valido</p>
    <div class="field">
      <img src="https://cdn2.iconfinder.com/data/icons/boxicons-regular-vol-1/24/bx-at-512.png" alt="email" height="25" width="25">
      <input autocomplete="off" required placeholder="E-mail" class="input-field" name="EMAIL" id="EMAIL" type="email">
    </div>
    <!--telefone-->
    <p style="display:none;" class="phone-error validate-error">Digite um numero de telefone valido</p>
    <div class="field">
      <img src="https://cdn1.iconfinder.com/data/icons/modern-universal/32/icon-03-256.png" alt="telefone" height="25" width="25">
      <input autocomplete="off" maxlength="11" minlength="11" required placeholder="Telefone" class="input-field" name="TELEFONE" id="TELEFONE" type="text">
    </div>
    <!--descricao-->
    <div class="field">
      <img src="https://cdn0.iconfinder.com/data/icons/free-daily-icon-set/512/Task-256.png" alt="desc" height="25" width="25">
      <input autocomplete="off" placeholder="Descrição" class="input-field" name="DESCRICAO_USER" id="DESCRICAO_USER" type="text">
    </div>
    <!--senha-->
    <p style="display:none;" class="password-error validate-error">A senha deve conter no minimo 6 caracteres.</p>
    <div class="field">
      <img src="https://cdn0.iconfinder.com/data/icons/essentials-4/1710/lock-256.png" alt="senha" height="25" width="25">
      <input placeholder="Password" required class="input-field" name="SENHA" id="SENHA" type="password">
    </div>

    <div class="btn">
      <button class="button2 btn-submit" type="button">Entrar</button>
      <button class="button3" type="button">Esqueci a senha</button>
    </div>

  </form>

  <a href="<?= base_url('login') ?>"><button class="button1" type="button">Já tem uma conta? Login</button></a>

</div>


<script src="<?= base_url('') ?>/js/cadastroValidacao.js"></script>


<?php
$this->endSection();
?>
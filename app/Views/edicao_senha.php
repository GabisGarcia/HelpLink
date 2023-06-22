<?php
  $session = session();
  if ($session->get('user') == null) {
    $location = 'Location: '.base_url('/login');
    header($location);
    exit;
  } 

  $user = $session->get('user');

  $idUsuario = $user->ID_CONTA;

  $usuarioModel = new \App\Models\UsuarioModel();
  $usuario = $usuarioModel->find($idUsuario);
  
  $emailUsuario = $usuario->EMAIL;
?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="icon" href="<?= base_url() ?>/favicon.ico" type="image/x-icon">
      <!-- Font Awesome icons (free version)-->
      <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
      <!-- Google fonts-->
      <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
      <!-- CSS-->
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/home.css">
      <link rel="stylesheet" href="<?= base_url() ?>/css/edicao_senha.css">
  </head>

  <body class="bodyForm">
    <header id="page-top">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <!-- Voltar para a welcome page-->
            <a href="<?= base_url() ?>/configuracoesperfil"><button class="botao-voltar"> Voltar </button></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            
        </nav>
    </header>
        <center>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="<?= base_url() ?>/img/logo_white.png" alt="..." height="320px" weight="200px" /></span>
            <form class="form" action="<?= base_url('UsuarioController/checarSenha') ?>" method="post">
                <p class="title">Mudar a senha </p>
                <p class="message">Digite sua senha atual: </p>

                <label>
                    <input required="" name="senhaAtual" id="senhaAtual" type="password" class="input">
                    <span></span>
                    <input type="hidden" name="ID_CONTA" value="<?= $user->ID_CONTA ?>">
                    <input type="hidden" name="emailUsuario" id="emailUsuario" value="<?= $emailUsuario ?>">
                </label>

                <button class="submit">Enviar</button>
                <p class="signin">Esqueceu sua senha? <a href="#">Recupere</a> </p>
            </form>
        </center>
</body>
<?php
  //$session = session();
 // if ($session->get('user') == null) {
  //  $location = 'Location: '.base_url('/login');
  //  header($location);
  //  exit;
 // }

 // $user = $session->get('user');

 // $idUsuario = $user->ID_CONTA;

  //$usuarioModel = new \App\Models\UsuarioModel();
  //$usuario = $usuarioModel->find($idUsuario);
  
  //$emailUsuario = $usuario->EMAIL;
?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="icon" href="<?= base_url() ?>/favicon.ico" type="image/x-icon">
      <!-- Font Awesome icons (free version)-->
      <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
      <!-- Google fonts-->
      <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
      <!-- CSS-->
      <link rel="stylesheet" href="<?= base_url() ?>/css/edicao_senha.css">
      <title>HelpLink</title>
  </head>
  <body class="bodyForm">
    <header id="page-top">

    </header>
        <center>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
            src="<?= base_url() ?>/img/logo_white.png" alt="..." height="320px" weight="200px" /></span>

            <form class="form" action="<?= base_url('UsuarioController/checarEmail') ?>" method="post">
                <p class="title">Esqueci a senha </p>
                <p class="message">Digite seu e-mail: </p>

                <label>
                    <input required="" name="emailInserido" id="emailInserido" type="text" class="input">
                    <span>E-mail</span>
                </label>

                <button class="submit">Enviar código</button>
            </form>
        </center>

        <script src="<?= base_url('') ?>/js/comparador.js"></script>

</body>
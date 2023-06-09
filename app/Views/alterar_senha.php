<?php
  
  $ID_CONTA;
  $emailUsuario;
  $barra_azul;

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
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/edicao_senha.css">

      <?php
        if($barra_azul){
        ?>  
      <link rel="stylesheet" href="<?= base_url() ?>/css/home.css">
      <?php    
        }
        ?>

      <title>Alterar senha</title>
  </head>

  <body class="bodyForm">
        
        <?php
        if($barra_azul){
        ?>  
            <header id="page-top">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
                    <!-- Voltar para a welcome page-->
                    <a href="<?= base_url() ?>/configuracoesperfil"><button class="botao-voltar"> Voltar </button></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    
                </nav>
            </header>
        <?php    
        }
        ?>
        <center>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                src="<?= base_url() ?>/img/logo_white.png" alt="..." height="320px" weight="200px" /></span>

            <form class="form" method="post">
                <p class="title">Mudar a senha </p>
                <p class="message">Digite sua nova senha: </p>

                <label>
                    <input required="" name="senhaInserida" id="senhaInserida" type="password" class="input">
                    <span>Nova senha</span>
                </label>

                <label>
                    <input required="" name="novaSenha" id="novaSenha" type="password" class="input">
                    <span>Confirme a senha</span>
                    <input type="hidden" name="emailUsuario" id="emailUsuario" value="<?= $emailUsuario ?>">
                </label>

                <button onclick = "comparador()" class="submit" type="button">Enviar</button>
            </form>
        </center>

        <script src="<?= base_url('') ?>/js/comparador.js"></script>

</body>


<?php
  $session = session();
  if ($session->get('user') == null) {
    $location = 'Location: '.base_url('/login');
    header($location);
    exit;
  } 

  $user = $session->get('user');

  $idUsuario = $user->ID_CONTA;
  
?>
<!DOCTYPE html>
<html lang="pt-br">

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
      <link rel="stylesheet" href="<?= base_url() ?>/css/apagar_perfil.css">
  </head>

<body>
    <center>
    <div class="card">
        <div class="header">
            <div class="image">
                <svg aria-hidden="true" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none">
                        <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" stroke-linejoin="round" stroke-linecap="round"></path>
                </svg>
            </div>

            <div class="content">
                <span class="title">APAGAR CONTA</span>
                <p class="message">Tem certeza de que deseja desativar sua conta? Todos os seus dados serão removidos permanentemente. Essa ação não pode ser desfeita.</p>
            </div>

            <form action="<?= base_url('UsuarioController/deletarUsuario') ?>" method="post">
                <div class="actions">
                    <input type="hidden" name="ID_CONTA" value="<?= $user->ID_CONTA ?>">
                    <button class="desactivate">Apagar</button></a>     
                </div>
            </form>

            <a href="<?= base_url() ?>/configuracoesperfil"><button class="cancel" type="button">Cancelar</button></a>
        </div>
    </div>
    </center>
</body>
</html>
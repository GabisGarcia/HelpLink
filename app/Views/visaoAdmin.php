<?php

$session = session();
if ($session->get('user') == null) {
  $location = 'Location: ' . base_url('/login');
  header($location);
  exit;
}

function mostraTags($idPost)
{
  $postTagModel = new \App\Models\PostTagModel();
  $tags = $postTagModel->listarTags($idPost);
  foreach ($tags as $tag) {
    echo '<span class="badge bg-primary me-2 mb-2">' . $tag->NOME . '</span>';
  }

}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HelpLink</title>
  <link rel="icon" href="<?= base_url() ?>/favicon.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/home.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/welcome.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/visaoAdm.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <center>
      <a class="navbar-brand js-scroll-trigger" href="">
        <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
            src="<?= base_url() ?>/img/logo_white.png" alt="..." height="80px" weight="50px" /></span>
      </a>
    </center>

    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link js-scroll-trigger"
          href="<?= base_url('UsuarioController/logout') ?>">Sair</a></li>
    </ul>
  </nav>

  <section class="publi-container" id="index">
    <div class="container-fluid p-0">

      <?php
      $postsModel = new \App\Models\PostModel();
      $posts = $postsModel->listarAdminView();

      foreach ($posts as $post) {
        ?>
        <div class="pub-card">
          <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="flex-grow-1">
              <h3 class="mb-0">
                <?= $post->TITULO ?>
              </h3>
              <?= ($post->CAMINHO_IMAGEM != null || "") ? ('<p>Descrição:<strong>' . $post->DESCRICAO . '</strong></p>') : "" ?>
              <p>Doação: <strong>
                  <?= $post->DOACAO ? $post->DOACAO : "O usuário não pediu uma doação." ?>
                </strong></p>
              <p>Valor: R$<strong>
                  <?= $post->VALOR ?>
                </strong></p>
            </div>
            <div class="flex-shrink-0"><span class="text-primary">
                <?= date('d/m/Y H:i:s', strtotime($post->POST_DATE)) ?>
              </span></div>
          </div>
          <!-- Imagem da pub-->
          <center>
            <div class="img-pub" id="pub">
              <?= ($post->CAMINHO_IMAGEM != null || "") ? ('<img src="http://localhost/HelpLink/imgs/uploads/' . $post->CAMINHO_IMAGEM . '" width="300"
                      height="300">') : ('<h3>' . $post->DESCRICAO . '</h3>') ?>
            </div>

            <!-- Aprovação -->
            <form action="<?= base_url('PostController/aprovar') ?>" method="post">
              <input type="hidden" name="ID_POST" value="<?= $post->ID_POST ?>">
              <button type="submit" class="game-button-green">aprovar post</button>
            </form>
            <br>

            <form action="<?= base_url('PostController/negarRedirecionar') ?>" method="post">
              <input type="hidden" name="ID_POST" value="<?= $post->ID_POST ?>">
              <button class="game-button" action="<?= base_url() ?>">Recusar post</button>
            </form>


          </center>
          <hr>
        </div>


        <?php
      }
      ?>

    </div>

  </section>

</body>
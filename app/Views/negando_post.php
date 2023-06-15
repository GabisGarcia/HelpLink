<?php
  $session = session();
  if ($session->get('user') == null) {
    $location = 'Location: '.base_url('/login');
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

  $postModel = new \App\Models\PostModel();
  $post = $postModel->find($idPost);

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
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?= base_url() ?>/img/logo_white.png" alt="..." height="80px" weight="50px" /></span>
            </a>
        </center>

        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('PostController/listarAdminView') ?>">Voltar</a></li>
        </ul>
    </nav>

    <section class="publi-container" id="index">
        <div class="container-fluid p-0">

                <div class="pub-card">
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?= $post->TITULO ?></h3>
                            <?= mostraTags($post->ID_POST) ?>
                            <p><?= $post->DESCRICAO ?></p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?= date('d/m/Y H:i:s', strtotime($post->POST_DATE)) ?></span></div>
                    </div>
                    <!-- Imagem da pub-->
                    <center>
                        <div class="img-pub" id="pubb">
                            <img src="https://tendencee.com.br/wp-content/uploads/2019/12/Se-voce-esta-se-sentindo-mal-essas-30-fotos-de-lontras-fazem-voce-sorrir-qVMQAvJ1za.jpg" width="300" height="300"><br><br><br>
                        </div>
                        <label for="myInput" class="label">
                            <span class="label-title">Motivo de recusa</span>
                            <textarea id="myInput" class="textarea" name="text" placeholder="" type="text"></textarea>
                        </label>
                        <br>
                    </center>

                    <a href="<?= base_url() ?>"><button class="botao-enviar"> Enviar email </button></a>
                </div>

        </div>
    </section>
</body>
</html>
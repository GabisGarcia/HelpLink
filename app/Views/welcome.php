<?php
$session = session();
if ($session->get('user') == null) {
  $location = 'Location: ' . base_url('/login');
  header($location);
  exit;
}

$user = $session->get('user');

$tipoUsuario = $user->ADM;

if ($tipoUsuario == 1) {
  $location = 'Location: ' . base_url('/PostController/listarAdminView');
  header($location);
  exit;
}

function verificaSeJaCurtiuPost($curtidas, $idPost)
{
  foreach ($curtidas as $curtida) {
    if ($curtida->ID_POST == $idPost) {
      return true;
    }
  }
  return false;
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
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous"
    defer></script>
  <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet"
    crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/home.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/welcome.css">
</head>

<style>
    .menu {
    position: fixed;
    display: block;
    right: 0;

  }

  .menu-toggle {
    display: flex;
    flex-direction: column;
    cursor: pointer;
    top: 20px;
    right: 20px;
  }

  .dropdown {
    position: relative;
    display: inline-block;
    cursor: pointer;
    width: 50px;
  }

  .dots {
    width: 7px;
    height: 7px;
    background-color: #53afaf;
    border-radius: 50%;
    margin-bottom: 4px;
    transform: rotate(90deg);

    right: 0;
  }

  .teste321{
    float: right;
  }

  .dots::after {
    content: "";
    position: absolute;
    width: 7px;
    height: 7px;
    background-color: #53afaf;
    border-radius: 50%;
    top: -12px;
    z-index: -1;
  }

  .testando123{
    display: inline-block;
  }

  .options {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    padding: 12px 16px;
    z-index: 1;
  }

  .dropdown:hover .options {
    display: block;
  }

  .options ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }

  .options ul li {
    padding: 8px 0;
    cursor: pointer;
    color: black;
  }

  .options ul li:hover {
    background-color: #ddd;
    padding-left: 5px;

  }
</style>

<body id="page-top">

  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <!-- Tema escuro -->
    <label class="ui-switch" id="toggle">
      <input type="checkbox" class="checkbox-theme">
      <div class="slider">
        <div class="circle"></div>
      </div>
    </label>

    <a class="navbar-brand js-scroll-trigger" href="<?= base_url() ?>/">
      <span class="d-block d-lg-none">Meu perfil</span>
      <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
          src="<?= base_url() ?>/img/logo_white.png" alt="..." height="80px" weight="50px" /></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
      aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
        class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav">

        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url() ?>/meuperfil">Meu perfil</a>
        </li>   
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('/EULA') ?>">EULA</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger"
            href="<?= base_url('UsuarioController/logout') ?>">Sair</a></li>

      </ul>
    </div>
  </nav>

  <div class="container-fluid">
  </div>



  <!-- Page Inicial-->
  <div class="container-fluid p-0">
    <!-- About-->
    <section class="resume-section" id="index">
      <div class="resume-section-content">
        <h1 class="mb-0">
          <span class="text-primary">Página</span>
          <span class="text-primary2"> Inicial</span>
        </h1>
        <br>
        <center>
          <div>
            <img src="<?= base_url() ?>/img/banner.jpg" height="500px" weight="200px" id="img-central">
          </div>
        </center>
        <hr>

        <div class="publi-container">

          <?php
          $postsModel = new \App\Models\PostModel();
          $posts = $postsModel->paginate(5);
          $pager = $postsModel->pager;
          $usuario = $session->get('user');
          $curtidas = $postsModel->listarCurtidas($usuario->ID_CONTA);
          $usuarioModel = new \App\Models\UsuarioModel();


          foreach ($posts as $post) {
            if ($post->APROVADO) {
              $donoPost = $usuarioModel->find($post->ID_CONTA);


              ?>
              <div class="pub-card">
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                  <div class="flex-grow-1">
                    <h3 class="mb-0">
                      <?= $post->TITULO ?>
                    </h3>
                    <?= mostraTags($post->ID_POST) ?>

                    <?= ($post->CAMINHO_IMAGEM != null || "") ? ('<p>' . $post->DESCRICAO . '</p>') : "" ?>
                  </div>
                  <div class="flex-shrink-0">
                    <p class="text-secondary">Criado por
                      <?= $donoPost->NOME ?>
                    </p><span class="text-primary">
                      <?= date('d/m/Y H:i:s', strtotime($post->POST_DATE)) ?>
                    </span>
                  </div>
                </div>
                <!-- Imagem da pub-->
                <center>
                  <div class="img-pub" id="pub">
                    <?= ($post->CAMINHO_IMAGEM != null || "") ? ('<img src="http://localhost/HelpLink/imgs/uploads/' . $post->CAMINHO_IMAGEM . '" width="300"
                      height="300">') : ('<h3>' . $post->DESCRICAO . '</h3>') ?>
                  </div>
                </center>
                <br>
                <div class="testando123">
                <div class="social-icons">
                  <i class="fa-brands fa-whatsapp" height="40px" weight="40px"></i>
                  <label class="lead mb-5">
                    <?= $usuario->TELEFONE ?>
                  </label>
                </div>
                </div>
                <!-- Botao de like-->
                <div class="testando123 teste321">
                <a class="container"
                  href="<?= base_url() ?>/PostController/<?= verificaSeJaCurtiuPost($curtidas, $post->ID_POST) ? 'dislike' : 'like' ?>/<?= $post->ID_POST ?>/<?= $usuario->ID_CONTA ?>">
                  <input <?= verificaSeJaCurtiuPost($curtidas, $post->ID_POST) ? 'checked' : '' ?> type="checkbox">
                  <svg id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path
                      d="M16.4,4C14.6,4,13,4.9,12,6.3C11,4.9,9.4,4,7.6,4C4.5,4,2,6.5,2,9.6C2,14,12,22,12,22s10-8,10-12.4C22,6.5,19.5,4,16.4,4z">
                    </path>
                  </svg>
                  <?= $post->REPUTACAO ?>
                </a>

                <hr>
              </div>


              <?php
            }
          }
          ?>

        </div>

    </section>
    <div class="links">
      <?= $pager->links('default', 'bootstrap_pagination') ?>
    </div>
  </div>
  </div>
  <div class="container225">
    <a href="<?= base_url() ?>/formpost">
      <button type="button" class="buttonCompartilha">
        <img src="<?= base_url() ?>/img/remove.png" height="28px" weight="28px">
      </button>
    </a>

  </div>

  <script src="<?= base_url() ?>/js/tema.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/e8b01ec522.js" crossorigin="anonymous"></script>
</body>

</html>
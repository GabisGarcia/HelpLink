<?php
$session = session();
/* if (!isset($session->get('user')->NOME) || $session->get('user')->NOME == (null || "")) {
  header(base_url() . "/login");
} */
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
  <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/home.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/welcome.css">
</head>

<body id="page-top">

  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="<?= base_url() ?>/">
      <span class="d-block d-lg-none">Meu perfil</span>
      <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?= base_url() ?>/img/logo_white.png" alt="..." height="80px" weight="50px" /></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav">

        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url() ?>/meuperfil">Meu
            perfil</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('cadastro') ?>">Cadastrar</a>
        </li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="">Configurações</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#sair">Sair</a></li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid">
    <br>
    <form class="d-flex" role="search">
      <div class="group">
        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
          <g>
            <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
            </path>
          </g>
        </svg>
        <input placeholder="Pesquisar" type="search" class="input">
      </div>
    </form>
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
          $posts = $postsModel->listarInicial();

          foreach ($posts as $post) {
          ?>
            <div class="pub-card">
              <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                  <h3 class="mb-0"><?= $post->TITULO ?></h3>
                  <div class="subheading mb-3" id="assunto">TAG</div>
                  <p><?= $post->DESCRICAO ?></p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary">00/00/0000</span></div>
              </div>
              <!-- Imagem da pub-->
              <center>
                <div class="img-pub" id="pubb">
                  <img src="https://tendencee.com.br/wp-content/uploads/2019/12/Se-voce-esta-se-sentindo-mal-essas-30-fotos-de-lontras-fazem-voce-sorrir-qVMQAvJ1za.jpg" width="300" height="300"><br><br><br>
                </div>
              </center>
              <!-- Botao de like-->
              <label class="container">
                <!-- Adicionar um onclick que quando ativar a checkbox o número de likes aumenta e tb aumenta no banco de dados -->
                <input type="checkbox">
                <svg id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <path d="M16.4,4C14.6,4,13,4.9,12,6.3C11,4.9,9.4,4,7.6,4C4.5,4,2,6.5,2,9.6C2,14,12,22,12,22s10-8,10-12.4C22,6.5,19.5,4,16.4,4z"></path>
                </svg>
                <?= $post->REPUTACAO ?>
              </label>
              <hr>
              <!-- BOTAO ANTIGO
        <div id="botao">
        <button>
          <svg class="empty" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22"><path fill="none" d="M0 0H24V24H0z"></path><path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2zm-3.566 15.604c.881-.556 1.676-1.109 2.42-1.701C18.335 14.533 20 11.943 20 9c0-2.36-1.537-4-3.5-4-1.076 0-2.24.57-3.086 1.414L12 7.828l-1.414-1.414C9.74 5.57 8.576 5 7.5 5 5.56 5 4 6.656 4 9c0 2.944 1.666 5.533 4.645 7.903.745.592 1.54 1.145 2.421 1.7.299.189.595.37.934.572.339-.202.635-.383.934-.571z"></path></svg>
          <svg class="filled" height="32" width="32" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0H24V24H0z" fill="none"></path><path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2z"></path></svg>
          0
        </button>
      </div> -->
            </div>


          <?php
          }
          ?>

        </div>

    </section>


    <!-- Configurações -->
    <div class="container-fluid p-0">
      <section class="resume-section" id="config">
        <div class="resume-section-content">
          <h1 class="mb-0">
            Minhas
            <span class="text-primary">Configurações </span>
          </h1>
          <div class="subheading mb-5">
            Altere aqui suas informações
          </div>
          <p class="lead mb-5"></p>
          <div class="social-icons">
            <br><br><br><br><br>
            <hr>
          </div>
        </div>
      </section>
    </div>
  </div>
  </div>
  <div class="container225">
    <button type="button" class="buttonCompartilha">
      <img src="<?= base_url() ?>/img/remove.png" height="28px" weight="28px">
    </button>
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  <script src="https://kit.fontawesome.com/e8b01ec522.js" crossorigin="anonymous"></script>
</body>

</html>
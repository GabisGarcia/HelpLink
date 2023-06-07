<?php

$session = session();
if ($session->get('user') == null) {
  header('Location: http://localhost/HelpLink/public/login');
  exit;
} else {
    $usuario = $session->get('user');
}

$this->extend('header');

$this->section('title');

$this->endSection();

$this->section('content');
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Meu perfil</title>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/home.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/configuracoes_perfil.css">

</head>

<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
         <!-- Tema escuro -->
            <label class="ui-switch" id="toggle">
                <input type="checkbox">
                <div class="slider">
                    <div class="circle"></div>
                </div>
            </label>
        <!-- Voltar para a welcome page-->
        <a href="<?= base_url() ?>/"><button class="botao-voltar"> Voltar </button></a>

        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Meu perfil</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" id="imagemPerfil" src="https://www.zooplus.pt/magazine/wp-content/uploads/2021/03/kitten-sitzt-boden-768x512-1.jpeg" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#sobremim">Sobre mim</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#publicacoes">Minhas publicações</a>
                </li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url() ?>/configuracoesperfil">Configurações</a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="sobremim">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    Meu
                    <span class="text-primary">Perfil</span>
                </h1>
                <div class="subheading mb-5">
                    Descrição dada pelo usuário
                </div>
                <p class="lead mb-5">Sobre o perfil</p>
                <div class="social-icons">
                    <i class="fa-brands fa-whatsapp" height="40px" weight="40px"></i>
                </div>
            </div>
        </section>
        <hr class="m-0">
        <!-- Experience-->
    <section class="resume-section" id="publicacoes">
        <div class="publi-container">
            <h2 class="mb-5">Minhas publicações</h2>
        <?php
          $postsModel = new \App\Models\PostModel();
          $posts = $postsModel->listarPostUsuario($usuario->ID_CONTA); // listarPostUsuario

          foreach ($posts as $post) {
        ?>

            <div class="resume-section-content">
                
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0"><?= $post->TITULO ?></h3>
                        <div class="subheading mb-3" id="assunto">Assunto</div>
                        <p><?= $post->DESCRICAO ?></p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary"><?= $post->POST_DATE ?></span></div>
                </div>
                <center>
                    <div class="pubb" id="pubb">
                        <img src="https://tendencee.com.br/wp-content/uploads/2019/12/Se-voce-esta-se-sentindo-mal-essas-30-fotos-de-lontras-fazem-voce-sorrir-qVMQAvJ1za.jpg" width="300" height="300"><br><br><br>
                    </div>
                </center>
                <br>
                <div id="botao">
                    <label class="container">
                        <!-- Adicionar um onclick que quando ativar a checkbox o número de likes aumenta e tb aumenta no banco de dados -->
                        <input type="checkbox">
                        <svg id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="M16.4,4C14.6,4,13,4.9,12,6.3C11,4.9,9.4,4,7.6,4C4.5,4,2,6.5,2,9.6C2,14,12,22,12,22s10-8,10-12.4C22,6.5,19.5,4,16.4,4z"></path>
                        </svg>
                        <?= $post->REPUTACAO ?>
                        </label>
                </div>
                <hr> 
            </div>
        <?php
            }
        ?>
        </div>  
    </section>

        <div class="container225">
            <button type="button" class="buttonCompartilha">
                <a href="<?= base_url() ?>/formpost">       
                    <img src="<?= base_url() ?>/img/remove.png" height="28px" weight="28px">   
                </a>
            </button>
        </div>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/e8b01ec522.js" crossorigin="anonymous"></script>
</body>
    <script src="<?= base_url() ?>/js/tema.js"></script>

</html>
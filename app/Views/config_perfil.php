<?php

$session = session();
  if ($session->get('user') == null) {
    $location = 'Location: '.base_url('/login');
    header($location);
    exit;
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
        <!-- Voltar para a welcome page-->
        <a href="<?= base_url() ?>/meuperfil"><button class="botao-voltar"> Voltar </button></a>

        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Meu perfil</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="https://www.zooplus.pt/magazine/wp-content/uploads/2021/03/kitten-sitzt-boden-768x512-1.jpeg" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?=base_url()?>/meuperfil">Sobre mim</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?=base_url()?>/meuperfil/#publicacoes">Minhas publicações</a>
                </li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="">Configurações</a></li>
            </ul>
        </div>
    </nav>

    <div class="main">
        <div class="titulo">
            <p class="heading">Minhas Configurações</p>
        </div>
        <div class="cabine">
            <div class="opcao">
               <a href="<?= base_url() ?>/editarperfil"><p class="name"> Editar perfil</p></a>
            </div>
        </div>
        <div class="cabine">
            <div class="opcao">
                <a href="<?= base_url() ?>/editarsenha"><p class="name"> Mudar minha senha </p></a>
            </div>
        </div>
        <div class="cabine">
            <div class="opcao">
                <a href="<?= base_url() ?>/apagarperfil"><p class="name">Apagar perfil</p></a>
            </div>
        </div>
        </div>
    	
  <script src="<?= base_url() ?>/js/tema.js"></script>
</body>
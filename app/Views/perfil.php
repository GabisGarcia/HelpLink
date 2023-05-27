<?php
$this->extend('header');

$this->section('title');

echo "Meu perfil";

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
</head>

<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <!-- Voltar para a welcome page-->
        <a href="<?= base_url() ?>/"><button class="botao-voltar"> Voltar </button></a>

        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Meu perfil</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="https://www.zooplus.pt/magazine/wp-content/uploads/2021/03/kitten-sitzt-boden-768x512-1.jpeg" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Sobre mim</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Minhas publicações</a>
                </li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="">Configurações</a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
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
                    <br><br><br><br><br>
                    <hr>
                    <i class="fa-brands fa-whatsapp" height="40px" weight="40px"></i>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Experience-->
        <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h2 class="mb-5">Minhas publicações</h2>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">Pub 1</h3>
                        <div class="subheading mb-3" id="assunto">Assunto</div>
                        <p>Descrição</p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">00/00/0000</span></div>
                </div>
                <center>
                    <div class="pubb" id="pubb">
                        <img src="https://tendencee.com.br/wp-content/uploads/2019/12/Se-voce-esta-se-sentindo-mal-essas-30-fotos-de-lontras-fazem-voce-sorrir-qVMQAvJ1za.jpg" width="300" height="300"><br><br><br>
                    </div>
                </center>
                <br>
                <hr>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">Pub</h3>
                        <div class="subheading mb-3" id=assunto>Assunto</div>
                        <p>Descrição 2</p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">00/00/0000</span></div>
                    </center>
                    <hr><br>
                </div>
                <center>
                    <div class="img_pub">
                        <img src="https://wl-incrivel.cf.tsp.li/resize/728x/jpg/87c/869/c08180588db4c37af55a6ab3d8.jpg" width="300" height="300"><br><br><br>
                </center>
            </div>
            <div id="botao">
                <button>
                    <svg class="empty" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22">
                        <path fill="none" d="M0 0H24V24H0z"></path>
                        <path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2zm-3.566 15.604c.881-.556 1.676-1.109 2.42-1.701C18.335 14.533 20 11.943 20 9c0-2.36-1.537-4-3.5-4-1.076 0-2.24.57-3.086 1.414L12 7.828l-1.414-1.414C9.74 5.57 8.576 5 7.5 5 5.56 5 4 6.656 4 9c0 2.944 1.666 5.533 4.645 7.903.745.592 1.54 1.145 2.421 1.7.299.189.595.37.934.572.339-.202.635-.383.934-.571z">
                        </path>
                    </svg>
                    <svg class="filled" height="32" width="32" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0H24V24H0z" fill="none"></path>
                        <path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2z">
                        </path>
                    </svg>
                    Like
                </button>
            </div>
            <br><BR>
            <hr>
            <button align-item="right">
                <svg class="empty" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22">
                    <path fill="none" d="M0 0H24V24H0z"></path>
                    <path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2zm-3.566 15.604c.881-.556 1.676-1.109 2.42-1.701C18.335 14.533 20 11.943 20 9c0-2.36-1.537-4-3.5-4-1.076 0-2.24.57-3.086 1.414L12 7.828l-1.414-1.414C9.74 5.57 8.576 5 7.5 5 5.56 5 4 6.656 4 9c0 2.944 1.666 5.533 4.645 7.903.745.592 1.54 1.145 2.421 1.7.299.189.595.37.934.572.339-.202.635-.383.934-.571z">
                    </path>
                </svg>
                <svg class="filled" height="32" width="32" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0H24V24H0z" fill="none"></path>
                    <path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2z">
                    </path>
                </svg>
                Like
            </button><br>
            <hr>
    </div>
    </section>

    <hr>
    <div class="container225">
        <button type="button" class="buttonCompartilha">
            <img src="<?= base_url() ?>/img/remove.png" height="28px" weight="28px">
        </button>
    </div>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/e8b01ec522.js" crossorigin="anonymous"></script>
</body>

</html>


<?= $this->renderSection('content'); ?>
</body>

</html>
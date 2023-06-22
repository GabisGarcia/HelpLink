<?php
$session = session();
if ($session->get('user') == null) {
  $location = 'Location: ' . base_url('/login');
  header($location);
  exit;
}

$this->extend('header');

$this->section('title');

echo "Post";

$this->endSection();

$this->section('content');
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
  <!-- CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/home.css">
</head>

<style>
  .bodyForm {
    font-family: Arial, sans-serif;
    background-color: #c2fcfc;
  }

  form {
    background-color: #53afaf;
    border-radius: 10px;
    padding: 1rem;
    width: 700px;
    margin: 1rem auto;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .mensagem {
    width: 300px;
    height: 150px;
    border-radius: 12px;
    max-height: 250px;
    padding: 2rem;
    margin: 1rem;
    outline: none;
    border: none;
    font-size: 1em;
  }

  .labelPost {
    display: flex;
    margin-bottom: 10px;
    border-radius: 20%;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .inputPost {
    width: 100%;
    padding: 8px;
    border-radius: 40px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    width: 180px;
    height: 35px;
    margin-bottom: 0.8px;
  }

  input[type="submit"] {
    background-color: green;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }

  input[type="file"] {
    margin: 1rem;
  }

  .input-containerTeste {
    display: flex;
    margin: 1rem;
  }

  .input-containerTeste input {
    margin: 1rem;
  }

  .inputLabel-container {
    display: flex;
    flex-direction: column;
  }

  .inputLabel-container div {
    display: flex;
  }

  p.validate-error {
    color: red;
    margin: 0;
    padding: 0;
  }

  .checkTeste {
    --checkbox-radius: 6px;
    --checkbox-diameter: 20px;
    --checkbox-checked-bg: linear-gradient(270deg, #4f83bd 0%, #FF61D2 100%);
    --checkbox-unchecked-bg: rgb(200, 200, 200);
    --checkbox-transition: .2s;
    --checkbox-shadow-color1: #c2fcfc;
    --checkbox-shadow-color2: #ff61d264;
    --checkbox-shadow-width: 4px;
    --checkmark-diameter: 16px;
    --checkmark-color: #fff;
    --checkmark-transition: .1s;
    margin-right: 30px;
    margin-left: 10px;

  }

  /* checkbox settings 👆 */

  .checkTeste {
    display: inline-block;
  }

  .checkTeste input {
    display: none;
  }

  .checkboxClass {
    display: flex;
    width: var(--checkbox-diameter);
    height: var(--checkbox-diameter);
    background: var(--checkbox-unchecked-bg);
    border-radius: var(--checkbox-radius);
    justify-content: center;
    align-items: center;
    position: relative;
    overflow: hidden;
    transition: var(--checkbox-transition);
  }

  .checkboxClass::before {
    position: absolute;
    content: '';
    inset: 0;
    background: var(--checkbox-checked-bg);
    opacity: 0;
    transition: var(--checkbox-transition);
  }

  .checkboxClass svg {
    width: var(--checkmark-diameter);
    height: var(--checkmark-diameter);
    color: var(--checkmark-color);
    z-index: 1;
    transform: scale(0);
    transition: .1s;
  }

  .checkTeste input:checked+span::before {
    opacity: 1;
  }

  .checkTeste input:checked+span svg {
    transform: scale(1);
  }

  .checkboxClass:focus {
    box-shadow: 0 0 0 var(--checkbox-shadow-width) var(--checkbox-shadow-color1), 0 0 0 var(--checkbox-shadow-width) var(--checkbox-shadow-color2);
  }

  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  input[type=number] {
    -moz-appearance: textfield;
  }
</style>
</head>

<body class="bodyForm">
  <header id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a href="<?= base_url() ?>/"><button class="botao-voltar"> Voltar </button></a>

      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Meu perfil</span>
        <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
            src="https://www.zooplus.pt/magazine/wp-content/uploads/2021/03/kitten-sitzt-boden-768x512-1.jpeg"
            alt="..." /></span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('/meuperfil') ?>">Sobre mim</a>
          </li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('/meuperfil') ?>">Minhas
              publicações</a>
          </li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger"
              href="<?= base_url('/configuracoesperfil') ?>">Configurações</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <center>


    <form enctype="multipart/form-data" method="post">
      <div class="titulo">
        <img src="<?= base_url('') ?>/img/foto_post.png" height="170px" width="350px">
      </div>
      <div class="input-containerTeste">
        <div class="inputLabel-container">
          <p style="display:none;" class="validate-error title-validation"></p>
          <div>
            <label class="labelPost" for="TITULO">Título:</label>
            <input class="inputPost" type="text" maxlength="55" id="TITULO" name="TITULO" required>
          </div>
        </div>
        <div class="inputLabel-container">
          <p style="display:none;" class="validate-error contact-validation"></p>
          <div>
            <label class="labelPost" for="CONTATO">Contato:</label>
            <input class="inputPost" type="text" maxlength="255" id="CONTATO" name="CONTATO" required>
          </div>
        </div>
      </div>
      <div class="input-containerTeste">
        <div class="inputLabel-container">
          <p style="display:none;" class="validate-error value-validation"></p>
          <div>
            <label class="labelPost" for="VALOR">Valor:</label>
            <input class="inputPost" type="number" id="VALOR" name="VALOR" required>
          </div>
        </div>
        <div class="inputLabel-container">
          <p style="display:none;" class="validate-error donation-validation"></p>
          <div>
            <label class="labelPost" for="DOCAO">Doação:</label>
            <input class="inputPost" type="text" maxlength="255" id="DOACAO" name="DOACAO" required>
          </div>
        </div>
      </div>
      <br>
      <div class="input-containerTeste" id="TAG" name="TAG">
        <?php

        $tagModel = new \App\Models\TagsModel();

        $tags = $tagModel->getTags();

        foreach ($tags as $tag) {
          ?>
          <?= $tag->NOME ?>
          <label class="checkTeste">
            <input checked="" type="checkbox" name="TAGS<?= $tag->ID_TAG ?>" id="TAGS" value="<?= $tag->ID_TAG ?>">
            <span class="checkboxClass" tabindex="0">
              <svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 24 24" y="0" x="0"
                height="512" width="512" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <g>
                  <path data-original="currentColor" fill="currentColor"
                    d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z">
                  </path>
                </g>
              </svg>
            </span>
          </label>
          <?php
        }

        ?>
      </div>
      <br>
      <p style="display:none;" class="validate-error description-validation"></p>
      <label class="labelPost" for="DESCRICAO">Descrição:</label>
      <textarea name="DESCRICAO" maxlength="5000" class="mensagem" id="DESCRICAO" required></textarea>

      <input type="file" name="IMAGEM" id="IMAGEM" size="20">


      <button class="botao-voltar button-submit" type="button">Enviar</button>
    </form>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header"> <strong class="me-auto">Criação de Postagem</strong>
          <small>Agora</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          <div class="alert alert-req alert-success" role="alert">
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
      integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>/js/pubValidacao.js"></script>
</body>
</html>
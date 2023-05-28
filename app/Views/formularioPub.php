<?php
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
    background-color: #fea1a1;
    border-radius: 10px;
    padding: 20px;
    width: 700px;
    height: 600;
    margin: 0 auto;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

   #mensagem {
    width: 300px;
    height: 150px;
    border-radius: 40px;
    max-height: 250px;
  }
  
  .labelPost {
    display: flex;
    margin-bottom: 10px;
    border-radius: 20%;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .inputPost{
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
</style>
</head>
<body class="bodyForm">
  <header id="page-top">

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
  </header>
<center>

  <br><br><br>

<form>
  <h4>Faça aqui seu Post:</h4>
  <label class="labelPost" for="TITULO">Título:</label>
  <input class="inputPost" type="text" id="TITULO" name="TITULO" required>
  <label class="labelPost" for="CONTATO">Contato:</label>
  <input class="inputPost" type="text" id="CONTATO" name="CONTATO" required>
  <label class="labelPost" for="DESCRICAO">Descrição:</label>
  <textarea id="mensagem" name="DESCRICAO" required></textarea>
  <br>
  <input type="submit" value="Enviar">
</form>

</body>
</html>







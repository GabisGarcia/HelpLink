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
  .input-containerTeste{
    display: flex;
  }
  .input-containerTeste input{
    margin-right:15px;
    margin: 25px;
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
  <div class="input-containerTeste">
    <label class="labelPost" for="TITULO">Título:</label>
    <input class="inputPost" type="text" id="TITULO" name="TITULO" required>
    <label class="labelPost" for="CONTATO">Contato:</label>
    <input class="inputPost" type="text" id="CONTATO" name="CONTATO" required>
  </div>
  <div class="input-containerTeste">
    <label class="labelPost" for="CONTATO">Valor:</label>
    <input class="inputPost" type="text" id="VALOR" name="VALOR" required>
    <label class="labelPost" for="CONTATO">Doação:</label>
    <input class="inputPost" type="text" id="DOACAO" name="DOACAO" required>
  </div>
  <br>
  <div class="input-containerTeste">
    Humanitário  
    <label class="checkTeste">
      <input checked="" type="checkbox">
        <span class="checkboxClass" tabindex="0">
        <svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 24 24" y="0" x="0" height="512" width="512" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path data-original="currentColor" fill="currentColor" d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"></path></g></svg>
        </span>
   </label>
   Gatos
   <label class="checkTeste">
      <input checked="" type="checkbox">
        <span class="checkboxClass" tabindex="0">
        <svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 24 24" y="0" x="0" height="512" width="512" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path data-original="currentColor" fill="currentColor" d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"></path></g></svg>
        </span>
   </label>
   Animal
   <label class="checkTeste">
      <input checked="" type="checkbox">
        <span class="checkboxClass" tabindex="0">
        <svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 24 24" y="0" x="0" height="512" width="512" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path data-original="currentColor" fill="currentColor" d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"></path></g></svg>
        </span>
   </label>
   Cavalo
   <label class="checkTeste">
      <input checked="" type="checkbox">
        <span class="checkboxClass" tabindex="0">
        <svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 24 24" y="0" x="0" height="512" width="512" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path data-original="currentColor" fill="currentColor" d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"></path></g></svg>
        </span>
   </label>
  </div> 
  <br> <br> 
  <label class="labelPost" for="DESCRICAO">Descrição:</label>
  <textarea id="mensagem" name="DESCRICAO" required></textarea>
  <br>
  <input type="submit" value="Enviar">
</form>

</body>
</html>







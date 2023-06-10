<?php
  $session = session();
  if ($session->get('user') == null) {
    $location = 'Location: '.base_url('/login');
    header($location);
    exit;
  }

?>
<!DOCTYPE html>
<html>
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
      <link rel="stylesheet" href="<?= base_url() ?>/css/formulario.css">

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

  .btn-salvar{
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
    margin: 15px;
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



    <form action="<?= base_url('UsuarioController/alterar') ?>" method="post" class="form">
      <div class="titulo">
        <img src="<?= base_url('') ?>/img/foto_cadastro.png">
      </div>
      <!--nome-->
      <div class="field">
        <img src="https://cdn2.iconfinder.com/data/icons/user-interface-169/32/about-512.png" height="25" width="25">
        <input class="input-field" name="NOME" id="NOME" type="text" value="Nome - Lele">
      </div>
      <!--email-->
      <div class="field">
        <img src="https://cdn2.iconfinder.com/data/icons/boxicons-regular-vol-1/24/bx-at-512.png" alt="email" height="25" width="25">
        <input class="input-field" name="EMAIL" id="EMAIL" type="text" value="Email - lele@linda">
      </div>
      <!--telefone-->
      <div class="field">
        <img src="https://cdn1.iconfinder.com/data/icons/modern-universal/32/icon-03-256.png" alt="telefone" height="25" width="25">
        <input class="input-field" name="TELEFONE" id="TELEFONE" type="text" value="1658146416">
      </div>
      <!--descricao-->
      <div class="field">
        <img src="https://cdn0.iconfinder.com/data/icons/free-daily-icon-set/512/Task-256.png" alt="desc" height="25" width="25">
        <input type="text" placeholder="Descrição" class="input-field" name="DESCRICAO_USER" id="DESCRICAO_USER" value="fins lucrativos">
      </div>
        <!--senha-->
        <div class="field">
          <img src="https://cdn0.iconfinder.com/data/icons/essentials-4/1710/lock-256.png" alt="senha" height="25" width="25">
          <input placeholder="Password" class="input-field" name="SENHA" id="SENHA" type="password">
        </div>
        <div class="btn-salvar">
          <button class="button2">Salvar Alterações</button>
        </div>
    </form>


</center>

</body>
</html>

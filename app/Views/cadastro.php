<?php
    $this->extend('header');

    $this->section('title');

        echo "Cadastro";

    $this->endSection();

    $this->section('content');
?>


<style>

    body {
        background-color: #C2FCFC;
        
    }
.form {
  align-items: center;
  text-align: center;
  display: inline-grid;
  flex-direction: column;
  margin-top: 20vh;
  gap: 10px;
  padding-left: 3em;
  padding-right: 3em;
  padding-bottom: 0.4em;
  background-color: #53AFAF;
  border-radius: 25px;
  transition: .4s ease-in-out;
  box-shadow: 17px 12px 64px -24px rgba(97,94,97,1);
}
.form:hover {
  transform: scale(1.02);
}


@import url('https://fonts.googleapis.com/css2?family=Sofia&display=swap');
#heading {
  text-align: center;
  margin: 35px;
  color: black;
  font-size: 40px;
  font-family: 'Sofia', cursive;
}

.field {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5em;
  border-radius: 25px;
  padding: 0.6em;
  border: none;
  outline: none;
  color: white;
  background-color: white;
  width: 450px;
}

.input-icon {
  height: 1.3em;
  width: 1.3em;
  fill: white;
}

.input-field {
  background: none;
  border: none;
  outline: none;
  width: 100%;
  color: black;
}

.form .btn {
  display: flex;
  justify-content: center;
  flex-direction: column;
  margin-top: 2.5em;
}

.btn button {
  margin: 1rem;
}

.container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.button1 {
  padding: 0.5em;
  padding-left: 1.1em;
  padding-right: 1.1em;
  border-radius: 15px;
  margin-right: 0.5em;
  margin-top: 1rem;
  margin-bottom: 1rem;
  border: none;
  outline: none;
  transition: .4s ease-in-out;
  background-color: #252525;
  color: white;

}

.button1:hover {
  background-color: black;
  color: white;
}

.button2 {
  padding: 0.5em;
  padding-left: 2.3em;
  padding-right: 2.3em;
  border-radius: 15px;
  border: none;
  outline: none;
  transition: .4s ease-in-out;
  background-color: #252525;
  color: white;
}

.button2:hover {
  background-color: black;
  color: white;
}

.button3 {
  margin-bottom: 3em;
  padding: 0.5em;
  border-radius: 15px;
  border: none;
  outline: none;
  transition: .4s ease-in-out;
  background-color: #252525;
  color: white;
}

.button3:hover {
  background-color: #FF6961;
  color: white;
}

</style>
<center>
<body>

<div class="container">
  
<form  action="<?= base_url('UsuarioController/adicionar') ?>" method="post" class="form">
    <p id="heading">Cadastre-se</p>
    <!--nome-->
    <div class="field">
    <img src="https://cdn2.iconfinder.com/data/icons/user-interface-169/32/about-512.png"  height="25" width="25">
      <input autocomplete="off" placeholder="Username" class="input-field" name="NOME" id="NOME" type="text">
    </div>
    <!--email-->
    <div class="field">
    <img src="https://cdn2.iconfinder.com/data/icons/boxicons-regular-vol-1/24/bx-at-512.png" alt="email" height="25" width="25">
      <input autocomplete="off" placeholder="E-mail" class="input-field" name="EMAIL" id="EMAIL" type="text">
    </div>
    <!--telefone-->
    <div class="field">
    <img src="https://cdn1.iconfinder.com/data/icons/modern-universal/32/icon-03-256.png" alt="telefone" height="25" width="25">
      <input autocomplete="off" placeholder="Telefone" class="input-field" name="TELEFONE" id="TELEFONE" type="text">
    </div>
    <!--descricao-->
    <div class="field">
    <img src="https://cdn0.iconfinder.com/data/icons/free-daily-icon-set/512/Task-256.png" alt="desc"  height="25" width="25" >
      <input autocomplete="off" placeholder="Descrição" class="input-field" name="DESCRICAO_USER" id="DESCRICAO_USER" type="text">
    </div>
    <!--senha-->
    <div class="field">
    <img src="https://cdn0.iconfinder.com/data/icons/essentials-4/1710/lock-256.png" alt="senha"height="25" width="25" >
      <input placeholder="Password" class="input-field" name="SENHA" id="SENHA" type="password">
    </div>
  
    <div class="btn">
    <button class="button2">Entrar</button>
    <button class="button3" type="button">Esqueci a senha</button>
    </div>

</form>

  <button class="button1" type="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Já tem uma conta? Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

</div>
<?php
    $this->endSection();
?>



</body>
</html>
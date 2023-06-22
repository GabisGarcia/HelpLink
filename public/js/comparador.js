function comparador() {
    const senhaInserida = document.getElementById("senhaInserida").value;
    const novaSenha = document.getElementById("novaSenha").value;
    const email = document.getElementById("emailUsuario").value;

    if (senhaInserida !== novaSenha) {
        alert("ERRO! AS SENHAS SÃO DIFERENTES");
     } else {
        const formData = new FormData()
        formData.append("novaSenha", novaSenha)
        formData.append("emailUsuario", email ? email : null)

        fetch("/HelpLink/public/UsuarioController/alterarSenha", {
            method: "POST",
            body: formData,
          })
            .then((response) => response)
            .then((data) => {
              if (data.status == 200) {
                  if(email) {
                    window.location.href = "/HelpLink/public/login"
                  } else {
                    window.location.href = "/HelpLink/public/meuperfil"
                  }
              } else {
                alert("Erro");
              }
            })

     }
}
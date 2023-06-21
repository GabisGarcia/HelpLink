const buttonSubmit = document.querySelector(".button-submit");


function validarCampos() {
  let titulo = document.getElementById("TITULO").value;
  let contato = document.getElementById("CONTATO").value;
  let valor = document.getElementById("VALOR").value;
  let doacao = document.getElementById("DOACAO").value;

  if (titulo.length < 18) {
    alert("O campo titulo deve conter no mínimo 18 caracteres");
    document.getElementById("TITULO").focus();
    return false;
  }

  if (contato.length < 1) {
    alert("O campo contato deve ser preenchido");
    document.getElementById("CONTATO").focus();
    return false;
  }

  if (valor.length < 1) {
    alert("O campo valor deve ser preenchido");
    document.getElementById("VALOR").focus();
    return false;
  }

  if (doacao.length < 20) {
    alert("O campo doação deve conter no mínimo 20 caracteres");
    document.getElementById("DOACAO").focus();
    return false;
  }

  return true;
}

function sendData() {
  let titulo = document.getElementById("TITULO").value;
  let contato = document.getElementById("CONTATO").value;
  let valor = document.getElementById("VALOR").value;
  let doacao = document.getElementById("DOACAO").value;
  let imagem = document.getElementById("IMAGEM").value;
  let tags = document.querySelectorAll("#TAGS");
  let tagsChecked = [];

  tags.forEach(tag => {
    if (tag.checked) {
      tagsChecked.push(tag.value);
    }
  });

  if (validarCampos) {
    const formData = new FormData();
    formData.append("TITULO", titulo);
    formData.append("CONTATO", contato);
    formData.append("VALOR", valor);
    formData.append("DOACAO", doacao);
    formData.append("IMAGEM", imagem || "");
    formData.append("TAGS", tagsChecked);

    fetch("/HelpLink/public/PostController/postar", {
      method: "POST",
      body: formData,
    })
      .then((response) => response)
      .then((data) => {
        console.log(data);
        if (data.status == 200) {
          window.location.href = "/HelpLink/public/";
        }
      })
      .catch((err) => console.error(err));
  }
}


buttonSubmit.addEventListener("click", sendData);
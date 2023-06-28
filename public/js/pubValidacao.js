const buttonSubmit = document.querySelector(".button-submit")
const titleValidation = document.querySelector(".title-validation")
const contactValidation = document.querySelector(".contact-validation")
const valueValidation = document.querySelector(".value-validation")
const donationValidation = document.querySelector(".donation-validation")
const descriptionValidation = document.querySelector(".description-validation")
const toastLiveExample = document.getElementById("liveToast")

function validaTitulo() {
  let titulo = document.getElementById("TITULO").value
  if (titulo.length < 18) {
    titleValidation.style.display = "block"
    titleValidation.innerHTML =
      "O campo titulo deve conter no mínimo 18 caracteres"
    document.getElementById("TITULO").focus()
    return false
  } else {
    titleValidation.style.display = "none"
    return true
  }
}

function validaContato() {
  let contato = document.getElementById("CONTATO").value

  if (contato.length < 1) {
    contactValidation.style.display = "block"
    contactValidation.innerHTML = "O campo contato deve ser preenchido"
    document.getElementById("CONTATO").focus()
    return false
  }

  contactValidation.style.display = "none"
  return true
}

function validaValor() {
  let valor = document.getElementById("VALOR").value

  if (valor.length < 1) {
    valueValidation.style.display = "block"
    valueValidation.innerHTML = "O campo valor deve ser preenchido"
    document.getElementById("VALOR").focus()
    return false
  }

  valueValidation.style.display = "none"
  return true
}

function validaDoacao() {
  let doacao = document.getElementById("DOACAO").value

  if (doacao.length == 0) {
    donationValidation.style.display = "none"
  }

  return true
}

function validaDescricao() {
  let descricao = document.getElementById("DESCRICAO").value

  if (descricao.length < 1) {
    descriptionValidation.style.display = "block"
    descriptionValidation.innerHTML = "O campo descrição deve ser preenchido"
    document.getElementById("DESCRICAO").focus()
    return false
  }
  descriptionValidation.style.display = "none"

  return true
}

async function sendData() {
  let titulo = document.getElementById("TITULO").value
  let contato = document.getElementById("CONTATO").value
  let valor = document.getElementById("VALOR").value
  let doacao = document.getElementById("DOACAO").value
  let imagem = document.getElementById("IMAGEM").files[0]
  let descricao = document.getElementById("DESCRICAO").value
  let tags = document.querySelectorAll("#TAGS")
  let tagsChecked = []

  tags.forEach((tag) => {
    if (tag.checked) {
      tagsChecked.push(tag.value)
    }
  })

  if (
    validaTitulo() &&
    validaContato() &&
    validaValor() &&
    validaDoacao() &&
    validaDescricao()
  ) {
    const formData = new FormData()
    formData.append("TITULO", titulo)
    formData.append("CONTATO", contato)
    formData.append("VALOR", valor)
    formData.append("DOACAO", doacao)
    formData.append("DESCRICAO", descricao)
    formData.append("IMAGEM", imagem || "")
    formData.append("TAGS", tagsChecked)

    await fetch("/HelpLink/public/PostController/postar", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status == 200) {
          const toast = new bootstrap.Toast(toastLiveExample)
          document.querySelector(".alert-req").classList.remove("alert-danger")
          document.querySelector(".alert-req").classList.add("alert-success")
          document.querySelector(".alert-req").innerHTML = data.message
          toast.show()

          document.getElementById("TITULO").value = ""
          document.getElementById("CONTATO").value = ""
          document.getElementById("VALOR").value = ""
          document.getElementById("DOACAO").value = ""
          document.getElementById("IMAGEM").value = ""
          document.getElementById("DESCRICAO").value = ""
          
          tags.forEach((tag) => {
            tag.checked = false
          })
        } else {
          const toast = new bootstrap.Toast(toastLiveExample)
          document.querySelector(".alert-req").classList.remove("alert-success")
          document.querySelector(".alert-req").classList.add("alert-danger")
          document.querySelector(".alert-req").innerHTML = "Ocorreu um erro ao tentar publicar seu post. Tente novamente"

          toast.show()
        }
      })
      .catch((err) => console.error(err))
  }
}

buttonSubmit.addEventListener("click", sendData)

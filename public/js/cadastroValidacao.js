const emailError = document.querySelector(".email-error")
const phoneError = document.querySelector(".phone-error")
const passwordError = document.querySelector(".password-error")

function ValidateEmail(mail) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
    emailError.style.display = "none"
    return true
  }
  emailError.style.display = "block"
  return false
}

function ValidatePhone(phone) {
  if (/^\d{2}\d{5}\d{4}$/.test(phone)) {
    phoneError.style.display = "none"
    return true
  }
  phoneError.style.display = "block"
  return false
}

function ValidatePassword(password) {
  if (/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/.test(password)) {
    passwordError.style.display = "none"
    return true
  }
  passwordError.style.display = "block"
  return false
}

function validateForm() {
  const email = document.getElementById("EMAIL").value
  const phone = document.getElementById("TELEFONE").value
  const password = document.getElementById("SENHA").value
  const username = document.getElementById("NOME").value
  const description = document.getElementById("DESCRICAO_USER").value

  if (
    ValidateEmail(email) &&
    ValidatePhone(phone) &&
    ValidatePassword(password)
  ) {
    const formData = new FormData()
    formData.append("EMAIL", email)
    formData.append("TELEFONE", phone)
    formData.append("SENHA", password)
    formData.append("NOME", username)
    formData.append("DESCRICAO_USER", description)

    fetch("/HelpLink/public/UsuarioController/adicionar", {
      method: "POST",
      body: formData,
    })
      .then((response) => response)
      .then((data) => {
        if (data.status == 200) {
          window.location.href = "/HelpLink/public/login"
        } else {
          alert("Erro ao cadastrar")
        }
      })

    return true
  }
  return false
}

const buttonSubmit = document.querySelector(".btn-submit")

buttonSubmit.addEventListener("click", validateForm)

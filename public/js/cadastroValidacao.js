function ValidateEmail(mail) {
  const email = document.getElementById("EMAIL").value
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
    return true
  }
  alert("You have entered an invalid email address!")
  return false
}

function ValidatePhone(phone) {
  const phone = document.getElementById("TELEFONE").value
  if (/^\d{2}\d{5}\d{4}$/.test(phone)) {
    return true
  }
  alert("You have entered an invalid phone number!")
  return false
}

// funcao para validar se senha tem mais de 6 caracteres e possui letras e numeros e caracteres especiais
function ValidatePassword(password) {
  const password = document.getElementById("SENHA").value
  if (/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/.test(password)) {
    return true
  }
  alert("You have entered an invalid password!")
  return false
}

/* 

Validar os campos de: 

titulo - conter no mínimo 18 caracteres
contato - deve ser um email ou um telefone válido
descricao - conter no mínimo 50 caracteres
valor - deve ser um número válido
doacao - pode ser um número ou uma string contendo no minimo 20 caracteres
imagem - deve ser uma imagem válida nos formatos aceitos (jpg, jpeg, png)

*/

function validarCampos() {
  let titulo = document.getElementById("TITULO").value
  let contato = document.getElementById("CONTATO").value
  let descricao = document.getElementById("DESCRICAO").value
  let valor = document.getElementById("VALOR").value
  let doacao = document.getElementById("DOACAO").value
  let imagem = document.getElementById("IMAGEM").value

  if (titulo.length < 18) {
    alert("O campo titulo deve conter no mínimo 18 caracteres")
    document.getElementById("TITULO").focus()
    return false
  }

  if (contato.length < 1) {
    alert("O campo contato deve ser preenchido")
    document.getElementById("CONTATO").focus()
    return false
  }

  if (descricao.length < 50) {
    alert("O campo descrição deve conter no mínimo 50 caracteres")
    document.getElementById("DESCRICAO").focus()
    return false
  }

  if (valor.length < 1) {
    alert("O campo valor deve ser preenchido")
    document.getElementById("VALOR").focus()
    return false
  }

  if (doacao.length < 20) {
    alert("O campo doação deve conter no mínimo 20 caracteres")
    document.getElementById("DOACAO").focus()
    return false
  }

  if (imagem.length < 1) {
    alert("O campo imagem deve ser preenchido")
    document.getElementById("IMAGEM").focus()
    return false
  }

  return true
}

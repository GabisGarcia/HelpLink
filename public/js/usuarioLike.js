const url = "http://localhost/HelpLink/public/PostController/";

window.onload(() => {
    renderizarCurtidas();
})

async function renderizarCurtidas() {
  await fetch(`${url}/curtidas`, {
    method: "get",
    headers: {
      "Content-Type": "application/json",
      "X-Requested-With": "XMLHttpRequest",
    },
  })
    .then((resposta) => console.log(resposta))
    .catch((erro) => console.error(erro));
}

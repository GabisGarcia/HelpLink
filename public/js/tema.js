window.addEventListener('load', () => {
  if (theme === "dark") {
    document.body.classList.add("dark");
  };
})


const toggle = document.getElementById("toggle");
const theme = window.localStorage.getItem("theme");

/* verifica se o tema armazenado no localStorage é escuro
se sim aplica o tema escuro ao body */


// event listener para quando o botão de alterar o tema for clicado
toggle.addEventListener("change", () => {
  document.body.classList.toggle("dark");
  if (theme === "dark") {
    window.localStorage.setItem("theme", "light");
  } else {
    window.localStorage.setItem("theme", "dark");
  }
});

const toggle = document.getElementById("toggle");
const theme = window.localStorage.getItem("theme");
const checkboxTheme = document.querySelector(".checkbox-theme");


window.addEventListener('load', () => {
  if (theme === "dark") {
    document.body.classList.add("dark");
    checkboxTheme.checked = true;
  };
})


toggle.addEventListener("change", () => {
  document.body.classList.toggle("dark");
  if (theme === "dark") {
    window.localStorage.setItem("theme", "light");
  } else {
    window.localStorage.setItem("theme", "dark");
  }
});

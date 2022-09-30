const menu = document.getElementById("menu-btn");
const list = document.getElementById("list");
const nav = document.getElementById("nav");
menu.addEventListener("click", () => {
  list.classList.toggle("active");
  menu.classList.toggle("show1");
  nav.classList.toggle("zshow");
});
list.addEventListener("click", () => {
  list.classList.toggle("active");
  menu.classList.toggle("show1");
  nav.classList.toggle("zshow");
});

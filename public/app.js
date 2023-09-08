const layer = document.querySelector("#layer");
const menu = document.querySelector("#menu");
const body = document.querySelector("body");
const close = document.querySelector("#close");

const openSideBar = () => {
  body.classList.add("hidden");
  layer.classList.add("block");
};

const closeSideBar = () => {
  body.classList.remove("hidden");
  layer.classList.remove("block");
};

menu.addEventListener("click", openSideBar);
close.addEventListener("click", closeSideBar);

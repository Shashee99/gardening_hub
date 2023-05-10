
let menu = document.querySelector(".menu");
let topbar = document.querySelector(".top-bar");
let navigation = document.querySelector(".navigation");
let logo = document.querySelector(".logo");
let rest = document.querySelector(".rest");

console.log("Hello");
menu.onclick = function ()
{
    topbar.classList.toggle("active");
    navigation.classList.toggle("active");
    logo.classList.toggle("active");
    rest.classList.toggle("active");
};

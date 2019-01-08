//DOM elements
const smMenu = document.getElementById("navSm");
const lgMenu = document.getElementById("navLg");
const icon = document.getElementById("hambBtn");
const dropDownMenuSm = document.getElementById("dropDownMenuSm");
const contactBtnLg = document.getElementById("contactBtnLg");
const dropDownMenuContact = document.getElementById("dropDownMenuContact");

var hambPressed = false;

if (window.name == 'open') {
  dropDownMenuContact.classList.remove("hidden");
} else {
  dropDownMenuContact.classList.add("hidden");
}

icon.addEventListener("click", () => {
  if (!hambPressed) {
    hambPressed = true;
    openMenu();
    updateIcon();
  } else {
    hambPressed = false;
    closeMenu();
    updateIcon();
  }
});

function openMenu() {
  dropDownMenuSm.classList.remove("hidden");
}

function closeMenu() {
  dropDownMenuSm.classList.add("hidden");
}

function updateIcon() {
  if (hambPressed === true) {
    icon.src = "./img/1x/HambMenuPressed.png";
  } else {
    icon.src = "./img/1x/HambMenu.png";
  }
}

contactBtnLg.addEventListener("click", () => {
  if (dropDownMenuContact.classList.contains("hidden")) {
    dropDownMenuContact.classList.remove("hidden");
    window.name = "open";
  } else {
    dropDownMenuContact.classList.add("hidden");
    window.name = "";
  }
});

function manageContactDropDown() {

}

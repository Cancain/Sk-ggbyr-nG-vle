const smMenu = document.getElementById("navSm");
const lgMenu = document.getElementById("navLg");
const icon = document.getElementById("hambBtn");
const dropDownMenuSm = document.getElementById("dropDownMenuSm");

var hambPressed = false;

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

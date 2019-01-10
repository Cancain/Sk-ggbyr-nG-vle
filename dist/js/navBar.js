//DOM elements
const smMenu = document.getElementById("navSm");
const lgMenu = document.getElementById("navLg");
const icon = document.getElementById("hambBtn");
const dropDownMenuSm = document.getElementById("dropDownMenuSm");
const contactBtnLg = document.getElementById("contactBtnLg");
const dropDownMenuContact = document.getElementById("dropDownMenuContact");

setContactDrop();

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

function setContactDrop() {
  let url = window.location.href;
  let currentPage = url.substr(url.lastIndexOf('/') + 1);
  let inContact = false;
  let contactPages = [
    "book.php",
    "contact.php"
  ];

  contactPages.forEach(element => {
    if (currentPage == element) {
      inContact = true;
      console.log("true");
    }
  });
  if (inContact) {
    dropDownMenuContact.classList.remove("hidden");
  }
  else {
    dropDownMenuContact.classList.add("hidden");
  }
}

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

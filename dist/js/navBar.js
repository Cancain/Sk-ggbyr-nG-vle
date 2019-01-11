//DOM elements
const smMenu = document.getElementById("navSm");
const lgMenu = document.getElementById("navLg");
const icon = document.getElementById("hambBtn");
const dropDownMenuSm = document.getElementById("dropDownMenuSm");
const contactBtnLg = document.getElementById("contactBtnLg");
const dropDownMenuContactLg = document.getElementById("dropDownMenuContact");
const contactBtnSm = document.getElementById("contactBtnSm");
const dropDownMenuContactSm = document.getElementById("dropDownMenuContactSm");

//script variables
let hambPressed = false;

contactBtnSm.addEventListener("click", () => {
  if (dropDownMenuContactSm.classList.contains("hidden")) {
    dropDownMenuContactSm.classList.remove("hidden");
  } else {
    dropDownMenuContactSm.classList.add("hidden");
  }

});

contactBtnLg.addEventListener("click", () => {
  if (dropDownMenuContactLg.classList.contains("hidden")) {
    dropDownMenuContactLg.classList.remove("hidden");
    window.name = "open";
  } else {
    dropDownMenuContactLg.classList.add("hidden");
    window.name = "";
  }
});

//Only shows the dropdownmenu for the contact pages or if it's clicked
setContactDrop();
function setContactDrop() {
  //Sets url to the url of the current page
  let url = window.location.href;
  //Sets currentPage to the page at the end if the url
  let currentPage = url.substr(url.lastIndexOf('/') + 1);
  let inContact = false;
  //saves the pages to look for in the contactPages array
  let contactPages = [
    "book.php",
    "contact.php"
  ];
  inContact = checkContactPages(contactPages, currentPage, inContact);
}

//this function loops though the contactPages array
//hides the dropdown menu if not in any of the contact pages
//Only shows the relevant dropdown depending on screen-size
function checkContactPages(contactPages, currentPage, inContact) {
  contactPages.forEach(element => {
    if (currentPage == element) {
      inContact = true;
    }
  });
  if (inContact) {
    if (window.innerWidth >= 768) {
      dropDownMenuContactLg.classList.remove("hidden");
    }

  }
  else {
    if (window.innerWidth >= 768) {
      dropDownMenuContactLg.classList.add("hidden");
    }

  }
  return inContact;
}

//Click event for the mobile menu button
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




let toggleExtras = false;
let toggleFizzyDrinks = false;

let ExtraTopBtnClick = function() {
    let extras = document.querySelector("#extras");
    let extrasButton = document.querySelector(".toggleExtras");
    if (toggleExtras == false) {
        extrasButton.style.display = "block";
        extras.checked = true;
        toggleExtras = true;
    } else if (toggleExtras == true) {
        extrasButton.style.display = "none";
        extras.checked = false;
        toggleExtras = false;
    }
}

let FizzyBtnClick = function() {
    let fizzyRad = document.querySelector("#fizzyRad");
    let CollapseFizzyDrinks = document.querySelector(".CollapseFizzyDrinks");
    if (toggleExtras == false) {
        CollapseFizzyDrinks.style.display = "block";
        fizzyRad.checked = true;
        toggleExtras = true;
    } else if (toggleExtras == true) {
        CollapseFizzyDrinks.style.display = "none";
        fizzyRad.checked = false;
        toggleExtras = false;
    }
}

let JuiceBtnClick = function() {
    let juiceRad = document.querySelector("#juiceRad");
    let CollapseFizzyDrinks = document.querySelector(".CollapseJuiceDrinks");
    if (toggleExtras == false) {
        CollapseFizzyDrinks.style.display = "block";
        juiceRad.checked = true;
        toggleExtras = true;
    } else if (toggleExtras == true) {
        CollapseFizzyDrinks.style.display = "none";
        juiceRad.checked = false;
        toggleExtras = false;
    }
}

let WineBtnClick = function() {
    let wineRad = document.querySelector("#wineRad");
    let CollapseFizzyDrinks = document.querySelector(".CollapseWineDrinks");
    if (toggleExtras == false) {
        CollapseFizzyDrinks.style.display = "block";
        wineRad.checked = true;
        toggleExtras = true;
    } else if (toggleExtras == true) {
        CollapseFizzyDrinks.style.display = "none";
        wineRad.checked = false;
        toggleExtras = false;
    }
}


/* =================Show and Hide address container=========== */
let showLocation = function() {
    let address = document.querySelector(".address");
    if (toggleExtras == false) {
        address.style.display = "block";
        toggleExtras = true;
    }
}

let hideLocation = function() {
    let address = document.querySelector(".address");
    if (toggleExtras == true) {
        address.style.display = "none";
        toggleExtras = false;
    }
}

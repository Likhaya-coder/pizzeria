let printButton = document.querySelector(".print");
let hiddenBlock =  document.querySelector("#hidden-block-onprint");


let printInvoice = function() {
    window.print();
    hiddenBlock.style.cssText = "display: none;";
}

printInvoice;

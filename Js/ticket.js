var inputcode = document.getElementById("avancementcode");

inputcode.addEventListener("focusin", function() {
    document.getElementById("textehistocode").style.visibility = "visible";
})

inputcode.addEventListener("focusout", function() {
    document.getElementById("textehistocode").style.visibility = "hidden";
})
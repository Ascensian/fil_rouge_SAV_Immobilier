var inputcode = document.getElementById("avancementcode");
var inputcommentaire = document.getElementById("commentaire");

inputcode.addEventListener("focusin", function() {
    document.getElementById("textehistocode").style.display = "block";
})

inputcode.addEventListener("focusout", function() {
    document.getElementById("textehistocode").style.display = "none";
})

inputcommentaire.addEventListener("focusin", function() {
    document.getElementById("formulaireErreur").style.display ="none";
})
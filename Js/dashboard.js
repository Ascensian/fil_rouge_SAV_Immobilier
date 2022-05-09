var inputIdentifiant = document.getElementById("identifiant");
var inputMDP = document.getElementById("mdp");

inputIdentifiant.addEventListener("focusin", function(){
        document.getElementById("divmsgErreur").style.display="none";
});

inputMDP.addEventListener("focusin", function(){
        document.getElementById("divmsgErreur").style.display="none";
});




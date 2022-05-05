var menu = document.getElementById("selection");
var change = document.getElementsByClassName("btn1");
var inputIdentifiant = document.getElementById("identifiant");
var inputMDP = document.getElementById("mdp");

for(let list of change){

list.addEventListener("click", function(){
        menu.innerText = list.innerText;
})
}
// function changement(){
// {
//         change = document.getElementById(this);
//         if(change.value != menu.value)
//         {
//         change.value = menu.value;
//         menu.innerHTML = change.value;
//         menu.appenChild(change);
//         }
// }
inputIdentifiant.addEventListener("focusin", function(){
        document.getElementById("divmsgErreur").style.display="none";
});

inputMDP.addEventListener("focusin", function(){
        document.getElementById("divmsgErreur").style.display="none";
});




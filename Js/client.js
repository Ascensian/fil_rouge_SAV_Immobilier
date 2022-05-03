var lignecomm = document.getElementsByClassName('lignecomm');
var idclient = window.location.search;
idclient = idclient.replace("?id=","");
console.log(idclient);
for(let ligne of lignecomm){
    console.log(ligne)
    ligne.addEventListener("click", function(){
        idcmd = ligne.getAttribute('id');
        window.location.search = "CMD="+idcmd+"&id="+idclient;
    })
}
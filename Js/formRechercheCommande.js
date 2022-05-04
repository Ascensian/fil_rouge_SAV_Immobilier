import { control_searchDisplayClient, 
    control_searchDisplayCommande, 
    control_searchDisplayTicket, 
    changeDisplayClient,
    changeDisplayCommande,
    changeDisplayTicket } from '/Js/controlForm.js';

export { showOrder };

/**
* Affichage dynamique formulaire recherche par commande
*/


function showOrder () {
// réinitialise le controle affichage 
if (control_searchDisplayClient === true) {
   changeDisplayClient(false);
} else if (control_searchDisplayTicket === true) {
   changeDisplayTicket(false) ;
}

// supprime la div en cours si elle existe
if (document.body.contains(document.querySelector("#divClient"))) {
   document.querySelector("#divClient").remove();
} else if (document.body.contains(document.querySelector("#divTicket"))) {
   document.querySelector("#divTicket").remove();
}

// n'affiche la div que si le controle est à 0
if (control_searchDisplayCommande == false) {
  
 
   var divCommande = document.createElement("div");
   divCommande.id = "divCommande";

   var commandeForm = document.createElement("form");
   commandeForm.id = "formCommande";
   commandeForm.action = "";
   commandeForm.method = "GET";

   var commandeFieldset = document.createElement("fieldset");
   var commandeLegend = document.createElement("legend");
   commandeLegend.id = "commandeLegend";
   commandeLegend.insertAdjacentHTML("afterbegin", "saisir numéro de commande");

   var numCommandeLabel = document.createElement("label");
   numCommandeLabel.setAttribute("for", "numCommande");
   numCommandeLabel.insertAdjacentHTML("afterbegin", "entrez un numéro de commande");

   var numCommandeInput = document.createElement("input");
   numCommandeInput.type = "text";
   numCommandeInput.name = "numCommande";
   numCommandeInput.placeholder = "Ex : CMD001";

   var commandeInputSubmit = document.createElement("input");
   commandeInputSubmit.type = "submit";

   commandeFieldset.appendChild(commandeLegend);
   commandeFieldset.appendChild(numCommandeLabel);
   commandeFieldset.appendChild(numCommandeInput);
   commandeFieldset.appendChild(commandeInputSubmit);
   commandeForm.appendChild(commandeFieldset);
   divCommande.appendChild(commandeForm);
   document.querySelector(".contenu").appendChild(divCommande);
   changeDisplayCommande(true);
}
}
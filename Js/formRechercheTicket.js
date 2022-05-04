import { control_searchDisplayClient, 
    control_searchDisplayCommande, 
    control_searchDisplayTicket, 
    changeDisplayClient,
    changeDisplayCommande,
    changeDisplayTicket } from '/Js/controlForm.js';

export { showTicket };
/**
* 
*/

function showTicket() {
// réinitialise le controle affichage pour éviter les doublons de div au clic
if (control_searchDisplayClient === true) {
   changeDisplayClient(false);
} else if (control_searchDisplayCommande === true) {
   changeDisplayCommande(false) ;
}
// supprime la div en cours si elle existe
if (document.body.contains(document.querySelector("#divClient"))) {
   document.querySelector("#divClient").remove();
} else if (document.body.contains(document.querySelector("#divCommande"))) {
   document.querySelector("#divCommande").remove();
}

// n'affiche la div que si le controle est à 0
if (control_searchDisplayTicket == false) {

   var divTicket = document.createElement("div");
   divTicket.id = "divTicket";

   var ticketForm = document.createElement("form");
   ticketForm.id = "formTicket";
   ticketForm.action = "index.php";
   ticketForm.method = "GET";

   var ticketFieldset = document.createElement("fieldset");
   var ticketLegend = document.createElement("legend");
   ticketLegend.id = "ticketLegend";
   ticketLegend.insertAdjacentHTML("afterbegin", "saisir libellé ticket");

   var ticketLabel = document.createElement("label");
   ticketLabel.setAttribute("for", "libTicket");
   ticketLabel.insertAdjacentHTML("afterbegin", "entrez un libellé ticket");

   var ticketInput = document.createElement("input");
   ticketInput.type = "text";
   ticketInput.name = "libTicket";
   ticketInput.placeholder = "Ex : PORTAIL ABIME";

   var ticketInputSubmit = document.createElement("input");
   ticketInputSubmit.type = "submit";

   ticketFieldset.appendChild(ticketLegend);
   ticketFieldset.appendChild(ticketLabel);
   ticketFieldset.appendChild(ticketInput);
   ticketFieldset.appendChild(ticketInputSubmit);
   ticketForm.appendChild(ticketFieldset);
   divTicket.appendChild(ticketForm);
   document.querySelector(".contenu").appendChild(divTicket);
   changeDisplayTicket(true);
   
}
}


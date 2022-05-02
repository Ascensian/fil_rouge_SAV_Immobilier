// Récupération des méthodes
import { showClient } from '/Js/formRechercheClient.js';
import { showOrder } from '/Js/formRechercheCommande.js';
import { showTicket } from '/Js/formRechercheTicket.js'

// Exportation des variables de controle

export { control_searchDisplayClient, control_searchDisplayCommande, control_searchDisplayTicket };
export { changeDisplayClient, changeDisplayCommande, changeDisplayTicket};

// controle l'affichage au click
let control_searchDisplayClient = false;
let control_searchDisplayCommande = false;
let control_searchDisplayTicket = false;


// fonction pour réassigner les valeurs de controle de l'affichage, sinon cela provoque une erreur
function changeDisplayClient(display_value) {
    control_searchDisplayClient = display_value;
    console.log(control_searchDisplayCommande);
    console.log(control_searchDisplayClient);
}

function changeDisplayCommande (display_value) {
    control_searchDisplayCommande = display_value;
    console.log(control_searchDisplayCommande);
    console.log(control_searchDisplayClient);
}

function changeDisplayTicket (display_value) {
    control_searchDisplayTicket = display_value;
}


// Récupération des ids sur la page view_advancedResearch
var client = document.getElementById("client");
var order = document.getElementById("order");
var ticket = document.getElementById("ticket");

// Affichage des formulaires dynamiques selon le click
client.addEventListener("click", showClient);
order.addEventListener("click", showOrder);
ticket.addEventListener("click", showTicket);
// Récupération des ids sur la page view_advancedResearch
var control_searchDisplay = 0;
var client = document.getElementById("client");
var order = document.getElementById("order");
var ticket = document.getElementById("ticket");
// content = document.querySelector(".contenu");


client.addEventListener("click", showClient);
order.addEventListener("click", showOrder);
ticket.addEventListener("click", showTicket);


console.log(control_searchDisplay);

/**
 * Affichage dynamique formulaire recherche par nom client
 */

function showClient () {
    // if (document.body.contains(document.querySelector(".contenu"))) {
    //     document.querySelector(".contenu") = "";
    // }
    
    // Controle pour éviter de recréer des inputs à chaque clic
    if (control_searchDisplay < 1) {
        
        // Créé les éléments html du formulaire 
        var divClient = document.createElement("div");
        divClient.id = "divClient";
    
        var clientForm = document.createElement("form");
        clientForm.id = "formClient";
        clientForm.action = "";
        client.method = "GET";

        var clientFieldset = document.createElement("fieldset");
        var clientLegend = document.createElement("legend");
        clientLegend.id = "clientLegend";
        clientLegend.insertAdjacentHTML("afterbegin", "client : saisir informations");
        
    
        var clientFirstname = document.createElement("label");
        clientFirstname.setAttribute("for", "clientFirstname");
        clientFirstname.insertAdjacentHTML("afterbegin", "entrez un nom client ");
    
        var clientFirstnameInput = document.createElement("input");
        clientFirstnameInput.type = "text";
        clientFirstnameInput.name = "clientFirstName";
        clientFirstnameInput.placeholder = "ENTREZ UN NOM";

        var clientName = document.createElement("label");
        clientName.setAttribute("for", "clientName");
        clientName.insertAdjacentHTML("afterbegin", "entrez un prenom client ");
    
        var clientNameInput = document.createElement("input");
        clientNameInput.type = "text";
        clientNameInput.name = "clientName";
        clientNameInput.placeholder = "ENTREZ UN PRENOM";

        var clientInputSubmit = document.createElement("input");
        clientInputSubmit.type = "submit";
        


        //met sur le DOM les éléments créés
        clientFieldset.appendChild(clientLegend);
        clientFieldset.appendChild(clientFirstname);
        clientFieldset.appendChild(clientFirstnameInput);
        clientFieldset.appendChild(document.createElement("br"));
        clientFieldset.appendChild(clientName);
        clientFieldset.appendChild(clientNameInput);
        clientFieldset.appendChild(document.createElement("br"));
        clientFieldset.appendChild(clientInputSubmit);
        clientForm.appendChild(clientFieldset);
        
        
        divClient.appendChild(clientForm);
        document.querySelector(".contenu").appendChild(divClient);
        control_searchDisplay++;
       
    }
   
}

/**
 * Affichage dynamique formulaire recherche par commande
 */

function showOrder () {
    console.log("les commandes");
}

/**
 * Affichage dynamique formulaire par ticket
 */
function showTicket () {

}
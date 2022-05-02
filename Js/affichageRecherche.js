// Récupération des ids sur la page view_advancedResearch
var control_searchDisplayClient = 0;
var control_searchDisplayCommande = 0;
var control_searchDisplayCommande = 0;
var client = document.getElementById("client");
var order = document.getElementById("order");
var ticket = document.getElementById("ticket");


client.addEventListener("click", showClient);
order.addEventListener("click", showOrder);
ticket.addEventListener("click", showTicket);


/**
 * Affichage dynamique formulaire recherche par nom client
 */

function showClient () {
    control_searchDisplayCommande = 0;
    if (document.body.contains(document.querySelector("#divCommande"))) {
        document.querySelector("#divCommande").remove();
    }
    
    // Controle pour éviter de recréer des inputs à chaque clic
    if (control_searchDisplayClient < 1) {
        
        // Créé les éléments html du formulaire 
        var divClient = document.createElement("div");
        divClient.id = "divClient";
    
        var clientForm = document.createElement("form");
        clientForm.id = "formClient";
        clientForm.action = "";
        clientForm.method = "GET";

        var clientFieldset = document.createElement("fieldset");
        var clientLegend = document.createElement("legend");
        clientLegend.id = "clientLegend";
        clientLegend.insertAdjacentHTML("afterbegin", "saisir nom ou prénom");
        
    
        var clientFirstname = document.createElement("label");
        clientFirstname.setAttribute("for", "clientFirstname");
        clientFirstname.insertAdjacentHTML("afterbegin", "entrez un nom client ");
    
        var clientFirstnameInput = document.createElement("input");
        clientFirstnameInput.type = "text";
        clientFirstnameInput.name = "clientFirstName";
        clientFirstnameInput.placeholder = "Ex : Ron";

        var clientName = document.createElement("label");
        clientName.setAttribute("for", "clientName");
        clientName.insertAdjacentHTML("afterbegin", "entrez un prenom client ");
    
        var clientNameInput = document.createElement("input");
        clientNameInput.type = "text";
        clientNameInput.name = "clientName";
        clientNameInput.placeholder = "Ex : Weasley";

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
        control_searchDisplayClient++;
       
    }
}
   


/**
 * Affichage dynamique formulaire recherche par commande
 */

function showOrder () {
    control_searchDisplayClient = 0;
    if (document.body.contains(document.querySelector("#divClient"))) {
        document.querySelector("#divClient").remove();
    }
   
    
    if (control_searchDisplayCommande < 1) {
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
        control_searchDisplayCommande++;
    }
}

/**
 * Affichage dynamique formulaire par ticket
 */
function showTicket () {

}
import { control_searchDisplayClient, 
         control_searchDisplayCommande, 
         control_searchDisplayTicket, 
         changeDisplayClient,
         changeDisplayCommande,
         changeDisplayTicket } from '/Js/controlForm.js';

export { showClient };

/**
 * Affichage dynamique formulaire recherche par nom client
 */

function showClient () {

    if (control_searchDisplayCommande === true) {
        changeDisplayCommande(false);
    } else if (control_searchDisplayTicket === true) {
        changeDisplayTicket(false);
    } 
    
    if (document.body.contains(document.querySelector("#divCommande"))) {
        document.querySelector("#divCommande").remove();
    }
    
    // Controle pour éviter de recréer des inputs à chaque clic
    if (control_searchDisplayClient == false) {
        
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

        changeDisplayClient(true);
       
    }
}
   
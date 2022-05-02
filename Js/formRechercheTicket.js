import { control_searchDisplayClient } from '/Js/controlForm.js';
import { control_searchDisplayCommande } from '/Js/controlForm.js';
import { control_searchDisplayTicket } from '/Js/controlForm.js';

export { showTicket };
/**
 * 
 */

function showTicket() {
    if (control_searchDisplayClient > 0) {
        control_searchDisplayClient = 0;
    } else if (control_searchDisplayCommande > 0) {
        control_searchDisplayTicket = 0;
    }
}
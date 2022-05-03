var menu = document.getElementById("selection");
var change = document.getElementsByClassName("btn1");

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




var menu = document.getElementById("selection");
var change = document.getElementById("btn1");
change.addEventListener("click",function(){
        change = document.getElementById(this);
        if(change.value != menu.value)
        {
        change.value = menu.value;
        menu.innerHTML = change.value;
        menu.appenChild(change);
        }
})

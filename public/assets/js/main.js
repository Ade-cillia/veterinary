//HEAL ADD
if (window.location.pathname === "/heal/add") {
    var healer = document.getElementById("healer");
    var allSelectedHealer = document.getElementById("allSelectedHealer");
    var tag = document.createElement("p");
   
    healer.addEventListener("change", function(el) {
        el = el.target;
        var alreadySelected = document.getElementById("container_healer_"+el.value);
        if (!alreadySelected) {
            var container = document.createElement("div");
            container.setAttribute("id", "container_healer_"+el.value);
            container.setAttribute("class", "flex");
            var tag = document.createElement("p");
            var removeHealer = document.createElement("img");
            removeHealer.setAttribute('src', "/public/assets/image/site/delete.svg");
            removeHealer.setAttribute("class", "remove_container_healer");
            var input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "healer_selected[]");
            input.setAttribute("value", el.value);

            var healerName = document.createTextNode(el.options[el.selectedIndex].text);
            tag.appendChild(healerName);
            container.appendChild(tag);
            container.appendChild(input);
            container.appendChild(removeHealer);
            allSelectedHealer.appendChild(container);
        }
        healer.value=null
    });
    
    allSelectedHealer.addEventListener('click', function(el){
        el=el.target;
        if (el.classList.contains("remove_container_healer")) {
            el.parentNode.remove()
        }
    });
} 



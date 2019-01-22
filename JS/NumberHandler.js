
function IncrementPostLikes(element){
    var currentLikes = element.children[1].innerHTML;
    element.children[1].innerHTML++;
}

function DecrementPostLikes(element){
    var currentLikes = element.innerHTML;
    element.children[1].innerHTML--;
}

function IncrementPostLikes(element){
    var currentLikes = element.children[1].innerHTML;
    element.children[1].innerHTML++;
}

function DecrementPostLikes(element){
    var stats = element.parentElement;
    var dislikeButton = stats.children[0];
    dislikeButton.children[1].innerHTML--;
}
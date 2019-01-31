// Legg kommentar inn i database
var submit = document.getElementById("post-submit-ID");

submit.onclick = function loadComment(){

    var request = new XMLHttpRequest();
    request.open('POST', '../PHP/insertComment.php');
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
        {
            var comment = request.responseText;
            newComment.insertAdjacentHTML('beforebegin', comment);
        }
    }
    request.onerror = function(){
        console.log("error");
    }  
    request.send();
}

// Hent kommentar fra database

var newComment = document.getElementById("newCommentButton-ID");

newComment.onclick = function loadComment(){

    var request = new XMLHttpRequest();
    request.open('GET', '../PHP/post.php');
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
        {
            var comment = request.responseText;
            newComment.insertAdjacentHTML('beforebegin', comment);
        }
    }
    request.onerror = function(){
        console.log("error");
    }  
    request.send();
}



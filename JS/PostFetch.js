/*  
    Filen inneholder primært kode som sørger for å legge inn
    poster og kommentarer inn og ut av database via ajax.
*/


window.onload = function(){
    listPosts();
}

$(function()
{
    document.getElementById("post-submit-ID").disabled = true;
});

/*  
    preventDefualt på submit knapp ignorer href hendelse, sånn at ajax heller kan
    laste inn deler av siden.
*/
$('body').on('click', '.post-submit-ID, #submit-comment_ID', function(event)
{
    event.preventDefault()
});


/*
    Funksjon som sletter tekst på tekstfelt (utføres etter bruker poster innlegg)
*/
function clearPostField(){
    document.getElementById("post-title-ID").value = "";
    document.getElementById("text-area-ID").value = "";
}

/*
    Funksjon som sletter tekst på tekstfelt (utføres etter bruker poster kommentar)
*/
function clearCommentField(id){
    $("#comment_post_ID[value='" + id + "']").closest(".inputContainer").find(".input").val("");
    $("#comment_post_ID[value='" + id + "']").closest(".inputContainer").find(".submit-comment").prop('disabled', true)
}

/*
   Funksjon som viser kommentarfelt og din kommentar når man poster.
   Øker også telleren for antall kommentarer.
*/
function showNewComment(id) {
    $comment = $("#comment_ID[value='" + id + "']");
    var currentComCount = parseInt($comment.closest(".group-post-box").find(".comment-collapse i").text().trim());

    $comment.closest(".post-comment").find(".user-container-comment").addClass('new-comment');
    $comment.closest(".group-post-box").find(".comment-collapse").addClass('comment-show');
    
    if(currentComCount == 0) {
        $comment.closest(".group-post-box").find(".comment-collapse p").html("<p>" + (currentComCount+1) + " kommentar</p>"); }
    else {
        $comment.closest(".group-post-box").find(".comment-collapse p").html("<p>" + (currentComCount+1) + " kommentarer</p>"); }
    
    $comment.closest(".group-post-box").find(".comment-collapse i").html("<p>" + (currentComCount+1) + "</p>");

    setTimeout(function() {
        $comment.closest(".post-comment").find(".user-container-comment").removeClass('new-comment');
    }, 4000);
}

/*
    Kaller på getPost.php som henter ut alle poster via ajax, og legger den inn i group-post (som ligger i html kode for grupper)
*/
function listPosts()
{
    $.ajax({
        url:'../PHP/getPost.php',
        success:function(response){
            $('.group-post').html(response);
        }
    })
}
/*
    Funksjonen kaller på getComment.php som henter ut alle kommentarer under en post via ajax
*/
function listComment(id)
{
    var com_id = "";
    $.ajax({
        url:'../PHP/getComment.php?postId=' + id,
        success:function(response){
            com_id = $(response).find("#comment_ID").val();
            $("#comment_post_ID[value='" + id + "']").closest(".comment-container").find(".comment-toggle").html(response);
            showNewComment(com_id);
        }
    })
}

/*
    Henter informasjonen fra tittel og innhold når man trykker submit, og sender det til savePost som legger det inn i databasen.
    Kjører også funksjonen listPosts() på success som henter de ut igjen fra database.
*/
$('.submit-post').click(function()
{
    document.getElementById("post-submit-ID").disabled = true;
    var header = $(".tittel").val();
    var post = $(".innhold").val();
    $.ajax({
        url:'../PHP/savePost.php',
        data: { tittel: header, textarea: post },
        type:'post',
        success:function()
        {
            clearPostField();
            listPosts();  
            TooltipMessage('Innlegg publisert');     
        },
        error: function () {
            TooltipMessage('Publisering feilet');  
        }
    })
});

/*
    Henter informasjon fra kommentar tekst-felt, og sender det til saveComment.php som legger det inn i database.
    På success kjører den også listComment som legger kommentarer ut igjen fra database, og under posten den hører til.
*/
$('body').on('click', '#submit-comment_ID', function()
{
    var innhold = $(this).closest(".inputContainer").find(".input").val();
    var post_id = $(this).closest(".inputContainer").find("#comment_post_ID").val();
    $(this).closest(".comment-container").find(".comment-toggle").slideDown();
    $.ajax({
        url:'../PHP/saveComment.php',
        data: { comment: innhold, p_id: post_id },
        type:'post',
        success:function()
        {
            listComment(post_id);
            clearCommentField(post_id);
            TooltipMessage('Kommentar publisert');
        },
        error: function () {
            TooltipMessage('Kommentar publisering feilet');
        }
    })
});





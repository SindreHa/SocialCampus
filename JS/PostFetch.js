window.onload = function(){
    listPosts();
}

$('body').on('click', '.post-submit-ID, #submit-comment_ID', function(event)
{
    event.preventDefault()
});

$('body').on('keyup', '#comment-input', function(event)
{
    var textRegex = /^\s*$/;
    if (!$(this).val().match(textRegex)) {
        $(this).closest(".inputContainer").find(".sumbit-comment").prop('disabled', false)
    }
    else {
        $(this).closest(".inputContainer").find(".sumbit-comment").prop('disabled', true)
    }
});

function clearPostField(){
    document.getElementById("post-title-ID").value = "";
    document.getElementById("text-area-ID").value = "";
}

function clearCommentField(id){
    $("#comment_post_ID[value='" + id + "']").closest(".inputContainer").find(".input").val("");
    $("#comment_post_ID[value='" + id + "']").closest(".inputContainer").find(".sumbit-comment").prop('disabled', true)
}

function showNewComment(id) {
    $("#comment_ID[value='" + id + "']").closest(".post-comment").find(".user-container-comment").addClass('new-comment').delay(2000);
    setTimeout(function() {
        $("#comment_ID[value='" + id + "']").closest(".post-comment").find(".user-container-comment").removeClass('new-comment');
    }, 4000);
}

function listPosts()
{
    $.ajax({
        url:'../PHP/getPost.php',
        success:function(response){
            $('.group-post').html(response);
        }
    })
}

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
$(function()
{
    document.getElementById("post-submit-ID").disabled = true;
});

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





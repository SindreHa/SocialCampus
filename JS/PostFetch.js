window.onload = function(){
    listPosts();
}

$('body').on('click', '.post-submit-ID, #submit-comment_ID', function(event)
{
    event.preventDefault()
});


  function clearPostField(){
      document.getElementById("post-title-ID").value = "";
      document.getElementById("text-area-ID").value = "";
  }

var submit = document.getElementById("post-submit-ID");

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
    $.ajax({
        url:'../PHP/getComment.php?postId=' + id,
        success:function(response){
            $("#comment_post_ID[value='" + id + "']").closest(".comment-container").find(".comment-toggle").html(response);
            // $('.comment-toggle').html(response);
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
    // console.log("klikk");
    // document.getElementById("comment-submit-ID").disabled = true;
    var innhold = $(this).closest(".inputContainer").find(".input").val();
    var post_id = $(this).closest(".inputContainer").find("#comment_post_ID").val();
    // console.log(innhold + "\n" + post_id);
    $.ajax({
        url:'../PHP/saveComment.php',
        data: { comment: innhold, p_id: post_id },
        type:'post',
        success:function()
        {
            listComment(post_id);
            TooltipMessage('Kommentar publisert');
        },
        error: function () {
            TooltipMessage('Kommentar publisering feilet');
        }
    })
});





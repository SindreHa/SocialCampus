window.onload = function(){
    listPosts();
}

document.getElementById("submit-comment_ID").addEventListener("click", function(event)
{
    event.preventDefault()
  });

  function clearPostField(){
      document.getElementById("post-title-ID").value = "";
      document.getElementById("text-area-ID").value = "";
  }

var submit = document.getElementById("post-submit-ID");

$(function()
{
    // document.getElementById("comment-submit-ID").disabled = true;
})

$('.submit-comment').click(function()
{
    console.log("klikk");
    // document.getElementById("comment-submit-ID").disabled = true;
    var innhold = $(this).$(".input").val();
    var post_id = $(this).$(".comment_post_ID").val();
    $.ajax({
        url:'../HTML/gruppeEksempel.php',
        data: { comment: innhold, id: post_id },
        type:'post',
        success:function()
        {
            // clearPostField();
            // listPosts();       
        }
    })
})





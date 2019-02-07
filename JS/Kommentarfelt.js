window.onload = function(){
    listComments();
}

document.getElementById("post-submit-ID").addEventListener("click", function(event)
{
    event.preventDefault()
  });

  function clearCommentField(){
      document.getElementById("post-title-ID").value = "";
      document.getElementById("text-area-ID").value = "";
  }

var submit = document.getElementById("post-submit-ID");

function listComments()
{
    $.ajax({
        url:'../PHP/getComment.php',
        success:function(response){
            $('.group-post').html(response);
        }
    })
}
$(function()
{
    document.getElementById("post-submit-ID").disabled = true;
    setInterval(function()
    {
        listComments();
    }, 1000);
    })

    $('.submit-comment').click(function()
    {
        document.getElementById("post-submit-ID").disabled = true;
        var comment = $(".innhold").val();
        $.ajax({
            url:'../HTML/gruppeEksempel.php',
            data: { textarea: comment },
            type:'post',
            success:function()
            {
                clearCommentField();
                listComments();       
            }
        })
    })





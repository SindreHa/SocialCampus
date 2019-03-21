window.onload = function(){
    listPosts();
}

$('body').on('click', '#submit-comment_ID', function(event)
{
    event.preventDefault()
});

$('body').on('click', '.post-submit-ID', function(event)
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
$(function()
{
    document.getElementById("post-submit-ID").disabled = true;
    })

    $('.submit-post').click(function()
    {
        document.getElementById("post-submit-ID").disabled = true;
        var header = $(".tittel").val();
        var post = $(".innhold").val();
        $.ajax({
            url:'../HTML/gruppeEksempel.php',
            data: { tittel: header, textarea: post },
            type:'post',
            success:function()
            {
                clearPostField();
                listPosts();       
            }
        })
    })





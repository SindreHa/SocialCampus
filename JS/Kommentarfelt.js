window.onload = function(){
    listPosts();
}

document.getElementById("post-submit-ID").addEventListener("click", function(event)
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
    setInterval(function()
    {
        listPosts();
    }, 1000);
    })

    $('.submit-comment').click(function()
    {
        document.getElementById("post-submit-ID").disabled = true;
        var post = $(".innhold").val();
        $.ajax({
            url:'../HTML/gruppeEksempel.php',
            data: { headline: post, textarea: post },
            type:'post',
            success:function()
            {
                clearPostField();
                listPosts();       
            }
        })
    })





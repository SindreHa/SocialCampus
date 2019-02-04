/*
document.getElementById("post-submit-ID").addEventListener("click", function(event){
    event.preventDefault()
  });

var submit = document.getElementById("post-submit-ID");

function listComments()
{
    $.ajax({
        url:'../PHP/getComment.php',
        success:function(res){
            $('.group-post').html(res);
        }
    })
}
$(function()
{
    setInterval(function()
    {
        listComments();
    }, 1000);
    })

    $('.submit').click(function()
    {
        var comment = $(".innhold").val();
        $.ajax({
            url:'../HTML/gruppeEksempel.php',
            data: comment,
            type:'post',
            success:function(res){
                $(comment).html(res);
                console.log(comment);
            }
        })
    })

*/



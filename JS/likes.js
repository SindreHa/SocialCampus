$(document).ready(function(){
    // Når bruker trykker like
    $('body').on('click', '.like', function(){
        var post_id = $(this).data('post-id');
        var com_id = $(this).data('com-id');
        $post = $(this);
        var antLikes = parseInt($(this).find('.ant-likes').text());

        $.ajax({
            url: 'gruppeEksempel.php',
            type: 'post',
            data: {
                'liked': 1,
                'post-id': post_id,
                'com-id': com_id
            },
            success: function(response){
                // console.log("Likt");
                $post.find('.ant-likes').text(antLikes+1);
                $post.find('.liked').addClass('hide');
                $post.find('.unliked').removeClass('hide');
                $post.find('.unliked').addClass('like-animation');
                $post.removeClass('like');
                $post.addClass('unlike');
            }
        });
    });

    // når bruker trykker vekk like
    $('body').on('click', '.unlike', function(){
        var post_id = $(this).data('post-id');
        var com_id = $(this).data('com-id');
        $post = $(this);
        var antLikes = parseInt($(this).find('.ant-likes').text());

        $.ajax({
            url: 'gruppeEksempel.php',
            type: 'post',
            data: {
                'unliked': 1,
                'post-id': post_id,
                'com-id': com_id
            },
            success: function(response){
                // console.log("Ulikt");
                $post.find('.ant-likes').html(antLikes-1);
                $post.find('.unliked').addClass('hide');
                $post.find('.liked').removeClass('hide');
                $post.find('.liked').addClass('dislike-animation');
                $post.removeClass('unlike');
                $post.addClass('like');
            }
        });
    });
});
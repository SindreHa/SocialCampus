
/*
    Funksjon for like/dislike. Når bruker trykker like knapp hentes all nødvendig informasjon som sendes
    videre via POST til php som setter inn/sletter fra databasen. På suksess kjøres også CSS endringer
    for å vise animasjon på tommepl opp knappen. Elementet byttes også ut med like/dislike html element siden
    hvert element har hver sin funksjon.
*/

$(document).ready(function(){
    // Når bruker trykker like
    $('body').on('click', '.like', function(e){
        e.preventDefault();
        $post = $(this);
        var url = $post.attr('href');
        var post_id = $post.data('post-id');
        var com_id = $post.data('com-id');
        var antLikes = parseInt($post.find('.ant-likes').text());

        $.ajax({
            url: url,
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
    $('body').on('click', '.unlike', function(e){
        e.preventDefault();
        $post = $(this);
        var url = $post.attr('href');
        var post_id = $post.data('post-id');
        var com_id = $post.data('com-id');
        var antLikes = parseInt($post.find('.ant-likes').text());

        $.ajax({
            url: url,
            type: 'post',
            data: {
                'unliked': 1,
                'post-id': post_id,
                'com-id': com_id
            },
            success: function(response){
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
$(document).ready(function(){
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items:4,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:3000,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                loop:true
            },
            600:{
                items:3,
                loop:true
            },
            1000:{
                items:5,
                loop:true
            }
        }
    });

    $('input.request_snd').click(function(event) {
        event.preventDefault();
        var id = $(this).closest('p').find('input[type=text]').val();
        $.post( 'includes/send_request.php', { friend_id: id, }, function(data,status){
            location.reload();
        });
    });

    $('input.add_friend').on('click', function(event) {
        event.preventDefault();
        var id = $(this).closest('p').find('input.friend_request_id').val();
        var row_id = $(this).closest('p').find('input.relat_row').val();
        var action = 'accept';
        $.post( 'includes/manage_requests.php', { request_id: id, action: action, row_id: row_id}, function(data,status){
            location.reload();
        });
    });

    $('input.deny_friend').on('click', function(event) {
        event.preventDefault();
        var id = $(this).closest('p').find('input.friend_request_id').val();
        var row_id = $(this).closest('p').find('input.relat_row').val();
        var action = 'deny';
        $.post('includes/manage_requests.php', {
            request_id: id,
            action: action,
            row_id: row_id
        }, function (data, status) {
            location.reload();
        });
    });

    $('a.delete_friend').click(function(event) {
        event.preventDefault();
        var row_id = $(this).closest('p').find('input[type="hidden"]').val();
        $.post( 'includes/delete_friends.php', {row_id: row_id}, function(data,status){
            location.reload();
        });
    });
});
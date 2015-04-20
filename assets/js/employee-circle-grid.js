jQuery( document ).ready( function( $ ) {
$('.person-img').each(function() {
    $(this).css('background-image', 'url('+$(this).data('backimg')+')');
});
});
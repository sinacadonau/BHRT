$(function() {
    $('.timeline').on('click', '.period', function() {
        $('.period').removeClass('period-active');
        $(this).addClass('period-active');
    })
})

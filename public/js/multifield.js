function bind_multifield() {

    $('.multifield-wrapper').each(function() {
        var $wrapper = $('.multifields', this);
        $(".multifield-add", $(this)).click(function(e) {
            $('.multifield:first-child', $wrapper).clone(true).appendTo($wrapper).find('.multifield-element').val('').focus();
        });
        $('.multifield .multifield-remove', $wrapper).click(function() {
            if ($('.multifield', $wrapper).length > 1)
                $(this).closest('.multifield').remove();
        });
    });
}


$(function() {
    bind_multifield();
});

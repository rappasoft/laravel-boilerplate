$(function() {
    $(".show-permissions").click(function(e) {
        e.preventDefault();
        var role = $(this).data('role');
        var permissions = $(".permission-list[data-role='"+role+"']");
        console.log(permissions);

        if (permissions.hasClass('hidden')) {
            permissions.removeClass('hidden');
            $(this).find('.show-hide').html("Hide");
        } else {
            permissions.addClass('hidden');
            $(this).find('.show-hide').html("Show");
        }
    });
});
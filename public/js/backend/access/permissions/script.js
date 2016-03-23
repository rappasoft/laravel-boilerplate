$(function() {
    $(".show-permissions").click(function(e) {
        e.preventDefault();
        var $this = $(this);
        var role = $this.data('role');
        var permissions = $(".permission-list[data-role='"+role+"']");
        var hideText = $this.find('.hide-text');
        var showText = $this.find('.show-text');
        // console.log(permissions); // for debugging

        // show permission list
        permissions.toggleClass('hidden');

        // toggle the text Show/Hide for the link
        hideText.toggleClass('hidden');
        showText.toggleClass('hidden');
    });
});

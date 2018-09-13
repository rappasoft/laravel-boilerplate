// Loaded after CoreUI app.js
(function ($) {
    let dataTableObject = $(".table").DataTable();

    $('.table tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        }
        else {
            dataTableObject.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
})(jQuery);

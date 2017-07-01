$(function () {
    $.fn.dataTableExt.oApi.clearSearch = function (oSettings) {
        var table = this,
            clearSearch = $('<button class="btn btn-search btn-sm" type="button" title="Clear">x</button>');

        $(clearSearch).click(function () {
            table.fnFilter('');
            $('input[type=search]').val('');
        });

        $(oSettings.nTableWrapper).find('div.dataTables_filter label').append(clearSearch);
    };

    $.fn.dataTable.models.oSettings['aoInitComplete'].push({
        fn: $.fn.dataTableExt.oApi.clearSearch,
        sName: 'myClearSearch'
    });
});
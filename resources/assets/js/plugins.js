/**
 * Allows you to add data-method="METHOD to links to automatically inject a form
 * with the method on click
 *
 * Example: <a href="{{route('customers.destroy', $customer->id)}}"
 * data-method="delete" name="delete_item">Delete</a>
 *
 * Injects a form with that's fired on click of the link with a DELETE request.
 * Good because you don't have to dirty your HTML with delete forms everywhere.
 */
function addDeleteForms() {
    $('[data-method]').append(function () {
        if (! $(this).find('form').length > 0)
            return "\n" +
                "<form action='" + $(this).attr('href') + "' method='POST' name='delete_item' style='display:none'>\n" +
                "<input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" +
                "<input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" +
                "</form>\n";
        else
            return "";
    })
        .removeAttr('href')
        .attr('style', 'cursor:pointer;')
        .attr('onclick', '$(this).find("form").submit();');
}

/**
 * Place any jQuery/helper plugins in here.
 */
$(function(){
    let $loading = $('.loader');

    $(document).ajaxStart(function () {
        $loading.show();
    }).ajaxError(function (event, jqxhr, settings, thrownError) {
        $loading.hide();
        location.reload();
    }).ajaxStop(function () {
        $loading.hide();
    }).on('draw.dt', function() {
        addDeleteForms();
    });

    /**
     * Add the data-method="delete" forms to all delete links
     */
    addDeleteForms();

    /**
     * Place the CSRF token as a header on all pages for access in AJAX requests
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**
     * Bind all bootstrap tooltips & popovers
     */
    $("[data-toggle='tooltip']").tooltip();
    $("[data-toggle='popover']").popover();

    /**
     * Generic confirm form delete using Sweet Alert
     */
    $('body').on('submit', 'form[name=delete_item]', function(e){
        e.preventDefault();

        let form = this,
            link = $('a[data-method="delete"]'),
            cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel",
            confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Yes, delete",
            title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Warning",
            text = (link.attr('data-trans-text')) ? link.attr('data-trans-text') : "Are you sure you want to delete this item?";

        swal({
            title: title,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: cancel,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: confirm,
            closeOnConfirm: true
        }, function(confirmed) {
            if (confirmed)
                form.submit();
        });
    }).on('click', 'a[name=confirm_item]', function(e){
        /**
         * Generic 'are you sure' confirm box
         */
        e.preventDefault();

        let link = $(this),
            title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Are you sure you want to do this?",
            cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel",
            confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Continue";

        swal({
            title: title,
            type: "info",
            showCancelButton: true,
            cancelButtonText: cancel,
            confirmButtonColor: "#3C8DBC",
            confirmButtonText: confirm,
            closeOnConfirm: true
        }, function(confirmed) {
            if (confirmed)
                window.location = link.attr('href');
        });
    }).on('click', function (e) {
        /**
         * This closes popovers when clicked away from
         */
        $('[data-toggle="popover"]').each(function () {
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });
});

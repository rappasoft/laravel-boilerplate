/**
 * Place any jQuery/helper plugins in here.
 */
$(function () {
    /**
     * Checkbox tree for permission selecting
     */
    $('#tree :checkbox').on('change', function (e){
        e.stopPropagation();
        let clk_checkbox = $(this),
            chk_state = clk_checkbox.is(':checked'),
            parent_li = clk_checkbox.closest('li'),
            parent_uls = parent_li.parents('ul');
        parent_li.find(':checkbox').prop('checked', chk_state).attr('disabled', chk_state);
        parent_uls.each(function(){
            let parent_ul = $(this),
                parent_state = (parent_ul.find(':checkbox').length === parent_ul.find(':checked').length);
            parent_ul.siblings(':checkbox').prop('checked', parent_state).attr('disabled', parent_state);
        });
        clk_checkbox.removeAttr('disabled');
    });

    /**
     * Disable submit inputs in the given form
     *
     * @param form
     */
    function disableSubmitButtons(form) {
        form.find('input[type="submit"]').attr('disabled', true);
        form.find('button[type="submit"]').attr('disabled', true);
    }

    /**
     * Enable the submit inputs in a given form
     *
     * @param form
     */
    function enableSubmitButtons(form) {
        form.find('input[type="submit"]').removeAttr('disabled');
        form.find('button[type="submit"]').removeAttr('disabled');
    }

    /**
     * Disable all submit buttons once clicked
     */
    $('form').submit(function () {
        disableSubmitButtons($(this));
        return true;
    });

    /**
     * Add a confirmation to a delete button/form
     */
    $('body').on('submit', 'form[name=delete-item]', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure you want to delete this item?',
            showCancelButton: true,
            confirmButtonText: 'Confirm Delete',
            cancelButtonText: 'Cancel',
            icon: 'warning'
        }).then((result) => {
            if (result.value) {
                this.submit()
            } else {
                enableSubmitButtons($(this));
            }
        });
    }).on('click', 'a[name=confirm-item]', function (e) {
        /**
         * Add an 'are you sure' pop-up to any button/link
         */
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure you want to do this?',
            showCancelButton: true,
            confirmButtonText: 'Continue',
            cancelButtonText: 'Cancel',
            icon: 'info',
        }).then((result) => {
            result.value && window.location.assign($(this).attr('href'));
        });
    });

    // Remember tab on page load
    $('a[data-toggle="tab"], a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
        let hash = $(e.target).attr('href');
        history.pushState ? history.pushState(null, null, hash) : location.hash = hash;
    });

    let hash = window.location.hash;
    if (hash) {
        $('.nav-link[href="'+hash+'"]').tab('show');
    }
});

var lbp = lbp || {};
(function () {

    if (!toastr) {
        return;
    }
    lbp.notify = lbp.notify || {};
    /* DEFAULTS *************************************************/
    var toastOptionsDefault = {
        closeButton: false,
        positionClass: "toast-top-right",
        preventDuplicates: false
    };

    /* NOTIFICATION *********************************************/

    var showNotification = function (type, message, title, optionsByUser) {
        var optionsMerged = $.extend(
            {},
            toastOptionsDefault,
            optionsByUser
        );
        toastr[type](message, title, optionsMerged);
    };

    lbp.notify.success = function (message, title, options) {
        showNotification('success', message, title, options);
    };

    lbp.notify.info = function (message, title, options) {
        showNotification('info', message, title, options);
    };

    lbp.notify.warn = function (message, title, options) {
        showNotification('warning', message, title, options);
    };

    lbp.notify.error = function (message, title, options) {
        showNotification('error', message, title, options);
    };

})(jQuery);

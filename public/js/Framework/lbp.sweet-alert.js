var lbp = lbp || {};
(function ($) {
    if (!swal || !$) {
        return;
    }

    /* DEFAULTS *************************************************/

    lbp.libs = lbp.libs || {};
    lbp.message = lbp.message || {};
    lbp.libs.sweetAlert = {
        config: {
            'default': {},
            info: {
                type: 'info'
            },
            success: {
                type: 'success'
            },
            warn: {
                type: 'warning'
            },
            error: {
                type: 'error'
            },
            confirm: {
                type: 'warning',
                title: 'Are you sure?',
                cancelButtonText: "No",
                confirmButtonText: "Si",
                showCancelButton: true
            }
        }
    };

    /* MESSAGE **************************************************/

    var showMessage = function (type, message, title) {
        if (!title) {
            title = message;
            message = undefined;
        }

        return $.Deferred(function ($dfd) {
            swal({
                type: type,
                title: title,
                text: message
            }).then(function () {
                $dfd.resolve();
            });
        });
    };

    lbp.message.info = function (message, title) {
        return showMessage('info', message, title);
    };

    lbp.message.success = function (message, title) {
        return showMessage('success', message, title);

    };

    lbp.message.warn = function (message, title) {
        return showMessage('warn', message, title);

    };

    lbp.message.error = function (message, title) {
        return showMessage('error', message, title);
    };

    lbp.message.confirm = function (message, titleOrCallback, callback) {
        var userOpts = {
            text: message
        };

        if ($.isFunction(titleOrCallback)) {
            callback = titleOrCallback;
        } else if (titleOrCallback) {
            userOpts.title = titleOrCallback;
        }

        var opts = $.extend(
            {},
            lbp.libs.sweetAlert.config['default'],
            lbp.libs.sweetAlert.config.confirm,
            userOpts
        );
        console.log(opts);

        return $.Deferred(function ($dfd) {
            swal(opts).then(function (isConfirmed) {
                callback && callback(isConfirmed);
                $dfd.resolve(isConfirmed);
            });
        });
    };

})(jQuery);

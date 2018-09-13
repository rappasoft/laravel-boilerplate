var lbp = lbp || {};
(function ($) {

    if (!$.blockUI) {
        return;
    }
    lbp.ui = lbp.ui || {};
    $.extend($.blockUI.defaults, {
        message: '<img src="http://www.broadwaybalancesamerica.com/images/ajax-loader.gif" />',
        css: {
            position: 'fixed',
            margin: 'auto'
        },
        centerY: true,
        centerX: true,
        baseZ: 1500,
        overlayCSS: {
            backgroundColor: '#FFFFFF',
            opacity: 0.7,
            cursor: 'wait'
        }
    });

    lbp.ui.block = function (elm) {
        if (!elm) {
            $(".app-body").block();
        } else {
            $(elm).block();
        }
    };

    lbp.ui.unblock = function (elm) {
        if (!elm) {
            $(".app-body").unblock();
        } else {
            $(elm).unblock();
        }
    };

})(jQuery);

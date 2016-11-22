<style>
    .stack-content {
        padding: 8px;
        background-color: #F6F6F6;
        border-top: 1px solid #D1D1D1;
        color: #AE0E0E;
        font-family: consolas,sans-serif;
        font-size: 12px;
    }

    .info-box.level {
        display: block;
        padding: 0;
        margin-bottom: 15px;
        min-height: 70px;
        background: #fff;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        border-radius: 2px;
    }

    .info-box.level .info-box-text,
    .info-box.level .info-box-number,
    .info-box.level .info-box-icon > i {
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
    }

    .info-box.level .info-box-text {
        display: block;
        font-size: 14px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .info-box.level .info-box-content {
        padding: 5px 10px;
        margin-left: 70px;
    }

    .info-box.level .info-box-number {
        display: block;
        font-weight: bold;
        font-size: 18px;
    }

    .info-box.level .info-box-icon {
        border-radius: 2px 0 0 2px;
        display: block;
        float: left;
        height: 70px; width: 70px;
        text-align: center;
        font-size: 40px;
        line-height: 70px;
        background: rgba(0,0,0,0.2);
    }

    .info-box.level .progress {
        background: rgba(0,0,0,0.2);
        margin: 5px -10px 5px -10px;
        height: 2px;
    }

    .info-box.level .progress .progress-bar {
        background: #fff;
    }

    .info-box.level-empty {
        opacity: .6;
        -webkit-filter: grayscale(1);
           -moz-filter: grayscale(1);
            -ms-filter: grayscale(1);
                filter: grayscale(1);
        -webkit-transition: all 0.2s ease-in-out;
           -moz-transition: all 0.2s ease-in-out;
             -o-transition: all 0.2s ease-in-out;
                transition: all 0.2s ease-in-out;
        -webkit-transition-property: -webkit-filter, opacity;
           -moz-transition-property: -moz-filter, opacity;
             -o-transition-property: filter, opacity;
                transition-property: -webkit-filter, -moz-filter, -o-filter, filter, opacity;
    }

    .info-box.level-empty:hover {
        opacity: 1;
        -webkit-filter: grayscale(0);
           -moz-filter: grayscale(0);
            -ms-filter: grayscale(0);
                filter: grayscale(0);
    }

    .level {
        padding: 2px 6px;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        border-radius: 2px;
        font-size: .9em;
        font-weight: 600;
    }

    .badge.level-all,
    .badge.level-emergency,
    .badge.level-alert,
    .badge.level-critical,
    .badge.level-error,
    .badge.level-warning,
    .badge.level-notice,
    .badge.level-info,
    .badge.level-debug,
    .level, .level i,
    .info-box.level-all,
    .info-box.level-emergency,
    .info-box.level-alert,
    .info-box.level-critical,
    .info-box.level-error,
    .info-box.level-warning,
    .info-box.level-notice,
    .info-box.level-info,
    .info-box.level-debug {
        color: #FFF;
    }

    .label-env {
        font-size: .85em;
    }

    .badge.level-all, .level.level-all, .info-box.level-all {
        background-color: {{ log_styler()->color('all') }};
    }

    .badge.level-emergency, .level.level-emergency, .info-box.level-emergency {
        background-color: {{ log_styler()->color('emergency') }};
    }

    .badge.level-alert, .level.level-alert, .info-box.level-alert  {
        background-color: {{ log_styler()->color('alert') }};
    }

    .badge.level-critical, .level.level-critical, .info-box.level-critical {
        background-color: {{ log_styler()->color('critical') }};
    }

    .badge.level-error, .level.level-error, .info-box.level-error {
        background-color: {{ log_styler()->color('error') }};
    }

    .badge.level-warning, .level.level-warning, .info-box.level-warning {
        background-color: {{ log_styler()->color('warning') }};
    }

    .badge.level-notice, .level.level-notice, .info-box.level-notice {
        background-color: {{ log_styler()->color('notice') }};
    }

    .badge.level-info, .level.level-info, .info-box.level-info {
        background-color: {{ log_styler()->color('info') }};
    }

    .badge.level-debug, .level.level-debug, .info-box.level-debug {
        background-color: {{ log_styler()->color('debug') }};
    }

    .badge.level-empty, .level.level-empty {
        background-color: {{ log_styler()->color('empty') }};
    }

    .badge.label-env, .label.label-env {
        background-color: #6A1B9A;
    }
</style>

<style>
    html {
        position: relative;
        min-height: 100%;
    }

    body {
        padding-top: 50px;
        /* Margin bottom by footer height */
        margin-bottom: 50px;
        font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, sans-serif;
        font-weight: 600;
    }

    h1, h2, h3 {
        font-family: 'Montserrat', 'Helvetica Neue', Helvetica, sans-serif;
    }

    .sub-header {
        padding-bottom: 10px;
        border-bottom: 1px solid #EEE;
    }

    .navbar-inverse {
        background-color: #1a237e;
        border-color: #1a237e;
    }

    .navbar-inverse .navbar-nav>.active>a,
    .navbar-inverse .navbar-nav>.active>a:focus,
    .navbar-inverse .navbar-nav>.active>a:hover {
        background-color: #3949ab;
    }

    .navbar-inverse .navbar-brand {
        color: #c5cae9;
    }

    .navbar-inverse .navbar-nav>li>a {
        color: #c5cae9;
    }

    .navbar-fixed-top {
        border: 0;
    }

    .main {
        padding: 20px;
    }

    .main .page-header {
        margin-top: 0;
    }

    footer.main-footer {
        position: absolute;
        padding: 10px 0;
        bottom: 0;
        width: 100%;
        background-color: #e8eaf6;
        font-weight: 600;
    }

    footer.main-footer p {
        margin: 0;
    }

    footer.main-footer i.fa.fa-heart {
        color: #C62828;
    }

    /* Log level labels & progress bars */
    .label-env {
        padding: 2px 6px;
        background-color: #6A1B9A;
        font-size: .85em;
    }

    span.level {
        padding: 2px 6px;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        border-radius: 2px;
        font-size: .9em;
        font-weight: 600;
    }

    .progress {
        margin-bottom: 10px;
    }

    .progress-bar,
    span.level,
    span.level i {
        color: #FFF;
    }

    span.level.level-empty {
        background-color: {{ log_styler()->color('empty') }};
    }

    .progress-bar.level-all,
    span.level.level-all,
    .badge.level-all {
        background-color: {{ log_styler()->color('all') }};
    }

    .progress-bar.level-emergency,
    span.level.level-emergency,
    .badge.level-emergency {
        background-color: {{ log_styler()->color('emergency') }};
    }

    .progress-bar.level-alert,
    span.level.level-alert,
    .badge.level-alert {
        background-color: {{ log_styler()->color('alert') }};
    }

    .progress-bar.level-critical,
    span.level.level-critical,
    .badge.level-critical {
        background-color: {{ log_styler()->color('critical') }};
    }

    .progress-bar.level-error,
    span.level.level-error,
    .badge.level-error {
        background-color: {{ log_styler()->color('error') }};
    }

    .progress-bar.level-warning,
    span.level.level-warning,
    .badge.level-warning {
        background-color: {{ log_styler()->color('warning') }};
    }

    .progress-bar.level-notice,
    span.level.level-notice,
    .badge.level-notice {
        background-color: {{ log_styler()->color('notice') }};
    }

    .progress-bar.level-info,
    span.level.level-info,
    .badge.level-info {
        background-color: {{ log_styler()->color('info') }};
    }

    .progress-bar.level-debug,
    span.level.level-debug,
    .badge.level-debug {
        background-color: {{ log_styler()->color('debug') }};
    }
</style>

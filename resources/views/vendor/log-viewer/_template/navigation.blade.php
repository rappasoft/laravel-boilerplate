<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a href="{{ route('log-viewer::dashboard') }}" class="navbar-brand">
        <i class="fas fa-fw fa-book"></i> LogViewer
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLogviewerLinks" aria-controls="navbarLogviewerLinks" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarLogviewerLinks">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Route::is('log-viewer::dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('log-viewer::dashboard') }}">
                    <i class="fas fa-tachometer"></i> Dashboard
                </a>
            </li>
            <li class="nav-item {{ Route::is('log-viewer::logs.list') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('log-viewer::logs.list') }}">
                    <i class="fas fa-archive"></i> Logs
                </a>
            </li>
        </ul>
    </div>
</nav>

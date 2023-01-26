<?php ?>
<ul class="header-nav me-3">
    <li class="nav-item dropdown d-md-down-none">
        <a class="nav-link" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">
            <i class="icon icon-lg my-1 mx-2 cil-bell"></i>
            <span class="badge rounded-pill position-absolute top-0 end-0 bg-danger">1</span>
        </a>

        <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg pt-0">
            <div class="dropdown-header bg-light"><strong>You have 5 notifications</strong></div>
            <a class="dropdown-item" href="#">
                <i class="icon me-2 text-success cil-user-follow"></i>
                New user registered
            </a>

            <div class="dropdown-header bg-light"><strong>Server</strong></div>

            <a class="dropdown-item d-block" href="#">
                <div class="text-uppercase mb-1"><small><b>CPU Usage</b></small></div>
                <span class="progress progress-thin">
                    <div class="progress-bar bg-info w-25" role="progressbar" aria-valuenow="25"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </span>
                <small class="text-medium-emphasis">348 Processes. 1/4 Cores.</small>
            </a>
        </div>
    </li>
</ul>

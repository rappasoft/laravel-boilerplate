<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image" />
            </div><!--pull-left-->
            <div class="pull-left info">
                <p>{{ access()->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="{{ trans('strings.backend.general.search_placeholder') }}" />
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
            </div><!--input-group-->
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Active::pattern('admin/dashboard') }}">
                {{ link_to_route('admin.dashboard', trans('menus.backend.sidebar.dashboard')) }}
            </li>

            @permission('manage-users')
                <li class="{{ Active::pattern('admin/access/*') }}">
                    {{ link_to_route('admin.access.user.index', trans('menus.backend.access.title')) }}
                </li>
            @endauth

            <li class="{{ Active::pattern('admin/log-viewer*') }} treeview">
                <a href="#">
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ Active::pattern('admin/log-viewer*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="{{ Active::pattern('admin/log-viewer') }}">
                        {{ link_to('admin/log-viewer', trans('menus.backend.log-viewer.dashboard')) }}
                    </li>
                    <li class="{{ Active::pattern('admin/log-viewer/logs') }}">
                        {{ link_to('admin/log-viewer/logs', trans('menus.backend.log-viewer.logs')) }}
                    </li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>
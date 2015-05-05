    <div class="pull-right" style="margin-bottom:10px">
        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              Users <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('admin.access.users.index')}}">All Users</a></li>
            <li><a href="{{route('admin.access.users.create')}}">Create User</a></li>
            <li class="divider"></li>
            <li><a href="{{route('admin.access.users.deactivated')}}">Deactivated Users</a></li>
            <li><a href="{{route('admin.access.users.deleted')}}">Deleted Users</a></li>
          </ul>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              Roles <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('admin.access.roles.index')}}">All Roles</a></li>
            <li><a href="{{route('admin.access.roles.create')}}">Create Role</a></li>
          </ul>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              Permissions <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('admin.access.roles.permissions.index')}}">All Permissions</a></li>
            <li><a href="{{route('admin.access.roles.permissions.create')}}">Create Permission</a></li>
          </ul>
        </div>
    </div>

    <div class="clearfix"></div>
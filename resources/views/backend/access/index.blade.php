@extends ('backend.layouts.master')

@section ('title', 'User Management')

@section('page-header')
    <h1>
        User Management
        <small>Active Users</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">{!! link_to_route('admin.access.users.index', 'User Management') !!}</li>
@stop

@section('content')
    @include('backend.access.includes.partials.header-buttons')

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Roles</th>
            <th>Other Permissions</th>
            <th class="visible-lg">Created</th>
            <th class="visible-lg">Last Updated</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{!! $user->id !!}</td>
                    <td>{!! $user->name !!}</td>
                    <td>{!! link_to("mailto:".$user->email, $user->email) !!}</td>
                    <td>
                        @if ($user->roles()->count() > 0)
                            @foreach ($user->roles as $role)
                                {!! $role->name !!}<br/>
                            @endforeach
                        @else
                            None
                        @endif
                    </td>
                    <td>
                        @if ($user->permissions()->count() > 0)
                            @foreach ($user->permissions as $perm)
                                {!! $perm->display_name !!}<br/>
                            @endforeach
                        @else
                            None
                        @endif
                    </td>
                    <td class="visible-lg">{!! $user->created_at->diffForHumans() !!}</td>
                    <td class="visible-lg">{!! $user->updated_at->diffForHumans() !!}</td>
                    <td>{!! $user->action_buttons !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-left">
        {{ $users->total() }} user(s) total
    </div>

    <div class="pull-right">
        {{ $users->render() }}
    </div>

    <div class="clearfix"></div>
@stop
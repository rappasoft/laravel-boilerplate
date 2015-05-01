@extends ('layouts.master')

@section ('title', 'User Management | Deactivated Users')

@section ('breadcrumbs')
    <ol class="breadcrumb">
        <li>{!! link_to_route('admin.access.users.index', 'Home') !!}</li>
        <li><a href="{{route('admin.access.users.index')}}">User Management</a></li>
        <li class="active"><a href="{{route('admin.access.users.deactivated')}}" class="bread-current">Deactivated Users</a></li>
    </ol>
@stop

@section('content')

	<div class="widget">

		<div class="widget-head">
			<div class="pull-left">Deactivated Users</div>

			<div class="pull-right" style="margin-bottom:10px">
				<a href="{{route('admin.access.users.index')}}" class="btn btn-success btn-xs"><i class="fa fa-user"></i> Active Users</a> <a href="{{route('admin.access.users.deleted')}}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Deleted Users</a>
			</div>

			<div class="clearfix"></div>
		</div>

		<div class="widget-content">

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
				    @if ($users->count())
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
					@else
					    <td colspan="8">No Deactivated Users</td>
					@endif
				</tbody>
			</table>

			<div class="widget-foot">
				<div class="pull-left">
					{!! $users->total() !!} user(s) total
				</div>

				<div class="pull-right">
					{!! $users->render() !!}
				</div>

				<div class="clearfix"></div>
			</div><!--widget foot-->

		</div><!--widget content-->
	</div><!--widget-->

@stop

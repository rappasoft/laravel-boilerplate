@extends ('vault::layouts.master')

@section ('title', 'User Management | Deleted Users')

@section ('breadcrumbs')
    <ol class="breadcrumb">
        <li>{!! link_to_route('access.users.index', 'Home') !!}</li>
        <li><a href="{{route('access.users.index')}}">User Management</a></li>
        <li class="active"><a href="{{route('access.users.deleted')}}" class="bread-current">Deleted Users</a></li>
    </ol>
@stop

@section('content')

	<div class="widget">

		<div class="widget-head">
			<div class="pull-left">Deleted Users</div>

			<div class="pull-right" style="margin-bottom:10px">
				<a href="{{route('access.users.index')}}" class="btn btn-success btn-xs"><i class="fa fa-user"></i> Active Users</a> <a href="{{route('access.users.deactivated')}}" class="btn btn-warning btn-xs"><i class="fa fa-user"></i> Deactivated Users</a>
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
                                <td>
                                    <a href="{{route('access.user.restore', $user->id)}}" class="btn btn-xs btn-success" name="restore_user"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Restore User"></i></a> <a href="{{route('access.user.delete-permanently', $user->id)}}" class="btn btn-xs btn-danger" name="delete_user_perm"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Delete Permanently"></i></a>
                                </td>
                            </tr>
                        @endforeach
					@else
                        <td colspan="8">No Deleted Users</td>
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

@section('after-scripts-end')
	<script>
		$(function() {
			$("a[name='delete_user_perm']").click(function() {
				return confirm("Are you sure you want to delete this user permanently? Anywhere in the application that references this user's id will most likely error. Proceed at your own risk. This can not be un-done.");
			});

			$("a[name='restore_user']").click(function() {
                return confirm("Restore this user to its original state?");
            });
		});
	</script>
@stop
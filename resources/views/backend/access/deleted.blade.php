@extends ('backend.layouts.app')

@section ('title', __('User Management') . ' | ' . __('Deleted Users'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ __('User Management') }}
        <small>{{ __('Deleted Users') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('Deleted Users') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.user-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="users-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('E-mail') }}</th>
                            <th>{{ __('Confirmed') }}</th>
                            <th>{{ __('Roles') }}</th>
                            <th>{{ __('Created') }}</th>
                            <th>{{ __('Last Updated') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

	<script>
		$(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.access.user.get") }}',
                    type: 'post',
                    data: {status: false, trashed: true}
                },
                columns: [
                    {data: 'id', name: '{{config('access.users_table')}}.id'},
                    {data: 'name', name: '{{config('access.users_table')}}.name'},
                    {data: 'email', name: '{{config('access.users_table')}}.email'},
                    {data: 'confirmed', name: '{{config('access.users_table')}}.confirmed'},
                    {data: 'roles', name: '{{config('access.roles_table')}}.name', sortable: false},
                    {data: 'created_at', name: '{{config('access.users_table')}}.created_at'},
                    {data: 'updated_at', name: '{{config('access.users_table')}}.updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });

            $("body").on("click", "a[name='delete_user_perm']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");

                swal({
                    title: "{{ __('Are you sure?') }}",
                    text: "{{ __('Are you sure you want to delete this user permanently? Anywhere in the application that references this user\'s id will most likely error. Proceed at your own risk. This can not be un-done.') }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ __('Continue') }}",
                    cancelButtonText: "{{ __('Cancel') }}",
                    closeOnConfirm: false
                }, function(isConfirmed){
                    if (isConfirmed){
                        window.location.href = linkURL;
                    }
                });
            });

            $("body").on("click", "a[name='restore_user']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");

                swal({
                    title: "{{ __('Are you sure?') }}",
                    text: "{{ __('Restore this user to its original state?') }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ __('Continue') }}",
                    cancelButtonText: "{{ __('Cancel') }}",
                    closeOnConfirm: false
                }, function(isConfirmed){
                    if (isConfirmed){
                        window.location.href = linkURL;
                    }
                });
            });
		});
	</script>
@endsection

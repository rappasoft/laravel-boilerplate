@extends ('backend.layouts.app')

@section ('title', __('Role Management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@endsection

@section('page-header')
    <h1>{{ __('Role Management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('Role Management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.role-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Role') }}</th>
                            <th>{{ __('Permissions') }}</th>
                            <th>{{ __('Number of Users') }}</th>
                            <th>{{ __('Sort') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('Recent History') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('Role') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#roles-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.access.role.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'name', name: '{{config('access.roles_table')}}.name'},
                    {data: 'permissions', name: '{{config('access.permissions_table')}}.display_name', sortable: false},
                    {data: 'users', name: 'users', searchable: false, sortable: false},
                    {data: 'sort', name: '{{config('access.roles_table')}}.sort'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
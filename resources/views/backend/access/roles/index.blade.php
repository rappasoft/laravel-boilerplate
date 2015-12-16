@extends ('backend.layouts.master')

@section ('title', trans('menus.role_management'))

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.role_management') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('menus.role_management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('crud.roles.role') }}</th>
                        <th>{{ trans('crud.roles.permissions') }}</th>
                        <th>{{ trans('crud.roles.number_of_users') }}</th>
                        <th>{{ trans('crud.roles.sort') }}</th>
                        <th>{{ trans('crud.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{!! $role->name !!}</td>
                            <td>
                                @if ($role->all)
                                    <span class="label label-success">All</span>
                                @else
                                    @if (count($role->permissions) > 0)
                                        <div style="font-size:.7em">
                                            @foreach ($role->permissions as $permission)
                                                {!! $permission->display_name !!}<br/>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="label label-danger">None</span>
                                    @endif
                                @endif
                            </td>
                            <td>{!! $role->users()->count() !!}</td>
                            <td>{!! $role->sort !!}</td>
                            <td>{!! $role->action_buttons !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {{ $roles->total() }} {{ trans('crud.roles.total') }}
            </div>

            <div class="pull-right">
                {{ $roles->render() }}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

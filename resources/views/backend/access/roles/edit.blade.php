@extends ('backend.layouts.master')

@section ('title', trans('menus.role_management') . ' | ' . trans('menus.edit_role'))

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.edit_role') }}</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li>{!! link_to_route('admin.access.users.index', trans('menus.user_management')) !!}</li>
    <li>{!! link_to_route('admin.access.roles.index', trans('menus.role_management')) !!}</li>
    <li class="active">{!! link_to_route('admin.access.roles.edit', trans('strings.edit') . ' ' . $role->name, $role->id) !!}</li>
@stop

@section('content')
    @include('backend.access.includes.partials.header-buttons')

    {!! Form::model($role, ['route' => ['admin.access.roles.update', $role->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}

        <div class="form-group">
            {!! Form::label('name', trans('validation.attributes.role_name'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.role_name')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('validation.attributes.associated_permissions') }}</label>
            <div class="col-lg-10">
                @if ($role->id != 1)
                    {{-- Administrator has to be set to all --}}
                    {!! Form::select('associated-permissions', array('all' => 'All', 'custom' => 'Custom'), $role->all ? 'all' : 'custom', ['class' => 'form-control']); !!}
                @else
                    <span class="label label-success">All</span>
                @endif

                <div id="available-permissions" class="hidden">
                    @if (count($permissions) > 0)
                        @foreach($permissions as $perm)
                            <input type="checkbox" value="{{$perm->id}}" name="role_permissions[]" id="perm-{{$perm->id}}" {{in_array($perm->id, $role_permissions) ? 'checked="checked"' : ""}} /> <label for="perm-{{$perm->id}}">{!! $perm->display_name !!}</label><br/>
                        @endforeach
                    @else
                        No permissions to set
                    @endif
                </div><!--available permissions-->
            </div><!--col-lg-3-->
        </div><!--form control-->

        <div class="well">
            <div class="pull-left">
                <a href="{!! route('admin.access.roles.index') !!}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!--well-->

    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! HTML::script('js/backend/access/roles/script.js') !!}
@stop
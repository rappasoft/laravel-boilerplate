@extends ('backend.layouts.master')

@section ('title', trans('menus.permission_management') . ' | ' . trans('menus.edit_permission'))

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.edit_permission') }}</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li>{!! link_to_route('admin.access.users.index', trans('menus.user_management')) !!}</li>
    <li>{!! link_to_route('admin.access.roles.permissions.index', trans('menus.permission_management')) !!}</li>
    <li class="active">{!! link_to_route('admin.access.roles.permissions.edit', trans('strings.edit') . ' ' . $permission->display_name, $permission->id) !!}</li>
@stop

@section('content')

    @include('backend.access.includes.partials.header-buttons')

    {!! Form::model($permission, ['route' => ['admin.access.roles.permissions.update', $permission->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}

        <div class="form-group">
            {!! Form::label('name', trans('validation.attributes.permission_name'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                <input type="text" name="name" class="form-control" placeholder="{{ trans('validation.attributes.permission_name') }}" {{$permission->system == 1 ? 'readonly="readonly"' : ''}} value="{{$permission->name}}" />
            </div>
        </div><!--form control-->

        <div class="form-group">
            {!! Form::label('display_name', trans('validation.attributes.display_name'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.display_name')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            {!! Form::label('group', trans('validation.attributes.group'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                <select name="group" class="form-control">
                    <option value="">None</option>

                    @foreach ($groups as $group)
                        <option value="{!! $group->id !!}" {!! $permission->group_id == $group->id ? "selected='selected'" : '' !!}>{!! $group->name !!}</option>
                    @endforeach
                </select>
            </div>
        </div><!--form control-->

        <div class="form-group">
            {!! Form::label('sort', trans('validation.attributes.group-sort'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('sort', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.group-sort')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('validation.attributes.associated_roles') }}</label>
            <div class="col-lg-3">
                @if (count($roles) > 0)
                    @foreach($roles as $role)
                        <input type="checkbox" {{$role->id == 1 ? "disabled='disabled'" : ''}} {{in_array($role->id, $permission_roles) || ($role->id == 1) ? 'checked="checked"' : ""}} value="{{$role->id}}" name="permission_roles[]" id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{!! $role->name !!}</label><br/>
                        <div class="clearfix"></div>
                    @endforeach
                @else
                    No Roles to set
                @endif

                @if (config('access.roles.administrator_forced'))
                    {!! Form::hidden('permission_roles[]', 1) !!}
                @endif
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('validation.attributes.system_permission') }}</label>
            <div class="col-lg-3">
                <input type="checkbox" name="system" {{$permission->system == 1 ? 'checked="checked"' : ''}} />
            </div>
        </div><!--form control-->

        <div class="well">
            <div class="pull-left">
                <a href="{!! route('admin.access.roles.permissions.index') !!}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!--well-->

    {!! Form::close() !!}
@stop
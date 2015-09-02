@extends ('backend.layouts.master')

@section ('title', trans('menus.role_management') . ' | ' . trans('menus.edit_role'))

@section ('before-styles-end')
    {!! HTML::style('css/plugin/jquery.onoff.css') !!}
@stop

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
            <div class="col-lg-3">
                @if (count($permissions) > 0)
                    @foreach($permissions as $perm)
                    {!! $perm->display_name !!}
                        <div class="sw-green create-permissions-switch">
                            <div class="onoffswitch">
                                <input type="checkbox" value="{{$perm->id}}" name="role_permissions[]" class="toggleBtn onoffswitch-checkbox" id="perm-{{$perm->id}}" {{in_array($perm->id, $role_permissions) ? 'checked="checked"' : ""}}>
                                <label for="perm-{{$perm->id}}" class="onoffswitch-label">
                                    <div class="onoffswitch-inner"></div>
                                    <div class="onoffswitch-switch"></div>
                                </label>
                            </div>
                        </div><!--green checkbox-->
                        <div class="clearfix"></div>
                    @endforeach
                @else
                    No permissions to set
                @endif
            </div>
        </div><!--form control-->

        <div class="pull-left">
            <a href="{{route('admin.access.roles.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
        </div>

        <div class="pull-right">
            <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
        </div>
        <div class="clearfix"></div>

    {!! Form::close() !!}
@stop
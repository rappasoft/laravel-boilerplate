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

        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a></li>
                <li role="presentation"><a href="#dependencies" aria-controls="dependencies" role="tab" data-toggle="tab">Dependencies</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="general" style="padding-top:20px">

                    <div class="form-group">
                        {!! Form::label('name', trans('validation.attributes.permission_name'), ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ trans('validation.attributes.permission_name') }}" {{$permission->system == 1 ? 'readonly' : ''}} value="{{$permission->name}}" />
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
                                    <option value="{!! $group->id !!}" {!! $permission->group_id == $group->id ? 'selected' : '' !!}>{!! $group->name !!}</option>
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
                                    <input type="checkbox" {{$role->id == 1 ? 'disabled' : ''}} {{in_array($role->id, $permission_roles) || ($role->id == 1) ? 'checked' : ""}} value="{{$role->id}}" name="permission_roles[]" id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{!! $role->name !!}</label><br/>
                                    <div class="clearfix"></div>
                                @endforeach
                            @else
                                No Roles to set
                            @endif
                        </div>
                    </div><!--form control-->

                    <div class="form-group">
                        <label class="col-lg-2 control-label">{{ trans('validation.attributes.system_permission') }}</label>
                        <div class="col-lg-3">
                            <input type="checkbox" name="system" {{$permission->system == 1 ? 'checked' : ''}} />
                        </div>
                    </div><!--form control-->

                </div><!--general-->

                <div role="tabpanel" class="tab-pane" id="dependencies" style="padding-top:20px">

                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i> This section is where you specify that this permission depends on the user having one or more other permissions.<br/><br/>
                        For example: This permission may be <strong>create-user</strong>, but if the user doesn't also have <strong>view-backend</strong> and <strong>view-access-management</strong> permissions they will never be able to get to the <strong>Create User</strong> screen.
                    </div><!--alert-->

                    <div class="form-group">
                        <label class="col-lg-2 control-label">{{ trans('validation.attributes.dependencies') }}</label>
                        <div class="col-lg-10">
                            @if (count($permissions))
                                @foreach (array_chunk($permissions->toArray(), 10) as $perm)
                                    <div class="col-lg-3">
                                        <ul style="margin:0;padding:0;list-style:none;">
                                            @foreach ($perm as $p)
                                                @if ($p['id'] != $permission->id)
                                                    <li><input type="checkbox" value="{{$p['id']}}" name="dependencies[]" id="permission-{{$p['id']}}" {!! in_array($p['id'], $permission_dependencies) ? 'checked' : '' !!} /> <label for="permission-{{$p['id']}}" />{!! $p['display_name'] !!}</label></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            @else
                                No permission to choose from.
                            @endif
                        </div><!--col 3-->
                    </div><!--form control-->

                </div><!--dependencies-->
            </div><!--tab content-->

        </div><!--tabs-->

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
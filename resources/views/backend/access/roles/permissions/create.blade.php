@extends ('backend.layouts.master')

@section ('title', trans('menus.permission_management') . ' | ' . trans('menus.create_permission'))

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.create_permission') }}</small>
    </h1>
@endsection

@section('content')

    @include('backend.access.includes.partials.header-buttons')

    {!! Form::open(['route' => 'admin.access.roles.permissions.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

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
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.permission_name')]) !!}
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
                                    <option value="{!! $group->id !!}">{!! $group->name !!}</option>
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
                                    <input type="checkbox" {{$role->id == 1 ? 'disabled checked' : ''}} value="{{$role->id}}" name="permission_roles[]" id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{!! $role->name !!}</label><br/>
                                @endforeach
                            @else
                                No Roles to set
                            @endif
                        </div>
                    </div><!--form control-->

                    <div class="form-group">
                        <label class="col-lg-2 control-label">{{ trans('validation.attributes.system_permission') }}</label>
                        <div class="col-lg-3">
                            <input type="checkbox" name="system" />
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
                                                <?php
                                                    //Since we are using array format to nicely display the permissions in rows
                                                    //we will just manually create an array of dependencies since we do not have
                                                    //access to the relationship to use the lists() function of eloquent
                                                    //but the relationships are eager loaded in array format now
                                                    $dependencies = [];
                                                    $dependency_list = [];
                                                    if (count($p['dependencies'])) {
                                                        foreach ($p['dependencies'] as $dependency) {
                                                            array_push($dependencies, $dependency['dependency_id']);
                                                            array_push($dependency_list, $dependency['permission']['display_name']);
                                                        }
                                                    }
                                                    $dependencies = json_encode($dependencies);
                                                    $dependency_list = implode(", ", $dependency_list);
                                                ?>

                                                <li><input type="checkbox" value="{{$p['id']}}" name="dependencies[]" data-dependencies="{!! $dependencies !!}" id="permission-{{$p['id']}}" /> <label for="permission-{{$p['id']}}" />

                                                    @if ($p['dependencies'])
                                                        <a style="color:black;text-decoration:none;" data-toggle="tooltip" data-html="true" title="<strong>Dependencies:</strong> {!! $dependency_list !!}">{!! $p['display_name'] !!} <small><strong>(D)</strong></small></a>
                                                    @else
                                                        {!! $p['display_name'] !!}
                                                    @endif

                                                </label></li>
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

@section('after-scripts-end')
    {!! HTML::script('js/backend/access/permissions/dependencies/script.js') !!}
@stop
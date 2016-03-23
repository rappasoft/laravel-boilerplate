@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.edit') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::model($user, ['route' => ['admin.access.users.update', $user->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.users.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.header-buttons')
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', trans('validation.attributes.backend.access.users.name'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.name')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.email')]) !!}
                    </div>
                </div><!--form control-->

                @if ($user->id != 1)
                    <div class="form-group">
                        <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.access.users.active') }}</label>
                        <div class="col-lg-1">
                            <input type="checkbox" value="1" name="status" {{$user->status == 1 ? 'checked' : ''}} />
                        </div>
                    </div><!--form control-->

                    <div class="form-group">
                        <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.access.users.confirmed') }}</label>
                        <div class="col-lg-1">
                            <input type="checkbox" value="1" name="confirmed" {{$user->confirmed == 1 ? 'checked' : ''}} />
                        </div>
                    </div><!--form control-->

                    <div class="form-group">
                        <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.access.users.associated_roles') }}</label>
                        <div class="col-lg-3">
                            @if (count($roles) > 0)
                                @foreach($roles as $role)
                                    <input type="checkbox" value="{{$role->id}}" name="assignees_roles[]" {{in_array($role->id, $user_roles) ? 'checked' : ''}} id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{!! $role->name !!}</label>
                                        <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">
                                            (
                                                <span class="show-text">{{ trans('labels.general.show') }}</span>
                                                <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                                                {{ trans('labels.backend.access.users.permissions') }}
                                            )
                                        </a>
                                    <br/>
                                    <div class="permission-list hidden" data-role="role_{{$role->id}}">
                                        @if ($role->all)
                                            {{ trans('labels.backend.access.users.all_permissions') }}<br/><br/>
                                        @else
                                            @if (count($role->permissions) > 0)
                                                <blockquote class="small">{{--
                                            --}}@foreach ($role->permissions as $perm){{--
                                            --}}{{$perm->display_name}}<br/>
                                                    @endforeach
                                                </blockquote>
                                            @else
                                                {{ trans('labels.backend.access.users.no_permissions') }}<br/><br/>
                                            @endif
                                        @endif
                                    </div><!--permission list-->
                                @endforeach
                            @else
                                {{ trans('labels.backend.access.users.no_roles') }}
                            @endif
                        </div>
                    </div><!--form control-->

                    <div class="form-group">
                        <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.access.users.other_permissions') }}</label>
                        <div class="col-lg-10">
                            <div class="alert alert-info">
                                <i class="fa fa-info-circle"></i> {{ trans('labels.backend.access.users.permission_check') }}
                            </div><!--alert-->

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

                                                <li><input type="checkbox" value="{{$p['id']}}" name="permission_user[]" data-dependencies="{!! $dependencies !!}" {{in_array($p['id'], $user_permissions) ? 'checked' : ""}} id="permission-{{$p['id']}}" /> <label for="permission-{{$p['id']}}">

                                                        @if ($p['dependencies'])
                                                            <a style="color:black;text-decoration:none;" data-toggle="tooltip" data-html="true" title="<strong>{{ trans('labels.backend.access.users.dependencies') }}:</strong> {!! $dependency_list !!}">{!! $p['display_name'] !!} <small><strong>(D)</strong></small></a>
                                                        @else
                                                            {!! $p['display_name'] !!}
                                                        @endif

                                                    </label></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            @else
                                {{ trans('labels.backend.access.users.no_other_permissions') }}
                            @endif
                        </div><!--col 3-->
                    </div><!--form control-->
                @endif
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{route('admin.access.users.index')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.update') }}" />
                </div>
                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

        @if ($user->id == 1)
            {!! Form::hidden('status', 1) !!}
            {!! Form::hidden('confirmed', 1) !!}
            {!! Form::hidden('assignees_roles[]', 1) !!}
        @endif

    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/access/permissions/script.js') !!}
    {!! Html::script('js/backend/access/users/script.js') !!}
@stop

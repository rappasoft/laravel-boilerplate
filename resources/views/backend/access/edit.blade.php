@extends ('backend.layouts.master')

@section ('title', trans('menus.user_management') . ' | ' . trans('menus.edit_user'))

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.edit_user') }}</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li>{!! link_to_route('admin.access.users.index', trans('menus.user_management')) !!}</li>
    <li class="active">{!! link_to_route('admin.access.users.edit', trans('menus.edit_user')) !!}</li>
@stop

@section('content')
    @include('backend.access.includes.partials.header-buttons')

    {!! Form::model($user, ['route' => ['admin.access.users.update', $user->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}

        <div class="form-group">
            {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('strings.full_name')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.email')]) !!}
            </div>
        </div><!--form control-->

        @if ($user->id != 1)
            <div class="form-group">
                <label class="col-lg-2 control-label">{{ trans('validation.attributes.active') }}</label>
                <div class="col-lg-1">
                    <input type="checkbox" value="1" name="status" {{$user->status == 1 ? 'checked' : ''}} />
                </div>
            </div><!--form control-->

            <div class="form-group">
                <label class="col-lg-2 control-label">{{ trans('validation.attributes.confirmed') }}</label>
                <div class="col-lg-1">
                    <input type="checkbox" value="1" name="confirmed" {{$user->confirmed == 1 ? 'checked' : ''}} />
                </div>
            </div><!--form control-->

            <div class="form-group">
                <label class="col-lg-2 control-label">{{ trans('validation.attributes.associated_roles') }}</label>
                <div class="col-lg-3">
                    @if (count($roles) > 0)
                        @foreach($roles as $role)
                            <input type="checkbox" value="{{$role->id}}" name="assignees_roles[]" {{in_array($role->id, $user_roles) ? 'checked' : ''}} id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{!! $role->name !!}</label> <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">(<span class="show-hide">Show</span> Permissions)</a><br/>

                            <div class="permission-list hidden" data-role="role_{{$role->id}}">
                                @if ($role->all)
                                    All Permissions<br/><br/>
                                @else
                                    @if (count($role->permissions) > 0)
                                        <blockquote class="small">{{--
                                            --}}@foreach ($role->permissions as $perm){{--
                                            --}}{{$perm->display_name}}<br/>
                                            @endforeach
                                        </blockquote>
                                    @else
                                        No permissions<br/><br/>
                                    @endif
                                @endif
                            </div><!--permission list-->
                        @endforeach
                    @else
                        No Roles to set
                    @endif
                </div>
            </div><!--form control-->

            <div class="form-group">
                <label class="col-lg-2 control-label">{{ trans('validation.attributes.other_permissions') }}</label>
                <div class="col-lg-10">
                    @if (count($permissions))
                        @foreach (array_chunk($permissions->toArray(), 10) as $perm)
                            <div class="col-lg-3">
                                <ul style="margin:0;padding:0;list-style:none;">
                                    @foreach ($perm as $p)
                                        <li><input type="checkbox" value="{{$p['id']}}" name="permission_user[]" {{in_array($p['id'], $user_permissions) ? 'checked' : ""}} id="permission-{{$p['id']}}" /> <label for="permission-{{$p['id']}}">{!! $p['display_name'] !!}</label></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    @else
                        No other permissions
                    @endif
                </div><!--col 3-->
            </div><!--form control-->
        @endif

        <div class="well">
            <div class="pull-left">
                <a href="{{route('admin.access.users.index')}}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!--well-->

    @if ($user->id == 1)
        {!! Form::hidden('status', 1) !!}
        {!! Form::hidden('confirmed', 1) !!}
        {!! Form::hidden('assignees_roles[]', 1) !!}
    @endif

    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! HTML::script('js/backend/access/permissions/script.js') !!}
@stop
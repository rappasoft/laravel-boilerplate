@extends ('backend.layouts.master')

@section ('title', trans('menus.user_management') . ' | ' . trans('menus.create_user'))

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.create_user') }}</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li>{!! link_to_route('admin.access.users.index', trans('menus.user_management')) !!}</li>
    <li class="active">{!! link_to_route('admin.access.users.create', trans('menus.create_user')) !!}</li>
@stop

@section('content')
    @include('backend.access.includes.partials.header-buttons')

    {!! Form::open(['route' => 'admin.access.users.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

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

        <div class="form-group">
            {!! Form::label('password', trans('validation.attributes.password'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            {!! Form::label('password_confirmation', trans('validation.attributes.password_confirmation'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('validation.attributes.active') }}</label>
            <div class="col-lg-1">
                <input type="checkbox" value="1" name="status" checked="checked" />
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('validation.attributes.confirmed') }}</label>
            <div class="col-lg-1">
                <input type="checkbox" value="1" name="confirmed" checked="checked" />
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('validation.attributes.send_confirmation_email') }}<br/>
                <small>{{ trans('strings.if_confirmed_is_off') }}</small>
            </label>
            <div class="col-lg-1">
                <input type="checkbox" value="1" name="confirmation_email" />
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('validation.attributes.associated_roles') }}</label>
            <div class="col-lg-3">
                @if (count($roles) > 0)
                    @foreach($roles as $role)
                        <input type="checkbox" value="{{$role->id}}" name="assignees_roles[]" id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{!! $role->name !!}</label><br/>

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
                    @endforeach
                @else
                    No Roles to set
                @endif
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('validation.attributes.other_permissions') }}</label>
            <div class="col-lg-3">
                @if (count($permissions))
                    @foreach ($permissions as $perm)
                        <input type="checkbox" value="{{$perm->id}}" name="permission_user[]" id="permission-{{$perm->id}}"> <label for="permission-{{$perm->id}}" />{!! $perm->display_name !!}</label><br/>
                    @endforeach
                @else
                    No other permissions
                @endif
            </div><!--col 3-->
        </div><!--form control-->

        <div class="well">
            <div class="pull-left">
                <a href="{{route('admin.access.users.index')}}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!--well-->

    {!! Form::close() !!}
@stop
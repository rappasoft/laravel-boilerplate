@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('page-header')
    <h5 class="mb-4">{{ __('labels.backend.access.users.management') }}
        <small class="text-muted">{{ __('labels.backend.access.users.create') }}</small>
    </h5>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.auth.user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="card">
            <div class="card-header">
                {{ __('labels.backend.access.users.create') }}
            </div><!-- card-header -->

            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="first_name">
                        {{ __('validation.attributes.backend.access.users.first_name') }}
                    </label>

                    <div class="col-md-10">
                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.first_name') }}" maxlength="191" required="required" autofocus="autofocus">
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="last_name">
                        {{ __('validation.attributes.backend.access.users.last_name') }}
                    </label>

                    <div class="col-md-10">
                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.last_name') }}" maxlength="191" required="required">
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="email">
                        {{ __('validation.attributes.backend.access.users.email') }}
                    </label>

                    <div class="col-md-10">
                        <input type="email" id="email" name="email" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.email') }}" maxlength="191" required="required">
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="password">
                        {{ __('validation.attributes.backend.access.users.password') }}
                    </label>

                    <div class="col-md-10">
                        <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.password') }}" required="required">
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="password_confirmation">
                        {{ __('validation.attributes.backend.access.users.password_confirmation') }}
                    </label>

                    <div class="col-md-10">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.password_confirmation') }}" required="required">
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="active">
                        {{ __('validation.attributes.backend.access.users.active') }}
                    </label>

                    <div class="col-md-10">
                        <input type="checkbox" name="active" value="1" id="active" checked="checked" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="confirmed">
                        {{ __('validation.attributes.backend.access.users.confirmed') }}
                    </label>

                    <div class="col-md-10">
                        <input type="checkbox" name="confirmed" value="1" id="confirmed" checked="checked" />
                    </div>
                </div><!--form-group-->

                @if (! config('access.users.requires_approval'))
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="confirmation_email">
                            {{ __('validation.attributes.backend.access.users.send_confirmation_email') }}<br/>
                            <small>{{ __('strings.backend.access.users.if_confirmed_off') }}</small>
                        </label>

                        <div class="col-md-10">
                            <input type="checkbox" name="confirmation_email" value="1" id="confirmation_email" />
                        </div>
                    </div><!--form-group-->
                @endif

                <div class="form-group row">
                    <label class="col-md-2 form-control-label">
                        Abilities
                    </label>

                    <div class="col-md-10">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Roles</th>
                                        <th>Permissions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            @if ($roles->count())
                                                @foreach($roles as $role)
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="checkbox">
                                                                <label for="role-{{ $role->id }}">
                                                                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ old('roles') && in_array($role->name, old('roles')) ? 'checked="checked"' : '' }} id="role-{{ $role->id }}" />
                                                                    {{ ucfirst($role->name) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            @if ($role->id != 1)
                                                                @if ($role->permissions->count())
                                                                    @foreach ($role->permissions as $permission)
                                                                        <i class="fa fa-dot-circle-o"></i> {{ ucwords($permission->name) }}
                                                                    @endforeach
                                                                @else
                                                                    None
                                                                @endif
                                                            @else
                                                                All Permissions
                                                            @endif
                                                        </div>
                                                    </div><!--card-->
                                                @endforeach
                                            @endif
                                        </td>
                                       <td>
                                           @if ($permissions->count())
                                               @foreach($permissions as $permission)
                                                   <div class="checkbox">
                                                       <label for="permission-{{ $permission->id }}">
                                                           <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="permission-{{ $permission->id }}" {{ old('roles') && in_array($role->name, old('roles')) ? 'checked="checked"' : '' }} />
                                                           {{ ucwords($permission->name) }}
                                                       </label>
                                                   </div>
                                               @endforeach
                                           @endif
                                       </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--table-responsive-->
                    </div>
                </div><!--form-group-->
            </div><!-- card-body -->

            <div class="card-footer">
                {{ link_to_route('admin.auth.user.index', __('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-sm']) }}
                {{ Form::submit(__('buttons.general.crud.create'), ['class' => 'btn btn-success btn-sm pull-right']) }}
            </div>
        </div><!--card-->

    {{ Form::close() }}
@endsection

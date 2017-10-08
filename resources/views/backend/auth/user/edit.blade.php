@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.edit'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('page-header')
    <!-- <h5 class="mb-4">{{ __('labels.backend.access.users.management') }}
        <small class="text-muted">{{ __('labels.backend.access.users.edit') }}</small>
    </h5> -->
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.users.management') }}
                    <small class="text-muted">{{ __('labels.backend.access.users.edit') }}</small>
                </h4>
                <div class="small text-muted">
                    User Management Dashboard
                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                    <button onclick="window.history.back();"class="btn btn-warning ml-1" data-toggle="tooltip" title="Return Back"><i class="fa fa-reply"></i></button>
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->
        <hr>
        <div class="row mt-4 mb-4">
            <div class="col">
                <form action="{{ route('admin.auth.user.update', $user->id) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="first_name">
                            {{ __('validation.attributes.backend.access.users.first_name') }}
                        </label>

                        <div class="col-md-10">
                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.first_name') }}" value="{{ $user->first_name }}" maxlength="191" required="required">
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="last_name">
                            {{ __('validation.attributes.backend.access.users.last_name') }}
                        </label>

                        <div class="col-md-10">
                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.last_name') }}" value="{{ $user->last_name }}" maxlength="191" required="required">
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="email">
                            {{ __('validation.attributes.backend.access.users.email') }}
                        </label>

                        <div class="col-md-10">
                            <input type="email" id="email" name="email" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.email') }}" value="{{ $user->email }}" maxlength="191" required="required">
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">
                            Abilities
                        </label>

                        <div class="col-md-10">
                            <table class="table table-responsive">
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
                                                                <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ in_array($role->name, $userRoles) ? 'checked="checked"' : '' }} id="role-{{ $role->id }}" />
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
                                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="permission-{{ $permission->id }}" {{ in_array($permission->name, $userPermissions) ? 'checked="checked"' : '' }} />
                                                        {{ ucwords($permission->name) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!--form-group-->
                    <!-- </div> -->
                    <!-- card-body -->

                    <div class="row">
                        <div class="col">
                            {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                            {{ form_submit(__('buttons.general.crud.update')) }}
                        </div>
                    </div>
                    <!-- /.row -->
                </form>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    Updated: {{$user->updated_at->diffForHumans()}},
                    Created at: {{$user->created_at->toCookieString()}}
                </small>
            </div>
        </div>
    </div>
</div>

@endsection

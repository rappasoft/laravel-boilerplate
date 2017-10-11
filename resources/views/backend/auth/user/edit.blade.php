@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.edit'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('page-header')
    <h5 class="mb-4">{{ __('labels.backend.access.users.management') }}
        <small class="text-muted">{{ __('labels.backend.access.users.edit') }}</small>
    </h5>
@endsection

@section('content')
    {{ html()->modelForm($user, 'PATCH', route('admin.auth.user.update', $user->id))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-header">
                {{ __('labels.backend.access.users.edit') }}
            </div><!-- card-header -->

            <div class="card-body">
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-2 form-control-label')->for('first_name') }}

                    <div class="col-md-10">
                        {{ html()->text('first_name')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                            ->attribute('maxlength', 191)
                            ->required()
                            ->autofocus() }}
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.users.last_name'))->class('col-md-2 form-control-label')->for('last_name') }}

                    <div class="col-md-10">
                        {{ html()->text('last_name')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.access.users.last_name'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-2 form-control-label')->for('email') }}

                    <div class="col-md-10">
                        {{ html()->email('email')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.access.users.email'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label('Abilities')->class('col-md-2 form-control-label') }}

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
                                                        {{ html()->label(html()->checkbox('roles[]', in_array($role->name, $userRoles), $role->name)->id('role-'.$role->id) . ' ' . ucwords($role->name))->for('role-'.$role->id) }}
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
                                                {{ html()->label(html()->checkbox('permissions[]', in_array($permission->name, $userPermissions), $permission->name)->id('permission-'.$permission->id) . ' ' . ucwords($permission->name))->for('permission-'.$permission->id) }}
                                            </div>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!--form-group-->
            </div><!-- card-body -->

            <div class="card-footer clearfix">
                {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                {{ form_submit(__('buttons.general.crud.update')) }}
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection

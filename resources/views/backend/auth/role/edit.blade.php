@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.edit'))

@section('page-header')
    <h5 class="mb-4">{{ __('labels.backend.access.roles.management') }}
        <small class="text-muted">{{ __('labels.backend.access.roles.edit') }}</small>
    </h5>
@endsection

@section('content')
    {{ html()->modelForm($role, 'PATCH', route('admin.auth.role.update', $role))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-header">
                {{ __('labels.backend.access.roles.edit') }}
            </div><!-- card-header -->

            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">
                        {{ __('validation.attributes.backend.access.roles.name') }}
                    </label>

                    <div class="col-md-10">
                        {{ html()->text('name')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.access.roles.name'))
                            ->attribute('maxlength', 191)
                            ->required()
                            ->autofocus() }}
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">
                        {{ __('validation.attributes.backend.access.roles.associated_permissions') }}
                    </label>

                    <div class="col-md-10">
                        @if ($permissions->count())
                            @foreach($permissions as $permission)
                                <div class="checkbox">
                                    {{ html()->label(html()->checkbox('permissions[]', in_array($permission->name, $rolePermissions), $permission->name)->id('permission-'.$permission->id) . ' ' . ucwords($permission->name))->for('permission-'.$permission->id) }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div><!--form-group-->
            </div><!-- card-body -->

            <div class="card-footer">
                {{ form_cancel(route('admin.auth.role.index'), __('buttons.general.cancel')) }}
                {{ form_submit(__('buttons.general.crud.update')) }}
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection

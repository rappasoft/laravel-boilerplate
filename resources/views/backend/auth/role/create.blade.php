@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.create'))

@section('page-header')
    <!-- <h5 class="mb-4">{{ __('labels.backend.access.roles.management') }}
        <small class="text-muted">{{ __('labels.backend.access.roles.create') }}</small>
    </h5> -->
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.roles.management') }}
                    <small class="text-muted">{{ __('labels.backend.access.roles.create') }}</small>
                </h4>

                <div class="small text-muted">
                    Roles Management Dashboard
                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->

        <hr>

        <div class="row mt-4">
            <div class="col">

                {{ html()->form('POST', route('admin.auth.role.store'))->class('form-horizontal')->open() }}

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.roles.name'))
                        ->class('col-md-2 form-control-label')
                        ->for('name') }}

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
                    {{ html()->label(__('validation.attributes.backend.access.roles.associated_permissions'))
                        ->class('col-md-2 form-control-label')
                        ->for('permissions') }}

                    <div class="col-md-10">
                        @if ($permissions->count())
                            @foreach($permissions as $permission)
                                <div class="checkbox">
                                    {{ html()->label(html()->checkbox('permissions[]', old('permissions') && in_array($permission->name, old('permissions')) ? true : false, $permission->name)->id('permission-'.$permission->id) . ' ' . ucwords($permission->name))->for('permission-'.$permission->id) }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div><!--form-group-->

                    <div class="row">
                        <div class="col">
                            {{ form_cancel(route('admin.auth.role.index'), __('buttons.general.cancel')) }}
                            {{ form_submit(__('buttons.general.crud.update')) }}
                        </div>
                    </div>
                {{ html()->form()->close() }}

            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <div class="row">
            <div class="col">

            </div>
        </div>
    </div>
</div>

@endsection

@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.change_password'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('page-header')
    <h5 class="mb-4">{{ __('labels.backend.access.users.management') }}
        <small class="text-muted">{{ __('labels.backend.access.users.change_password') }}</small>
    </h5>
@endsection

@section('content')
    {{ html()->form('PATCH', route('admin.auth.user.change-password.post', $user))->class('form-horizontal') }}
        <div class="card">
            <div class="card-header">
                {{ __('labels.backend.access.users.change_password_for', ['user' => $user->name]) }}
            </div><!-- card-header -->

            <div class="card-body">
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.users.password'))->class('col-md-2 form-control-label')->for('password') }}

                    <div class="col-md-10">
                        {{ html()->password('password')
                            ->class('form-control')
                            ->placeholder( __('validation.attributes.backend.access.users.password'))
                            ->required()
                            ->autofocus() }}
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.users.password_confirmation'))->class('col-md-2 form-control-label')->for('password_confirmation') }}

                    <div class="col-md-10">
                        {{ html()->password('password_confirmation')
                            ->class('form-control')
                            ->placeholder( __('validation.attributes.backend.access.users.password_confirmation'))
                            ->required() }}
                    </div>
                </div><!--form-group-->
            </div><!-- card-body -->

            <div class="card-footer clearfix">
                {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                {{ form_submit(__('buttons.general.crud.update')) }}
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection
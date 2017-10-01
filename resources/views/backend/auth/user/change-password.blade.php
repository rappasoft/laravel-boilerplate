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
    {{ Form::open(['route' => ['admin.auth.user.change-password.post', $user], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'patch']) }}

    <div class="card">
        <div class="card-header">
            {{ __('labels.backend.access.users.change_password_for', ['user' => $user->name]) }}
        </div><!-- card-header -->

        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="password">
                    {{ trans('validation.attributes.backend.access.users.password') }}
                </label>

                <div class="col-md-10">
                    <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.password') }}" required="required" autofocus="autofocus">
                </div>
            </div><!--form-group-->

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="password_confirmation">
                    {{ trans('validation.attributes.backend.access.users.password_confirmation') }}
                </label>

                <div class="col-md-10">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.password_confirmation') }}" required="required">
                </div>
            </div><!--form-group-->
        </div><!-- card-body -->

        <div class="card-footer">
            {{ link_to_route('admin.auth.user.index', __('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-sm']) }}
            {{ Form::submit(__('buttons.general.crud.update'), ['class' => 'btn btn-success btn-sm pull-right']) }}
        </div>
    </div><!--card-->

    {{ Form::close() }}
@endsection
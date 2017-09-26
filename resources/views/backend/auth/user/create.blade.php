@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.create'))

@section('content')
    {{ Form::open(['route' => 'admin.auth.user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="card">
            <div class="card-header">
                {{ trans('labels.backend.access.users.create') }}
            </div><!-- card-header -->

            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="first_name">
                        {{ trans('validation.attributes.backend.access.users.first_name') }}
                    </label>

                    <div class="col-md-10">
                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="{{ trans('validation.attributes.backend.access.users.first_name') }}" maxlength="191" required="required" autofocus="autofocus">
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="last_name">
                        {{ trans('validation.attributes.backend.access.users.last_name') }}
                    </label>

                    <div class="col-md-10">
                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="{{ trans('validation.attributes.backend.access.users.last_name') }}" maxlength="191" required="required">
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="email">
                        {{ trans('validation.attributes.backend.access.users.email') }}
                    </label>

                    <div class="col-md-10">
                        <input type="email" id="email" name="email" class="form-control" placeholder="{{ trans('validation.attributes.backend.access.users.email') }}" maxlength="191" required="required">
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="password">
                        {{ trans('validation.attributes.backend.access.users.password') }}
                    </label>

                    <div class="col-md-10">
                        <input type="password" id="password" name="password" class="form-control" placeholder="{{ trans('validation.attributes.backend.access.users.password') }}" required="required">
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="password_confirmation">
                        {{ trans('validation.attributes.backend.access.users.password_confirmation') }}
                    </label>

                    <div class="col-md-10">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="{{ trans('validation.attributes.backend.access.users.password_confirmation') }}" required="required">
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="active">
                        {{ trans('validation.attributes.backend.access.users.active') }}
                    </label>

                    <div class="col-md-10">
                        {{ Form::checkbox('active', '1', true, ['id' => 'active']) }}
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="confirmed">
                        {{ trans('validation.attributes.backend.access.users.confirmed') }}
                    </label>

                    <div class="col-md-10">
                        {{ Form::checkbox('confirmed', '1', true, ['id' => 'confirmed']) }}
                    </div>
                </div><!--form-group-->

                @if (! config('access.users.requires_approval'))
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="confirmation_email">
                            {{ trans('validation.attributes.backend.access.users.send_confirmation_email') }}<br/>
                            <small>{{ trans('strings.backend.access.users.if_confirmed_off') }}</small>
                        </label>

                        <div class="col-md-10">
                            {{ Form::checkbox('confirmation_email', '1', ['id' => 'confirmation_email']) }}
                        </div>
                    </div><!--form-group-->
                @endif

                <div class="form-group row">
                    <label class="col-md-2 form-control-label">
                        {{ trans('validation.attributes.backend.access.users.associated_roles') }}
                    </label>

                    <div class="col-md-10">

                    </div>
                </div><!--form-group-->
            </div><!-- card-body -->

            <div class="card-footer">
                {{ link_to_route('admin.auth.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-sm']) }}
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-sm pull-right']) }}
            </div>
        </div><!--card-->

    {{ Form::close() }}
@endsection

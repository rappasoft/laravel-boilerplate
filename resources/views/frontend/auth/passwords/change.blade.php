@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{-- {{ trans('navs.frontend.dashboard') }} --}}
                    My Profile / Settings
                </div>

                <div class="panel-body">
                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation">
                                <a href="{{ route('frontend.user.profile.index') }}">
                                    {{-- {{ trans('navs.frontend.user.my_information') }} --}}
                                    Profile
                                </a>
                            </li>
                            <li role="presentation" class="active">
                                <a href="{{ route('frontend.auth.password.change') }}">
                                    {{ trans('labels.frontend.user.passwords.change') }}
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="password">
                                {{ Form::open(['route' => ['frontend.auth.password.change'], 'class' => 'form-horizontal']) }}
                                    <h2 class="text-center">
                                        {{ trans('labels.frontend.user.passwords.change') }}
                                    </h2>
                                    <div class="form-group">
                                        {{ Form::label('old_password', trans('validation.attributes.frontend.old_password'), ['class' => 'col-md-4 control-label']) }}
                                        <div class="col-md-6">
                                            {{ Form::input('password', 'old_password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.old_password')]) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('password', trans('validation.attributes.frontend.new_password'), ['class' => 'col-md-4 control-label']) }}
                                        <div class="col-md-6">
                                            {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.new_password')]) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('password_confirmation', trans('validation.attributes.frontend.new_password_confirmation'), ['class' => 'col-md-4 control-label']) }}
                                        <div class="col-md-6">
                                            {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.new_password_confirmation')]) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary pull-right">
                                                <i class="fa fa-save"></i>
                                                {{ trans('labels.general.buttons.update') }}
                                            </button>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            </div><!--tab panel password-->

                        </div><!--tab content-->

                    </div><!--tab panel-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection

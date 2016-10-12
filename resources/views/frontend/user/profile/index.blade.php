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
                            <li role="presentation" class="active">
                                <a href="{{ route('frontend.user.profile.index') }}">
                                    {{-- {{ trans('navs.frontend.user.my_information') }} --}}
                                    Profile
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="{{ route('frontend.auth.password.change') }}">
                                    {{ trans('labels.frontend.user.passwords.change') }}
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="profile">
                                {{ Form::model($user, ['route' => 'frontend.user.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
                                    <h2 class="text-center">
                                        {{-- {{ trans('navs.frontend.user.my_information') }} --}}
                                        Profile
                                    </h2>
                                    <h5 class="text-center">
                                        {{ trans('labels.frontend.user.profile.created_at') }}: {{ $user->created_at->diffForHumans() }}
                                        <small>({{ $user->created_at }})</small>
                                    </h5>
                                    <h5 class="text-center">
                                        {{ trans('labels.frontend.user.profile.last_updated') }}: {{ $user->updated_at->diffForHumans() }}
                                        <small>({{ $user->updated_at }})</small>
                                    </h5>
                                    <div class="form-group">
                                        {{ Form::label('Avatar', trans('labels.frontend.user.profile.avatar'), ['class' => 'col-md-4 control-label']) }}
                                        <div class="col-md-6"><img src="{{ $user->picture }}" class="user-profile-image" /></div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('name', trans('validation.attributes.frontend.name'), ['class' => 'col-md-4 control-label']) }}
                                        <div class="col-md-6">
                                            {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('email', trans('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                                        <div class="col-md-6">
                                            @if ($user->canChangeEmail())
                                                {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                                            @else
                                                <p class="form-control-static">{{ $user->email }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary pull-right">
                                                <i class="fa fa-save"></i>
                                                {{ trans('labels.general.buttons.save') }}
                                            </button>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            </div><!--tab panel profile-->

                        </div><!--tab content-->

                    </div><!--tab panel-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection

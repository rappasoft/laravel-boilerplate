@extends('frontend.layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center mb-3">
        <div class="col col-sm-10 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('navs.frontend.user.account')
                    </strong>
                </div>

                <div class="card-body">
                    <div role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#profile" class="nav-link active" aria-controls="profile" role="tab" data-toggle="tab">@lang('navs.frontend.user.profile')</a>
                            </li>

                            <li class="nav-item">
                                <a href="#edit" class="nav-link" aria-controls="edit" role="tab" data-toggle="tab">@lang('labels.frontend.user.profile.update_information')</a>
                            </li>

                            @if($logged_in_user->canChangePassword())
                                <li class="nav-item">
                                    <a href="#password" class="nav-link" aria-controls="password" role="tab" data-toggle="tab">@lang('navs.frontend.user.change_password')</a>
                                </li>
                            @endif
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active pt-3" id="profile" aria-labelledby="profile-tab">
                                @include('frontend.user.account.tabs.profile')
                            </div><!--tab panel profile-->

                            <div role="tabpanel" class="tab-pane fade show pt-3" id="edit" aria-labelledby="edit-tab">
                                @include('frontend.user.account.tabs.edit')
                            </div><!--tab panel profile-->

                            @if($logged_in_user->canChangePassword())
                                <div role="tabpanel" class="tab-pane fade show pt-3" id="password" aria-labelledby="password-tab">
                                    @include('frontend.user.account.tabs.change-password')
                                </div><!--tab panel change password-->
                            @endif
                        </div><!--tab content-->
                    </div><!--tab panel-->
                </div><!--card body-->
            </div><!-- card -->
        </div><!-- col-xs-12 -->
    </div><!-- row -->
@endsection

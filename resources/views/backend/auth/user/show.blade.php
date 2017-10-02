@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.view'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('page-header')
    <h5 class="mb-4">{{ __('labels.backend.access.users.management') }}
        <small class="text-muted">{{ __('labels.backend.access.users.view') }}</small>
    </h5>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true">{{ __('labels.backend.access.users.tabs.titles.overview') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-expanded="false">{{ __('labels.backend.access.users.tabs.titles.history') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                    @include('backend.auth.user.show.tabs.overview')
                </div><!--tab-->

                <div class="tab-pane" id="history" role="tabpanel" aria-expanded="false">
                    @include('backend.auth.user.show.tabs.history')
                </div><!--tab-->
            </div>
        </div><!--col-->
    </div><!--row-->
@endsection
@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<div class="container">

    <div class="row mb-4">
            <div class="col sx-12 md-12 lg-12" align="center">
                    @lang('strings.frontend.welcome_to', ['place' => app_name()])
            </div>
    </div>
    <div class="row mb-4">
        <div class="col sx-12 md-6 lg-4 mb-2">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-home"></i> @lang('navs.general.home')
                </div>
                <div class="card-body">
                        Laravel Boilerplate Current: Laravel 6.0
                </div>
            </div><!--card-->
        </div>
        <div class="col sx-12 md-6 lg-4 mb-2">
                <example-component></example-component>
        </div>
        <div class="col sx-12 md-6 lg-4 mb-2">
                <div class="card">
                        <div class="card-header">
                            <i class="fab fa-font-awesome-flag"></i> Font Awesome @lang('strings.frontend.test')
                        </div>
                        <div class="card-body">
                            <i class="fas fa-home"></i>
                            <i class="fab fa-facebook"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-pinterest"></i>
                        </div><!--card-body-->
                    </div><!--card-->
        </div>
    </div>
</div>
@endsection

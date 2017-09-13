@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <example></example>
        </div><!-- col-lg-12 -->

        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-home"></i> {{ __('navs.general.home') }}
                </div>
                <div class="card-body">
                    {{ __('strings.frontend.welcome_to', ['place' => app_name()]) }}
                </div>
            </div><!--card-->
        </div><!-- col-lg-12 -->

        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-home"></i> Font Awesome {{ __('strings.frontend.test') }}
                </div>
                <div class="card-body">
                    <i class="fa fa-home"></i>
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-pinterest"></i>
                </div>
            </div><!--card-->
        </div><!-- col-lg-12 -->
    </div><!--row-->
@endsection
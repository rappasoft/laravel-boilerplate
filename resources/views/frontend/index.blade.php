@extends('frontend.layouts.app')

@section('content')


<!-- Homepage Welcome Block -->
<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-home"></i> {{ __('navs.general.home') }}
            </div>
            <div class="card-body">
                {{ __('strings.frontend.welcome_to', ['place' => app_name()]) }}
            </div>
        </div>
    </div>
</div>
<!-- / Homepage Welcome Block -->

<!-- Vue Component Example -->
<div class="row mb-4">
    <div class="col">
        <example></example>
    </div>
</div>
<!-- / Vue Component Example -->

<!-- Font Awesome Example -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-fort-awesome"></i> Font Awesome {{ __('strings.frontend.test') }}
            </div>
            <div class="card-body">
                <i class="fa fa-home"></i>
                <i class="fa fa-facebook"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-pinterest"></i>
            </div>
        </div>
    </div>
</div>
<!-- / Font Awesome Example -->
@endsection

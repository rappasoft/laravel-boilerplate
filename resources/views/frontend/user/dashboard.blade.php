@extends('frontend.layouts.app')

@section('content')
    <div class="row mb-5">

        <div class="col-xs-12">

            <div class="card">

                <div class="card-header">
                    {{ __('navs.frontend.dashboard') }}
                </div><!--card-header-->

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4 order-1 order-sm-2">

                            <div class="card mb-4">
                                <img class="card-img-top" src="{{ auth()->user()->picture }}" alt="Profile Picture">

                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ auth()->user()->name }}<br/>
                                    </h4>

                                    <p class="card-text">
                                        <small>
                                            {{ auth()->user()->email }}<br/>
                                            {{ __('strings.frontend.general.joined') }} {{ auth()->user()->created_at->format('F jS, Y') }}
                                        </small>
                                    </p>

                                    <p class="card-text">
                                        {{ link_to_route('frontend.user.account', __('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-sm']) }}

                                        @can('view backend')
                                            {{ link_to_route('admin.dashboard', __('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-sm']) }}
                                        @endcan
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    Sidebar Item
                                </div><!--card-header-->

                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                </div><!--card-body-->
                            </div><!--card-->
                        </div><!--col-md-4-->

                        <div class="col-md-8 order-2 order-sm-1">
                            <div class="card mb-4">
                                <div class="card-header">
                                    Item
                                </div><!--card-header-->

                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                </div><!--card-body-->
                            </div><!--card-->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                            </div><!--row-->

                        </div><!--col-md-8-->

                    </div><!--row-->

                </div><!--card-body-->

            </div><!--card-->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection
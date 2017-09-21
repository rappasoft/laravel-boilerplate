@extends('frontend.layouts.app')

@section('title', app_name() . ' | Contact Us')

@section('content')

    <div class="row justify-content-center">

        <div class="col col-sm-8 align-self-center">

            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ __('labels.frontend.contact.box_title') }}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">

                    {{ Form::open(['route' => 'frontend.contact.send', 'class' => 'form']) }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('name', __('validation.attributes.frontend.name'), ['class' => '']) }}
                                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => __('validation.attributes.frontend.name')]) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('email', __('validation.attributes.frontend.email'), ['class' => '']) }}
                                    {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.email')]) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('phone', __('validation.attributes.frontend.phone'), ['class' => '']) }}
                                    {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('validation.attributes.frontend.phone')]) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('message', __('validation.attributes.frontend.message'), ['class' => '']) }}
                                    {{ Form::textarea('message', null, ['class' => 'form-control', 'required' => 'required', 'rows' => '3', 'placeholder' => __('validation.attributes.frontend.message')]) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::submit(__('labels.frontend.contact.button'), ['class' => 'btn btn-primary pull-right']) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                    {{ Form::close() }}

                </div><!--card-body-->

            </div><!--card-->

        </div><!--col-->

    </div><!--row-->

@endsection

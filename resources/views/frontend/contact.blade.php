@extends('frontend.layouts.app')

@section('title', app_name() . ' | Contact Us')

@section('content')
    <div class="row mb-4 justify-content-center">

        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('labels.frontend.contact.box_title') }}</div>

                <div class="card-body">

                    {{ Form::open(['route' => 'frontend.contact.send', 'class' => 'form-horizontal']) }}

                    <div class="form-group">
                        {{ Form::label('name', __('validation.attributes.frontend.name'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => __('validation.attributes.frontend.name')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('email', __('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.email')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('phone', __('validation.attributes.frontend.phone'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('validation.attributes.frontend.phone')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('message', __('validation.attributes.frontend.message'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::textarea('message', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.message')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::submit(__('labels.frontend.contact.button'), ['class' => 'btn btn-primary pull-right']) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    {{ Form::close() }}
                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection
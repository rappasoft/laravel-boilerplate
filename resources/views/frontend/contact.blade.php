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
                    <form action="{{ route('frontend.contact.send') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">{{ __('validation.attributes.frontend.name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control" maxlength="191" placeholder="{{ __('validation.attributes.frontend.name') }}" required="required" autofocus="autofocus" />
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">{{ __('validation.attributes.frontend.email') }}</label>
                                    <input type="email" name="email" id="email" class="form-control" maxlength="191" placeholder="{{ __('validation.attributes.frontend.email') }}" required="required" />
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="phone">{{ __('validation.attributes.frontend.phone') }}</label>
                                    <input type="text" name="phone" id="phone" class="form-control" maxlength="191" placeholder="{{ __('validation.attributes.frontend.phone') }}" />
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="message">{{ __('validation.attributes.frontend.message') }}</label>
                                    <textarea name="message" class="form-control" required="required" rows="3" placeholder="{{ __('validation.attributes.frontend.message') }}"></textarea>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" name="button" class="btn btn-primary">
                                        {{ __('labels.frontend.contact.button') }}
                                    </button>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    </form>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection

@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('labels.frontend.macros.macro_examples') }}</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>{{ trans('labels.frontend.macros.state.us.us') }}</label>
                        {{-- Shorthand for this is just selectState, set which version is shorthanded in Macros/Dropdowns --}}
                        {{ Form::selectStateUS('state', 'NY', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.frontend.macros.state.us.outlying') }}</label>
                        {{ Form::selectStateUSOutlyingTerritories('state_outlying', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.frontend.macros.state.us.armed') }}</label>
                        {{ Form::selectStateUSArmedForces('armed_forces', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.frontend.macros.territories.canada') }}</label>
                        {{ Form::selectCanadaTerritories('canada_territories', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.frontend.macros.state.mexico') }}</label>
                        {{ Form::selectStateMexico('mexico', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.frontend.macros.country.alpha') }}</label>
                        {{ Form::selectCountryAlpha('country_alpha', 'ISO 3166-2:US', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.frontend.macros.country.alpha2') }}</label>
                        {{-- Shorthand for this is just selectCountry, set which version is shorthanded in Macros/Dropdowns --}}
                        {{ Form::selectCountryAlpha2('country_alpha2', 'US', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.frontend.macros.country.alpha3') }}</label>
                        {{ Form::selectCountryAlpha3('country_alpha3', 'USA', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.frontend.macros.country.numeric') }}</label>
                        {{ Form::selectCountryNumeric('country_numeric', '840', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.frontend.macros.timezone') }}</label>
                        {{ Form::selectTimezone('timezone', 'America/New_York', ['class' => 'form-control']) }}
                    </div>
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection
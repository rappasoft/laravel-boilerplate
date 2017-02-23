@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> {{ __('Macro Examples') }}</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>{{ __('US States') }}</label>
                        {{-- Shorthand for this is just selectState, set which version is shorthanded in Macros/Dropdowns --}}
                        {{ Form::selectStateUS('state', 'NY', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ __('US Outlying Territories') }}</label>
                        {{ Form::selectStateUSOutlyingTerritories('state_outlying', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ __('US Armed Forces') }}</label>
                        {{ Form::selectStateUSArmedForces('armed_forces', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Canada Province & Territories List') }}</label>
                        {{ Form::selectCanadaTerritories('canada_territories', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Mexico State List') }}</label>
                        {{ Form::selectStateMexico('mexico', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Country Alpha Codes') }}</label>
                        {{ Form::selectCountryAlpha('country_alpha', 'ISO 3166-2:US', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Country Alpha 2 Codes') }}</label>
                        {{-- Shorthand for this is just selectCountry, set which version is shorthanded in Macros/Dropdowns --}}
                        {{ Form::selectCountryAlpha2('country_alpha2', 'US', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Country Alpha 3 Codes') }}</label>
                        {{ Form::selectCountryAlpha3('country_alpha3', 'USA', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Country Numeric Codes') }}</label>
                        {{ Form::selectCountryNumeric('country_numeric', '840', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Timezone') }}</label>
                        {{ Form::selectTimezone('timezone', 'America/New_York', ['class' => 'form-control']) }}
                    </div>
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection
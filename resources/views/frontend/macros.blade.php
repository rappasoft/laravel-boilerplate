@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('labels.macro_examples') }}</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>{{ trans('labels.state.us') }}</label>
                        {{-- Shorthand for this is just selectState, set which version is shorthanded in Macros/Dropdowns --}}
                        {!! Form::selectStateUS('state', 'NY', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.state.us.outlying') }}</label>
                        {!! Form::selectStateUSOutlyingTerritories('state_outlying', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.state.us.armed') }}</label>
                        {!! Form::selectStateUSArmedForces('armed_forces', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.territories.canada') }}</label>
                        {!! Form::selectCanadaTerritories('canada_territories', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.state.mexico') }}</label>
                        {!! Form::selectStateMexico('mexico', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.country.alpha') }}</label>
                        {!! Form::selectCountryAlpha('country_alpha', 'ISO 3166-2:US', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.country.alpha2') }}</label>
                        {{-- Shorthand for this is just selectCountry, set which version is shorthanded in Macros/Dropdowns --}}
                        {!! Form::selectCountryAlpha2('country_alpha2', 'US', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.country.alpha3') }}</label>
                        {!! Form::selectCountryAlpha3('country_alpha3', 'USA', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.country.numeric') }}</label>
                        {!! Form::selectCountryNumeric('country_numeric', '840', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('labels.timezone') }}</label>
                        {!! Form::selectTimezone('timezone', 'America/New_York', ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div><!-- panel -->

		</div><!-- col-md-10 -->

	</div><!-- row -->
@endsection
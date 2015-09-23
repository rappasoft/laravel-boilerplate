@extends('installer.layouts.master')

@section('container')
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-folder-close"></i>
                {{ trans('installer.database.title') }}
            </h3>
        </div>
        <div class="panel-body">
            @if(isset($result['errors']))
                <div class="alert alert-danger">
                    {{ $result['errors']['message'] }}
                </div>
            @else
                <p>
                    {{ trans('installer.database.success') }}
                </p>
            @endif
            @if(! isset($result['errors']))
                <a class="btn btn-success pull-left" href="{!! route('home') !!}" target="_blank">
                    {{ trans('installer.database.view-frontend') }}
                </a>

                <a class="btn btn-success pull-right" href="{!! route('backend.dashboard') !!}" target="_blank">
                    {{ trans('installer.database.view-backend') }}
                </a>
            @endif
        </div>
    </div>
@stop
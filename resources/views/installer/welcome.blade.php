@extends('installer.layouts.master')

@section('container')
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-home"></i>
                {{ trans('installer.welcome.title') }}
            </h3>
        </div>
        <div class="panel-body">
            <p>
                {{ trans('installer.welcome.message') }}
            </p>
            <a class="btn btn-success pull-right btn-sm" href="{{ route('Installer::requirements') }}">
                {{ trans('installer.next') }}
            </a>
            <div class="clearfix"></div>
        </div>
    </div>
@stop
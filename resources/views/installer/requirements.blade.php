@extends('installer.layouts.master')

@section('container')
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-exclamation-sign"></i>
                {{ trans('installer.requirements.title') }}
            </h3>
        </div>
        <div class="panel-body">
            <div class="bs-component">
                <ul class="list-group">
                    @foreach($requirements['requirements'] as $element => $enabled)
                        <li class="list-group-item">
                            @if($enabled)
                                <span class="badge badge-success">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </span>
                            @endif
                            {{ $element }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <a class="btn btn-danger pull-left btn-sm" href="{{ route('Installer::welcome') }}">
                {{ trans('installer.previous') }}
            </a>

            @if(! isset($requirements['errors']))
                <a class="btn btn-success pull-right btn-sm" href="{{ route('Installer::permissions') }}">
                    {{ trans('installer.next') }}
                </a>
            @endif

            <div class="clearfix"></div>
        </div>
    </div>
@stop
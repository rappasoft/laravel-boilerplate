@extends('installer.layouts.master')

@section('container')
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-file"></i>
                {{ trans('installer.permissions.title') }}
            </h3>
        </div>
        <div class="panel-body">
            <div class="bs-component">
                <ul class="list-group">
                    @foreach($permissions['permissions'] as $permission)
                        <li class="list-group-item">
                            @if($permission['isSet'])
                                <span class="badge badge-success">
                                    {{ $permission['permission'] }}
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    {{ $permission['permission'] }}
                                </span>
                            @endif
                            {{ $permission['folder'] }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <a class="btn btn-danger pull-left btn-sm" href="{{ route('Installer::requirements') }}">
                {{ trans('installer.previous') }}
            </a>

            @if(! isset($permissions['errors']))
                <a class="btn btn-success pull-right btn-sm" href="{{ route('Installer::database') }}">
                    {{ trans('installer.next') }}
                </a>
            @endif

            <div class="clearfix"></div>
        </div>
    </div>
@stop
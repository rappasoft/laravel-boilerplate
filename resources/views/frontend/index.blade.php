@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <example></example>

        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-home"></i> {{ __('navs.general.home') }}
                </div><!-- panel-heading -->

                <div class="panel-body">
                    {{ __('strings.frontend.welcome_to', ['place' => app_name()]) }}
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- col-xs-12 -->

        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-home"></i> Bootstrap Glyphicon {{ __('strings.frontend.test') }}
                </div><!-- panel-heading -->

                <div class="panel-body">
                    <span class="glyphicon glyphicon-search"></span>
                    <span class="glyphicon glyphicon glyphicon-euro"></span>
                    <span class="glyphicon glyphicon glyphicon-cloud"></span>
                    <span class="glyphicon glyphicon glyphicon-envelope"></span>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- col-xs-12 -->

        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-home"></i> Font Awesome {{ __('strings.frontend.test') }}
                </div><!-- panel-heading -->

                <div class="panel-body">
                    <i class="fa fa-home"></i>
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-pinterest"></i>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- col-xs-12 -->
    </div><!--row-->
@endsection
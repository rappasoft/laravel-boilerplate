@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Laravel 5 Bootstrap
        <small>Administrative Dashboard</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Here</li>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">WELCOME {!! auth()->user()->name !!}!</h3>
          <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <p>This is the AdminLTE theme by <a href="https://almsaeedstudio.com/" target="_blank">https://almsaeedstudio.com/</a>. This is a stripped down version with only the necessary styles and scripts to get it running. Download the full version to start adding components to your dashboard.</p>
          	<p>All the functionality is for show with the exception of the <strong>User Management</strong> to the left. This boilerplate comes with a fully functional access control library to manage users/roles/permissions.</p>
          	<p>Keep in mind it is a work in progress and their may be bugs or other issues I have not come across. I will do my best to fix them as I receive them.</p>
          	<p>Hope you enjoy all of the work I have put into this. Please visit the <a href="https://github.com/rappasoft/laravel-5-boilerplate" target="_blank">GitHub</a> page for more information and report any <a href="https://github.com/rappasoft/Laravel-5-Boilerplate/issues" target="_blank">issues here</a>.</p>
          	<p>- Anthony Rappa</p>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection
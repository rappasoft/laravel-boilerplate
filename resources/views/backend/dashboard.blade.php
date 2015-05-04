@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Page Header
        <small>Optional description</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
    <li class="active">Here</li>
@endsection

@section('content')
	WELCOME ADMINISTRATOR!
@endsection
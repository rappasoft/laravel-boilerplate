@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ trans('strings.backend.search.results', ['query' => $search_term]) }}
    </h1>
@endsection

@section('content')
    {{ trans('strings.backend.search.incomplete') }}
@endsection
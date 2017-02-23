@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ __('Search Results for :query',['query' => $search_term]) }}
    </h1>
@endsection

@section('content')
    {{ __('You must write your own search logic for this system.') }}
@endsection

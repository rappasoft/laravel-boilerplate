@extends('backend.layouts.app')

@section('title', __('View Example'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Example')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.example.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">

                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $example->name }}</td>
                </tr>

            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Example Created'):</strong> @displayDate($example->created_at) ({{ $example->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($example->updated_at) ({{ $example->updated_at->diffForHumans() }})

                @if($example->trashed())
                    <strong>@lang('Example Deleted'):</strong> @displayDate($example->deleted_at) ({{ $example->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection

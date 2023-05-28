@inject('model', '\App\Domains\Auth\Models\Example')

@extends('backend.layouts.app')

@section('title', __('Update Example'))

@section('content')
    <x-forms.patch :action="route('admin.auth.example.update', $example)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Example')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.example.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{}">

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $example->name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group name-->

                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Example')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection

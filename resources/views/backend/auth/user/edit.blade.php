@extends('backend.layouts.app')

@section('title', __('Update User'))

@section('content')
    <x-forms.patch :action="route('admin.auth.user.update', $user)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update User')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ $user->name }}" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">@lang('E-mail Address')</label>

                    <div class="col-md-10">
                        <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ $user->email }}" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="active" class="col-md-2 col-form-label">@lang('Can Use Password Login')</label>

                    <div class="col-md-10">
                        <div class="form-check">
                            <input name="can_password_login" id="can_password_login" class="form-check-input" type="checkbox" value="1" {{ old('can_password_login', $user->can_password_login) ? 'checked' : '' }} />
                        </div><!--form-check-->
                    </div>
                </div><!--form-group-->

                @if (!$user->isMasterAdmin())
                    @include('backend.auth.includes.roles')
                    @if (config('boilerplate.access.user.user_permissions'))
                        @include('backend.auth.includes.permissions')
                    @endif
                @endif
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update User')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection

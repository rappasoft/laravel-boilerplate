@props([
    'text' => null,
    'href' => '#',
    'method' => 'POST',
    'name' => 'default',
    'formClass' => 'd-inline',
    'icon' => false,
    'permission' => false,
    'hide' => false,
])

@php
    $show = false;
    if($permission) {
        if($logged_in_user->can($permission) && !$hide) {
           $show = true;
        }
    } else {
        if(!$hide) {
            $show = true;
        }
    }
@endphp

@if ($show)

    <div x-data="" class="dropdown-item">
        <x-forms.post :x-ref="$name" :action="$href" :name="$name" :id="$name" :class="$formClass">
            @csrf
            @method($method)
            <x-utils.link
                :text="$text"
                :icon="$icon"
                class="dropdown-item"
{{--                onclick="event.preventDefault();document.getElementById('{{ $name }}').submit();"--}}
                x-on:click="$refs.{{ $name }}.submit()"
            />
        </x-forms.post>
    </div>

{{--        @if ($logged_in_user->can($permission))--}}
{{--            <form method="POST" action="{{ $action }}" name="{{ $name }}" class="{{ $formClass }}">--}}
{{--                @csrf--}}
{{--                @method($method)--}}

{{--                <button type="submit" class="{{ $buttonClass }}">--}}
{{--                    @if ($icon)--}}
{{--                        <i class="{{ $icon }}"></i>--}}
{{--                    @endif{{ $slot }}--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        @endif--}}
{{--    @else--}}
{{--        <form method="POST" action="{{ $action }}" name="{{ $name }}" class="{{ $formClass }}">--}}
{{--            @csrf--}}
{{--            @method($method)--}}

{{--            <button type="submit" class="{{ $buttonClass }}">--}}
{{--                @if ($icon)--}}
{{--                    <i class="{{ $icon }}"></i>--}}
{{--                @endif{{ $slot }}--}}
{{--            </button>--}}
{{--        </form>--}}
@endif

@props(['dismissable' => true, 'type' => 'success', 'ariaLabel' => __('Close')])



<div {{ $attributes->merge(['class' => 'alert align-items-center alert-'.$type]) }} role="alert">
    @if ($dismissable)
        <button class="btn-close vertical pe-3" type="button" data-coreui-dismiss="alert" aria-label="Close"></button>
    @endif

    {{ $slot }}
</div>

{{--<div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }} role="alert">--}}
{{--    @if ($dismissable)--}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-label="{{ $ariaLabel }}">--}}
{{--            <span aria-hidden="true">&times;</span>--}}
{{--        </button>--}}
{{--    @endif--}}

{{--    {{ $slot }}--}}
{{--</div>--}}

{{--@props(['dismissible' => true, 'type' => 'success', 'ariaLabel' => __('Close')])--}}


@props(['active' => '', 'text' => '', 'hide' => false, 'icon' => false])

@if (!$hide)
    <a {{ $attributes->merge(['href' => '#', 'class' => $active]) }}>@if ($icon)<i class="{{ $icon }}"></i> @endif{{ $text }}</a>
@endif

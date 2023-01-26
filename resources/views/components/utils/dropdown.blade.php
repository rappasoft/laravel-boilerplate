@props(['text' => null])

<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-coreui-toggle="dropdown"
        aria-expanded="false">
    {{ $text }}
</button>
<ul class="dropdown-menu">
    {{ $slot }}
</ul>

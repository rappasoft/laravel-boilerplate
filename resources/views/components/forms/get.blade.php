<form method="get" {{ $attributes->merge(['action' => '#', 'class' => 'form-horizontal']) }}>
    {{ $slot }}
</form>

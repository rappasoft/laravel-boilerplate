<form method="post" {{ $attributes->merge(['action' => '#', 'class' => 'form-horizontal']) }}>
    @csrf
    @method('delete')

    {{ $slot }}
</form>

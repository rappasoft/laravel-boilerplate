@props(['label' => '', 'checked' => false])

<div class="form-check">
    <input class="form-check-input" type="checkbox" {{ $attributes }} {{ $checked ? 'checked' : '' }} />

    <label class="form-check-label" for="{{ $attributes['id'] ?? '' }}">
        {{ $label }}
    </label>
</div><!--form-check-->

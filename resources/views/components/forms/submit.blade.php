@props(['text' => 'Submit', 'class' => 'btn btn-sm btn-primary float-right'])

<button class="{{ $class }}" type="submit" {{ $attributes }}>{{ $text }}</button>

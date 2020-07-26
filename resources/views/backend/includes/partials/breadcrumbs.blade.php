@if (Breadcrumbs::has())
    <ol class="breadcrumb border-0 m-0">
        @foreach (Breadcrumbs::current() as $crumb)
            @if ($crumb->url() && !$loop->last)
                <li class="breadcrumb-item">
                    <x-utils.link :href="$crumb->url()" :text="$crumb->title()" />
                </li>
            @else
                <li class="breadcrumb-item active">
                    {{ $crumb->title() }}
                </li>
            @endif
        @endforeach
    </ol>
@endif

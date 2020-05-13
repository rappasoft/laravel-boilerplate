@if($breadcrumbs)
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">
            <x-utils.link :href="route('admin.dashboard')" :text="__('Home')" />
        </li>

        @foreach($breadcrumbs as $breadcrumb)
            @if($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item">
                    <x-utils.link :href="$breadcrumb->url" :text="$breadcrumb->title" />
            @else
                <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>
@endif

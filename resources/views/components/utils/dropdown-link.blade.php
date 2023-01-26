@props([ 'text' => null, 'href' => '#', 'permission' => null ])
<li>
    <x-utils.link
        :href="$href"
        :permission="$permission"
        :text="$text"
        class="dropdown-item"
    />
</li>

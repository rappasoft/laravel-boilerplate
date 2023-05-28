<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.auth.example.includes.actions', ['example' => $row])
</x-livewire-tables::bs4.table.cell>

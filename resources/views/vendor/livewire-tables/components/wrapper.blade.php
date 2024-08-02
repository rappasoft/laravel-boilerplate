@props(['component'])

@php
    $refresh = $this->getRefreshStatus();
    $theme = $component->getTheme();
@endphp

<div x-data="{
    @if ($component->isFilterLayoutSlideDown()) filtersOpen: $wire.filterSlideDownDefaultVisible, @endif
    paginationCurrentCount: $wire.entangle('paginationCurrentCount'),
    paginationTotalItemCount: $wire.entangle('paginationTotalItemCount'),
    paginationCurrentItems: $wire.entangle('paginationCurrentItems'),
    alwaysShowBulkActions: {{ $component->getHideBulkActionsWhenEmptyStatus() ? 'false' : 'true' }},
    selectedItems: $wire.entangle('selected').defer,
    @if ($component->showBulkActionsDropdownAlpine())
    toggleSelectAll() {
        if (this.paginationTotalItemCount == this.selectedItems.length) {
            this.clearSelected();
        } else {
            this.setAllSelected();
        }
    },
    setAllSelected() {
        $wire.setAllSelected();
    },
    clearSelected() {
        $wire.clearSelected();
    },
    selectAllOnPage() {
        let tempSelectedItems = this.selectedItems;
        const iterator = this.paginationCurrentItems.values();
        for (const value of iterator) {
            tempSelectedItems.push(value.toString());
        }
        this.selectedItems = [...new Set(tempSelectedItems)];
    },
    @else
    toggleSelectAll() {
        return;
    },
    setAllSelected() {
        return;
    },
    clearSelected() {
        return;
    },
    selectAllOnPage() {
        return;
    },

    @endif
}">
    <div {{ $attributes->merge($this->getComponentWrapperAttributes()) }}
        @if ($component->hasRefresh()) wire:poll{{ $component->getRefreshOptions() }} @endif
        @if ($component->isFilterLayoutSlideDown()) wire:ignore.self @endif>

        @include('livewire-tables::includes.debug')
        @include('livewire-tables::includes.offline')

        {{ $slot }}
    </div>
</div>

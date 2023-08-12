<div class="container mx-auto space-y-4 p-4 sm:p-0">
    <ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">
        <li>
            <input type="checkbox" value="travel" wire:model="types"/>
            <span>Admin</span>
        </li>
        <li>
            <input type="checkbox" value="shopping" wire:model="types"/>
            <span>User</span>
        </li>
    </ul>

    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
            <livewire:livewire-pie-chart
                key="{{ $pieChartModel->reactiveKey() }}"
                :pie-chart-model="$pieChartModel"
            />
        </div>
    </div>
</div>

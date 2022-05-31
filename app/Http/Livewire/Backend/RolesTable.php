<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class RolesTable.
 */
class RolesTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        return Role::with('permissions:id,name,description')
            ->withCount('users')
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    public function getFilter($column): bool
    {
        return ! (empty($this->columnSearch[$column] ?? null));
    }

    public function columns(): array
    {
        return [
            Column::make(__('Type'))
                ->sortable(),
            Column::make(__('Name'))
                ->sortable(),
            Column::make(__('Permissions'))
                ->label(fn ($row) => $row->permissions_label),
            Column::make(__('Number of Users'))
                ->label(fn ($row) => $row->users_count)
                ->sortable(),
            Column::make(__('Actions'), 'id')->format(
                fn ($value, $row, Column $column) => view('backend.auth.role.includes.actions')->withModel($row)
            )->html(),
        ];
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }
}

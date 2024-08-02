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
        return Role::query()->with('permissions:id,name,description')
            ->withCount('users');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make(__('Type'))
                ->sortable(),
            Column::make(__('Name'))
                ->sortable(),
            // Column::make(__('Permissions')),
            Column::make('Number of Users')
                ->sortable()
                ->label(fn($row) => $row->users_count),
                Column::make('Actions')
                ->label(function ($row) {
                    return view('backend.auth.role.includes.actions', ['model' => $row]);
                }),
        ];
    }

    public function rowView(): string
    {
        return 'backend.auth.role.includes.row';
    }
}

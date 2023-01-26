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
    protected $model = Role::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setThAttributes(function (Column $column) {
                if ($column->getTitle() == 'Number of Users'
                    || $column->getTitle() == 'Actions'
                ) {
                    return [
                        'class' => 'text-center',
                        'default' => true,
                    ];
                }

                return ['default' => true,];
            })
            ->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
                if ($column->getTitle() == 'Number of Users'
                    || $column->getTitle() == 'Actions'
                ) {
                    return [
                        'class' => 'text-center',
                        'default' => true,
                    ];
                }

                return ['default' => true,];
            });
    }

    public function builder(): Builder
    {
        return Role::query()
            ->with('permissions:id,name,description')
            ->withCount('users');
    }

    public function columns(): array
    {
        return [
            Column::make(__('Type'))
                ->sortable()
                ->searchable(),
            Column::make(__('Name'))
                ->sortable()
                ->searchable(),
            Column::make(__('Permissions'))
                ->label(fn($row, Column $column) => $row->permissions_label),
            Column::make(__('Number of Users'))
                ->label(fn($row, Column $column) => $row->users_count)
                ->sortable(),
            Column::make(__('Actions'))
                ->label(
                    fn($row, Column $column) => view('backend.auth.role.includes.actions')->with(['model' => $row])
                ),
        ];
    }
}

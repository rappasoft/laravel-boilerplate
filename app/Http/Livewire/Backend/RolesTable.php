<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class RolesTable.
 */
class RolesTable extends DataTableComponent
{
    protected $model = Role::class;

    /**
     * Configure the component
     */
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('name')
            ->setEmptyMessage(__('No roles found'));
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        return Role::query()->withCount('users');
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Type'), 'type')
                ->sortable()
                ->format(function($value, $row, Column $column) {
                    if ($value === User::TYPE_ADMIN) {
                        return __('Administrator');
                    } elseif ($value === User::TYPE_USER) {
                        return __('User');
                    } else {
                        return 'N/A';
                    }
                }),

            Column::make(__('Name'), 'name')
                ->sortable(),

            Column::make(__('Permissions'))
                ->label(function($row, Column $column) {
                    return $row->permissions_label ?? 'No permissions';
                })->html(),

            Column::make(__('Number of Users'))
                ->label(function($row, Column $column) {
                    return $row->users_count;
                }),

            Column::make(__('Actions'))
                ->label(function($row, Column $column) {
                    return view('backend.auth.role.includes.actions', ['model' => $row])->render();
                })->html(),
        ];
    }
}

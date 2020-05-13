<?php

namespace App\Http\Livewire;

use App\Domains\Auth\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class RolesTable.
 */
class RolesTable extends TableComponent
{
    /**
     * @var string
     */
    public $sortField = 'name';

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Role::with('permissions:id,name,description')
            ->withCount('users');
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make('Name')
                ->searchable()
                ->sortable(),
            Column::make('Permissions', 'permissions_label')
                ->customAttribute()
                ->html()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('permissions', function ($query) use ($term) {
                        return $query->where('name', 'like', '%'.$term.'%');
                    });
                }),
            Column::make('Number of Users', 'users_count')
                ->sortable(),
            Column::make('Actions')
                ->view('backend.auth.role.includes.actions'),
        ];
    }
}

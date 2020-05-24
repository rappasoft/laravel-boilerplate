<?php

namespace App\Http\Livewire;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class UsersTable.
 */
class UsersTable extends TableComponent
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
        return User::query();
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
            Column::make('E-mail', 'email')
                ->searchable()
                ->sortable(),
            Column::make('Verified', 'verified_label')
                ->customAttribute()
                ->html()
                ->sortable(function ($builder, $direction) {
                    return $builder->orderBy('email_verified_at', $direction);
                }),
            Column::make('Roles', 'roles_label')
                ->customAttribute()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('roles', function ($query) use ($term) {
                        return $query->where('name', 'like', '%'.$term.'%');
                    });
                }),
            Column::make('Actions')
                ->view('backend.auth.user.includes.actions'),
        ];
    }
}

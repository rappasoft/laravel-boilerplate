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
     * @var string
     */
    public $status;

    /**
     * @param  string  $status
     */
    public function mount($status = 'active'): void
    {
        $this->status = $status;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        if ($this->status === 'deleted') {
            return User::onlyTrashed();
        }

        if ($this->status === 'deactivated') {
            return User::onlyDeactivated();
        }

        return User::onlyActive();
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
            Column::make('Verified')
                // TODO: get a second param to the view method for var name in the view by modifying livewire tables
                ->view('backend.auth.user.includes.verified')
                ->sortable(function ($builder, $direction) {
                    return $builder->orderBy('email_verified_at', $direction);
                }),
            Column::make('2FA')
                // TODO: get a second param to the view method for var name in the view by modifying livewire tables
                ->view('backend.auth.user.includes.2fa'),
            //                ->sortable(function ($builder, $direction) {
            //                    // TODO: Order by existence of relationship
            //                }),
            Column::make('Roles', 'roles_label')
                ->customAttribute()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('roles', function ($query) use ($term) {
                        return $query->where('name', 'like', '%'.$term.'%');
                    });
                }),
            Column::make('Additional Permissions', 'permissions_label')
                ->customAttribute()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('permissions', function ($query) use ($term) {
                        return $query->where('name', 'like', '%'.$term.'%');
                    });
                }),
            Column::make('Actions')
                ->view('backend.auth.user.includes.actions'),
        ];
    }
}

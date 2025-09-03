<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

/**
 * Class UsersTable.
 */
class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public $status;

    /**
     * @param  string  $status
     */
    public function mount($status = 'active'): void
    {
        $this->status = $status;
    }

    /**
     * Configure the component - Required for Laravel Livewire Tables v2.x
     */
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return null; // No row URLs
            });
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = User::with('roles', 'permissions');

        if ($this->status === 'deleted') {
            $query = $query->onlyTrashed();
        } elseif ($this->status === 'deactivated') {
            $query = $query->onlyDeactivated();
        } else {
            $query = $query->onlyActive();
        }

        return $query;
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            SelectFilter::make('User Type')
                ->options([
                    '' => 'Any',
                    User::TYPE_ADMIN => 'Administrators',
                    User::TYPE_USER => 'Users',
                ])
                ->filter(function($query, $value) {
                    if ($value) {
                        $query->where('type', $value);
                    }
                }),
            SelectFilter::make('Active')
                ->options([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ])
                ->filter(function($query, $value) {
                    if ($value === 'yes') {
                        $query->where('active', true);
                    } elseif ($value === 'no') {
                        $query->where('active', false);
                    }
                }),
            SelectFilter::make('E-mail Verified')
                ->options([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ])
                ->filter(function($query, $value) {
                    if ($value === 'yes') {
                        $query->whereNotNull('email_verified_at');
                    } elseif ($value === 'no') {
                        $query->whereNull('email_verified_at');
                    }
                }),
        ];
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Type'), 'type')
                ->sortable(),
            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('E-mail'), 'email')
                ->sortable()
                ->searchable(),
            Column::make(__('Verified'), 'email_verified_at')
                ->sortable(),
            Column::make(__('2FA'), 'id')
                ->format(function($value, $row) {
                    return view('backend.auth.user.includes.2fa', ['user' => $row])->render();
                })->html(),
            Column::make(__('Roles'), 'id')
                ->format(function($value, $row) {
                    return $row->roles_label ?? '';
                }),
            Column::make(__('Additional Permissions'), 'id')
                ->format(function($value, $row) {
                    return $row->permissions_label ?? '';
                }),
            Column::make(__('Actions'), 'id')
                ->format(function($value, $row) {
                    return view('backend.auth.user.includes.actions', ['user' => $row])->render();
                })
                ->html(),
        ];
    }
}

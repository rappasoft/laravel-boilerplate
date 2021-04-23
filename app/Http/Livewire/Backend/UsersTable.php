<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class UsersTable.
 */
class UsersTable extends DataTableComponent
{
    /**
     * @var
     */
    public $status;

    /**
     * @var array|string[]
     */
    public array $sortNames = [
        'email_verified_at' => 'Verified',
        'two_factor_auth_count' => '2FA',
    ];

    /**
     * @var array|string[]
     */
    public array $filterNames = [
        'type' => 'User Type',
        'verified' => 'E-mail Verified',
    ];

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
        $query = User::with('roles', 'twoFactorAuth')->withCount('twoFactorAuth');

        if ($this->status === 'deleted') {
            $query = $query->onlyTrashed();
        } elseif ($this->status === 'deactivated') {
            $query = $query->onlyDeactivated();
        } else {
            $query = $query->onlyActive();
        }

        return $query
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('type'), fn ($query, $type) => $query->where('type', $type))
            ->when($this->getFilter('active'), fn ($query, $active) => $query->where('active', $active === 'yes'))
            ->when($this->getFilter('verified'), fn ($query, $verified) => $verified === 'yes' ? $query->whereNotNull('email_verified_at') : $query->whereNull('email_verified_at'));
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            'type' => Filter::make('User Type')
                ->select([
                    '' => 'Any',
                    User::TYPE_ADMIN => 'Administrators',
                    User::TYPE_USER => 'Users',
                ]),
            'active' => Filter::make('Active')
                ->select([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ]),
            'verified' => Filter::make('E-mail Verified')
                ->select([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ]),
        ];
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Type'))
                ->sortable(),
            Column::make(__('Name'))
                ->sortable(),
            Column::make(__('E-mail'), 'email')
                ->sortable(),
            Column::make(__('Verified'), 'email_verified_at')
                ->sortable(),
            Column::make(__('2FA'), 'two_factor_auth_count')
                ->sortable(),
            Column::make(__('Roles')),
            Column::make(__('Additional Permissions')),
            Column::make(__('Actions')),
        ];
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.auth.user.includes.row';
    }
}

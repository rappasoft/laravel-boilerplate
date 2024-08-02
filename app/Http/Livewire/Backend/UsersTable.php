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
    public function builder(): Builder
    {
        $query = User::query()->with('roles', 'twoFactorAuth')->withCount('twoFactorAuth');
        // dd($query);
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
                '' => 'All',
                User::TYPE_ADMIN => 'Administrators',
                User::TYPE_USER => 'Users',
            ])->filter(function(Builder $builder, string $value) {
                $builder->where('type', $value);
            }),

            SelectFilter::make('Active')
            ->options([
                '' => 'All',
                1 => 'Active',
                0 => 'Unactive',
            ])->filter(function(Builder $builder, string $value) {
                $builder->where('active', $value);
            }),

            SelectFilter::make('E-mail Verified')
            ->options([
                '' => 'All',
                1 => 'Yes',
                0 => 'No',
            ])->filter(function(Builder $builder, string $value) {
                if ($value === '1') {
                    $builder->whereNot('email_verified_at', null);
                } elseif ($value === '0') {
                    $builder->where('email_verified_at', null);
                }
            }),
        ];
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
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
                ->searchable()
                ->sortable(),
            Column::make(__('E-mail'), 'email')
                ->sortable(),
            Column::make(__('Verified'), 'email_verified_at')
                ->sortable(),
            Column::make('2FA')
                ->sortable()
                ->label(fn($row) => $row->two_factor_auth_count == 0 ? 'NA' : 'Active'),
            Column::make('Roles')
                ->label(fn($row) => $row->roles->pluck('name')->implode(', ')),
            Column::make('Actions')
                ->label(function ($row) {
                    return view('backend.auth.user.includes.actions', ['user' => $row]);
                }),
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

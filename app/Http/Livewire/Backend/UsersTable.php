<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Str;

/**
 * Class UsersTable.
 */
class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this
            ->setPrimaryKey('id')
            ->setThAttributes(function (Column $column) {
                if ($column->getTitle() == 'Verified'
                    || $column->getTitle() == '2FA'
                    || $column->getTitle() == 'Active'
                    || $column->getTitle() == 'Actions'
                ) {
                    return [
                        'class' => 'text-center',
                        'default' => true,
                    ];
                }

                return ['default' => true];
            })
            ->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
                if ($column->getTitle() == 'Active'
                    || $column->getTitle() == '2FA'
                ) {
                    return [
                        'class' => 'text-center',
                        'default' => true,
                    ];
                } elseif ($column->getTitle() == 'Verified') {
                    return [
                        'data-toggle' => 'tooltip',
                        'title' => timezone()->convertToLocal($row->email_verified_at),
                        'class' => 'text-center',
                        'default' => true,
                    ];
                }

                return ['default' => true];
            });
    }

    public function builder(): Builder
    {
        $abc = User::query()
            ->with('roles', 'twoFactorAuth')
            ->withCount('twoFactorAuth');

        return match ($this->status) {
            'deleted' => $abc->onlyTrashed(),
            'deactivated' => $abc->onlyDeactivated(),
            default => $abc->onlyActive(),
        };
    }

    /**
     * @var string
     */
    public string $status;

    /**
     * @param  string  $status
     */
    public function mount(string $status = 'active'): void
    {
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            SelectFilter::make('User Type')
                ->filter(function (Builder $builder, string $value) {
                    if ($value) {
                        $builder->where('type', $value);
                    }
                })
                ->options([
                    '' => 'Any',
                    User::TYPE_ADMIN => 'Administrators',
                    User::TYPE_USER => 'Users',
                ]),
            SelectFilter::make('Active')
                ->filter(function (Builder $builder, string $value) {
                    if ($value) {
                        $builder->where('active', $value === 'yes');
                    }
                })
                ->options([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ]),
            SelectFilter::make('E-mail Verified')
                ->filter(function (Builder $builder, string $value) {
                    if ($value === 'yes') {
                        $builder->whereNotNull('email_verified_at');
                    } else {
                        $builder->whereNull('email_verified_at');
                    }
                })
                ->options([
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
                ->label(fn ($row) => Str::Title($row->type))
                ->searchable()
                ->sortable(),
            Column::make(__('Name'))
                ->searchable()
                ->sortable(),
            LinkColumn::make(__('E-mail'), 'email')
                ->title(fn ($row) => $row->email)
                ->location(fn ($row) => "mailto:$row->email")
                ->searchable()
                ->sortable(),
            BooleanColumn::make('Verified', 'email_verified_at')
                ->setCallback(fn ($value, User $row) => $row->isVerified()),
            BooleanColumn::make('Active', 'active')
                ->setCallback(fn ($value, User $row) => $row->isActive()),
            BooleanColumn::make('2FA', 'type')
                ->setCallback(fn ($value, $row) => $row->hasTwoFactorEnabled()),
            Column::make(__('Roles'))
                ->label(fn ($row, Column $column) => $row->roles_label),
            Column::make(__('Additional Permissions'))
                ->label(fn ($row, Column $column) => $row->permissions_label),
            Column::make(__('Actions'))
                ->label(
                    fn ($row, Column $column) => view('backend.auth.user.includes.actions')->with(['user' => $row])
                ),
        ];
    }
}

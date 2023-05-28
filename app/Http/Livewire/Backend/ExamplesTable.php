<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\Example;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class ExamplesTable.
 */
class ExamplesTable extends DataTableComponent
{
    /**
     * @var
     */
    public $status;

    /**
     * @var array|string[]
     */
    public array $sortNames = [];

    /**
     * @var array|string[]
     */
    public array $filterNames = [];

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
            $query = Example::onlyTrashed();
        } else {
            $query = Example::onlyActive();
        }

        return $query
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('active'), fn ($query, $active) => $query->where('active', $active === 'yes'));
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            'active' => Filter::make('Active')
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
            Column::make(__('Name'))
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.auth.example.includes.row';
    }
}

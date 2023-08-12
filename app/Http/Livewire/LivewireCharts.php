<?php

namespace App\Http\Livewire;

use App\Domains\Auth\Models\User;
use App\Models\Expense;
use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;

class LivewireCharts extends Component
{
    public $types = ['admin','user'];

    public $colors = [
        'admin' => '#f6ad55',
        'user' => '#fc8181',
    ];

    public $firstRun = true;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];

    public function handleOnPointClick($point)
    {
        dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function render()
    {
        $users = User::whereIn('type', $this->types)->get();
//        $columnChartModel = $users->groupBy('type')
//            ->reduce(function (ColumnChartModel $columnChartModel, $data) {
//                $type = $data->first()->type;
//                $value = $data->sum('amount');
//
//                return $columnChartModel->addColumn($type, $value, $this->colors[$type]);
//            }, (new ColumnChartModel())
//                ->setTitle('Expenses by Type')
//                ->setAnimated($this->firstRun)
//                ->withOnColumnClickEventName('onColumnClick')
//            );

        $pieChartModel = $users->groupBy('type')
            ->reduce(function (PieChartModel $pieChartModel, $data) {
                $type = $data->first()->type;
                $value = $data->sum('amount');

                return $pieChartModel->addSlice($type, $value, $this->colors[$type]);
            }, (new PieChartModel())
                ->setTitle('Users by Type')
                ->setAnimated($this->firstRun)
                ->withOnSliceClickEvent('onSliceClick')
            );

//        $lineChartModel = $expenses
//            ->reduce(function (LineChartModel $lineChartModel, $data) use ($expenses) {
//                $index = $expenses->search($data);
//
//                $amountSum = $expenses->take($index + 1)->sum('amount');
//
//                if ($index == 6) {
//                    $lineChartModel->addMarker(7, $amountSum);
//                }
//
//                if ($index == 11) {
//                    $lineChartModel->addMarker(12, $amountSum);
//                }
//
//                return $lineChartModel->addPoint($index, $amountSum, ['id' => $data->id]);
//            }, (new LineChartModel())
//                ->setTitle('Expenses Evolution')
//                ->setAnimated($this->firstRun)
//                ->withOnPointClickEvent('onPointClick')
//            );

//        $areaChartModel = $expenses
//            ->reduce(function (AreaChartModel $areaChartModel, $data) use ($expenses) {
//                return $areaChartModel->addPoint($data->description, $data->amount, ['id' => $data->id]);
//            }, (new AreaChartModel())
//                ->setTitle('Expenses Peaks')
//                ->setAnimated($this->firstRun)
//                ->setColor('#f6ad55')
//                ->withOnPointClickEvent('onAreaPointClick')
//                ->setXAxisVisible(false)
//                ->setYAxisVisible(true)
//            );

        $this->firstRun = false;

        return view('livewire.livewire-charts')
            ->with([
              //  'columnChartModel' => $columnChartModel,
                'pieChartModel' => $pieChartModel,
             //   'lineChartModel' => $lineChartModel,
             //   'areaChartModel' => $areaChartModel,
            ]);
    }
}

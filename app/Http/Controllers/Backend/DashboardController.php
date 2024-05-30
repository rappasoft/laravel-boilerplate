<?php

namespace App\Http\Controllers\Backend;
use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use DB;



/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $userCount = User::where('type', '<>', 'admin')->count();

        $userRegistrations = User::where('type', '<>', 'admin')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        
        $datesAndCounts = $userRegistrations->mapWithKeys(function ($item) {
            return [$item->date => $item->count];
        })->toArray();
        
        $dates = array_keys($datesAndCounts);
        $counts = array_values($datesAndCounts);
        
        // return view('backend.dashboard');
        return view('backend.dashboard', compact('userCount', 'dates', 'counts'));

    }
}

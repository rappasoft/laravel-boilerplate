<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
        if (auth()->user()->isAdmin()) {
            $userCount = User::count();

            $usersByDate = User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
                ->groupBy(DB::raw('DATE(created_at)'))
                ->orderBy('date', 'asc')
                ->get();

            $dates = $usersByDate->pluck('date')->map(function ($date) {
                return Carbon::parse($date)->format('Y-m-d');
            });
            $counts = $usersByDate->pluck('count');

            Log::info('counts', ['counts' => $counts]);
            Log::info('userCount', ['userCount' => $userCount]);
            Log::info('dates', ['dates' => $dates]);

            return view('backend.dashboard', compact('userCount', 'dates', 'counts'));
        }

        return view('backend.dashboard');
    }
}

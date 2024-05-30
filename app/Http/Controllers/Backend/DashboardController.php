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
        $userCount = User::count();

        $userRegistrations = User::where(DB::raw('DATE(created_at) as registration_date'), DB::raw('COUNT(*) as count'))
                        ->groupBy('registration_date')
                        ->orderBy('registration_date')
                        ->get();

        $dates = $userRegistrations->pluck('registration_date')->toArray();
        $counts = $userRegistrations->pluck('count')->toArray();
        // return view('backend.dashboard');
        return view('backend.dashboard', compact('userCount', 'dates', 'counts'));

    }
}

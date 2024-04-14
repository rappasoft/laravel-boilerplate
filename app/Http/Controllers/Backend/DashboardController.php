<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Models\User;

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
	$userCount = User::where('type', '!=', 'admin')->count();

        $userRegistrations = User::where('type', '!=', 'admin')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dates = $userRegistrations->pluck('date')->toArray();
        $counts = $userRegistrations->pluck('count')->toArray();

        return view('backend.dashboard', compact('userCount', 'dates', 'counts'));
    }
}

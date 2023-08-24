<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;

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
        $userCount = DB::table('users')->count();
        
        $userCountsByType = DB::table('users')
            ->select('type', DB::raw('count(*) as count'))
            ->groupBy('type')
            ->get();
    
        $userCountsByDate = DB::table('users')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
        ->groupBy('date')
        ->get();
    
        return view('backend.dashboard', compact('userCount', 'userCountsByType', 'userCountsByDate'));
    }
}

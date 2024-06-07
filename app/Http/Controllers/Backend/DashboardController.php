<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Models\User;
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
        $users_count = User::where('type', 'user')->count();

        $users_registration_dates_count = User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->where('type', 'user')
            ->get();

        $registration_dates = [];
        $registration_count = [];

        for ($i = 0; $i < count($users_registration_dates_count); $i++) {
            $registration_dates[] = $users_registration_dates_count[$i]->date;
            $registration_count[] = $users_registration_dates_count[$i]->count;
        }


        return view('backend.dashboard', compact('users_count', 'registration_count', 'registration_dates'));
    }
}

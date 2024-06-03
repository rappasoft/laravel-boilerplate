<?php

namespace App\Http\Controllers\Frontend\User;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    //  I STARTED TO GET THE DATA I WANT FROM THE DATABASE TO BE ABLE TO USE IT IN THE BARCHART 
    public function index()
    {
        $clientRegistrationData = $this->getClientRegistrationData();
        // dd($clientRegistrationData);
        $userCount = $this->getUserCount();
        return view('frontend.user.dashboard',compact('clientRegistrationData','userCount'));
    }

    protected function getClientRegistrationData()
    {
        // Query the database to get registration dates and count of users registered on each date
        $registrationData = DB::table('users')
            ->select(DB::raw('DATE(created_at) as registration_date'), DB::raw('COUNT(*) as user_count'))
            ->groupBy('registration_date')
            ->orderBy('registration_date')
            ->get();

        // Format the data for the chart
        $labels = $registrationData->pluck('registration_date')->map(function ($date) {
            return Carbon::parse($date)->format('Y-m-d');
        })->toArray();
        $data = $registrationData->pluck('user_count')->toArray();

        
        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }

    private function getUserCount()
    {
        return DB::table('users')->count();
    }



}

<?php
namespace App\Domains\Auth\Http\Controllers\Backend\Stats;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use DB;

class StatsController
{
    protected UserService $userService;
    public function index()
    {
        $totalUsers = User::count();
        $users = User::all();

        $userTypes = $users->groupBy('type')->map(function ($group) {
                return $group->count();
            });
            $data = [['User Type', 'Count']];
             foreach ($userTypes as $type => $count) {
            $data[] = [$type, $count];
        }
        // Convert the data array to JSON
          $dataJson = json_encode($data);

          $userRegistrations = User::select(DB::raw('DATE(created_at) as registration_date'), DB::raw('COUNT(*) as count'))
                        ->groupBy('registration_date')
                        ->orderBy('registration_date')
                        ->get();
           $data = [['Registration Date', 'User Count']];
            foreach ($userRegistrations as $registration) {
                $data[] = [date('Y-m-d', strtotime($registration->registration_date)), $registration->count];
            }

        $registeredJson = json_encode($data);
         // dd($registeredJson);
        return  view('backend.auth.stats.index')
                    ->with('totalUsers',$totalUsers)
                    ->with('dataJson',$dataJson)
                    ->with('usersRegistered',$registeredJson);
    }

    
}

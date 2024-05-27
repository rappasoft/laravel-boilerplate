<?php

namespace App\Http\Controllers;

use App\Domains\Auth\Models\User; // Ensure the User model is correctly imported
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function userChart()
    {
        $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y')) // Use full year for better clarity
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $totalUsers = User::count(); // Get the total count of all users

        $labels = [];
        $data = [];
        $colors = ['#FF6384', '#FF5722', '#FFCE56', '#36A2EB', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384', '#FF5722', '#FFCE56', '#36A2EB', '#4BC0C0'];

        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;
            foreach ($users as $user) {
                if ($user->month == $i) {
                    $count = $user->count;
                    break;
                }
            }
            $labels[] = $month;
            $data[] = $count;
        }

        $datasets = [
            [
                'label' => 'Users',
                'data' => $data,
                'backgroundColor' => $colors
            ]
        ];

        return view('chart', compact('datasets', 'labels', 'totalUsers'));
    }
}

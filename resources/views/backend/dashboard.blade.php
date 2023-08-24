@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            @lang('Welcome to the Dashboard')
        </x-slot>
    </x-backend.card>

    <x-backend.card>
    <x-slot name="body">
        <div style="text-align: center; padding: 20px;  border-radius: 10px;">
            <h3 style="font-size: 1.5rem; margin: 0;">Total Users</h3>
            <p style="font-size: 2rem; margin: 10px 0;">{{ $userCount }}</p>
            </div>
        </x-slot>
    </x-backend.card>


    <x-backend.card>
    <x-slot name="body" style="text-align: center;">
    <div style="text-align: center; padding: 20px; border-radius: 10px;">
        <h2 style="font-size: 1.5rem; margin-bottom: 10px;">User's Pie Chart</h2>
        </div>
        <canvas id="userTypeChart" style="width: 300px; height: 300px; margin: 0 auto;"></canvas>
    </x-slot>
    </x-backend.card>   


    <x-backend.card>
        <x-slot name="body" style="text-align: center;">
        <div style="text-align: center; padding: 20px; border-radius: 10px;">
            <h2 style="font-size: 1.5rem; margin-bottom: 10px;">Users Registered by Date</h2>
            </div>
            <canvas id="userDateChart" style="width: 300px; height: 300px; margin: 0 auto;"></canvas>
        </x-slot>
    </x-backend.card>


    <script>
        var userTypeData = @json($userCountsByType);
        var userDateData = @json($userCountsByDate);
        var ctx = document.getElementById('userTypeChart').getContext('2d');
        var userDateCtx = document.getElementById('userDateChart').getContext('2d');
        
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: userTypeData.map(entry => entry.type),
                datasets: [{
                    data: userTypeData.map(entry => entry.count),
                    backgroundColor: ['#FF5733', '#36A2EB']
                }]
            }
        });

        var userDateChart = new Chart(userDateCtx, {
        type: 'bar',
        data: {
            labels: userDateData.map(entry => entry.date),
            datasets: [{
                label: 'Users Registered',
                data: userDateData.map(entry => entry.count),
                backgroundColor: 'rgba(54, 162, 235, 0.6)' 
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Count'
                    }
                }
            }
        }
    });
    </script>
@endsection



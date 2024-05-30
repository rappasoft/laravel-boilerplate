@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
            @lang('Welcome to the Dashboard')

      
        </x-slot>

        <x-slot name="body">
            <p>@lang('Total users'): {{ $userCount }}</p>
            <canvas id="barChart" width="400" height="200"></canvas>
        </x-slot>
    </x-backend.card>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById("barChart"), {
            type: 'bar',
            data: {
                labels: @json($dates),
                datasets: [{
                    label: 'User Registrations',
                    data: @json($counts),
                    backgroundColor: 'rgba(0, 0, 255, 0.5)',  
                    borderColor: 'rgba(0, 0, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                       x: {
                            title: {
                                display: true,
                                text: 'Registration date',
                                align: 'center'
                            }
                        },
                        y: {
			                beginAtZero: true,
                            title: {
                                display: true,
                                text: 'No. of users registered',
                                align: 'center'
                            },
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }
                }
            }
        });
    </script>
@endsection

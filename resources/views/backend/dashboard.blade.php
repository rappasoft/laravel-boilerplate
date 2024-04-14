@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            <p>@lang('Users Count'): {{ $userCount }}</p>
            <canvas id="userRegistrationsChart" width="400" height="200"></canvas>
        </x-slot>
    </x-backend.card>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById("userRegistrationsChart"), {
            type: 'bar',
            data: {
                labels: @json($dates),
                datasets: [{
                    label: 'User Registrations',
                    data: @json($counts),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                       x: {
                            title: {
                                display: true,
                                text: 'Dates',
                                align: 'center'
                            }
                        },
                        y: {
			                beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Registered Users Counts',
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

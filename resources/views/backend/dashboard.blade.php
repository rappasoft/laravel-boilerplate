@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            @lang('Welcome to the Dashboard')

            @if ($logged_in_user->isAdmin())
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>User Statistics</h3>
                    </div>
                    <div class="card-body">
                        <h4>Total Users: {{ $userCount }}</h4>
                        <div style="width: 80%; margin: auto;">
                            <canvas id="usersChart"></canvas>
                        </div>
                    </div>
                </div>
            @endif
        </x-slot>
    </x-backend.card>
@endsection

@if ($logged_in_user->isAdmin())
    @push('after-scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var ctx = document.getElementById('usersChart').getContext('2d');
                var dates = {!! json_encode($dates) !!};
                var counts = {!! json_encode($counts) !!};

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: dates,
                        datasets: [{
                            label: 'Users Registered by Date',
                            data: counts,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endif

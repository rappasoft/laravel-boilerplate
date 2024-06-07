@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            @lang('Welcome to the Dashboard')
            <div class="mt-5">
                <h3>Total users registered: {{ $users_count }} user(s)</h3>
            </div>

            <div class="mt-5 col-lg-5" id="users-chart">
            </div>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script>
                var dates = @json($registration_dates);
                var counts = @json($registration_count);
                console.log(counts);
                var options = {
                    chart: {
                        type: 'bar'
                    },
                    series: [{
                        name: 'Registrations Count',
                        data: counts,
                    }],
                    xaxis: {
                        name: 'Registration Date',
                        categories: dates,
                    }
                }

                var chart = new ApexCharts(document.querySelector("#users-chart"), options);

                chart.render();
            </script>
        </x-slot>
    </x-backend.card>
@endsection

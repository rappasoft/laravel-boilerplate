@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome to the Dashboard, ')
            @lang(':Name', ['name' => $logged_in_user->name])

        </x-slot>

        <x-slot name="body">
        <p style="font-weight: bold;">@lang('Total users'): {{ $userCount }}</p>
            <div id="barChart" style="width: 100%; height: 400px;"></div>
        </x-slot>
    </x-backend.card>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                chart: {
                    type: 'bar',
                    height: 400
                },
                series: [{
                    name: '@lang('User Registered')',
                    data: @json($counts)
                }],
                xaxis: {
                    categories: @json($dates),
                    title: {
                        text: '@lang('Registration Date')'
                    }
                },
                yaxis: {
                    title: {
                        text: '@lang('Count of Users')'
                    },
                    min: 0,
                    tickAmount: 1,
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '50%',
                        endingShape: 'flat'
                    }
                },
                dataLabels: {
                    enabled: false
                },
                title: {
                    text: '@lang('Users Registered by Date')',
                    align: 'center'
                },
                colors: ['#3c4b64'] 
            };

            var chart = new ApexCharts(document.querySelector("#barChart"), options);
            chart.render();
        });
    </script>
@endsection

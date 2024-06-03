
@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <x-frontend.card>
                <x-slot name="header">
                    @lang('Dashboard')

                    <link rel="stylesheet" href="{{ asset('admincss2/vendor/bootstrap/css/bootstrap.min.css') }}">
                    <link rel="stylesheet" href="{{ asset('admincss2/vendor/font-awesome/css/font-awesome.min.css') }}">
                    <link rel="stylesheet" href="{{ asset('admincss2/css/font.css') }}">
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
                    <link rel="stylesheet" href="{{ asset('admincss2/css/style.default.css') }}" id="theme-stylesheet">
                    <link rel="stylesheet" href="{{ asset('admincss2/css/custom.css') }}">
                    <link rel="shortcut icon" href="{{ asset('admincss2/img/favicon.ico') }}">
                </x-slot>

                <x-slot name="body">

                <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong>Number of clients</strong>
                    </div>
                    <div class="number dashtext-1">{{ $userCount }}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
        </section>


                    </div>
                    <div class="bar-chart block no-margin-bottom">
                  <canvas id="barChart" width="800" height="400"></canvas>
                  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                </div>



 <?php
$data = json_encode($clientRegistrationData['data']);
$labels = json_encode($clientRegistrationData['labels']);
// dd($data,$labels);
var_dump($data);
var_dump($labels);
?>

                    <script>
                       document.addEventListener("DOMContentLoaded", function() {
                        var ctx = document.getElementById('barChart').getContext('2d');
                        var salesBarChart2 = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: <?php echo $labels; ?> ,
                                datasets: [{
                                    label: 'Number of Registrations',
                                    data: <?php echo $data; ?>,
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 2
                              
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        min: 0, // Set the minimum value of the y-axis scale to zero
                                          ticks: {
                                             beginAtZero: true // Ensure ticks start from zero
                                        }
                                    }
                            }
                        }
                        });
                    });
                    </script>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-12-->
    </div><!--row-->
</div><!--container-->
@endsection

@push('js')
<script src="{{ asset('admincss2/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admincss2/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('admincss2/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admincss2/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
<script src="{{ asset('admincss2/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admincss2/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admincss2/js/charts-home.js') }}"></script>
<script src="{{ asset('admincss2/js/front.js') }}"></script>
@endpush

















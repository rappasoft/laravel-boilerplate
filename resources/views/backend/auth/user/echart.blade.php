@extends('backend.layouts.app')

@section('title', __('User Management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <h2 style="margin:50px 0px 0px 0px;text-align: center;">User Types</h2>
    <div id="piechart" style="width: 900px; height: 500px; margin-left: 235px"></div>
    <script type="text/javascript">
    var admin = <?php echo $admin; ?>;
    var users = <?php echo $users; ?>;

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Type', 'Count'],
            ['Admin',  admin],
            ['Normal Users',  users],
        ]);
        var options = {
            curveType: 'function',
            legend: { position: 'bottom' }
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>

@endsection

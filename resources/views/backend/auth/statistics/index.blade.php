@extends('backend.layouts.app')

@section('title', __('Role Management'))

@section('content')
    <html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
     google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        drawBarChart();
    }


   
         function drawBarChart() {
            
         var jsonData = {!! $usersRegistered !!}; // Parse JSON string to JavaScript object
// Convert count values to numbers
jsonData.forEach(function(item) {
    item[1] = parseInt(item[1]);
});
        // Create DataTable from JSON data
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'User Count');
        data.addRows(jsonData);

        var options = {
            chart: {
                title: 'Users Registered by Date',
                subtitle: 'No. of Users'
            },
            bars: 'vertical' // Display bars vertically
        };

        var chart = new google.visualization.BarChart(document.getElementById('barChart'));

        chart.draw(data, options);
    }

    </script>
  </head>

  <body>
  <h2>Total Users: {{ $totalUsers }}</h2>

        <div id="barChart"></div>

       
  </body>
</html>
@endsection
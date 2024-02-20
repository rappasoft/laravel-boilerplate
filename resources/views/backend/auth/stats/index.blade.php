@extends('backend.layouts.app')

@section('title', __('Role Management'))

@section('content')
    <h2>Total Users: {{ $totalUsers }}</h2>
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
        drawPieChart();
        drawBarChart();
    }


      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
       function drawPieChart() {
        // Parse the JSON data
        var data = google.visualization.arrayToDataTable({!! $dataJson !!});

        // Set chart options
        var options = {
            'title': 'User Types',
            'width': 400,
            'height': 300
        };

        // Instantiate and draw our chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
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
                title: 'User Registrations by Date',
                subtitle: 'Number of Users Registered on Each Date'
            },
            bars: 'vertical' // Display bars vertically
        };

        var chart = new google.visualization.BarChart(document.getElementById('barchart_div'));

        chart.draw(data, options);
    }

    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div style="padding: 10px;" id="chart_div"></div>
    <div></div>
        <div id="barchart_div"></div>
  </body>
</html>
@endsection

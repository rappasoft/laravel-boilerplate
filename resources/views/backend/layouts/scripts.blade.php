<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var  barChartOptions = {
            curveType: 'function',
            legend: { position: 'bottom' },
        };
        var  peiChartOptions = {
            curveType: 'function',
            legend: { position: 'bottom' },
        };
        var barChartData = google.visualization.arrayToDataTable([
            ['Count', 'Date'],
            @php
                foreach($userPerDateCount as $key=>$value) {
                    echo "['".date("y-m-d h:i:s",strtotime($value->created_at))."', ".(int)$value->count."],";
                }
            @endphp
        ]);
        var pieChartData = google.visualization.arrayToDataTable([
            ['Type', 'Count'],
            @php
                foreach($userPerType as $key=>$value) {
                    echo "['".$value->type."', ".(int)$value->count."],";
                }
            @endphp
        ]);
        var barChart = new google.visualization.ColumnChart(document.getElementById('barchart'));
        barChart.draw(barChartData, barChartOptions);

        var pieChart = new google.visualization.PieChart(document.getElementById('piechart'));
        pieChart.draw(pieChartData, peiChartOptions);
    }

</script>

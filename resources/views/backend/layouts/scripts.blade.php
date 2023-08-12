<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var options = {
            curveType: 'function',
            legend: { position: 'bottom' }
        };
        var barChartData = google.visualization.arrayToDataTable([
            ['Date', 'Count'],
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
        var barChart = new google.visualization.BarChart(document.getElementById('barchart'));
        barChart.draw(barChartData, options);

        var pieChart = new google.visualization.PieChart(document.getElementById('piechart'));
        pieChart.draw(pieChartData, options);
    }

</script>

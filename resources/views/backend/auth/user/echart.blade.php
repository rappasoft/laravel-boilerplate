<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<h2 style="margin:50px 0px 0px 0px;text-align: center;">User Types</h2>
<div id="piechart" style="width: 900px; height: 500px; margin-left: 235px"></div>
<script type="text/javascript">
    var phone_count_18 = <?php echo 18; ?>;
    var phone_count_19 = <?php echo 19; ?>;
    var phone_count_20 = <?php echo 20; ?>;

    var laptop_count_18 = <?php echo 18; ?>;
    var laptop_count_19 = <?php echo 19; ?>;
    var laptop_count_20 = <?php echo 20; ?>;

    var tablet_count_18 = <?php echo 18; ?>;
    var tablet_count_19 = <?php echo 19; ?>;
    var tablet_count_20 = <?php echo 20; ?>;

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Admin', 'User'],
            ['2018',  phone_count_18, laptop_count_18, tablet_count_18],
            ['2019',  phone_count_19, laptop_count_19, tablet_count_19],
            ['2020',  phone_count_20, laptop_count_20, tablet_count_20]
        ]);
        var options = {
            curveType: 'function',
            legend: { position: 'bottom' }
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
</body>
</html>

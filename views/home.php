<?php

use app\controllers\HomeController;

$controller = new HomeController();
[$stats1, $stats2] = $controller->getAllData();
?>

<h1>Home</h1>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        let stats1 = <?php echo json_encode($stats1); ?>;
        stats1.map(x => {
            x[1] = parseInt(x[1]);
            x[2] = parseInt(x[2])
        })
        stats1 = [
            ['Date', 'Orders', 'Users']
        ].concat(stats1);

        let stats2 = <?php echo json_encode($stats2); ?>;
        stats2.map(x => {
            x[1] = parseInt(x[1])
        });
        stats2 = [
            ['Date', 'Revenue']
        ].concat(stats2);

        google.charts.load('current', {
            'packages': ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            var data = google.visualization.arrayToDataTable(stats1);
            var options = {
                title: 'Orders and Users per day',
                curveType: 'function',
                hAxis: {
                    title: 'Date'
                },
                vAxis: {
                    title: 'Orders and Users'
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);

            var data2 = google.visualization.arrayToDataTable(stats2);
            var options2 = {
                title: 'Revenue per day',
                hAxis: {
                    title: 'Date'
                },
                vAxis: {
                    title: 'Revenue'
                }
            };

            var chart2 = new google.visualization.LineChart(document.getElementById('chart_div'));

            chart2.draw(data2, options2);

        }
    </script>
</head>

<body>

    <div id="curve_chart"></div>
    <div id="chart_div"></div>

</body>

</html>
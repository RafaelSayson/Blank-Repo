<?php
include('db_connect.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Browser market shares at a specific website, 2014'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                
				<?php
					$query = "SELECT COUNT(CUSTOMERNUMBER) AS 'NUMBER OF CUSTOMERS'
								FROM CUSTOMERS;";
					$results = mysqli_query ($dbc, $query);
					
					while($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
						$count = $row['NUMBER OF CUSTOMERS'];
					}
				
					$query = "SELECT COUNTRY, COUNT(CUSTOMERNUMBER) AS 'NUMCUSTOMERS'
								FROM CUSTOMERS
								GROUP BY COUNTRY;";
					$results = mysqli_query ($dbc, $query);
					
					while($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
						
						$percent = $row['NUMCUSTOMERS'] / $count * 100;
						echo "['";
						echo "{$row['COUNTRY']}' , " + $percent + "], ";
					}
				?>
            ]
        }]
    });
});
		</script>
	</head>
	<body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>
	</body>
</html>

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
            type: 'column'
        },
        title: {
            text: 'Number of Customers per Country'
        },
        subtitle: {
            text: 'Source: Sir Alain'
        },
        xAxis: {
            categories: [
				
				<?php
					$query = "SELECT COUNTRY, COUNT(CUSTOMERNUMBER) AS 'NUMBER OF CUSTOMERS'
								FROM CUSTOMERS
								GROUP BY COUNTRY;";
					$results = mysqli_query ($dbc, $query);
					
					while($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
						echo "'";
						echo "{$row['COUNTRY']}";
						echo "',";
					}
				?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Customers',
            data: [
			
			<?php
					$query = "SELECT COUNTRY, COUNT(CUSTOMERNUMBER) AS 'NUMBER OF CUSTOMERS'
								FROM CUSTOMERS
								GROUP BY COUNTRY;";
					$results = mysqli_query ($dbc, $query);
					
					while($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
						echo $row['NUMBER OF CUSTOMERS'];
						echo ",";
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
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>

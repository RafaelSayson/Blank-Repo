<?php
include('connector.php');
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
            text: 'My Swagginess Per Month'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [	
			''
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Swag meter'
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
        series: [
			<?php
					$query = "SELECT O.CITY, COUNT(E.EMPLOYEENUMBER) AS 'NUM'	FROM OFFICES O JOIN EMPLOYEES E ON E.OFFICECODE = O.OFFICECODE GROUP BY 1;";
					$results = mysqli_query($dbc, $query);
					
					while($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
						echo "{name: '";
						echo "{$row['CITY']}";
						echo "',data: [";
						echo "{$row['NUM']}";				
						echo "]},";
					}
				?>
        ]
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

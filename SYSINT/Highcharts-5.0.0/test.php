<?php
include('connector.php');


					$query = "SELECT COUNTRY , COUNT(COUNTRY) AS 'NUM' FROM customers GROUP BY 1;";
					$results = mysqli_query($dbc, $query);
					
					while($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
						echo "name: '";
						echo "{$row['COUNTRY']}";
						echo "',data: [";
						echo "{$row['NUM']}";				
						echo "],";
					}
				?>
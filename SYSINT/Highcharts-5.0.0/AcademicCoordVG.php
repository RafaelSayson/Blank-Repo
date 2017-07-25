<?php
session_start();
require_once('../../mysql_connect.php');


/*if ($_SESSION['usertype']!=2)
{
   header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/login.php");
}*/


?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>MLA </title>
		<link rel="stylesheet" type="text/css" href="designMLA.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<style>
		.dropdown-content {
			min-width: 100%;
		} 
		div#container {
			background-color:#fff;
		}
		</style>
        
		
	</head>
	<body>
<div id= "header">
        <div class="logo"><a href"#">Mona Lisa Academy</a></div>
        <a href = "#"><i class="fa fa-sign-out" ></i>    Logout</a>
    </div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<br><br>
<div class = "nav-content"> 
		<div class="nav-bar">
			<a href = '../AcademicCoordMP.php'><button class="dropbtn" style = 'padding: 16 0; width: 33%;'>Main Menu</button></a>
			<a href = '../AcademicCoordSetG.php'><button class="dropbtn" style = 'padding: 16 0; width: 33%;'>Exam Dates</button></a>
			<div class="dropdown" style = "width: 33%;">
				<button class="dropbtn" style = 'padding: 16 44%; width: 100%; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'>Grades</button>
				<div class="dropdown-content" style = "z-index: 1">
					<a href="AcademicCoordVG.php?sub=Math">Math</a>
					<a href="AcademicCoordVG.php?sub=Science">Science</a>
					<a href="AcademicCoordVG.php?sub=English">English</a>
					<a href="AcademicCoordVG.php?sub=Filipino">Filipino</a>
					<a href="AcademicCoordVG.php?sub=AP">AP</a>
					<a href="AcademicCoordVG.php?sub=MAPEH">MAPEH</a>
					<a href="AcademicCoordVG.php?sub=TLE">TLE</a>
                    <a href="../AcademicCoordVGtop10.php">Top 10</a>
				</div>
			</div>
			</div>
		</div>
                <center>School Year:<a><select id = "soflow" name = "sycode">
                    <option value="">---</option>
                    <?php
                        $query = "select sycode, schoolyear from schoolyear_ref";   
                        $results = mysqli_query($dbc, $query);
                                
                        while($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
                            echo "<option value = '".$row['sycode']."'>".$row['sycode']."-".$row['schoolyear']."</option>";             
                        } 
                    ?>
                    </select></a>
                <input type="submit" class="button" name = "sycodebtn" id = 'sycode' value="Search"></center>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto; z-index: -1">

</div>

	</body>
    <script>
    $(document).ready(function(){
    var btnsearch = document.getElementById("sycode");

        btnsearch.onclick = function() {
            var x = document.getElementById("soflow");
            var xval = x.options[x.selectedIndex].value;
            //window.location.href="AcademicCoordVG.php?sub=<?php echo $_GET['sub']?>&sycode=2016";

            console.log(xval);
            console.log("<?php echo $_GET['sub'];?>");
            if(xval != "") {
                $('#container').highcharts({
                    chart: { type: 'column'  },
                    title: { text: '<?php echo $_GET['sub']?>' },
                    xAxis: { categories: [<?php 
                                if(isset($_POST['sycodebtn'])) {
                                        
                                $query = "select sec.eduCode, rc.quartername, Avg(rc.".$_GET['sub'].") as 'GPA'
                                            from reportcard rc join student_ref st on rc.StudentID = st.studentID
                                                                join section sec on sec.sectionCode = st.sectionCode
                                            where rc.sycode = ".$_POST['sycode']."
                                            order by sec.eduCode;";   
                                $results = mysqli_query($dbc, $query);
                                
                                while($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
                                    echo "{$row['eduCode']}";               
                                    echo ",";
                                    } 
                                }   ?>],
                        crosshair: true
                    },
                    yAxis: { min: 0, title: { text: 'Grade' }},
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
                        name: 'Grade Point Average per year level',
                        data: [<?php 
                                if(isset($_POST['sycodebtn'])) {
                                $query = "select sec.eduCode, rc.quartername, Avg(rc.".$_GET['sub'].") as 'GPA'
                                            from reportcard rc join student_ref st on rc.StudentID = st.studentID
                                                                join section sec on sec.sectionCode = st.sectionCode
                                            where rc.sycode = ".$_POST['sycode']."
                                            order by sec.eduCode;";
                                $results = mysqli_query($dbc, $query);
                                
                                while($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
                                    echo "{$row['GPA']}";               
                                    echo ",";
                                    }
                                } ?>]

                    }]
                });
            }
        }
    });
    </script>
</html>

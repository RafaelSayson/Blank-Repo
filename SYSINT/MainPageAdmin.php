<?php
session_start();
require_once('../mysql_connect.php');

/*if ($_SESSION['usertype']!=2)
{
   header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/login.php");
}
*/


?>
<html>
<head>
<title>MLA </title>
<link rel="stylesheet" type="text/css" href="designMLA.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>

<body>
	<div id= "header">
		<div class="logo"><a href"#">Mona Lisa Academy</a></div>
		<a href = "MainPage.html"><i class="fa fa-sign-out" ></i>    Logout</a>
	</div>

	<div id="container">
		<div class = "nav-content"> 
		<div class="nav-bar">
			<a href = 'MainPageAdmin.php'><button class="dropbtn">Main Menu</button></a>
			<div class="dropdown">
				<button class="dropbtn">Application</button>
				<div class="dropdown-content">
					<a href="adminViewApplicants.php">View Applicant List</a>
					<a href="adminInputExamReceipt.php">Input Acknowledgement Reciept</a>
					<a href="adminViewClearedApplicants.php"> View Cleared Applicants for Exam</a>
					<a href="AdminViewScholarships.php">Approve Scholarship</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Entrance Exams</button>
				<div class="dropdown-content">
				<a href="CreateExamSchedule.php">Create Exam Schedule</a>
				<a href="adminViewExaminee.php">View Examinee List</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Class</button>
				<div class="dropdown-content">
				<a href="adminCreateClass.php">Create Class</a>
				<a href="adminviewclasslist.php">View Class List</a>
				</div>
			</div>

			<div class="dropdown">
				<button class="dropbtn">Reports</button>
				<div class="dropdown-content">
				<a href="adminViewNumOfAppRep.php">Number of Applicants Per Level</a>
				<a href="adminViewApplicantStatus.php">Regulars/ Scholars/ Probation Applicants</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Enroll</button>
				<div class="dropdown-content">
				<a href="adminEnrollExaminee.php">Enroll an Examinee</a>
				<a href="adminEnrollStudent.php">Enroll a Student</a>
				</div>
			</div>
			</div>
		</div>
		

		</div>
			<div class="content">
			<div id = "box">
				<div class="box-top">Notifications</div>
				<div class="box-panel" style = 'height: 90%'>
					<?php 
					
						$query = "SELECT e.examdesc, s.quartername, month(s.examdate) as '1', day(s.examdate) as '2'
						FROM SCHOOLEXAMS s
                        join examtype e on e.idexamtype = s.idexamtype
						where sycode = YEAR(CURDATE())
						order by s.examdate";
						$result = mysqli_query($dbc , $query);
						while( $row=mysqli_fetch_array($result,MYSQL_ASSOC) ) {
							$day = $row['2'];
							$month = $row['1'];
							$examdesc = $row['examdesc'];
							$quarter = $row['quartername'];
							echo "	<p><ul style='display:inline; ''>
										<li style = 'width: 100%;text-align:center'>
											<div id = 'boxmonth' style = 'width: 40%; display: list-item;text-decoration: none'>
											{$month}
											</div>
											<div id = 'boxdatedesc' style='width: 60%; padding:10px'>Quarter: {$quarter}, {$examdesc}</div>
											<br>
											<div id = 'boxday' style = 'width: 40%; display: list-item;text-decoration: none; padding: 10px'>
											{$day}
											</div>
											<br>
											<br>
										</li>
									</ul>
									</p>
									<br>";
						}
							
					?>	
				</div>
				
			</div>
		</div>
	
	
	

</body>



</html>

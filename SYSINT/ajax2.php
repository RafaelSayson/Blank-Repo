<?php
	require 'mysql_connect.php';
	$exits =0;
if($_POST['method']==1 or $_POST['method']==2 or $_POST['method']==3 or $_POST['method']==4){
	$id = $_POST['id'];
$exits =0;
 
 $sql = "SELECT * FROM intrdbproj.reportcard
where studentID = {$id}";  
echo $sql;
 $result = mysqli_query($dbc, $sql);   
      while($row = mysqli_fetch_array($result))  
      {  
          $exits++;
      }
	if($exits > 0)  
 {  
      echo 'Data already exists';
 }
}
	
	if($exits ==0){
	if($_POST['method']==1){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$fil = $_POST['fil'];
		$eng = $_POST['eng'];
		$mth = $_POST['mth'];
		$sci = $_POST['sci'];
		$tle = $_POST['tle'];
		$apl = $_POST['apl'];
		$mus = $_POST['mus'];
		$art = $_POST['art'];
		$phe = $_POST['phe'];
		$hea = $_POST['hea'];
		
		$query = "insert into reportcard 
				  (QuarterName, sycode, studentID, Filipino,
				   English,Math,TLE,Science, AP,Music, Arts,PE, Health)
				   values(1,year(curdate()), {$id}, {$fil}, {$eng}
				   ,{$mth}, {$sci}, {$tle}, {$apl}, {$mus}, {$art}
				   ,{$phe}, {$hea})";
		$resullt = mysqli_query($dbc , $query);
		if(mysqli_query($dbc, $query))  
 {  
      echo 'Data Inserted';
		$exists = 1;
 } 
		
	}
	else if($_POST['method']==2){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$fil = $_POST['fil'];
		$eng = $_POST['eng'];
		$mth = $_POST['mth'];
		$sci = $_POST['sci'];
		$tle = $_POST['tle'];
		$apl = $_POST['apl'];
		$mus = $_POST['mus'];
		$art = $_POST['art'];
		$phe = $_POST['phe'];
		$hea = $_POST['hea'];

		$query = "insert into reportcard 
				  (QuarterName, sycode, studentID, Filipino,
				   English,Math,TLE,Science, AP,Music, Arts,PE, Health)
				   values(2,year(curdate()), {$id}, {$fil}, {$eng}
				   ,{$mth}, {$sci}, {$tle}, {$apl}, {$mus}, {$art}
				   ,{$phe}, {$hea})";
		echo $query;
		$resullt = mysqli_query($dbc , $query);
		if(mysqli_query($dbc, $query))  
 {  
      echo 'Data Inserted';  
 } 
	}
	
	else if($_POST['method']==3){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$fil = $_POST['fil'];
		$eng = $_POST['eng'];
		$mth = $_POST['mth'];
		$sci = $_POST['sci'];
		$tle = $_POST['tle'];
		$apl = $_POST['apl'];
		$mus = $_POST['mus'];
		$art = $_POST['art'];
		$phe = $_POST['phe'];
		$hea = $_POST['hea'];

		$query = "insert into reportcard 
				  (QuarterName, sycode, studentID, Filipino,
				   English,Math,TLE,Science, AP,Music, Arts,PE, Health)
				   values(3,year(curdate()), {$id}, {$fil}, {$eng}
				   ,{$mth}, {$sci}, {$tle}, {$apl}, {$mus}, {$art}
				   ,{$phe}, {$hea})";
		echo $query;
		$resullt = mysqli_query($dbc , $query);
		if(mysqli_query($dbc, $query))  
 {  
      echo 'Data Inserted';  
 } 
	}else if($_POST['method']==4){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$fil = $_POST['fil'];
		$eng = $_POST['eng'];
		$mth = $_POST['mth'];
		$sci = $_POST['sci'];
		$tle = $_POST['tle'];
		$apl = $_POST['apl'];
		$mus = $_POST['mus'];
		$art = $_POST['art'];
		$phe = $_POST['phe'];
		$hea = $_POST['hea'];

		$query = "insert into reportcard 
				  (QuarterName, sycode, studentID, Filipino,
				   English,Math,TLE,Science, AP,Music, Arts,PE, Health)
				   values(4,year(curdate()), {$id}, {$fil}, {$eng}
				   ,{$mth}, {$sci}, {$tle}, {$apl}, {$mus}, {$art}
				   ,{$phe}, {$hea})";
		echo $query;
		$resullt = mysqli_query($dbc , $query);
		if(mysqli_query($dbc, $query))  
 {  
      echo 'Data Inserted';  
 } 
	} else if($_POST['method']==5){
		$name = $_POST['name'];
		$mdn = $_POST['mdn'];
		$lsn = $_POST['lsn'];
		$ctn = $_POST['ctn'];
		$adr = $_POST['adr'];
		$eml = $_POST['eml'];
		$edu = $_POST['edu'];
		
		$query="insert into applicant_ref (lastname,firstname,middlename,contactNo,address,email,eduCode,yearApplied) 
		values ('{$name}','{$mdn}','{$lsn}','{$ctn}','{$adr}','{$eml}','{$edu}',CURDATE())";

		echo $query;
		$resullt = mysqli_query($dbc , $query);
		if(mysqli_query($dbc, $query))  
 {  
      echo 'Data Inserted';  
 } 
		
		
	}
	}
	
?>
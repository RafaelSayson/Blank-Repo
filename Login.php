<?php
session_start();

if (isset($_SESSION['badlogin'])){
if ($_SESSION['badlogin']>=500)
       header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/blocked.php");
}

if (isset($_POST['submit'])){

$message=NULL;

 if (empty($_POST['username'])){
  $_SESSION['username']=FALSE;
  $message.='<p>You forgot to enter your username!';
 } else {
  $_SESSION['username']=$_POST['username']; 
 }

 if (empty($_POST['password'])){
  $_SESSION['password']=FALSE;
  $message.='<p>You forgot to enter your password!';
 } else {
  $_SESSION['password']=$_POST['password']; 
 }

 
 
 if(!isset($message)){
require_once('../mysql_connect.php');
$query="select username from intrdbproj.user where username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
while($row=mysqli_fetch_array($result,MYSQL_ASSOC)){

	$username = $row['username'];
	
}
if(!isset($username))
{
	$message.='<p>Username doesnt exists!';

}

require_once('../mysql_connect.php');
$query="select password from intrdbproj.user where password = '{$_SESSION['password']}'";
$result=mysqli_query($dbc,$query);

while($row=mysqli_fetch_array($result,MYSQL_ASSOC)){

	$password = $row['password'];
	
}
if(!isset($password))
{
	$message.='<p>Wrong password!';

}

require_once('../mysql_connect.php');
$query="select usertype from intrdbproj.user where username = '{$_SESSION['username']}' and password = '{$_SESSION['password']}'";
$result=mysqli_query($dbc,$query);

while($row=mysqli_fetch_array($result,MYSQL_ASSOC)){

	$usertype = $row['usertype'];
}

if(isset($usertype))
{
	
	if($usertype == 1)
	{
		$_SESSION['usertype'] = 1;
		header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/MainPageAdmin.php");
	}
	else if ($usertype == 2){
		
		require_once('../mysql_connect.php');
		$query="select userID from intrdbproj.user where username = '{$_SESSION['username']}' and password = '{$_SESSION['password']}'";
		$result=mysqli_query($dbc,$query);

		while($row=mysqli_fetch_array($result,MYSQL_ASSOC)){

			$userID = $row['userID'];
		}
		
		
		
		$_SESSION['userID'] = $userID;
		$_SESSION['usertype'] = 2;
		$_SESSION['username'] = $username;
	header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/AdviserMP.php");
	}
	else if ($usertype == 4){
		$_SESSION['usertype'] = 4;
		$_SESSION['username'] = $username;
	header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/AcademicCoordMP.php");
	}
	if ($usertype == 3){
		$_SESSION['usertype'] = 3;
		$_SESSION['username'] = $username;
	header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/GuidanceCounselorMP.php");
	}
}


}
 

if ($_SESSION['username']=="juandelacruz" &&   $_SESSION['password']=="dlsu") {

/*Of course, these should have been taken from a database*/
       $_SESSION['usertype']=101;
       header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/customer.php");
}else{
if ($_SESSION['username']=="admin" &&   $_SESSION['password']=="webtech")
{      $_SESSION['usertype']=102;
       header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/admin.php");

} else {
 $message.='<p>Please try again';
if (isset($_SESSION['badlogin']))
  $_SESSION['badlogin']++;
else
  $_SESSION['badlogin']=1;
}
}
}/*End of main Submit conditional*/



?>



<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Mona Lisa </title>
    
    
    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="css/style.css">

    
    
    
    
  </head>

  <body>

    
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Blank Repo</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>

  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<h3><?php 
		$UserMessage=null;
		if (isset($_POST['submit'])){
		 if (empty($_POST['username'])){
			$_SESSION['username']=FALSE;
			$UserMessage.='<p>You forgot to enter your username!';
				} else {
					$_SESSION['username']=$_POST['username']; 
						} 
			echo $UserMessage;
		
		}?></h3>
      <input type="text" placeholder="Username" name="username" size="20" maxlength="30" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"/>
      <h3><?php 
		$PassMessage=null;
		if (isset($_POST['submit'])){
		 if (empty($_POST['password'])){
			$_SESSION['password']=FALSE;
			$PassMessage.='<p>You forgot to enter your password!';
				} else {
					$_SESSION['password']=$_POST['password']; 
						} 
			echo $PassMessage;
		
		}?></h3>
	  <input type="password" name="password" placeholder="Password" size="20" maxlength="20" />
      <button type="submit" name="submit" value="Login">Login</button>
    </form>
  </div>
  <div class="form">
    <h2>Create an account</h2>
    <form>
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button>Register</button>
    </form>
  </div>
  <div class="cta"><a href="MainPage.php">Back To Main Page</a></div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://codepen.io/andytran/pen/vLmRVp.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>

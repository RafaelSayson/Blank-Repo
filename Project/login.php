<?php
include("config.php");
session_start();


// Go to blocked.php if login attempts reaches 50
if(isset($_SESSION['badlogin'])){
  if($_SESSION['badlogin'] >= 50)
    header("Location: http://".$_SERVER['HTTP_HOST']).dirname($_SERVER['PHP_SELF'])."/blocked.php";
}

$message = NULL;

/* Submit conditional */
if(isset($_POST['submit'])){

  $myusername = mysqli_real_escape_string($db,$_POST['username']);
  $mypassword = mysqli_real_escape_string($db,$_POST['password']);

  $sql = "SELECT userID FROM user WHERE username = '$myusername' and password = '$mypassword'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['active'];

  $count = mysqli_num_rows($result);

  if($count == 1) {
    $_SESSION['username'] = $myusername;
    $_SESSION['user_login_status'] = 1;

    /* Getting first name from username */
    $sql = "SELECT firstName, lastName, role FROM student s join user u on u.student_studentID = s.studentID WHERE u.username = '$myusername' ";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['firstname'] = $row["firstName"];
    $_SESSION['lastname'] = $row["lastName"];
    $_SESSION['role'] = $row["role"];

    header("location: hello.php");
  }
  else
    $message = "Your username or password is invalid";

  /* Test
  // If username or password is empty
  if(empty($_POST['username'])){
    $_SESSION['username'] = FALSE;
    $message .= '<p>You forgot to enter your username';
  }
  // If username is not empty
  else
    $_SESSION['username'] = $_POST['username'];

  if(empty($_POST['password'])){
    $_SESSION['username'] = FALSE;
    $message .= '<p>You forgot to enter your password';
  }
  // If password is not empty
  else
    $_SESSION['password']=$_POST['password'];

  // If successful login, go to viewStudents.php
  if($_SESSION['username'] == "juandelacruz" && $_SESSION['password'] == "DLSU"){
    $_SESSION['usertype'] = 101;
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/viewStudents.php");
  }
  // If successful login, go to admin.php
  else if($_SESSION['username'] == "admin" && $_SESSION['password'] == "1234"){
    $_SESSION['usertype'] = 102;
    header("Location: http://".$_SERVER['HTTP_HOST']).dirname($_SERVER['PHP_SELF'])."/admin.php";
  }
  // If login is not successful
  else{
    $message .= '<p>Incorrect username or password</p>';
    if(isset($_SESSION['badlogin']))
      $_SESSION['badlogin']++;
    else
      $_SESSION['badlogin'] = 1;
  }
  End of Test*/
}
/* End of Submit conditional */

?>

<html>
  <head>
    <title>Login Page</title>
    <?php include("css/imports.html"); ?>
  </head>

  <body>
    <div class="pen-title">
      <h1>SYSINTG</h1>
    </div>

    <div class="module form-module">
    <div class="toggle"></div>
    <div class="form">
      <h2>Login to your account</h2>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <input type="text" placeholder="Username" name="username" size="20">
        <input type="password" placeholder="Password" name="password" size="20">
        <h6 style="color:red;text-align:center;"><?php echo $message ?></h6>
        <button type="submit" name="submit" value="Login">Login</button>
      </form>
    </div>
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </body>

  </html>
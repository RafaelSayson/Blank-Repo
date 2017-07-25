<?php
$dbc=mysqli_connect('localhost','root','1234','sysint');

if(!$dbc) {
	die('Could not connect: '.mysql_error());
}
?>
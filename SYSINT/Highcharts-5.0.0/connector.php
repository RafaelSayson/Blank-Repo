<?php
$dbc = mysqli_connect('localhost', 'root', 'p@ssword', 'dbsales');

if(!$dbc) {
	die('Could not connect: ' .mysqli_error());
}

?>
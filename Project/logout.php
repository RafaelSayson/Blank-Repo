<?php
include("css/imports.html");
session_start();
session_destroy();
echo 'You have been logged out. <a href="login.php">Go back</a>';
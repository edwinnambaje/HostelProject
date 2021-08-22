<?php
session_start();
define('SITEURL', 'http://localhost/HostelProject/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD','');
define('DB_NAME', 'registration');


$db= mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD,DB_NAME) or die(mysqli_error());//Database Connection// initializing variables
?>
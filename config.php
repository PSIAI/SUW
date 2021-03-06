<?php
ob_start();
session_start();


date_default_timezone_set('Europe/Warsaw');


define('DBHOST','localhost');
define('DBUSER','BazaISUW');
define('DBPASS','BazaISUW1');
define('DBNAME','jakub9616');


	
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
include('classes/user.php');
$user = new User($db);

include 'classes/course.php';
$course = new Course($db);

include 'classes/file.php';
$file = new File($db);

include 'classes/statistic.php';
$stats = new Statistic($db);

?>

<?php
$hostname='localhost';
$dbname = 'executivetrackerdatabase';
$dbuser = 'executive_root';
$dbpass = 'rajat8st@#';
$params = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

$pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname.';charset=utf8', $dbuser, $dbpass, $params);
$sqlFunctionCallMethod = 'CALL ';

$link=mysqli_connect($hostname,$dbuser,$dbpass,$dbname);
$dbType = DB_MYSQL;
?>
<?php
//Config

//Database
$dbhost = 'localhost';
$dbname = 'projectdb';
$dbuser = 'user';
$dbpass = 'pass';
$dboptions = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	);

//Kodowanie strony
header('Content-Type: text/html; charset=utf-8');

?>
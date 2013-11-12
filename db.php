<?php

require_once('config.php');

try {
	$db = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpass, $dboptions);
}
catch (PDOException $e) {
	print "Error: ".$e->getMessage()."<br /> Nie połączono z bazą";
	die();
}


?>
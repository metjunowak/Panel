<?php
require_once('db.php');

echo 'hello world';

$sel = $db->prepare("SELECT * FROM users");
$sel->execute();

$selection = $db->query("SELECT * FROM users");

foreach ($selection as $key) {
	echo $key['login'].'and'.$key['status'].'<br />';
}

echo 'world hello';
$result = $sel->fetchAll();
var_dump($result);

?>
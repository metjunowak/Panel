<?php
require_once('db.php');

echo 'hello world';

$sel = $db->prepare("SELECT * FROM users");
$sel->execute();

$result = $sel->fetchAll();
var_dump($result);

?>
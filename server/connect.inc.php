
<?php

$host = 'localhost';
$user = 'root';
$pass = '';

$database = 'placement';
$connect = mysqli_connect($host,$user,$pass , $database);
if(!@$connect){
	die('could not connect');
}


?>

<?php
require('../server/connect.inc.php');
	if(isset($_POST['rollno']) && !empty($_POST['rollno'])){
		$rollno = $_POST['rollno'];
		
		$query = "SELECT * FROM `students` WHERE `rollno` = '".$rollno."' ";
		$query_run = $connect->query($query);
		
		$res = $query_run->fetch_assoc();
		print_r(json_encode($res));
	}

?>
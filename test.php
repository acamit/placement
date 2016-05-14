<?php
	
require 'server/connect.inc.php';

	$q = "Select `rollno` from students";
	$q_r = mysqli_query($connect, $q);
	

	$res = [];
	while($res_arr = mysqli_fetch_assoc($q_r)) {
		
		$key = $res_arr['rollno'];
		$key1 = preg_replace('/[^A-Za-z0-9]/', '', $key);
		$key1 = strtoupper($key1);
		
		$q1 = "UPDATE `students` SET `rollno` = '$key1' WHERE `rollno` =  '$key'";
		$q_r1 = mysqli_query($connect, $q1);
		if(!$q_r1){
			echo mysqli_error($connect);
			$res[] = $key;
		}/*else{
			echo "<br/>rows = ".mysqli_affected_rows($connect);
			echo 'updated';
		}*/ 

	}
if(count($res)>0){
	echo 'Could not update the following roll numbers.';
	foreach ($res as $key ) {
		echo $key.'<br/>';
	}
}else{
	echo 'successfull updated';
}
?>
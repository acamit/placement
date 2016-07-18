<?php
require('../server/connect.inc.php');

	$query = "show columns from students";
	$query_run = $connect->query($query);
	
	$querystring = "";
	
	while( $res = $query_run->fetch_array() ){
		if(isset($_POST[$res[0]])){
			$querystring = $querystring.",`".$res[0]."`= '".$_POST[$res[0]]."'";
		}
	} 
	
	$querystring = substr($querystring,1,strlen($querystring)) ;
	
	$query2 = "UPDATE `students` SET ".$querystring." where `rollno` = '".$_POST['previous_roll']."'";
	
	if($query_run2 = $connect->query($query2)){
		echo "Successfully Updated";
	}else {
		echo "Updation Unsuccessful";
	}
?>
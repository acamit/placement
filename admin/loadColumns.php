<?php
require('../server/connect.inc.php');
	$columns = array();
	$query = "show columns from students";
	$query_run = $connect->query($query);
	while($res = $query_run->fetch_array()){
		$columns[] = $res[0];
	}
	print_r(json_encode($columns));
?>
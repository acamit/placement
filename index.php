<?php
require_once 'include/header.inc.php';
require 'server/connect.inc.php';

/*if(!isset($_SESSION['registered'])){ */
	if(isset($_SERVER['HTTP_CLIENT_IP'])){
		$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	$remote_addr = $_SERVER['REMOTE_ADDR'];

	if(!empty($http_client_ip)){
		$ip = $http_client_ip;
	}else if(!empty($http_x_forwarded_for)){
		$ip = $http_x_forwarded_for;
	}else{
		$ip = $remote_addr;
	}

	$ip_array = explode('.', $ip);
// ($ip_array[0]='172' && $ip_array[1]='17' && ( $ip_array[2]='0' || $ip_array[2]='1' || $ip_array[2]='2' || $ip_array[2]='3' ) ) || ($ip_array[0]='192' && $ip_array[1]='168' &&  $ip_array[2]='690' ) 
	if( ($ip_array[0]==172 && $ip_array[1] == 17 &&  $ip_array[2]==0) || ($ip_array[0]==192&& $ip_array[1] == 168 &&  $ip_array[2]==70)   || ($ip_array[0]==172 && $ip_array[1] == 17 &&  $ip_array[2]==2) || ($ip_array[0]==202&& $ip_array[1] == 164 &&  $ip_array[2]==51)    ||($ip_array[0]==172 && $ip_array[1] == 17 &&  $ip_array[2]==1)  ||($ip_array[0]==172 && $ip_array[1] == 17 &&  $ip_array[2]==2)   || ($ip_array[0]==172 && $ip_array[1] == 17 &&  $ip_array[2]==3)  ||	( $ip_array[0] == 192 && $ip_array[1] == 168 && $ip_array[2] == 69) || ( $ip_array[0] == 192 && $ip_array[1] == 168 && $ip_array[2] == 64) || $ip == '::1' || ( $ip_array[0] == 127 && $ip_array[1] == 0 && $ip_array[2] == 0)  ){
	
	$query = "SELECT `id` , `company_name` FROM `companies` WHERE `status` = '1'";
 $query_run = mysqli_query($connect , $query);
 if(mysqli_num_rows($query_run) == 1 ):
 	$res = mysqli_fetch_assoc($query_run);
	$company = $res['company_name'];
	$_SESSION['company'] = $res['id'];
 else:
 	$company = '';
endif;
 ?>


	
	<body>
		<div class = "box" >
			<div class="page-header">
				<?php if(!empty($company)){?>
					<h3>Campus Placement&nbsp;&nbsp;&nbsp;<small>by <?php echo $company;?></small></h3>
				<?php }else{?>
				<h3>No registrations have begin yet.</h3>
<?php			}?>

			</div>
			<?php if(!empty($company)){ ?>
			<div>
				<form action = "confirmation.php" method = "POST" class = "form-inline">			
					<div class="form-group">
						<label for="">University Roll Number</label><br>
						<input type="text" class="form-control" name = "roll_num" id="" placeholder="Enter Roll Number" required = "required">
					</div><br><br>
					<button type="submit" class="btn btn-default">Register</button>
				</form>
			</div>
		</div>
	<?php }


/*}else{*/
	?>
	<!-- <div class = "box" >
			<div class="page-header">
					<h3>Sorry! You cannot register again.</h3>
				

			</div> -->
<?php 
	}else{ ?>
		 <div class = "box" >
			<div class="page-header">
					<h3>404! Page not found</h3>
				

			</div> 
	<?php 
}

?>
	</body>

</html>
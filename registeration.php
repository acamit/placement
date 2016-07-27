<?php
require_once 'include/header.inc.php';

require 'server/connect.inc.php';

if(!isset($_SESSION['registered'])){ 
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


}else{?>
	<div class = "box" >
			<div class="page-header">
					<h3>Sorry! You cannot register again.</h3>
				

			</div>
<?php }

?>
	</body>

</html>
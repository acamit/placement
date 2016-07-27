

<?php
require_once 'include/header.inc.php';
require_once 'server/connect.inc.php';
$message = "";
if(isset($_POST['roll_num']) && !empty($_POST['roll_num'])){

	$roll_num = $_POST['roll_num'];

	$query = "SELECT * FROM `attendance` WHERE `Rollno` = '".$roll_num."' AND `company_id`='".$_SESSION['company']."'";
	$query_run = mysqli_query($connect , $query);
	$attendance = mysqli_num_rows($query_run);
	if($attendance==0){
		$query1 = "INSERT INTO `attendance`(`Rollno` , `company_id`) VALUES('".mysqli_real_escape_string($connect,$roll_num)."' , '".$_SESSION['company']."') ";

		if($query1_run = mysqli_query($connect , $query1)){
			$message = 1;
			unset($_SESSION['company']);
			$_SESSION['registered'] = 1;
		}

	}
	else{
		$message = 2;
		$_SESSION['registered'] = 1;
	}
	?>
		<body>
			<div class = "box">
				<div class = "text last">
					<?php 
						if($message == 1){
					?>
							Successfully registered for the test.<br/>Please follow the instructions by the invigilator to continue the test.
					<?php
						}else if($message == 2 ){
					?>
							You have already appeared for the test.
					<?php
						}
					 ?>
				</div>
			</div>
			<?php }else{
				header('Location: registeration.php');
			}
				?>
	</body>

</html>
<?php 
require_once 'include/header.inc.php';

require 'server/connect.inc.php';

if(isset($_POST['roll_num'])){
	$roll_num = $_POST['roll_num'];
	if(!empty($roll_num)){
		$roll_num = mysqli_real_escape_string($connect , $roll_num);
		
		$roll_num = preg_replace('/[^A-Za-z0-9]/', '', $roll_num);
		$roll_num = strtoupper($roll_num);
		
		$query = "SELECT  * FROM `students` WHERE `rollno` = '".$roll_num."'";
		/*$query = "SELECT  * FROM `students` WHERE `rollno` = '".$roll_num."' OR `email`='".$roll_num."' OR `mobile`='".$roll_num."' ";*/
		$query_run = @mysqli_query($connect , $query);
		$num_rows = @mysqli_num_rows($query_run);
		if($num_rows == 1){
			$detail = mysqli_fetch_assoc($query_run);
			$name = $detail['name'];
			$course = $detail['UG'].' '.$detail['UGspecialization'];
			$campus = $detail['campus']
?>

	<body>
	<link rel="stylesheet" href="css/loader.css">
		<div class = "box"><br/>

			<div>
				<div class = "text"> Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $name;?> </div>
				<div class = "text"> Class &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $course; ?> </div>
				<div class = "text"> Rollno &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $roll_num;?> </div>
				<div class = "text"> Campus : <?php echo $campus; ?></div>
			</div>

			<br/><br/>
			<div id =  "container">

				<a href="index.php" class="btn btn-default" onclick="disablebutton()" >Re Enter..</a>
				
				
				<form action = "thanks.php" method = "POST" class = "inline">
					<input id = "hidden" name = "roll_num" value = "<?php echo $roll_num; ?>">
					<button type="submit" id = "button" class="btn btn-default" onclick="disablebutton()">Confirm..</button>
				</form>
				
			</div>
			<div class="loading-pulse"></div>
		</div>
		<script type="text/javascript">

		 function disablebutton(){
		 	
		 		document.getElementById("button").disabled = "true";
		 		document.getElementById("container").style.display = "none";
		 		document.querySelector(".loading-pulse").style.display = "block";
		 	
		 }
			 
		</script>
	</body>
	
</html>

<?php
		} else if($num_rows == 0){
					
?>

	<body>
		<div class = "box Error"> 
			<?php echo $roll_num;?> does not exist.<br/>
			Please try entering email or Phone Number. <br/>
			If problem persists contact Placement Department for further queries.
			<br/>
			<a href="index.php">Retry</a>
		</div>
	</body>
</html>

<?php	}
	}
}
?>
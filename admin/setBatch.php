<?php
session_start();
if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==1){

	require_once('../server/connect.inc.php');
	 if(isset($_POST['batch'])){
	 	$batch = $_POST['batch'];

	 	if(!empty($batch)){

	 		$q = "UPDATE `batches` SET `current_batch` = ".$batch."  WHERE `id`= 1 ";
            $res = mysqli_query($connect , $q);
              if($res){
                echo 1;
              }

	 	}else{
      	echo 'Please Enter a batch.';
      }
	 }


}else{
    // echo $_SESSION['isLogin'];
    header('Location: index.php');
  }

?>
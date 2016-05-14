<?php
session_start();
  if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==1){

  require_once('../server/connect.inc.php');
	 if(isset($_POST['companyName'])){
      $company = $_POST['companyName'];
      
      if(!empty($company)){
        $q = "SELECT * from `companies` where `status` = '1'";
        $res = mysqli_query($connect , $q);
        $num = mysqli_num_rows($res);
        if($num>0){
          echo "There is already an active test. Please end it before adding a new test.";
        }else{
          
            if(isset($_POST['url']) && !empty($_POST['url'])){
            	$url = $_POST['url'];
              $q = "UPDATE `companies` SET `status` = '1' , `url` = '$url' where `id`='$company'";
            }else{
              $q = "UPDATE `companies` SET `status` = '1' where `id`='$company'";
            }
              $res = mysqli_query($connect , $q);
              if($res){
                echo 1;
              }/*else{
              	echo mysqli_error($connect);
              }
          */
        }
      }else{
      	echo 'Please Select a company.';
      }
    }



    if(isset($_POST['endCompanyName'])){
      $company = $_POST['endCompanyName'];
      if(!empty($company)){
        $q = "SELECT `status` from `companies` where `id` = '$company'";
        $res = mysqli_query($connect , $q);
        $num = mysqli_num_rows($res);
        if($num>0){
          $status = mysqli_fetch_assoc($res)['status'];
          if($status==0){
          	echo 'No test to end';
          }else{
          	$q = "UPDATE `companies` SET `status` = '0'  where `id`='$company'";
            $res = mysqli_query($connect , $q);
            if($res){
              echo 'Test ended successfully.';
            }else{
              echo 'Unable to end the test.';
            }
          }
    	}else{
    		echo 'Please Select a valid company';
    	}
   }else{
    echo 'Please Select a company';
   }

 }
  }else{
    // echo $_SESSION['isLogin'];
    header('Location: index.php');
  }

?>
<?php
	require_once'../server/connect.inc.php';
	require_once '../include/PHPExcel.php';
	if(isset($_FILES['result']['name']) && isset($_POST['company']) ){

			$name = $_FILES['result']['name'];
			$size = $_FILES['result']['size'];
			$type = $_FILES['result']['type'];
			$tmp_name = $_FILES['result']['tmp_name'];
			$error = $_FILES['result']['error'];
			$info = new SplFileInfo($name);
			$extension = $info->getExtension();
			
			$company = $_POST['company'];
			if(!empty($name)){
				 if( ($extension=='xls' || $extension == 'xlsx') /*&& $type = 'image/jpeg'*/ ){
					 $location = '';
					 if(move_uploaded_file($tmp_name , $location.$name) ){
              
              /**  Identify the type of $inputFileName  **/
							
              $inputFileType = PHPExcel_IOFactory::identify($location.$name);
							
              /**  Create a new Reader of the type that has been identified  */
							
              $objReader = PHPExcel_IOFactory::createReader($inputFileType);
							
              /**  Load $inputFileName to a PHPExcel Object  **/
							
              try{
								$objPHPExcel  = PHPExcel_IOFactory::load($location.$name);
							}catch(Exception $e){
								die("Error Loading File : " .$e->getMessage());
								}
							
							 $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true , true , true);
							 $arrayCount = count($allDataInSheet);
							 for($i=1; $i<=$arrayCount; $i++){
								 if( !empty($allDataInSheet[$i]["A"])){
										$rollno = $allDataInSheet[$i]["A"];
										$query = "UPDATE attendance SET `status` = '1' WHERE `Rollno` = '$rollno' AND `company_id` = '$company'";
								 		if($query_run = mysqli_query($connect , $query)){
						                    $query = "SELECT `Count` FROM `record` WHERE `Rollno` = '$rollno'";
						                    $query_run = mysqli_query($connect , $query);
						                     if(mysqli_num_rows($query_run)>0){
						                       	$c = mysqli_fetch_assoc($query_run);
						                       	$countNew= $c['Count']+1;
						            			$q_update = "UPDATE record SET `Count` = '".$countNew."' WHERE `Rollno` = '$rollno'";
						                        $res_update = mysqli_query($connect , $q_update);
						                        $_SESSION['message']="Results have been uploaded";
						                     }else{
						                        $q = "Select `rollno` FROM `students` WHERE `rollno` = '$rollno'";
						                        $q_check = mysqli_query($connect , $q);
						                        if(mysqli_num_rows($q_check)>0){
						                          $q_insert = "INSERT INTO `record`(`Rollno` , `Count`) VALUES('$rollno' , 1)";
						                          $res_insert = mysqli_query($connect , $q_insert);
						                          if($res_insert){
						                              $_SESSION['message']="Results have been uploaded";
						                          }
						                        }
						                        else{
						                              $_SESSION['message']="$rollno doesnot exist in records";
						                        }
						                    }
										}
								}
							 }
							/* if(count($noSubmission)){
							 			echo 'Following Students did not submit the assignment for this topic. Will be awarded zero by default.<br/>';
										foreach($noSubmission as $roll){
											echo $roll.'<br/>';
										}
									}else{
										header('Location: teacher_home.php');
									}*/
							unlink($location.$name);
					 }
					 else{
						 $_SESSION['message']= 'Unexpected Error';
					 }
				 }
				 else{
					 $_SESSION['message'] = 'File must be a Microsoft excel sheet in the specified format <br/><roll no> with no column names or additional info.';
				 }
			 }
			 else{
				$_SESSION['message'] = 'Please Select a File';
			 }
	}
	?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Upload Results</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <script src="../assets/js/jquery.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>DASHGUM FREE</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Marcel Newman</h5>
              	  	
                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="registerCompany.php" >
                          <i class="fa fa-desktop"></i>
                          <span>New Company Entry</span>
                      </a>
                      
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="startTest.php" >
                          <i class="fa fa-cogs"></i>
                          <span>Start Company's Test</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a  href="companies.php" >
                          <i class="fa fa-book"></i>
                          <span>Edit Company Entry</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="students.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Manage Student Records</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Schedule</span>
                      </a>
                  </li>
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
		<section id="main-content">
			
          <section class="wrapper">
			
              <div class="row">
                  <div class="col-lg-9 main-chart">
                  <h3><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Results</h3> <?php if(isset($_SESSION['message']) && !empty($_SESSION['message']))
				  echo $_SESSION['message']; ?>
				  <div class="row mt">
					<div class="col-lg-12">
						<div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Company Details</h4>
            <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="uploadresults.php">
            <!--   <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Year</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name = "year" id="year"  required="required">
                                    
                                     <?php
                                               $d = date('Y');
                                               $d1 = $d-1;
                                               echo '<option value ="'.$d1.'" id="Y'.$d1.'">'.$d1.'</option>';
                                               echo '<option value ="'.$d.'" id="Y'.$d.'">'.$d.'</option>';
                                       ?>
                                  </select>
                              </div>
                          </div> -->
             <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Company Name</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name = "company" id="company"  required="required">
                                    <option value="">Select a company</option>
                                     <?php
                                          $query = "SELECT * from `companies` where `year`= '".date('Y')."'";
                                            if($query_run = mysqli_query($connect , $query)){
                                              while($res = mysqli_fetch_assoc($query_run)){
                                                echo '<option value = \''.$res['id'].'\' id=\'Start'.$res['id'].'\'>'.$res['company_name'].'</option>';
                                              }
                                            }
                                       ?>
                                  </select>
                              </div>
                          </div>
             
                         <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Select a file</label>
                              <div class="col-sm-8">
                                  <input type="file"  name="result" id="result">
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-8"></div>
                                 <div class="col-sm-4">
                                  <button type= "submit" id="start" class="form-control btn btn-success">Upload</button> 
                              </div>
                          </div>
                        
          </form>
            </div>
            
           
          			</div>
				  </div>
                  						
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>NOTIFICATIONS</h3>
                                        
                      <!-- First Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>2 Minutes Ago</muted><br/>
                      		   <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                      		</p>
                      	</div>
                      </div>
                      <!-- Second Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>3 Hours Ago</muted><br/>
                      		   <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
                      		</p>
                      	</div>
                      </div>
                      <!-- Third Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>7 Hours Ago</muted><br/>
                      		   <a href="#">Brandon Page</a> purchased a year subscription.<br/>
                      		</p>
                      	</div>
                      </div>
                      <!-- Fourth Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>11 Hours Ago</muted><br/>
                      		   <a href="#">Mark Twain</a> commented your post.<br/>
                      		</p>
                      	</div>
                      </div>
                      <!-- Fifth Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>18 Hours Ago</muted><br/>
                      		   <a href="#">Daniel Pratt</a> purchased a wallet in your store.<br/>
                      		</p>
                      	</div>
                      </div>

                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><!--/row -->
          </section>
      </section>

	  <!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="../assets/js/chart-master/Chart.js"></script>
   

  <script>


      //custom select box

     /*  $(function(){
          $('select.styled').customSelect();
      }); */

  </script>

  </body>
</html>

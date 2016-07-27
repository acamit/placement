<?php
session_start();
  if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==1){
  require_once('../server/connect.inc.php');
   $company = "";
   $startDate = "";
   $endDate = "";
   $classes = [];
  if(isset($_POST['company']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['classes']) ){
    $company = mysqli_real_escape_string($connect , trim($_POST['company']));
    $startDate = mysqli_real_escape_string($connect , trim($_POST['startDate']));
    $endDate = mysqli_real_escape_string($connect , trim($_POST['endDate']));
    $classes = $_POST['classes'];
    $error = [];
    $errorMessage = "";
    $messageSuccess = "";
    if(!empty($company) && !empty($startDate) && !empty($endDate) && !empty($classes)){
      $classes = implode('|' , $classes);
      if($startDate>$endDate){
        $error['date'] = "End date cannot be earlier than start date.";
      }

      if(strlen($company)<3){
        $error['company']="Minimum 3 characters.";
      }

      if(!array_filter($error)){
        $year = date('Y');
        if(isset($_POST['CTC']) && !empty($_POST['CTC'])){
          $ctc = $_POST['CTC'];
        $q= "INSERT INTO `companies`(`company_name` , `year` , `start_date` ,  `end_date` , `classesAllowed` , `CTC`)VALUES('$company' , '$year', '$startDate' , '$endDate' , '$classes' , '$ctc')";
        }else{
        $q= "INSERT INTO `companies`(`company_name` , `year` , `start_date` ,  `end_date` , `classesAllowed`)VALUES('$company' , '$year', '$startDate' , '$endDate' , '$classes')";

        }
        $res= mysqli_query($connect , $q);
        if($res){
          $messageSuccess = "Company record added.";
        }else{
          $errorMessage = mysqli_error($connect);
        }
      }
    }else{
      $errorMessage = $error."\nPlease fill in all the values";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register Company</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

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
            <a href="dashboard.php" class="logo"><b>Placement Department</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
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
              
              	  <
              	  	
                  <li class="mt">
                      <a href="dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="registerCompany.php" >
                          <i class="fa fa-desktop"></i>
                          <span>New Company Entry</span>
                      </a>
                      
                  </li>

                  <li class="sub-menu">
                      <a href="startTest.php" >
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
                      <a href="uploadresults.php" >
                          <i class="fa fa-th"></i>
                          <span>Upload Results</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="report.php" >
                          <i class="fa fa-th"></i>
                          <span>Generate Report</span>
                      </a>
                  </li>
                  <!--
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Schedule</span>
                      </a>
                  </li>
                  -->
                  

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
                  <div class="col-lg-12 main-chart">
                  <h3><i class="fa fa-angle-right"></i> Register Company</h3>
				  <div class="row mt">
					<div class="col-lg-12">
            <?php
              if(!empty($errorMessage)){
                  echo '<div class="alert alert-danger">'.$errorMessage.'</div>';
                
              }
              if(!empty($messageSuccess)){
                  echo '<div class="alert alert-success">'.$messageSuccess.'</div>';
                
              }
            ?>
            <div class="form-panel">
						<h4 class="mb"><i class="fa fa-angle-right"></i> Company Details</h4>
						<form class="form-horizontal style-form" method="POST">
							<div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Company Name</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" required="required" name="company" id="company" value="<?php if(empty($messageSuccess))echo $company; ?>" />
                                  <?php 
                                    if( isset($error['company']) && !empty($error['company'])){
                                        echo '<span class="alert-danger">'.$error['company'].'</span>';
                                      
                                    }
                                  ?>
                                  
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Date Of Drive</label>
                              <div class="col-sm-8">
                                  <input type="date" class="form-control" required="required" name="startDate" id="startDate" min="<?php echo date('Y-m-d');?>" value="<?php if(empty($messageSuccess)) echo $startDate; ?>" />
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Expected End Date</label>
                              <div class="col-sm-8">
                                  <input type="date" class="form-control" required="required" name="endDate" id="endDate" min="<?php echo date('Y-m-d')?>" value="<?php if(empty($messageSuccess)) echo $endDate; ?>"/>
                                  <?php 
                                    if( isset($error['date']) && !empty($error['date'])){
                                        echo '<span class="alert-danger">'.$error['date'].'</span>';
                                      
                                    } 
                                  ?>
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Classes Allowed to sit</label>
                              <div class="col-sm-8">
                                  <select multiple="multiple" class="form-control" size=4 name="classes[]" id="classes" required="required" >
                                      <option value="B.Tech CSE" >B.Tech CSE</option>
                                      <option value="B.Tech ECE" >B.Tech ECE</option>
                                      <option value="B.Tech CE" >B.Tech CE</option>
                                      <option value="M.Tech(SS)" >M.Tech(SS)</option>
                                      <option value="M.C.A(FYIC)" >M.C.A(FYIC)</option>
                                      <option value="M.C.A(TYC)" >M.C.A(TYC)</option>
                                      <option value="M.C.A(SS)" >M.C.A(SS)</option>
                                  </select>
                              </div>
                          </div>
              <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Package Offered</label>
                              <div class="col-sm-8">
                                  <input type="number" step = "0.1" class="form-control" name="CTC" id="CTC" value="<?php if(empty($messageSuccess)) echo $ctc; ?>"/>
                                  <?php 
                                    if( isset($error['ctc']) && !empty($error['ctc'])){
                                        echo '<span class="alert-danger">'.$error['ctc'].'</span>';
                                      
                                    } 
                                  ?>
                              </div>
                          </div>
              <div class="form-group">
                <div class="col-sm-3 pull-right">
                     <input type="submit" class="form-control" value="Add New Company">
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
                  
                  
              </div>
          </section>
      </section>

	  <!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Developed by: Amit Chawla & Himanshu Gupta
              <a href="dashboard.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
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
    <script src="../assets/js/chartjs-conf.js"></script>
  <script>
      //custom select box

     /*  $(function(){
          $('select.styled').customSelect();
      }); */

  </script>

  </body>
</html>
<?php
  }else{
    // echo $_SESSION['isLogin'];
    header('Location: index.php');
  }
?>
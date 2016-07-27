<?php
session_start();
  if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==1){
  require_once('../server/connect.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <title>Change Password</title>

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
            <a href="dashboard.php" class="logo"><b>Placement Department</b></a>
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
              
              	  <!--
                  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Marcel Newman</h5>
              	  	-->
                  <li class="mt">
                      <a href="dashboard.php">
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
                   <li class="sub-menu">
                      <a class="active" href="changePassword.php" >
                          <i class="fa fa-th"></i>
                          <span>Change Password</span>
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
                  <h3><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Change Password</h3>
				  <div class="row mt">
					<div class="col-lg-12">
						<div class="form-panel">
            <!--<h4 class="mb"><i class="fa fa-angle-right"></i> Company Details</h4>-->
            <div class="form-horizontal style-form" method="post" action="changePassword.php">
              <form id="changePassword" method="POST">
              <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Enter New Password</label>
                              <div class="col-sm-8">
                                  <input type="password" class="form-control" name="password" id="password">
                              </div>
                          </div>
             
                         <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Re-enter Password</label>
                              <div class="col-sm-8">
                                  <input type="password" class="form-control" name="password1" id="password1">
                              </div>
                          </div> 
                          <div class="form-group">
                            <div class="col-sm-8"></div>
                                 <div class="col-sm-4">
                                  <button id="change" class="form-control btn btn-success" type="submit">Change Password</button> 
                              </div>
                          </div>
                        </form>
          </div>
            </div>
            
            <style type="text/css">
                .label.label-primary {
                      display: inline-block;
                      margin-left: 50%;
                      margin-top: 1em;
                      padding: 1em;
                      font-size: 1em;
                    }
            </style>
        	</div>
				  </div>
                  						
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  
              </div><!--/row -->
          </section>
      </section>

	  <!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
                Developed by: Amit Chawla & Himanshu Gupta
              <a href="changePassword.php#" class="go-top">
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
<?php
if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
echo   $_SESSION['message'].'<br/>';
}
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

  if(isset($_POST['password']) && isset($_POST['password1'])){
    $pass= $_POST['password'];
    $pass1= $_POST['password1'];
    if(!empty($pass) && !empty($pass1)){
      if(strcmp($pass, $pass1)==0){
        $q = "UPDATE `login` SET `password` = '".md5($pass)."' WHERE `login`.`id` = '".$_SESSION['id']."';";
        $res = mysqli_query($connect, $q);
        if($res && mysqli_affected_rows($connect) ){
        echo $_SESSION['message']="Password updated successfully";
        }else{
         echo $_SESSION['message']= mysqli_affected_rows($connect);
        }
      }else{
        echo 'Passwords donot match';
      }
    }else{
      echo $_SESSION['message'] = "Please fill in both the fields";
    }
  }
  }else{
    echo $_SESSION['isLogin'];
    header('Location: index.php');
  }
?>
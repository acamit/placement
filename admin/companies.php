<?php
session_start();
  if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==1){
  require_once('../server/connect.inc.php');
  require_once('../include/constants.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <title>Companies</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <link href="../assets/css/table-responsive.css" rel="stylesheet">
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
            <a href="dashboard.html" class="logo"><b>Placement Department</b></a>
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
                      <a class="active" href="companies.php" >
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
					             
        <div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i>Companies This Year
                <!--<form action="search.php" type="POST">
                  <input type="search" class="pull-right" name="key" placeholder="search" >
                </form>-->
                </h4>
              
                          <section id="no-more-tables">
                                    <?php
                                      $q = "SELECT * FROM `companies` where `year`='".CURRENT_BATCH."'";
                                      $res= mysqli_query($connect , $q);
                                      if(mysqli_num_rows($res)>0){
                                        
                                    ?>
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      
                                      <th>Company Name</th>
                                      <th class="numeric">Date of Visit</th>
                                      <th class="numeric">Classes Allowed</th>
                                      <th class="numeric">Students Appeared</th>
                                      <th class="numeric">Students Selected</th>
                                      <th class="numeric">Package Offered</th>
                                      <!-- <th class="numeric">Visiting Official</th> -->
                                      <!-- <th class="numeric">Volume</th> -->
                                  </tr>
                                  </thead>
                                  <tbody>
                                     <?php
                                      $char= array('|');
                                        while( $row = mysqli_fetch_assoc($res)){
                                          $attendance =  "SELECT count(*) as present FROM `attendance` where `company_id`='".$row['id']."'";
                                          $res1= mysqli_query($connect , $attendance);
                                          $num_appeared = mysqli_fetch_assoc($res1)['present']; 
                                          $selected =  "SELECT count(*) as selected FROM `attendance` where `company_id`='".$row['id']."' and `status`='1' ";
                                          $res1= mysqli_query($connect , $selected);
                                          
                                          $num_selected = mysqli_fetch_assoc($res1)['selected'];
                                     ?> 
                                  <tr>
                                      <td data-title="Company Name"><?php echo $row['company_name']?></td>
                                      <td class="numeric" data-title="Date of Visit"><?php echo $row['start_date']?></td>
                                      <td class="numeric" data-title="Classes Allowed">
                                        <?php 
                                      if(!empty($row['classesAllowed'])){

                                              // echo $row['classesAllowed'];
                                              echo str_replace($char ,  ',', $row['classesAllowed']);
                                          }else{
                                            echo '-N.A-';
                                          }

                                      ?></td>
                                      <td class="numeric" data-title="Students Appeared"><?php echo $num_appeared; ?></td>
                                      <td class="numeric" data-title="Students Selected"><?php echo $num_selected; ?></td>
                                      <td class="numeric" data-title="Package Offered"><?php 
                                      if(!empty($row['CTC']))
                                        echo $row['CTC']; 
                                      else
                                        echo '-N.A-';
                                      ?></td>
                                      <!-- <td class="numeric" data-title="Visiting Official"><?php ?></td> -->
                                      <!-- <td class="numeric" data-title="Volume">9,395</td> -->
                                  </tr>
                                  <?php
                                  }
                                ?>
                                  </tbody>
                              </table>
                                <?php

                              }else{
                                echo "<br/><br/><center>No Companies have visited this year.</center>";
                              }
                                ?>
                          </section>
                      </div><!-- /content-panel -->
                  </div><!-- /col-lg-12 -->
              </div><!-- /row -->
                  						
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
              </div><!-- /row -->
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
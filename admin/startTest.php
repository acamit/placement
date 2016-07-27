<?php
session_start();
  if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==1){
  require_once('../server/connect.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <title>Start Test</title>

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

          <h3><i class="fa fa-angle-right"></i> Set Current Batch </h3>


          <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      
                      <div class="form-horizontal style-form" method="post">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Enter The Current Batch</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name = "batch" id = "batch" placeholder="e.g. 2016">
                              </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-8"></div>
                                 <div class="col-sm-4">
                                  <button id="set_batch" class="form-control btn btn-success"> Set </button> 
                              </div>
                          </div>
 
                      </div>

                  </div>
              </div><!-- col-lg-12-->       
            </div>

            <script type="text/javascript">
              $(document).ready(function(){
                  $('#set_batch').click(function(){
                    
                    batch = $('#batch').val();
                    data = {batch:batch};

                    $.ajax({
                      type:"POST", 
                      cache:false,
                      url:"setBatch.php",
                      data:data,
                      success:function(result){
                        if(result == 1){
                          alert("Current Batch Was Set Successfully");
                          $('#batch').val('');
                        }
                      }
                    });
                  });
              });
            </script>












			
              <div class="row">
                  <div class="col-lg-12 main-chart">
                  <h3><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Start Test</h3>
				  <div class="row mt">
					<div class="col-lg-12">
						<div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Company Details</h4>
            <div class="form-horizontal style-form" method="post">
              <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Company Name</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name = "start_companyName" id="start_companyName"  required="required">
                                    <option value="">Select a company</option>
                                     <?php
                                          $query = "SELECT * from `companies` where (`start_date`>+'".date('Y-m-d')."' OR `end_date`>='".date('Y-m-d')."') AND `status`=0";
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
                              <label class="col-sm-3 col-sm-3 control-label">Test URL</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="url" id="url">
                              </div>
                          </div> 
                          <div class="form-group">
                            <div class="col-sm-8"></div>
                                 <div class="col-sm-4">
                                  <button id="start" class="form-control btn btn-success">Start Test</button> 
                              </div>
                          </div>
                        
          </div>
            </div>
            <div class="label label-primary">Or</div>
            <style type="text/css">
                .label.label-primary {
                      display: inline-block;
                      margin-left: 50%;
                      margin-top: 1em;
                      padding: 1em;
                      font-size: 1em;
                    }
            </style>
            <script type="text/javascript">
              $(document).ready(function(){
                  $('#start').click(function(){
                    companyName = $('#start_companyName').val();
                    companyNameText = $('#start_companyName option:selected').text();
                    url = $('#url').val();
                    if(url!=""){
                      data = {companyName:companyName , url:url};
                    }else{
                      data = {companyName:companyName};
                    }

                    $.ajax({
                      type:"POST", 
                      cache:false,
                      url:"test.php",
                      data:data,
                      success:function(result){
                        if(result==1){
                          alert("test started");
                           $('#Start'+companyName).remove();
                           $('#end_companyName').append($('<option>' , {
                              value : companyName,
                              text :  companyNameText, 
                              id : 'End'+companyName
                           }));
                        }else{
                          alert(result);
                         
                        }
                      }
                    });
                  });
              });
            </script>
            <!-- <br/>
            <div class="btn btn-primary btn-sm" role="button">End test</div> -->
             <h3><i class="fa fa-angle-right"></i>&nbsp;&nbsp;End Test</h3>
      <div class="form-panel" id="endTest">
            <h4 class="mb"><i class="fa fa-angle-right"></i>Company Details</h4>
            <div class="form-horizontal style-form">
              <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Company Name</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name = "end_companyName" required="required" id="end_companyName">
                                    <option value="">Select a company</option>
                                     <?php
                                          $query = "SELECT * from `companies` where `status`='1' ";
                                            if($query_run = mysqli_query($connect , $query)){
                                              while($res = mysqli_fetch_assoc($query_run)){
                                                echo '<option value = \''.$res['id'].'\' id=\'End'.$res['id'].'\'>'.$res['company_name'].'</option>';
                                              }
                                            }
                                       ?>
                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-8"></div>
                                 <div class="col-sm-4">
                                  <button class="form-control btn btn-danger" id="endButton">End Test</button>
                              </div>
                          </div>
                        
          </div>
            </div>
  <script type="text/javascript">
              $(document).ready(function(){
                  $('#endButton').click(function(){
                    companyName = $('#end_companyName').val();
                      data = {endCompanyName:companyName};
                      companyNameText = $('#end_companyName option:selected').text();
                    $.ajax({
                      type:"POST", 
                      cache:false,
                      url:"test.php",
                      data:data,
                      success:function(result){
                          alert(result);
                          $('#End'+companyName).remove();
                           $('#start_companyName').append($('<option>' , {
                              value : companyName,
                              text :  companyNameText, 
                              id : 'Start'+companyName
                           }));

                      }
                    });
                  });
              });
            </script>

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
              <a href="startTest.php#" class="go-top">
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
  }else{
  /*  echo $_SESSION['isLogin'];*/
    header('Location: index.php');
  }
?>
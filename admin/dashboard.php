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
   
    <title>Dashboard</title>

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
                      <a class="active" href="dashboard.php">
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
                      <a href="changePassword.php" >
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
						<div id="containerChart" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
						<div id="containerChart1" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
						<div id="containerChart2" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
		
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
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharts.com/modules/data.js"></script>
	<script src="http://code.highcharts.com/modules/drilldown.js"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>

<?php include('graphData.php');?>
  <script>
  
$(function () {
    $('#containerChart').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Company wise placement Stats'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
             <?php
             if(isset($list) && count($list)>0){
              $count = 0;
              foreach($list as $key) {
                  $count++;
                  if($count<count(($list)))
                      echo "'$key[company_name]' , ";
                  else
                      echo "'$key[company_name]'";
            }
             }?>
            ],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of students',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' '
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Appeared',
            data: [<?php
              if(isset($list) && count($list)>0){
                $count = 0;
                foreach ($list as $key) {
                    $count++;
                    if($count<count(($list)))
                        echo "$key[Appeared] , ";
                    else
                        echo "$key[Appeared]";
              }
             }?>]
        }, {
            name: 'Placed',
            data: [<?php
              if(isset($list) && count($list)>0){
                $count = 0;
                foreach ($list1 as $key) {
                    $count++;
                    if($count<count(($list1)))
                        echo "$key , ";
                    else
                        echo "$key";
              }
             }?>]
        }]
    });
});

$(function () {
    // Create the chart
    $('#containerChart1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Year/Campus Wise Placements'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'year'
        },
        yAxis: {
            title: {
                text: 'Total no of students placed.'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.4f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.4f}%</b> of total<br/>'
        },

        series: [{
            name: "Year",
            colorByPoint: true,
            data: [<?php
            if(isset($yearWiseData) && count($yearWiseData)>0){
            	$count=0;
              $c = count($yearWiseData);

            	foreach ($yearWiseData as $key) {
                  	echo json_encode($key);
            		if($count<$c){
            			echo ',';
            			$count++;	
            		}
              }
            }
             ?>]
        }],
        drilldown: {
            series: [<?php 
            if(isset($campusYearWiseSeries) && count($campusYearWiseSeries)>0){
            $count=0;
            $c = count($campusYearWiseSeries);
            foreach ($campusYearWiseSeries as $key) {
                  echo json_encode($key);
                  if($count<$c){
            			   echo ',';
            			}
                $count++; 
              }
            } ?>]
        }
    });
});

$(function () {
    // Create the chart
    $('#containerChart2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Year/Course Wise Placements'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'year'
        },
        yAxis: {
            title: {
                text: 'Total no of students placed.'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.4f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.4f}%</b> of total<br/>'
        },

        series: [{
            name: "Year",
            colorByPoint: true,
            data: [<?php 
            	if(isset($yearWiseData) && count($yearWiseData)>0){
            $count=0;
              $c = count($yearWiseData);
            	foreach ($yearWiseData as $key) {
                  	echo json_encode($key);
            		if($count<$c){
            			echo ',';
            			
            		}
                $count++; 
            }
            } ?>]
        }],
        drilldown: {
            series: [<?php 
            if(isset($courseYearWiseSeries) && count($courseYearWiseSeries)>0){
            $count=0;
            $c = count($courseYearWiseSeries);
            foreach ($courseYearWiseSeries as $key) {
                  echo json_encode($key);
                     if($count<$c){
            			echo ',';
                }
            			$count++;	
            } 
          }?>]
        }
    });
});
  </script>

  </body>
</html>
<?php
  }else{
    /*echo $_SESSION['isLogin'];*/
    header('Location: index.php');
  }
?>
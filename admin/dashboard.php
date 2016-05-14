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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

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
                      <a class="active" href="index.php">
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
						<div id="containerChart" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
						<div id="containerChart1" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
		
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
              </div><! --/row -->
          </section>
		   </section>

	  <!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 - A&H Associates
              <a href="blank.html#" class="go-top">
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

/*fetch data to use in graphs*/
<?php
    $q = "SELECT `companies`.`id` , `companies`.`company_name` , count(`Rollno`) AS 'Appeared' FROM `companies` ,`attendance` WHERE `companies`.`id` = `attendance`.`company_id` GROUP BY `companies`.`id`";
                         // $q = "SELECT `id` , `company_name` FROM `companies`  WHERE `year` = '".CURRENT_BATCH."' ";
                          $res = mysqli_query($connect , $q);
                         // echo "error = " . mysqli_error($connect);
                          if(mysqli_num_rows($res)>0){
                            while($row = mysqli_fetch_assoc($res)){
                             
                              $list[] = $row;
                            }
                          }


                          foreach ($list as $key) {
                            
                              $q = "SELECT count(Rollno) as 'Placed' FROM `attendance`  WHERE `status` = '1' AND `company_id`= $key[id] ";
                              $res = mysqli_query($connect , $q);
                           //  echo "error = " . mysqli_error($connect);
                              if(mysqli_num_rows($res)>0){
                                while($row = mysqli_fetch_assoc($res)){
                                  $list1[] = $row['Placed'];
                                }
                              }else{
                                  $list1[] = 0;
                              }
                          }


/*
*
*ChART 2
**/

    $years = array();
    $yearWiseData = array();
    $campus = array();
    $campusYearWiseSeries = array();

    $q = "SELECT DISTINCT(`year`) as year FROM `companies`";
    $res = mysqli_query($connect , $q);
    if(mysqli_num_rows($res)>0){
      while ($row = mysqli_fetch_assoc($res)) {
         $years[]= $row['year'];
          
      }
    }


    $q = "SELECT DISTINCT(`campus`) as campus FROM `students`";
    $res = mysqli_query($connect , $q);
    if(mysqli_num_rows($res)>0){
      while ($row = mysqli_fetch_assoc($res)) {
         $campus[]= $row['campus'];
      }
    }

    $yearWiseObj = new stdClass();
    $campusYearWiseObj = new stdClass();
  foreach ($years as $year) {
        $yearWiseObj->name = $year;
        $yearWiseObj->drilldown = $year;
        
        $q = "SELECT count(`record`.`RollNo`) as placed FROM `record`,`students` WHERE `record`.`RollNo`=`students`.`rollno` AND `students`.`batch`=$year";
        $res = mysqli_query($connect , $q);

        $q1 = "SELECT count(`rollno`) as total FROM `students` WHERE `batch`=$year";
        $res1 = mysqli_query($connect , $q1);

        if(mysqli_num_rows($res)>0 && mysqli_num_rows($res1)>0 ){
          $row = mysqli_fetch_assoc($res);
          $row1 = mysqli_fetch_assoc($res1);
         
              $placed=intval($row['placed']);
              $total = intval($row1['total']);
              
              if($total>0){
                $percent=$placed/$total;
              }else{
                $percent =0;
               }

              $yearWiseObj->y=$percent;
        }
        $yearWiseData[] = $yearWiseObj;


        $campusYearWiseObj->name=$year;
        $campusYearWiseObj->id=$year;
        $campusYearWiseObj->data = array();
        foreach ($campus as $keyCampus) {

          $q = "SELECT count(`record`.`RollNo`) as placed FROM `record`,`students` WHERE `record`.`RollNo`=`students`.`rollno` AND `students`.`batch`=$year AND `students`.`campus`='$keyCampus'";
          $res = mysqli_query($connect , $q);

          $q1 = "SELECT count(`rollno`) as total FROM `students` WHERE `batch`=$year AND `students`.`campus`= '$keyCampus'";
          $res1 = mysqli_query($connect , $q1);
          if(mysqli_num_rows($res)>0 && mysqli_num_rows($res1)>0 ){
            $row = mysqli_fetch_assoc($res);
            $row1 = mysqli_fetch_assoc($res1);
           
                $placedCampus =intval($row['placed']);
                $totalCampus = intval($row1['total']);
                
                if($totalCampus>0){
                  $percentCampus=$placedCampus/$totalCampus;
                }else{
                  $percentCampus =0;
                }

                $campusYearWiseObj->data[] = array(
                  $keyCampus , $percentCampus
                  );
          }
        }
        $campusYearWiseSeries[] = $campusYearWiseObj;
    }
?>

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
              $count = 0;
              foreach ($list as $key) {
                  $count++;
                  if($count<count(($list)))
                      echo "'$key[company_name]' , ";
                  else
                      echo "'$key[company_name]'";

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
              $count = 0;
              foreach ($list as $key) {
                  $count++;
                  if($count<count(($list)))
                      echo "$key[Appeared] , ";
                  else
                      echo "$key[Appeared]";

             }?>]
        }, {
            name: 'Placed',
            data: [<?php
              $count = 0;
              foreach ($list1 as $key) {
                  $count++;
                  if($count<count(($list1)))
                      echo "$key , ";
                  else
                      echo "$key";

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
            text: 'Year Wise Placements'
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
            data: [<?php foreach ($yearWiseData as $key) {
                  echo json_encode($key);
            } ?>]
        }],
        drilldown: {
            series: [<?php foreach ($campusYearWiseSeries as $key) {
                  echo json_encode($key);
            } ?>]
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
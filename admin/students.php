<?php
session_start();
  if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==1){
  require_once('../server/connect.inc.php');
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <title>Students</title>

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
  
  <style>
    
    input {
  
  border:0px;
  background:transparent;
  border-bottom:1px solid;
  width:70%;
}
button.search {
  border:0px;
  background:transparent;
}
    
  </style>
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
                      <a class="active" href="students.php" >
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

              <div class="row mt">
                  <div class="col-lg-12">
                  <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Student Records</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                    <th>id</th>
                    <th class="numeric" width = "10%">Roll No.<br/>
                    <form method = "get" action = "students.php">
                      <input type="text" name = "roll_no" autocomplete = "off" />
                      <button class="search" type="submit">
                        <i class = "fa fa-search"></i>
                      </button>
                    </form>
                    </th>
                    <th class="numeric" width = "15%" >Name<br/>
                    <form method = "get" action = "students.php" id = "form">
                      <input type="text" name = "name1" autocomplete = "off" />
                      <button class="search" type="submit">
                        <i class = "fa fa-search"></i>
                      </button>
                    </form></th>
                    <th class="numeric" width = "10%">Class<br/>
                    <form method = "get" action = "students.php">
                      <input type="text" name = "class" autocomplete = "off" />
                      <button class="search" type="submit">
                        <i class = "fa fa-search"></i>
                      </button>
                    </form></th>
                    <th class="numeric" width = "10%">Department<br/>
                    <form method = "get" action = "students.php">
                      <input type="text" name = "dept" autocomplete = "off" />
                      <button class="search" type="submit">
                        <i class = "fa fa-search"></i>
                      </button>
                    </form></th>
                    <th class="numeric"width = "25%" >Email Id<br/>
                    <form method = "get" action = "students.php">
                      <input type="text" name = "mail_id" autocomplete = "off" />
                      <button class="search" type="submit">
                        <i class = "fa fa-search"></i>
                      </button>
                    </form></th>
                    <th class="numeric" width = "10%">Mobile No<br/>
                    <form method = "get" action = "students.php">
                      <input type="text" name = "mobile_no" autocomplete = "off" />
                      <button class="search" type="submit">
                        <i class = "fa fa-search"></i>
                      </button>
                    </form></th>
                    <th class="numeric" width = "10%">CGPA<br/>
                    <form method = "get" action = "students.php">
                      <input type="text" name = "cgpa" autocomplete = "off" />
                      <button class="search" type="submit">
                        <i class = "fa fa-search"></i>
                      </button>
                    </form>
                    </th>
                    <th width = "8%"> Edit </th>
                                  </tr>
                                  </thead>
                  <tbody>
                   
                   <?php

                   /*=============== Get Current Batch ======================*/

                   $query_batch = "SELECT `current_batch` FROM `batches` WHERE id = 1 ";

                   $query_batch_run  = $connect->query($query_batch);
                   $current_batch = $query_batch_run->fetch_assoc();

                   //echo $current_batch[current_batch];

                    if(isset($_GET['page']) && !empty($_GET['page'])){
                     $current_page = $_GET['page'];
                     $next_page = $current_page + 1;
                     $previous_page = $current_page - 1;
                   }else{
                     $current_page = 0;
                     $next_page = $current_page + 1;
                     $previous_page = $current_page - 1;
                   } 
                   
                    if(isset($_GET['roll_no']) && !empty($_GET['roll_no'])){
                      $roll_no = $_GET['roll_no'];
                       $to_add_in_link  = '?roll_no='.$roll_no.'&&';
                       $query = "SELECT * FROM `students` where `rollno` LIKE '%".$roll_no."%' AND `batch` = $current_batch[current_batch] LIMIT 20 OFFSET ".$current_page*20;
                       $query2 = "SELECT * FROM `students` where `rollno` LIKE '%".$roll_no."%' AND `batch` = $current_batch[current_batch] ";
                    }else if(isset($_GET['name1']) && !empty($_GET['name1'])){
                      $name = $_GET['name1'];
                       $to_add_in_link  = '?name='.$name.'&&';
                       $query = "SELECT * FROM `students` where `name` LIKE '%".$name."%' AND `batch` = $current_batch[current_batch] LIMIT 20 OFFSET ".$current_page*20;
                       $query2 = "SELECT * FROM `students` where `name` LIKE '%".$name."%' AND `batch` = $current_batch[current_batch] ";
                    }else if(isset($_GET['class']) && !empty($_GET['class'])){
                      $class = $_GET['class'];
                       $to_add_in_link  = '?class='.$class.'&&';
                       $query = "SELECT * FROM `students` where `UG` LIKE '%".$class."%' AND `batch` = $current_batch[current_batch] LIMIT 20 OFFSET ".$current_page*20;
                       $query2 = "SELECT * FROM `students` where `UG` LIKE '%".$class."%' AND `batch` = $current_batch[current_batch] ";
                    } else if(isset($_GET['dept']) && !empty($_GET['dept'])){
                      $dept = $_GET['dept'];
                       $to_add_in_link  = '?dept='.$dept.'&&';
                       $query = "SELECT * FROM `students` where `UGspecialization` LIKE '%".$dept."%' AND `batch` = $current_batch[current_batch] LIMIT 20 OFFSET ".$current_page*20;
                       $query2 = "SELECT * FROM `students` where `UGspecialization` LIKE '%".$dept."%' AND `batch` = $current_batch[current_batch] ";
                    }else if(isset($_GET['mail_id']) && !empty($_GET['mail_id'])){
                      $mail_id = $_GET['mail_id'];
                       $to_add_in_link  = '?mail_id='.$mail_id.'&&';
                       $query = "SELECT * FROM `students` where `email` LIKE '%".$mail_id."%' AND `batch` = $current_batch[current_batch] LIMIT 20 OFFSET ".$current_page*20;
                       $query2 = "SELECT * FROM `students` where `email` LIKE '%".$mail_id."%' AND `batch` = $current_batch[current_batch] ";
                    }else if(isset($_GET['mobile_no']) && !empty($_GET['mobile_no'])){
                      $mobile_no = $_GET['mobile_no'];
                       $to_add_in_link  = '?mobile_no='.$mobile_no.'&&';
                       $query = "SELECT * FROM `students` where `mobile` LIKE '%".$mobile_no."%' AND `batch` = $current_batch[current_batch] LIMIT 20 OFFSET ".$current_page*20;
                       $query2 = "SELECT * FROM `students` where `mobile` LIKE '%".$mobile_no."%' AND `batch` = $current_batch[current_batch] ";
                    }else if(isset($_GET['cgpa']) && !empty($_GET['cgpa'])){
                      $cgpa = $_GET['cgpa'];
                       $to_add_in_link  = '?cgpa='.$cgpa.'&&';
                       $query = "SELECT * FROM `students` where `aggregateUG` > ".$cgpa." AND `batch` = $current_batch[current_batch] ORDER BY  `aggregateUG` DESC LIMIT 20 OFFSET ".$current_page*20;
                       $query2 = "SELECT * FROM `students` where `aggregateUG` > ".$cgpa." AND `batch` = $current_batch[current_batch]";
                    } else {
                       $to_add_in_link  = '?';
                       $query = "SELECT * FROM `students` WHERE `batch` = $current_batch[current_batch] LIMIT 20 OFFSET ".$current_page*20;
                       $query2 = "SELECT * FROM `students` WHERE `batch` = $current_batch[current_batch]";
                    }
                   //$column_query = SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'placement' AND TABLE_NAME = 'students';
                   
                   
                   $total_results = mysqli_num_rows($connect->query($query2)) ;
                   
                   $page_count = ceil($total_results/20);
                    
                   
                    if($query_run = $connect->query($query)){
                      ;
                         while( $res = $query_run->fetch_object()){
                           echo '<tr>';
                          echo '<td data-title="id">#</td>';
                          echo '<td data-title="Roll No.">'.$res->rollno.'</td>';
                          echo '<td class="" data-title="Name">'.$res->name.'</td>';
                          echo '<td class="numeric" data-title="Class">'.$res->UG.'</td>';
                          echo '<td class="" data-title="Department">'.$res->UGspecialization.'</td>';
                          echo '<td class="numeric" data-title="Email Id">'.$res->email.'</td>';
                          echo '<td class="numeric" data-title="Mobile No">'.$res->mobile.'</td>';
                          echo '<td class="numeric" data-title="CGPA">'.$res->aggregateUG.'</td>';
                    echo '<td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" onClick = "get_data(\''.$res->rollno.'\');" ><i class="fa fa-pencil"></i></button></td>';
                          echo '</tr>';
                         }                                                             
                      } else {
                        echo 0;
                      }
    
                   
                   ?>
                                  
                             
                  </tbody>
                              </table>
                
                
                
                          </section>
              <div> &nbsp;&nbsp;&nbsp;&nbsp;Showing <?php echo $current_page*20 + 1; ?> to <?php echo $current_page*20 + 20; ?> of <?php echo $total_results; ?> results</div>
                <nav>
                  <ul class="pager">                  
                    <?php if($previous_page > 0):?>
                      <li><a href="<?php echo $_SERVER['SCRIPT_NAME'].$to_add_in_link.'page='.$previous_page;?>">Previous</a></li>
                    <?php elseif($current_page == 1):?>
                      <li><a href="<?php echo $_SERVER['SCRIPT_NAME'].$to_add_in_link;?>">Previous</a></li>
                    <?php else :?>
                      <li class = "disabled"><a class = "disabled" href="">Previous</a></li>
                    <?php endif; ?>
                    
                    <?php if($current_page == $page_count - 1):?>
                    <li class = "disabled"><a href="">Next</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo $_SERVER['SCRIPT_NAME'].$to_add_in_link.'page='.$next_page;?>">Next</a></li>
                    <?php endif;?>
                  </ul>
                </nav>
                      </div><!-- /content-panel -->
                        
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                 </div><! --/row -->
          </section>
      </section>

    <!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Developed by: Amit Chawla & Himanshu Gupta
              <a href="students.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
          <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal style-form" method="post"  id = "edit_form">
                <?php
                  $query3 = "show columns from students";
                  if($query_run2 = $connect->query($query3)){
                                           while($res = $query_run2->fetch_array()){
                       echo '<div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">'.$res[0].'</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name = "'.$res[0].'" value = "">
                            </div>
                          </div>' ; 
                       }
                                            }else {
                        echo 'Sorry Error Occured . Please try Again Later. ';
                      }
                ?>
                </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id = "save_changes">Save changes</button>
                  </div>
                </div>
              </div>
            </div>  
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
 
     /*  $(function(){
          $('select.styled').customSelect();
      }); */
    var datastring = "";
    function get_data(roll_no){

      $.ajax({
      type: "POST",
      url: "loadData.php",
      data: {rollno:roll_no},
      cache: false,
      success: function(result){
        
        $("form")[0].reset();

        
        Object.size = function(obj) {
          var size = 0, key;
          for (key in obj) {
            if (obj.hasOwnProperty(key)) size++;
          }
          return size;
        };
        result = JSON.parse(result);
        datastring = "";
        keys = Object.keys(result);
        var size = Object.size(keys);
        datastring = 'previous_roll='+roll_no;
        for (i = 0 ; i<size ;i++){
          var key = keys[i];
          
          $('[name= "'+key+'"]').val(result[key]);
        }
        
      }
      });
    }
    
    $(document).ready(function(){
     
    $('#save_changes').click(function(){
      
       $.ajax({
      type: "POST",
      url: "loadColumns.php",
    
      cache: false,
      success: function(result){
        result = JSON.parse(result);
        
        for(i = 0 ; i < result.length;i++){
        datastring = datastring +'&' + result[i] + '=' + $('[name= "'+result[i]+'"]').val();
        }
        alert(datastring);
        $.ajax({
        type: "POST",
        url: "editData.php",
        data: datastring,
        cache: false,
        success: function(result){
          
        alert(result);
        window.location.reload();
        }
      });
        
      }
      });
      
      
      
      
      
    });
     
    });

  </script>

  </body>
</html>
<?php
  }else{
  /*  echo $_SESSION['isLogin'];*/
    header('Location: index.php');
  }
?>
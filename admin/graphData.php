<?php
    $q = "SELECT `companies`.`id` , `companies`.`company_name` , count(`Rollno`) AS 'Appeared' FROM `companies` ,`attendance` WHERE `year`=(SELECT `current_batch` FROM `batches` WHERE id='1') AND `companies`.`id` = `attendance`.`company_id`  GROUP BY `companies`.`id`";
                         // $q = "SELECT `id` , `company_name` FROM `companies`  WHERE `year` = '".CURRENT_BATCH."' ";
                          $res = mysqli_query($connect , $q);
                         // echo "error = " . mysqli_error($connect);
                          if(mysqli_num_rows($res)>0){
                            while($row = mysqli_fetch_assoc($res)){
                             
                              $list[] = $row;
                            }
                          }

              if(isset($list) && count($list)>0){

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
                        }

 /*For pdf generation*/
      $companyWiseData =  array();
              
      $companyWiseData[]=$list;
      $companyWiseData[]=$list1;
    

/*
*
*ChART 2
**/

    $years = array();
    $yearWiseData = array();
    $campus = array();
    $campusYearWiseSeries = array();
    $coursesUG = array();
    $coursesUGSpecialization = array();
    $coursesPG = array();
    $coursesPGSpecialization = array();
    $courseYearWiseSeries = array();

    /*FOR PDF GENERATIONS*/
    $campusWiseArr = array();
    $courseWiseArr = array();

    $q = "SELECT DISTINCT(`year`) as year FROM `companies` ORDER BY `year` DESC LIMIT 5";
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


    $q = "SELECT `UG`,`UGspecialization` FROM students WHERE `PG`='N.A.' GROUP BY `UG`, `UGspecialization`";
    $res = mysqli_query($connect , $q);
    if(mysqli_num_rows($res)>0){
      while ($row = mysqli_fetch_assoc($res)) {
         $coursesUG[]= $row['UG'];
         $coursesUGSpecialization[]= $row['UGspecialization'];
      }
    }
    $q = "SELECT `PG`,`PGspecialization` FROM students WHERE `PG`!='N.A.' GROUP BY `PG`, `PGspecialization`";
    $res = mysqli_query($connect , $q);
    if(mysqli_num_rows($res)>0){
      while ($row = mysqli_fetch_assoc($res)) {
         $coursesPG[]= $row['PG'];
         $coursesPGSpecialization[]= $row['PGspecialization'];
      }
    }
  
  foreach ($years as $year) {
    
    $yearWiseObj = new stdClass();
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
        /*FOR PDF GENERATION*/
        $campusWiseObj = new stdClass();
        $campusWiseObj->year=$year;
        $campusWiseObj->data= array();
        
        /*FOR GRAPHS*/
        $yearWiseData[] = $yearWiseObj;
        $campusYearWiseObj = new stdClass();
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
                /*for pdf generation*/
                $temp = new stdClass();
                $temp->about = $keyCampus;
                $temp->total = $totalCampus;
                $temp->placed = $placedCampus;
                $temp->percent = $percentCampus;
                $campusWiseObj->data[]= $temp;

                $campusYearWiseObj->data[] = array(
                  $keyCampus , $percentCampus
                  );
          }
        }

        $campusWiseArr[]= $campusWiseObj;
        $campusYearWiseSeries[] = $campusYearWiseObj;



        /*Course wise information*/

        $CourseYearWiseObj = new stdClass();
        $CourseYearWiseObj->name=$year;
        $CourseYearWiseObj->id=$year;
        $CourseYearWiseObj->data = array();
         /*FOR PDF GENERATION*/
        $courseWiseObj = new stdClass();
        $courseWiseObj->year=$year;
        $courseWiseObj->data= array();

        $i=0;
        foreach ($coursesUG as $keyCourse) {
          $keyCoursesUGSpecialization=$coursesUGSpecialization[$i];
          $q = "SELECT count(`record`.`RollNo`) as placed FROM `record`,`students` WHERE `record`.`RollNo`=`students`.`rollno` AND `students`.`batch`=$year AND `students`.`UG`='$keyCourse' AND `students`.`UGspecialization`= '$keyCoursesUGSpecialization' AND `PG`='N.A.'";
          $res = mysqli_query($connect , $q);

          $q1 = "SELECT count(`rollno`) as total FROM `students` WHERE `batch`=$year AND `students`.`UG`='$keyCourse' AND `students`.`UGspecialization`= '$keyCoursesUGSpecialization' AND  `PG`='N.A.'";
          $res1 = mysqli_query($connect , $q1);
          if(mysqli_num_rows($res)>0 && mysqli_num_rows($res1)>0 ){
            $row = mysqli_fetch_assoc($res);
            $row1 = mysqli_fetch_assoc($res1);
           
                $placedUGCourse =intval($row['placed']);
                $totalUGCourse = intval($row1['total']);
                
                if($totalUGCourse>0){
                  $percentCampus=$placedUGCourse/$totalUGCourse;
                }else{
                  $percentCampus =0;
                }
                /*for pdf generation*/
                $temp = new stdClass();
                $temp->about = $keyCourse;
                $temp->total = $totalUGCourse;
                $temp->placed = $placedUGCourse;
                $temp->percent = $percentCampus;
                $courseWiseObj->data[]= $temp;


                $CourseYearWiseObj->data[] = array(
                  $keyCourse.' '.$keyCoursesUGSpecialization , $percentCampus
                  );

          }

          $i++;
        }
       
        $i=0;
        foreach ($coursesPG as $keyCourse) {
          $keyCoursesPGSpecialization=$coursesPGSpecialization[$i];
          $q = "SELECT count(`record`.`RollNo`) as placed FROM `record`,`students` WHERE `record`.`RollNo`=`students`.`rollno` AND `students`.`batch`=$year AND `students`.`PG`='$keyCourse' AND `students`.`PGspecialization`= '$keyCoursesPGSpecialization' AND  (`PG`!='N.A.' || `PGspecialization`!='N.A.')";
          $res = mysqli_query($connect , $q);

          $q1 = "SELECT count(`rollno`) as total FROM `students` WHERE `batch`=$year AND `students`.`PG`='$keyCourse' AND `students`.`PGspecialization`= '$keyCoursesPGSpecialization' AND  (`PG`!='N.A.' || `PGspecialization`!='N.A.')";
          $res1 = mysqli_query($connect , $q1);
          if(mysqli_num_rows($res)>0 && mysqli_num_rows($res1)>0 ){
            $row = mysqli_fetch_assoc($res);
            $row1 = mysqli_fetch_assoc($res1);
           
                $placedPGCourse =intval($row['placed']);
                $totalPGCourse = intval($row1['total']);
                
                if($totalPGCourse>0){
                  $percentCampus=$placedPGCourse/$totalPGCourse;
                }else{
                  $percentCampus =0;
                }

                 /*for pdf generation*/
                $temp = new stdClass();
                $temp->about = $keyCourse;
                $temp->total = $totalPGCourse;
                $temp->placed = $placedPGCourse;
                $temp->percent = $percentCampus;
                $courseWiseObj->data[]= $temp;

                $CourseYearWiseObj->data[] = array(
                  $keyCourse.' '.$keyCoursesPGSpecialization , $percentCampus
                  );

          }
          $i++;
        }
        $courseWiseArr[]= $courseWiseObj;
        $courseYearWiseSeries[] = $CourseYearWiseObj;
    }
?>

<?php
	session_start();
  	if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==1){
  	require_once('../server/connect.inc.php');
  	$limit=1;
    $PHP_SELF = $_SERVER['PHP_SELF'];
  	if(isset($_GET['key'])){
  		$var = $_GET['key'];
      if(isset($_GET['s'])){
        $s= $_GET['s'];
      }
  		$trimmed =  trim($var);
  		if(!empty($trimmed)){
  			$trimmed_array = explode(" " , $trimmed);
  			foreach ($trimmed_array as $trimm ) {
  				$query = "SELECT * FROM `companies` where `year`='".date('Y')."' and company_name LIKE \"%$trimm%\" ";
  				$num_results = mysqli_query($connect , $query);
  				$row_num_links_main = mysqli_num_rows($num_results);

  				if(empty($s)){
  					$s=0;
  				}
        	$query .="LIMIT $s , $limit";
  				$num_results = mysqli_query($connect , $query);
  				$row= mysqli_fetch_assoc($num_results);

  				do{
  					$added_array[] = $row['id'];
        	}while($row= mysqli_fetch_assoc($num_results));
  			}

        if($row_num_links_main == 0 && $row_set_num==0){
          $resultmsg = "<p>Search results for: $trimmed </p><p>Sorry, your search returned zero results</p>" ;
        }

        $tmparr = array_unique($added_array);
        foreach ($tmparr as $key) {
          $query = "SELECT * FROM `companies` where `year`='".date('Y')."' and id=$key";
          $num_value = mysqli_query($connect , $query);
          $row_linkcat = mysqli_fetch_assoc($num_value);
          $row_num_links = mysqli_num_rows($num_value);

          $company_name = preg_replace ( "'($var)'si" , "<b>\\1</b>" , $row_linkcat[ 'company_name' ] );

          foreach($trimmed_array as $trimm){

          if($trimm != 'b' ){

          //IF you added more fields to search make sure to add them below as well.

          $company_name = preg_replace( "'($trimm)'si" ,  "<b>\\1</b>" , $company_name);

          }
          if( isset ($resultmsg)){

echo $resultmsg;

exit();

}else{

echo "Search results for: " . $var;

}

          echo '<p>'.$company_name.'</p>';
        }

        
        if($row_num_links_main > $limit){
          if($s>=1){
            $prev = $s-$limit;
            echo "<div align='left'><a href='$PHP_SELF?s=$prev&key=$var'>Back</a></div>";
          }
/*echo $limit.'<br/>';
echo $row_num_links_main;*/
          /*echo */$slimit = $s + $limit;
          if( !($slimit>=$row_num_links_main) && $row_num_links_main!=1 ){
            $n = $s + $limit;

            echo "<div align='right'><a href='$PHP_SELF?s=$slimit&key=$var'>Next</a></div>";
          }
        }


  		}
  	}else{
  		$resultmsg =  "<p>Search Error</p><p>We don't seem to have a search parameter!</p>";
  	}
  }
}
?>
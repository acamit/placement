<form action="upload.php" method="post" enctype="multipart/form-data">
	<input name="up" type="file" />
	<input name="" type="submit" value="Upload" />
</form>
<?php
	require_once 'include/PHPExcel/IOfactory.php';
	if(isset($_FILES['up']['name']) ){
		$name = $_FILES['up']['name'];
		$size = $_FILES['up']['size'];
		$type = $_FILES['up']['type'];
		$tmp_name = $_FILES['up']['tmp_name'];
		$error = $_FILES['up']['error'];
		$info = new SplFileInfo($name);
		$extension = $info->getExtension();
		
		if(!empty($name)){
			 
			 if( ($extension=='xls' || $extension == 'xlsx') /*&& $type = 'image/jpeg'*/ ){
				 $location = '';
				 if( move_uploaded_file($tmp_name , $location.$name) ){

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
								$rollno = trim($allDataInSheet[$i]["A"]);
								$rollno = preg_replace(['^A-Za-z0-9'], '', $rollno)
								echo $rollno;
								echo '<br/>';
							}
						}
							 

				 }
		
			}
		}
	}
?>


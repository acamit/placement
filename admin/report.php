<?php
session_start();
  if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==1){
	require_once('../server/connect.inc.php');
	require('graphData.php');
	require('../include/fpdf.php');
	require('MultiCellTable.php');
	$pdf = new PDF();

	$headerCompanies = array('S.No', 'Company Name', 'Students Appeared', 'Students Selected');
	$headerCampus = array('S.No','Campus','Total Students', 'Students Selected' , '%age');
	$headerCourse = array('S.No','Course', 'Total Students', 'Students Selected' ,'%age');

	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial' ,'', 11);
	$w = array(15, 55, 50, 50);
	$pdf->SetWidths($w);
	$pdf->FancyTableCompanies($headerCompanies , $companyWiseData);
	$w = array(15, 45, 45, 45 , 20);
	$pdf->SetWidths($w);
	
	$pdf->AddPage();
	$pdf->SetFont('Arial' ,'B', 13);
	 $pdf->Cell(0,7,'Campus wise record' , 0,1,'C' ,false);
	$pdf->FancyTable($headerCampus , $campusWiseArr);
	
	$pdf->AddPage();
	$pdf->Cell(0,7,'Course wise record' , 0,1,'C' ,false);

	$pdf->FancyTable($headerCourse , $courseWiseArr);

	//$pdf->Output('D' , 'report.pdf');
	$pdf->Output();
	 }else{
    /*echo $_SESSION['isLogin'];*/
    header('Location: index.php');
  }
?>
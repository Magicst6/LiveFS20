<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 30.11.2018
 * Time: 12:09
 */
include 'db.php';
//$Lehrer=$_GET['lehrer'];
//preg_match("/:(.*)/", $Lehrer, $output_array);
//$Lehrer=$output_array[1];

$y=0;
$Kursname=$_GET['q'];
$KlasseInput=$_GET['k'];
$Lehrer=$_GET['l'];



preg_match("/:(.*)/", $Lehrer, $output_array);
$Lehrer=$output_array[1];

$semester=$_GET['s'];
$isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

while ($line1 = mysqli_fetch_array($result)) {

    $semDB=$line1['Semesterkuerzel'];

}
if ($semDB==$semester){
	

$Tab="sv_LernenderKurs";
}
else
{ 
$Tab=$semester."_LernenderKurs";
}
$TabN=$semester."_Noten";
preg_match("/:(.*)/", $Lehrer, $output_array);
$Lehrer=$output_array[1];



  $isEntry = "Select * From $Tab where KursID='$Kursname' order by Nachname asc ";
    $result = mysqli_query($con, $isEntry);
    $events = array();
if ($Kursname<>"-Select-"){
	
	
    while ($line1 = mysqli_fetch_array($result)) {
		
		
		$data = array(
			
		  'Vorname' => $line1['Vorname'],
			 'Nachname' => $line1['Nachname'],
			 'IDSchueler' => $line1['SchuelerID'],
			'Klasse' => $line1['Klasse']
			);
				



}
}


	echo json_encode($data);
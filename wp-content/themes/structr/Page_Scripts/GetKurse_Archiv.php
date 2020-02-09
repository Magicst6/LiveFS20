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
$Semester=$_GET['q'];
$KlasseInput=$_GET['k'];
$Lehrer=$_GET['l'];

preg_match("/:(.*)/", $Lehrer, $output_array);
$Lehrer=$output_array[1];



$KurseTab=$Semester."_Kurse";
				


    $isEntry = "Select * From $KurseTab  ";
    $result = mysqli_query($con, $isEntry);
    $events = array();
if ($Semester<>""){
	
	

    while ($line2 = mysqli_fetch_array($result)) {
		
		$data[] = array(
			
			 'ID' => $line2['ID'],
			'Klasse' => $line2['Klasse'],
			'Kursname' => $line2['Kursname'],
			'KursID' => $line2['KursID'],
			'Tag' => $line2['Tag'],
			'Uhrzeit' => $line2['Uhrzeit'],
			'Startdatum' => $line2['Startdatum'],
			'Enddatum' => $line2['Enddatum'],
			'Lehrperson' => $line2['Lehrperson']);
           
	
    }
		
}
	

	echo json_encode($data);




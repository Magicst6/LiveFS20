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



$KurseTab=$Semester."_AbwesenheitenKompakt";
				


    $isEntry = "Select * From $KurseTab  ";
    $result = mysqli_query($con, $isEntry);
    $events = array();
if ($Semester<>""){
	
	

    while ($line2 = mysqli_fetch_array($result)) {
		
		$data[] = array(
			
			 
			'Klasse' => $line2['Klasse'],
			'Kursname' => $line2['Kursname'],
			'Datum' => $line2['Datum'],
			'Kommentar' => $line2['Kommentar'],
			'KommentVer' => $line2['KommentVerw'],
			'Abwesenheitsdauer' => $line2['Abwesenheitsdauer'],	
			'Nachname' => $line2['Nachname'],
			'Vorname' => $line2['Vorname'],
           'Lehrer' => $line2['Lehrer'],
		 'Entschuldigt' => $line2['Entschuldigt']);
	
    }
		
}
	

	echo json_encode($data);




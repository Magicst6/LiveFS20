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

 $isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

    while ($line1 = mysqli_fetch_array($result)) {

        $semDB=$line1['Semesterkuerzel'];

    }

$Semester='FS19Change';
$KurseTab=$Semester."_Lehrpersonen";
				


    $isEntry = "Select * From $KurseTab  ";
    $result = mysqli_query($con, $isEntry);
    $events = array();
if ($Semester<>""){
	
	

    while ($line2 = mysqli_fetch_array($result)) {
		
		$data[] = array(
			
			 'Vorname' => $line2['Vorname'],
			'Nachname' => $line2['Nachname'],
			'EMAIL' => $line2['EMAIL'],
			'Loginname' => $line2['Loginname'],
			'Kurs1' => $line2['Kurs1'],
			'Kurs2' => $line2['Kurs2'],
			'Kurs3' => $line2['Kurs3'],
			'Kurs4' => $line2['Kurs4'],
			'Kurs5' => $line2['Kurs5'],
			'Kurs6' => $line2['Kurs6'],
			'Kurs7' => $line2['Kurs7'],
			'Kurs8' => $line2['Kurs8'],
			'Kurs9' => $line2['Kurs9'],
			'Kurs10' => $line2['Kurs10'],
			'Kurs11' => $line2['Kurs11'],
			'Kurs12' => $line2['Kurs12'],
			'Kurs13' => $line2['Kurs13'],
			'Kurs14' => $line2['Kurs14'],
			'Kurs15' => $line2['Kurs15'],
			'Kurs16' => $line2['Kurs16']);
           
	
    }
		
}
	

	echo json_encode($data);




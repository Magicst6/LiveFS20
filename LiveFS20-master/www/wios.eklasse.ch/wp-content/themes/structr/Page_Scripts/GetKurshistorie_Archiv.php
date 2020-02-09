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



$KurshistTab=$Semester."_Kurshistorie";
				


    $isEntry = "Select * From $KurshistTab  ";
    $result = mysqli_query($con, $isEntry);
    $events = array();
if ($Semester<>""){
	
	

    while ($line2 = mysqli_fetch_array($result)) {
		
		$data[] = array(
			
			 'ID' => $line2['ID'],
			'Stattgefunden' => $line2['Stattgefunden'],
			'Datum' => $line2['Datum'],
			'KursID' => $line2['KursID'],
			'Lehrer' => $line2['Lehrer'],
			'Kommentar' => $line2['Kommentar'],
			'Lektionen' => $line2['Lektionen']);
			
           
	
    }
		
}
	

	echo json_encode($data);




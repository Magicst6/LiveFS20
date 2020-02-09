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



$KurseTab=$Semester."_LernendeModule";
				


    $isEntry = "Select * From $KurseTab  ";
    $result = mysqli_query($con, $isEntry);
    $events = array();
if ($Semester<>""){
	
	

    while ($line2 = mysqli_fetch_array($result)) {
		
		$data[] = array(
			
			 'ID' => $line2['ID'],
			'Name' => $line2['Name'],
			'Vorname' => $line2['Vorname'],
			'User ID' => $line2['User_ID'],
			'EMail' => $line2['EMail'],
			'Profil' => $line2['Profil'],	
			'Modul1' => $line2['Modul1'],
			'Modul2' => $line2['Modul2'],
			'Modul3' => $line2['Modul3'],
			'Modul4' => $line2['Modul4'],
			'Modul5' => $line2['Modul5']
		);
           
	
    }
		
}
	

	echo json_encode($data);




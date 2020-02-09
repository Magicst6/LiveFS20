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

$Kursname='kv1-wil.bball.FS19';

$KurseTab1="sv_LernendeModule";
$KurseTab="sv_Lernenderkurs";
				
 $isEntry1 = "Select Klasse From $KurseTab where KursID = '$Kursname'  ";
    $result1 = mysqli_query($con, $isEntry1);
   
	

    while ($line1 = mysqli_fetch_array($result1)) {
		
		$Klasse= $line1['Klasse'];

    $isEntry = "Select * From $KurseTab1  Where Modul1='$Klasse' or Modul2='$Klasse' or Modul3='$Klasse' or Modul4='$Klasse' or Modul5='$Klasse' or Modul6='$Klasse' or Modul7='$Klasse' or Modul8='$Klasse' or Modul9='$Klasse' or Modul10='$Klasse' or Modul11='$Klasse' or Modul12='$Klasse'  ";
    $result = mysqli_query($con, $isEntry);
    $events = array();

	

	
	

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
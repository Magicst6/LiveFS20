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


$KurseTab1="sv_Lernende";
$KurseTab="sv_LernenderKurs";
				
 $isEntry1 = "Select * From $KurseTab where KursID = '$Kursname'  ";
    $result1 = mysqli_query($con, $isEntry1);
   
	

    while ($line1 = mysqli_fetch_array($result1)) {
		
		$Vorname= $line1['Vorname'];
		$Nachname= $line1['Nachname'];
		$Klasse= $line1['Klasse'];
	

    $isEntry = "Select * From $KurseTab1 where Name = '$Nachname' and Vorname = '$Vorname' and Klasse = '$Klasse' ";
    $result = mysqli_query($con, $isEntry);
    $events = array();

	

    while ($line2 = mysqli_fetch_array($result)) {
		
		$data[] = array(
			
			 'ID' => $line2['ID'],
			'Klasse' => $line2['Klasse'],
			'Name' => $line2['Name'],
			'Vorname' => $line2['Vorname'],
			'User ID' => $line2['User_ID'],
			'EMail' => $line2['EMail'],
			'Loginname' => $line2['Loginname'],	
			'Profil' => $line2['Profil'],	
           'Status' => $line2['Status']);
	
    }
		
	
	}

	echo json_encode($data);




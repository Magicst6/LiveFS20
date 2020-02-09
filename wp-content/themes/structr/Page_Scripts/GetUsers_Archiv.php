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



$KurseTab=$Semester."_users";
				


    $isEntry = "Select * From $KurseTab  ";
    $result = mysqli_query($con1, $isEntry);
    $events = array();
if ($Semester<>""){
	
	

    while ($line2 = mysqli_fetch_array($result)) {
		
		$data[] = array(
			
			 'ID' => $line2['ID'],
			'user_login' => $line2['user_login'],
			'user_pass' => $line2['user_pass'],
			'user_nicename' => $line2['user_nicename'],
			'user_email' => $line2['user_email'],
			'user_url' => $line2['user_url'],
			'user_registered' => $line2['user_registered'],
			'user_activation_key' => $line2['user_activation_key'],
			'user_status' => $line2['user_status'],
			'display_name' => $line2['display_name']);
		
	
           
	
    }
		
}
	

	echo json_encode($data);




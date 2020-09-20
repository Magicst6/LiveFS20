<?php
include 'db.php';
$Kursname = $_GET['q'];
$ID =$_GET['k'];
$Note =$_GET['l'];
$Name =$_GET['m'];
$Gewicht =$_GET['n'];
$Datum =$_GET['o'];
$UserID=$_GET['p'];

date_default_timezone_set('CET');	
					$Zeit= date("Y-m-d H:i:s");


$isEntry= "Insert Into sv_Noten (KursID,SchuelerID,Note,Name,Gewichtung,Datum,Zeit,User_ID) VALUES ('$Kursname','$ID','$Note','$Name','$Gewicht','$Datum','$Zeit','$UserID') ";
 mysqli_query($con,$isEntry);
echo 'Note erstellt!';
        
?>

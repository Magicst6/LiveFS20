<?php
include 'db.php';
$Kursname = $_GET['q'];
$ID =$_GET['k'];
$Note =$_GET['l'];
$Name =$_GET['m'];
$Gewicht =$_GET['n'];
$Datum =$_GET['o'];




$isEntry= "Insert Into sv_Noten (KursID,SchuelerID,Note,Name,Gewichtung,Datum) VALUES ('$Kursname','$ID','$Note','$Name','$Gewicht','$Datum') ";
 mysqli_query($con,$isEntry);

        
?>

<?php
include 'db.php';

$Profil =$_GET['k'];
$Beschreibung =$_GET['l'];





$isEntry= "Insert Into sv_Profile (Profil,Beschreibung) VALUES ('$Profil','$Beschreibung') ";
 mysqli_query($con,$isEntry);

        
?>

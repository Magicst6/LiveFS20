<?php
include 'db.php';
$Kursname = $_GET['q'];

$Vorname =$_GET['l'];
$Nachname =$_GET['m'];


$Datum =$_GET['n'];
$Klasse =$_GET['o'];
$Kommentar =$_GET['p'];
$KommentVerw =$_GET['j'];
$Abwesenheiten =$_GET['r'];
$Lehrer=$_GET['u'];
$Entsch =$_GET['t'];
$semester=$_GET['s'];


$AbwKomp=$semester.'_AbwesenheitenKompakt';
$LK=$semester.'_LernenderKurs';


$isEntry1 = "Select SchuelerID From $LK where Vorname='$Vorname' and Nachname='$Nachname' and KursID='$Kursname' ";
    $result1 = mysqli_query($con, $isEntry1);
   
    while ($line2 = mysqli_fetch_array($result1)) {
		$ID=$line2['SchuelerID'];
	}

$isEntry= "Insert Into $AbwKomp (Kursname,SchuelerID,Datum,Klasse,Kommentar,KommentVerw,Abwesenheitsdauer,Vorname, Nachname, Lehrer, Entschuldigt) VALUES ('$Kursname','$ID','$Datum','$Klasse','$Kommentar','$KommentVerw','$Abwesenheiten','$Vorname','$Nachname','$Lehrer','$Entsch') ";
 mysqli_query($con,$isEntry);

        
?>

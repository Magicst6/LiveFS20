<?php

/**

 * Created by PhpStorm.

 * User: stefa

 * Date: 30.11.2018

 * Time: 16:39

 */





include 'db.php';




if( $_POST['Senden'])
{
  $pruefungsname= $_POST['title'];

    $kursid= $_POST['Kursname'];
	
	$kursname= $_POST['Kurs'];

    $start =$_POST['Datum']."T".$_POST['Startzeit'];

    $end = $_POST['Datum']."T".$_POST['Endzeit'];;

    $datum=$_POST['Datum'];

    $klasse = $_POST['Klasse'];

    $zimmer = $_POST['Zimmer'];

    $lehrperson= $_POST['Lehrperson'];

	
		 $isEntryCL= "Select Farbe From sv_KurseAll Where KursID='$kursid'";
    $resultCL = mysqli_query($con, $isEntryCL);

    while ($valueCL= mysqli_fetch_array($resultCL)) {
        $farbe = $valueCL['Farbe'];
    }
	
	
	
	$gewichtung = $_POST['gewicht'];

  




        $query = "INSERT INTO sv_Pruefungen (Pruefungsname,Kursname, Start, Ende, KursID, Klasse, Zimmer, Lehrperson, LP_ID, Farbe, Gewichtung,Datum)  VALUES ('$pruefungsname','$kursname', '$start', '$end','$kursid','$klasse','$zimmer','$lehrperson','$lp_id','$farbe','$gewichtung','$datum')";

        mysqli_query($con, $query);

        echo "Eintrag hinzugefügt!";
		 echo '<meta http-equiv="refresh" content="0; url=/manuelle-pruefungseingabe" />';

    

  
        




        

    }






?>
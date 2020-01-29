<?php

/**

 * Created by PhpStorm.

 * User: stefa

 * Date: 30.11.2018

 * Time: 16:39

  */

include 'db.php';




if(isset($_GET["f"]))

{


  $pruefungsname= $_GET['q'];

    $kursname= $_GET['kursname'];

    $start = $_GET['k'];

    $end = $_GET['g'];
	
	$id = $_GET['f'];

    $kursid= $_GET['kursid'];

    $klasse = $_GET['klasse'];

    $zimmer = $_GET['zimmer'];

    $lehrperson= $_GET['l'];

    $farbe = "#".$_GET['color'];
	
	$gewichtung = $_GET['gewichtung'];
	
	$lernziele = $_GET['lernziele'];


   
	if($klasse==""){

       $klasse= substr($kursid, 0, strpos($kursid, '.', 0));
	}



    $datum=date("Y-m-d", strtotime($start));



    $isEntryLPID= "Select ID From sv_Lehrpersonen Where Nachname='$lehrperson'";

    $resultLPID = mysqli_query($con, $isEntryLPID);



    while( $valueLPID= mysqli_fetch_array($resultLPID))

    {

        $lp_id=$valueLPID['ID'];

    }



if ($lp_id) {

    $query = "UPDATE sv_Pruefungen  SET  Pruefungsname='$pruefungsname', Gewichtung= '$gewichtung' , Datum='$datum', Datum='$datum', Kursname= '$kursname', Start='$start', Ende='$end' ,KursID= '$kursid', Klasse='$klasse', Zimmer='$zimmer',Lehrperson= '$lehrperson', LP_ID='$lp_id', Farbe='$farbe',Lernziele='$lernziele'  WHERE id='$id'";

    mysqli_query($con, $query);

    echo "Eintrag geändert!";



}

else {

    echo "Lehrperson nicht erkannt. Bitte Termin erneut ändern!";



}



}



?>
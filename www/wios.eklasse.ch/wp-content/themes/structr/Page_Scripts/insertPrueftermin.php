<?php

/**

 * Created by PhpStorm.

 * User: stefa

 * Date: 30.11.2018

 * Time: 16:39

 */





include 'db.php';





if(isset($_GET["q"]))

{
  $pruefungsname= $_GET['q'];

    $kursname= $_GET['kursname'];

    $start = $_GET['k'];

    $end = $_GET['g'];

    $kursid= $_GET['kursid'];

    $klasse = $_GET['klasse'];

    $zimmer = $_GET['zimmer'];

    $lehrperson= $_GET['l'];

    $farbe = "#".$_GET['color'];
	
	$gewichtung = $_GET['gewichtung'];
	
	$lernziele = $_GET['lernziele'];
	
	$datum=date("Y-m-d", strtotime($start));

	if($klasse==""){

 $klasse= substr($kursid, 0, strpos($kursid, '.', 0));

	}
    $isEntryLPID= "Select ID From sv_Lehrpersonen Where Nachname='$lehrperson'";

    $resultLPID = mysqli_query($con, $isEntryLPID);



    while( $valueLPID= mysqli_fetch_array($resultLPID))

    {

        $lp_id=$valueLPID['ID'];

        

    }

    if ($lp_id) {
		
		$isEntryNoten= "Select * From sv_Pruefungen Where KursID='$kursid'";

    $resultNoten = mysqli_query($con, $isEntryNoten);


$isExisting=0;
    while( $valueN= mysqli_fetch_array($resultNoten))

    {
		$Name=$valueN['Pruefungsname'];
		// echo $Name;
	 if ($Name==$pruefungsname){
		
		 $isExisting=1;
	 }	
	}

		if (!$isExisting){

        $query = "INSERT INTO sv_Pruefungen (Pruefungsname,Kursname,Datum, Start, Ende, KursID, Klasse, Zimmer, Lehrperson, LP_ID, Farbe, Gewichtung,Lernziele)  VALUES ('$pruefungsname','$kursname','$datum', '$start', '$end','$kursid','$klasse','$zimmer','$lehrperson','$lp_id','$farbe','$gewichtung','$lernziele')";

        mysqli_query($con, $query);

        echo "Eintrag hinzugefügt!";
		}
		else {
			
			echo "Prüfungsname bereits vorhanden!";
		}
    }

    else {

        echo "Lehrperson nicht erkannt. Bitte Termin erneut eintragen!";

        echo '<meta http-equiv="refresh" content="0; url=/wp-content/themes/structr/Page_Scripts/InsertUpdateFailed.php" />';





        

    }

}





?>






















































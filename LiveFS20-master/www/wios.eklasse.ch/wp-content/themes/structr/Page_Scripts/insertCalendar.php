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



    $kursname= $_GET['kursname'];

    $start = $_GET['k'];

    $end = $_GET['g'];

    $kursid= $_GET['kursid'];
	
	$kursidinp= $_GET['kursidinp'];

    $klasse = $_GET['klasse'];

    $zimmer = $_GET['zimmer'];

    $lehrperson= $_GET['l'];

    $farbe = "#".$_GET['farbe'];



    $isEntryLPID= "Select ID From sv_Lehrpersonen Where Nachname='$lehrperson'";

    $resultLPID = mysqli_query($con, $isEntryLPID);



    while( $valueLPID= mysqli_fetch_array($resultLPID))

    {

        $lp_id=$valueLPID['ID'];

        

    }

    if ($lp_id) {
		if ($kursidinp==""){

        $query = "INSERT INTO sv_KurseAll (Kursname, Start, Ende, KursID, Klasse, Zimmer, Lehrperson, LP_ID, Farbe)  VALUES ('$kursname', '$start', '$end','$kursid','$klasse','$zimmer','$lehrperson','$lp_id','$farbe')";
			
		}
		else{
			  $query = "INSERT INTO sv_KurseAll (Kursname, Start, Ende, KursID, Klasse, Zimmer, Lehrperson, LP_ID, Farbe)  VALUES ('$kursname', '$start', '$end','$kursidinp','$klasse','$zimmer','$lehrperson','$lp_id','$farbe')";
		}

        mysqli_query($con, $query);

        echo "Eintrag hinzugefügt!";

    }

    else {

        echo "Lehrperson nicht erkannt. Bitte Termin erneut eintragen!";

        echo '<meta http-equiv="refresh" content="0; url=/wp-content/themes/structr/Page_Scripts/InsertUpdateFailed.php" />';





        

    }

}





?>






















































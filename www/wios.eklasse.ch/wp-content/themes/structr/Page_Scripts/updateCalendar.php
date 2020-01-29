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



    $kursname= $_GET['kursname'];

    $start = $_GET['k'];

    $end = $_GET['g'];

    $id = $_GET['f'];

    $kursid= $_GET['kursid'];
	
	 $kursidinp= $_GET['kursidinp'];

    $klasse = $_GET['klasse'];

    $zimmer = $_GET['zimmer'];

    $lehrperson= $_GET['l'];

    $farbe = '#'.$_GET['farbe'];

   



    $datum=date("Y-m-d", strtotime($start));



    $isEntryLPID= "Select ID From sv_Lehrpersonen Where Nachname='$lehrperson'";

    $resultLPID = mysqli_query($con, $isEntryLPID);



    while( $valueLPID= mysqli_fetch_array($resultLPID))

    {

        $lp_id=$valueLPID['ID'];

    }



if ($lp_id) {
	
	if ($kursidinp==""){

    $query = "UPDATE sv_KurseAll  SET Datum='$datum', Kursname= '$kursname', Start='$start', Ende='$end' ,KursID= '$kursid', Klasse='$klasse', Zimmer='$zimmer',Lehrperson= '$lehrperson', LP_ID='$lp_id', Farbe='$farbe' WHERE id='$id'";
	}
	else{
		$query = "UPDATE sv_KurseAll  SET Datum='$datum', Kursname= '$kursname', Start='$start', Ende='$end' ,KursID= '$kursidinp', Klasse='$klasse', Zimmer='$zimmer',Lehrperson= '$lehrperson', LP_ID='$lp_id', Farbe='$farbe' WHERE id='$id'";
	}

    mysqli_query($con, $query);

    echo "Eintrag geändert!";



}

else {

    echo "Lehrperson nicht erkannt. Bitte Termin erneut ändern!";



}



}



?>
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
	
	 $isEntry4 = "SELECT  Pruefungsname From sv_Pruefungen where KursID='$kursid' and id='$id'";
                $result4 = mysqli_query($con, $isEntry4);

                while ($value4 = mysqli_fetch_array($result4)) {
				 $NamePr = $value4['Pruefungsname'];
                   
				}

		$isEntryNoten= "Select * From sv_Pruefungen Where KursID='$kursid'";

    $resultNoten = mysqli_query($con, $isEntryNoten);


$isExisting=0;
    while( $valueN= mysqli_fetch_array($resultNoten))

    {
		$Name=$valueN['Pruefungsname'];
		// echo $Name;
	 if (($Name==$pruefungsname) and ($Name!=$NamePr) ){
		
		 $isExisting=1;
	 }	
	}

		if (!$isExisting){

    $query = "UPDATE sv_Pruefungen  SET  Pruefungsname='$pruefungsname', Gewichtung= '$gewichtung' , Datum='$datum', Datum='$datum', Kursname= '$kursname', Start='$start', Ende='$end' ,KursID= '$kursid', Klasse='$klasse', Zimmer='$zimmer',Lehrperson= '$lehrperson', LP_ID='$lp_id', Farbe='$farbe',Lernziele='$lernziele'  WHERE id='$id'";

    mysqli_query($con, $query);

    echo "<script> alert('Eintrag geändert!');</script>";

	 $isEntry1 = "SELECT  Datum,Name From sv_Noten where KursID='$kursid'";
                $result1 = mysqli_query($con, $isEntry1);

                while ($value1 = mysqli_fetch_array($result1)) {

				
                
                    $IDAK = $value1['SchuelerID'];
                    $DatumAK = $value1['Datum'];
                    $NameAK = $value1['Name'];
                   
                  
						   $sql_befehl = "UPDATE sv_Noten SET Name='$pruefungsname',Gewichtung='$gewichtung',Datum='$datum' Where KursID='$kursid' and Name='$NamePr'";
                    
                               mysqli_query($con, $sql_befehl);
					
					
                        }
echo "Prüfung editiert!";
		}
	else {
			echo "<script> alert('Prüfungsname bereits vorhanden!');</script>";
			echo "Prüfungsname bereits vorhanden!";
		}


}

else {

    echo "Lehrperson nicht erkannt. Bitte Termin erneut ändern!";



}



}



?>
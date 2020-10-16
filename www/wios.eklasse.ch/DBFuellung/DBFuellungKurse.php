<?php
include 'db.php';
//Input-Felder in Tabelle eintragen(außer die Termine der Veranstaltung
if( $_POST['Senden'])
{


    $Klasse =  $_POST['Klasse'];
    $Kursname =  $_POST['Kursname'];
    $Kurskuerzel =  $_POST['Kuerzel'];
	$Farbe= $_POST['farbe'];
	$Profil= $_POST['Profil'];
	
    $dateExtra =  $_POST['Datum'];
    $Year = substr($dateExtra, 2, 2);
    $date1 = strtotime($dateExtra);

    $Datum = date('Y-m-d', $date1);


    $startstr = strtotime($dateExtra . " " . $_POST['Startzeit']);
    $Start = date('Y-m-d H:i:s', $startstr);
    $Tag = $_POST['Tag'];
    $endstr = strtotime($dateExtra . " " . $_POST['Endzeit']);
    $Ende = date('Y-m-d H:i:s', $endstr);
    $Lektionen = $_POST['Lektionen'];
    $KursID=$_POST['kursid'];
	if ($KursID=="-Select-" or $KursID==""){
	$KursID = $_POST['Klasse'] . '.' .$_POST['Kuerzel']. '.' . $_POST['semester'];
	}
	else{
		 $isEntryKN= "Select Kursname From sv_Kurse Where KursID='$KursID'";
    $resultKN = mysqli_query($con, $isEntryKN);

    while ($valueKN= mysqli_fetch_array($resultKN)) {
        $Kursname = $valueKN['Kursname'];
    }
		
		 $isEntryCL= "Select Farbe From sv_KurseAll Where KursID='$KursID'";
    $resultCL = mysqli_query($con, $isEntryCL);

    while ($valueCL= mysqli_fetch_array($resultCL)) {
        $Farbe = $valueCL['Farbe'];
    }
	}
	
    $Zimmer = $_POST['Zimmer'];
    $ZI_ID = $_POST['ZI_ID'];
    $LehrpersonGes = $_POST['lehrer'];
	 preg_match("/:(.*)/", $LehrpersonGes, $output_array);

   
    $LP_ID=$output_array[1];;
    preg_match("/(.*):/", $LehrpersonGes, $output_array);
	$Lehrperson=$output_array[1];
    $isEntry = "Select * From sv_KurseAll";
    $result = mysqli_query($con, $isEntry);
    $isExisting = false;
    $isWrongTeacherName =false;
    while ($value = mysqli_fetch_array($result)) {
        if (($value['Zimmer'] == $Zimmer) and ($value['Start'] == $Start) and ($value['Ende'] == $Ende) and ($value['KursID'] == $KursID)) {
            $isExisting = true;
            echo "line already existing";
        }

    }

    $isEntryLPID = "Select ID From sv_Lehrpersonen Where Nachname='$Lehrperson'";
    $resultLPID = mysqli_query($con, $isEntryLPID);

    while ($valueLPID = mysqli_fetch_array($resultLPID)) {
        $LP_ID = $valueLPID['ID'];
    }
    if ($Lehrperson<>""and $LP_ID<1)
    {
        echo "<script>alert('Lehrperson:".$Lehrperson." nicht bekannt oder falsch geschrieben');</script>";
        $isExisting=false;
    }
    $isEntryLPKurse = "SELECT Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30 From sv_Lehrpersonen Where  ID='$LP_ID' ";
    $result = mysqli_query($con, $isEntryLPKurse);


    while( $value= mysqli_fetch_array($result))
    {
        $isEntryCreated=false;
        $isKursExisting=false;
        for($x = 1; $x <= 30; $x++) {

            $Kurs = "Kurs" . "$x";

            $KursValue = $value[$Kurs];
            if ($KursValue==$KursID)
            {
                $isKursExisting=true;
            }

            if ($KursValue == "" and !$isEntryCreated and !$isKursExisting)
            {
                $sql_befehlKurse = "UPDATE sv_Lehrpersonen SET $Kurs = '$KursID'  where ID ='$LP_ID' ";

// In die DB-Tabelle eintragen
                mysqli_query($con, $sql_befehlKurse);
                $isEntryCreated=true;
            }
        }
    }


    // Daten hinzufügen (Anzahl der Spalten anpassen)
//    $daten[] = "('" . $spalte1 . "','" . $spalte2 . "','" . $spalte3 . "','" . $spalte4 . "','" . $spalte5 . "','" . $spalte6 . "','" . $spalte7 . "','" . $spalte8 . "','" . $spalte9 . "','" . $spalte10 . "','" . $spalte11 . "','" . $spalte12 . "')" . chr(13);
    if (!$isExisting) {
        $sql_befehl = "INSERT INTO sv_KurseAll (Kursname, KursID, Datum, Tag, Start, Ende, Lektionen, Klasse, Zimmer,ZI_ID,Lehrperson,LP_ID,Farbe) VALUES ('$Kursname','$KursID','$Datum','$Tag','$Start','$Ende','$Lektionen','$Klasse','$Zimmer','$ZI_ID','$Lehrperson','$LP_ID','$Farbe')";


// In die DB-Tabelle eintragen
        mysqli_query($con, $sql_befehl);
        echo "Eintrag abgeschlossen";
    }
    $isEntryKurseExisting = "SELECT KursID From sv_Kurse";
    $result = mysqli_query($con, $isEntryKurseExisting);

    $isKursExisting=false;
    while ($value = mysqli_fetch_array($result)) {
        if ($KursID==$value['KursID']){
            $isKursExisting=true;

        }

    }
    if (!$isKursExisting)
    {
        $sql_befehl = "INSERT INTO sv_Kurse (Kursname,Klasse,KursID,Lehrperson,Farbe,Profil) VALUES ('$Kursname','$Klasse','$KursID', '$LP_ID','$Farbe','$Profil')";
        mysqli_query($con, $sql_befehl);
    }
    else
    {
        $sql_befehl = "UPDATE sv_Kurse SET Kursname = '$Kursname', Klasse = '$Klasse',Lehrperson='$LP_ID', Farbe='$Farbe',Profil='$Profil' where KursID ='$KursID' ";
		 mysqli_query($con, $sql_befehl);
    }
}



$Kursname =  $KursID;

$dontFill=0;
$isEntry3= "Select KursID From sv_LernenderKurs";
$result3 = mysqli_query($con, $isEntry3);
$resultarr3 = array();

while( $row3= mysqli_fetch_assoc($result3))
{
    $resultarr3[] = $row3['KursID'];
}

$uniquearr3 = array_unique($resultarr3);
asort($uniquearr3);

foreach ($uniquearr3 as $value) {
    if ($value==$Kursname)
    {
        $dontFill=1;
    }
}


$isEntry2= "Select Name, Vorname, ID, Profil From sv_LernendeModule Where Modul1='$Klasse' or Modul2='$Klasse' or Modul3='$Klasse' or Modul4='$Klasse' or Modul5='$Klasse' or Modul6='$Klasse' or Modul7='$Klasse' or Modul8='$Klasse' or Modul9='$Klasse' or Modul10='$Klasse' or Modul11='$Klasse' or Modul12='$Klasse' ";


$result2 = mysqli_query($con, $isEntry2);

    while ($row2 = mysqli_fetch_array($result2)) {
		$isProfil=0;
        $dontFill=0;
        $SchuelerID= $row2['ID'];
        $Vorname= $row2['Vorname'];
        $Nachname= $row2['Name'];
        $Profil1= $row2['Profil'];
		
		$ProfKomma = explode(",", $Profil1);
		
		$ProfDash = explode("/", $Profil1);
		
		foreach ($ProfKomma as $val1) {
            if (strtolower($val1)==strtolower($Profil))
			{
				$isProfil=1;
			}
         }
		
		foreach ($ProfDash as $val2) {
            if (strtolower($val2)==strtolower($Profil))
			{
				$isProfil=1;
			}
         }

       
		if ($isProfil==1 or $Profil==''){

        $isEntry4= "Select SchuelerID, Vorname, Nachname, KursID From sv_LernenderKurs";
        $result4 = mysqli_query($con, $isEntry4);

        while ($row4 = mysqli_fetch_array($result4)) {
            $ID= $row4['SchuelerID'];
            $KursnameAbw =  $row4['KursID'];
            $VornameAbw= $row4['Vorname'];
            $NachnameAbw= $row4['Nachname'];

            if ( ($SchuelerID==$ID) and ($Kursname==$KursnameAbw) and (($Vorname<>$VornameAbw) or ($Nachname<>$NachnameAbw) ))
            {
                $sql_befehl = "Update sv_LernenderKurs SET Vorname='$Vorname', Nachname='$Nachname' Where SchuelerID='$ID' and KursID='$Kursname'";
                mysqli_query($con, $sql_befehl);
//echo "Eintrag hinzugefügt!";
                $dontFill=1;
            }







            if ( ($SchuelerID==$ID) and ($Kursname==$KursnameAbw) and  ($Vorname==$VornameAbw) and ($Nachname==$NachnameAbw) )
            {
                $dontFill=1;
            }
        }

        if ($dontFill == 0 and strpos($Kursname, $Klasse) !== false){
            $sql_befehl = "INSERT INTO sv_LernenderKurs (KursID, SchuelerID, Klasse, Vorname, Nachname) VALUES ('$Kursname', '$SchuelerID', '$Klasse', '$Vorname','$Nachname')";
            mysqli_query($con, $sql_befehl);
//echo "Eintrag hinzugefügt!";
        }

    }

}


echo '<meta http-equiv="refresh" content="0; url=/kurstermine" />';

?>
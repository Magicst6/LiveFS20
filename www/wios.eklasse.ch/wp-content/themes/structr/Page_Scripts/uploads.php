<?php

$Klasse=$_POST['klasse'];

$Semester=$_POST['semester'];

$target_dir = "Uploads/";

$target_file = $target_dir . basename(date("d.m.Y-H:i:s",time()).$_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

echo $target_file;

// Check if file already exists

if (file_exists($target_file)) {

    echo "Sorry, file already exists.";

    $uploadOk = 0;

}

// Check file size

if ($_FILES["fileToUpload"]["size"] > 500000) {

    echo "Sorry, your file is too large.";

    $uploadOk = 0;

}

// Allow certain file formats

if($FileType != "csv" ) {

    echo "Sorry, only CSV files are allowed.";

    $uploadOk = 0;

}

// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {

    echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file

} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

    } else {

        echo "Sorry, there was an error uploading your file.";

    }



   include 'db.php';



    /**

     * Created by PhpStorm.

     * User: stefa

     * Date: 03.11.2018

     * Time: 16:46

     */



// CSV-Datei in eine DB-Tabelle einlesen



// CSV-Datei einlesen

    $csvInhalt = file($target_file, FILE_SKIP_EMPTY_LINES);



    $daten = [];

    $trennzeichen = ";";

    $x = 0;

    foreach ($csvInhalt as $inhalt) {

        if ($x > 0) {

            // Die Anzahl der Spalten anpassen

            list($spalte1, $spalte2, $spalte3, $spalte4, $spalte5, $spalte6, $spalte7, $spalte8, $spalte9, $spalte10, $spalte11,$spalte12,$spalte13) = explode($trennzeichen, $inhalt);

			$spalte2= str_replace(' ', '_', $spalte2);
			
		
           
			$Kursname = $spalte1;

            $Kurskuerzel = $spalte2;

            if ($Kurskuerzel == "") {

                echo "Eintrag unvollständig";



            } else {

                $dateCSV = $spalte3;

                $Year = substr($dateCSV, 8, 9);

                $spalte3 = strtotime($spalte3);



                $Datum = date('Y-m-d', $spalte3);

              



                $spalte5 = strtotime($dateCSV . " " . $spalte5);

                $Start = date('Y-m-d H:i:s', $spalte5);

                $Tag = $spalte4;

                $spalte6 = strtotime($dateCSV . " " . $spalte6);

                $Ende = date('Y-m-d H:i:s', $spalte6);

                $Lektionen = $spalte7;

                $KursID = $Klasse . '.' . $spalte2 . '.' . $Semester;

                $Zimmer = $spalte8;

                $ZI_ID = $spalte9;

                $Lehrperson = $spalte10;

                $LP_ID = $spalte11;
 
				$Farbe=$spalte13;
				
				$Profil=$spalte12;


                $isEntry = "Select * From sv_KurseAll";

                $result = mysqli_query($con, $isEntry);

                $isExisting = false;

                $isWrongTeacherName = false;

                while ($value = mysqli_fetch_array($result)) {

                    if (($value['Zimmer'] == $Zimmer) and ($value['Start'] == $Start) and ($value['Ende'] == $Ende) and ($value['KursID'] == $KursID) and ($value['Lehrperson'] == $Lehrperson)) {

                        $isExisting = true;

                        echo "line already existing";

                    }



                }
              
				
               if ($LP_ID<1 || !$LP_ID)
			   {

                $isEntryLPID = "Select ID From sv_Lehrpersonen Where Nachname='$Lehrperson'";

                $resultLPID = mysqli_query($con, $isEntryLPID);



                while ($valueLPID = mysqli_fetch_array($resultLPID)) {

                    $LP_ID = $valueLPID['ID'];
					 echo $LP_ID;

                }
			   }

                if ($Lehrperson <> "" and $LP_ID < 1) {

                    echo "<script>alert('Lehrperson:" . $Lehrperson .' '.$LP_ID. " nicht bekannt oder falsch geschrieben');</script>";

                    $isExisting = true;

                }

                $isEntryLPKurse = "SELECT  Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30 From sv_Lehrpersonen Where  ID='$LP_ID' ";

                $result = mysqli_query($con, $isEntryLPKurse);





                while ($value = mysqli_fetch_array($result)) {

                    $isEntryCreated = false;

                    $isKursExisting = false;

                    for ($x = 1; $x <= 30; $x++) {



                        $Kurs = "Kurs" . "$x";



                        $KursValue = $value[$Kurs];

                        if ($KursValue == $KursID) {

                            $isKursExisting = true;

                        }


                        if ($KursValue == "" and !$isEntryCreated and !$isKursExisting) {

                            $sql_befehlKurse = "UPDATE sv_Lehrpersonen SET $Kurs = '$KursID'  where ID ='$LP_ID' ";


                                  
// In die DB-Tabelle eintragen

                            mysqli_query($con, $sql_befehlKurse);

                            $isEntryCreated = true;

                        }

                    }

                }

                // Daten hinzufügen (Anzahl der Spalten anpassen)

//    $daten[] = "('" . $spalte1 . "','" . $spalte2 . "','" . $spalte3 . "','" . $spalte4 . "','" . $spalte5 . "','" . $spalte6 . "','" . $spalte7 . "','" . $spalte8 . "','" . $spalte9 . "','" . $spalte10 . "','" . $spalte11 . "','" . $spalte12 . "')" . chr(13);

                if (!$isExisting) {

                    $sql_befehl = "INSERT INTO sv_KurseAll (Kursname, KursID, Datum, Tag, Start, Ende, Lektionen, Klasse, Zimmer,ZI_ID,Lehrperson,LP_ID,Farbe) VALUES ('$Kursname','$KursID','$Datum','$Tag','$Start','$Ende','$Lektionen','$Klasse','$Zimmer','$ZI_ID','$Lehrperson','$LP_ID','$Farbe')";





// In die DB-Tabelle eintragen

                    mysqli_query($con, $sql_befehl);
					
					echo "Termin eingetragen";

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

                    $sql_befehl = "UPDATE sv_Kurse SET Kursname = '$Kursname', Klasse = '$Klasse',Lehrperson='$LP_ID',Farbe='$Farbe',Profil='$Profil'  where KursID ='$KursID' ";

                }



// Verbindung zur Datenbank aufbauen





// SQL-String zusammensetzen

// Die Anzahl der Spalten und Namen anpassen

//$sql_befehl = "INSERT INTO `sv_KurseAll` ($head1, $head2, $head3, $head4,$head5, $head6, $head7, $head8, $head9) VALUES" . implode(",", $daten) . ";";



// In die DB-Tabelle eintragen

//mysqli_query($con,$sql_befehl);





                $Kursname = $KursID;



                $dontFill = 0;

                $isEntry3 = "Select KursID From sv_LernenderKurs";

                $result3 = mysqli_query($con, $isEntry3);

                $resultarr3 = array();



                while ($row3 = mysqli_fetch_assoc($result3)) {

                    $resultarr3[] = $row3['KursID'];

                }



                $uniquearr3 = array_unique($resultarr3);

                asort($uniquearr3);



                foreach ($uniquearr3 as $value) {

                    if ($value == $Kursname) {

                        $dontFill = 1;

                    }

                }


               $isProfil=0;


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
          
			
			if ($val1 == $Profil)
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

			

                        $isEntry4 = "Select SchuelerID, Vorname, Nachname, KursID From sv_LernenderKurs";

                        $result4 = mysqli_query($con, $isEntry4);



                        while ($row4 = mysqli_fetch_array($result4)) {

                            $ID = $row4['SchuelerID'];

                            $KursnameAbw = $row4['KursID'];

                            $VornameAbw = $row4['Vorname'];

                            $NachnameAbw = $row4['Nachname'];



                            if (($SchuelerID == $ID) and ($Kursname == $KursnameAbw) and (($Vorname <> $VornameAbw) or ($Nachname <> $NachnameAbw))) {

                                $sql_befehl = "Update sv_LernenderKurs SET Vorname='$Vorname', Nachname='$Nachname' Where SchuelerID='$ID' and KursID='$Kursname'";

                                mysqli_query($con, $sql_befehl);

//echo "Eintrag hinzugefügt!";

                                $dontFill = 1;

                            }





                            if (($SchuelerID == $ID) and ($Kursname == $KursnameAbw) and ($Vorname == $VornameAbw) and ($Nachname == $NachnameAbw)) {

                                $dontFill = 1;

                            }

                        }



                        if ($dontFill == 0 and strpos($Kursname, $Klasse) !== false) {

                            $sql_befehl = "INSERT INTO sv_LernenderKurs (KursID, SchuelerID, Klasse, Vorname, Nachname) VALUES ('$Kursname', '$SchuelerID', '$Klasse', '$Vorname','$Nachname')";

                            mysqli_query($con, $sql_befehl);

echo "Eintrag hinzugefügt!";

                        }



                    }

                }

            }

        }

        $x++;

    }

}


echo '<meta http-equiv="refresh" content="0; url=/kurstermine" />';



?>


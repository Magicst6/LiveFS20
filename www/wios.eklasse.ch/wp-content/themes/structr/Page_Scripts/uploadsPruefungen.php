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

			$spalte2= str_replace(' ', '_', $spalte2);
            
			// Die Anzahl der Spalten anpassen

            list($spalte0,$spalte1, $spalte2, $spalte3, $spalte4, $spalte5, $spalte6, $spalte7, $spalte8, $spalte9, $spalte10, $spalte11) = explode($trennzeichen, $inhalt);

            $Pruefungsname = $spalte0;
			
			$Kursname = $spalte1;

            $Kurskuerzel = $spalte2;
			
			
                $dateCSV = $spalte3;

                $Year = substr($dateCSV, 8, 9);

                $spalte3 = strtotime($spalte3);



                $Datum = date('Y-m-d', $spalte3);





                $spalte5 = strtotime($dateCSV . " " . $spalte5);

                $Start = date('Y-m-d H:i:s', $spalte5);

                $Tag = $spalte4;

                $spalte6 = strtotime($dateCSV . " " . $spalte6);

                $Ende = date('Y-m-d H:i:s', $spalte6);

                $Gewichtung = $spalte7;

                $KursID = $Klasse . '.' . $spalte2 . '.' . $Semester;

                $Zimmer = $spalte8;

                $ZI_ID = $spalte9;

                $Lehrperson = $spalte10;

                $LP_ID = $spalte11;



        $isEntry = "SELECT Farbe From sv_Kurse Where  KursID='$KursID' ";
$result = mysqli_query($con, $isEntry);

while( $value= mysqli_fetch_array($result))
{
	$Farbe=$value['Farbe'];
}
			
            if ($Kurskuerzel == "" or $Kursname == "" or $Pruefungsname == ""  or $Datum == "" or $Start == ""  or $Ende == "" or $Tag == ""  or $Gewichtung == "" or $Klasse == ""  or $Lehrperson == "" or $LP_ID == "" ) {

                echo "Eintrag unvollständig";



            } else {

                $isEntry = "Select * From sv_Pruefungen";

                $result = mysqli_query($con, $isEntry);

                $isExisting = false;

                $isWrongTeacherName = false;

                while ($value = mysqli_fetch_array($result)) {

                    if (($value['Zimmer'] == $Zimmer) and ($value['Start'] == $Start) and ($value['Ende'] == $Ende) and ($value['KursID'] == $KursID) and ($value['Pruefungsname'] == $Pruefungsname)) {

                        $isExisting = true;

                        echo "line already existing";

                    }



                }



               
             
                // Daten hinzufügen (Anzahl der Spalten anpassen)

//    $daten[] = "('" . $spalte1 . "','" . $spalte2 . "','" . $spalte3 . "','" . $spalte4 . "','" . $spalte5 . "','" . $spalte6 . "','" . $spalte7 . "','" . $spalte8 . "','" . $spalte9 . "','" . $spalte10 . "','" . $spalte11 . "','" . $spalte12 . "')" . chr(13);

                if (!$isExisting) {

                    $sql_befehl = "INSERT INTO sv_Pruefungen (Pruefungsname,Kursname, KursID, Datum, Tag, Start, Ende, Gewichtung, Klasse, Zimmer,ZI_ID,Lehrperson,LP_ID,Farbe) VALUES ('$Pruefungsname','$Kursname','$KursID','$Datum','$Tag','$Start','$Ende','$Gewichtung','$Klasse','$Zimmer','$ZI_ID','$Lehrperson','$LP_ID','$Farbe')";





// In die DB-Tabelle eintragen

                    mysqli_query($con, $sql_befehl);

                }



              



// Verbindung zur Datenbank aufbauen





// SQL-String zusammensetzen

// Die Anzahl der Spalten und Namen anpassen

//$sql_befehl = "INSERT INTO `sv_KurseAll` ($head1, $head2, $head3, $head4,$head5, $head6, $head7, $head8, $head9) VALUES" . implode(",", $daten) . ";";



// In die DB-Tabelle eintragen

//mysqli_query($con,$sql_befehl);







                    }

                

            

        }

        $x++;
}
    

}



echo '<meta http-equiv="refresh" content="0; url=/kurstermine" />';



?>



